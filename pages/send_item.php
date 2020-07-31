<?php

    $name = xme($_POST["name"]);
    $brand = xme($_POST["brand"]);
    $energy = xme($_POST["energy"]);
    $kcal = xme($_POST["kcal"]);
    $fat = xme($_POST["fat"]);
    $carbs = xme($_POST["carbs"]);
    $fiber = xme($_POST["fiber"]);
    $protein = xme($_POST["protein"]);
    $salt = xme($_POST["salt"]);


                    try {
                        require('./pages/db.php');
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        // set the PDO error mode to exception
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = 
                        "
                        INSERT INTO x_varenavn (name, brand, energy, kcal, fat, carbs, fiber, protein, salt)
                        VALUES ('".$name."', '".$brand."', '".$energy."', '".$kcal."', '".$fat."', '".$carbs."', '".$fiber."', '".$protein."', '".$salt."')
                        ";
                        $conn->exec($sql);
                        $conn = null;

                    } catch(PDOException $e) {
                        echo $e;
                    }




?>