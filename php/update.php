<?php

    session_start();

    include_once('config.php');

    $conecbd -> set_charset('utf8');

    if($conecbd -> connect_error){
        $dates = 'Error connect';
    }else{
        $user = $_POST['user_date'];
        $phone = htmlspecialchars(trim($_POST['phone_date']));
        $name = htmlspecialchars(trim($_POST['name_date']));
        $dni = htmlspecialchars(trim($_POST['dni_date']));
        $sex = htmlspecialchars(trim($_POST['sex']));
        $address = htmlspecialchars(trim($_POST['address_date']));

        $consult = "UPDATE users SET phone='$phone', `name`='$name', dni='$dni', sex='$sex', `address`='$address' WHERE user='$user'";

        $result = $conecbd -> query($consult);

        if($result){
            echo json_encode("OK");
            exit;
        }else{
            echo json_encode('Error');
            exit;
        }

        $conecbd -> close();
    }
?>