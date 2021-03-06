<?php
header('Cache-Control: no cache'); // gjør det mulig å trykke tilbake uten advarselen i webleseren.
session_cache_limiter('private_no_expire'); // gjør det mulig å trykke tilbake uten advarselen i webleseren.
session_start();

function xme($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


$loggedin;
$error;
$message;

        if (isset($_COOKIE["user_id"])){
            $_SESSION["user_id"] = $_COOKIE["user_id"];
            $loggedin = true;
        }
    if (isset($_POST["login"])){
        //sql check if user contains login
        require('./pages/db.php');
        try {
            $bruker = xme($_POST["user"]);
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            // prepare sql and bind parameters
            $stmt = $conn->prepare("SELECT user, password, id
            from x_user
            where (user = :Username)");
            $stmt->bindParam(':Username', $bruker);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                while ($result = $stmt->fetch()) {
                    // compare hashed password 
                    $pass_db = $result["password"];
                    $pass_post = $_POST["password"];
                    if ( password_verify( $pass_post, $pass_db ) ) {
                        $_SESSION['user_id'] = $result['id'];
                        setcookie("user_id", $result['id'], time() + (86400 * 30), "/"); /* SET COOKIE FOR 30 DAYS */
                        $loggedin = true;
                    } else {
                        echo "Wrong Password";
                        $loggedin = false;
                        /*
                        if (empty($_SESSION["x_attempt"])){
                            $_SESSION["x_attempt"]++; 
                        } else {
                            $_SESSION["x_attempt"] = 1; 
                        }
                        */
                        
                    }
                }
            } else {
                $message =  "Wrong Username";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                        $loggedin = false;
                        /*
                        if (empty($_SESSION["x_attempt"])){
                            $_SESSION["x_attempt"]++; 
                        } else {
                            $_SESSION["x_attempt"] = 1; 
                        }
                        */
            }
        } catch (PDOException $e) {
            $error .= "Connection failed: " . $e->getMessage();
        }

    } else if (isset($_POST["newuser"])){
        
        try {
            require('./pages/db.php');
            $pass = password_hash( $_POST["password"], PASSWORD_DEFAULT);
            $firstname = xme($_POST["firstname"]);
            $lastname = xme($_POST["lastname"]);
            $user = xme($_POST["user"]);
            $email = xme($_POST["email"]);

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO x_user (id, firstname, lastname, user, password, email)
            VALUES (null, '".$firstname."', '".$lastname."', '".$user."', '".$pass."', '".$email."')";
            $conn->exec($sql);
          } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          }
          
          $conn = null;
        //sql add new user
    } else if (isset($_POST["logweight"])){
        require('./pages/send_weightin.php');
        $message = "New weight registered";
    } else if (isset($_POST["newDiary"])){
        require('./pages/send_diary.php');
        $message = "New diary entry registerd";
    } else if (isset($_POST["newItem"])){
        require('./pages/send_item.php');
        $message = "New item created";
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Health X</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>
<div id="hiro">
    <h1 class="headliner">Health X</h1>
    <p>By Michael Lund</p>
</div>
    <main>
        <?php
        if (isset($message)){
            echo $message;
        }
        
        /* If wrong password for too many attempts. redirect! */
        if ($_SESSION["x_attempt"] > 2){
            $_SESSION["x_attempt"] = 1;
            echo    '<script type="text/javascript">
                                 window.location = "http://www.vg.no"
                                 </script>';
        }
        if (isset($_SESSION['user_id'])){
            
            echo '<div id="hoved">';

            
            /* Fasting timer */
            
            /* Diary */
            echo '<h3 class="headliner" >Diary</h3>';
            require('./pages/diary.php');

            /* Logger */
            echo '<h3 class="headliner" >Log your meal</h3>';
            require('./pages/logger.php');

            /* Register new items */
            echo '<h3 class="headliner" >Register new item</h3>';
            require('./pages/newitems.php');

            /* Weigh-in */
            echo '<h3 class="headliner" >Weigh in</h3>';
            require('./pages/weighin.php');

            echo '</div>';

        } else {
            require('./pages/login.php');
        }


        
        
        
        ?>



    </main>

    
</body>

</html>