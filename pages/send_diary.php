<?php

    $x_user = xme($_POST['user_id']);
    $dato = xme($_POST["date"]);
    $tanker = xme($_POST["tanker"]);
                    try {
                        require('./pages/db.php');
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        // set the PDO error mode to exception
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = 
                        "
                        INSERT INTO x_diary (x_user, dato, tanker)
                        VALUES ('".$x_user."', '".$dato."', '".$tanker."')
                        ";
                        $conn->exec($sql);
                        $conn = null;
                        $ok = true;

                    } catch(PDOException $e) {
                        echo $e;
                    }




?>