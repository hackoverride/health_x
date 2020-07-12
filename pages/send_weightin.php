<?php

    $x_user = $_POST['user_id'];
    $dato = $_POST["date"];
    $weight_in_kilo = $_POST["kilo"];
    $weight_in_decimal = $_POST["decimal"];
    $measure_neck = $_POST["neck"];
    $measuer_stomach = $_POST["stomach"];

                    try {
                        require('./pages/db.php');
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        // set the PDO error mode to exception
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = 
                        "
                        INSERT INTO x_weighin (x_user, dato, weight_in_kilo, weight_in_decimal, measure_neck, measure_stomach)
                        VALUES ('".$x_user."', '".$dato."', '".$weight_in_kilo."','".$weight_in_decimal."','".$measure_neck."','".$measuer_stomach."')
                        ";
                        $conn->exec($sql);
                        $conn = null;
                        $ok = true;

                    } catch(PDOException $e) {
                        echo $e;
                    }




?>