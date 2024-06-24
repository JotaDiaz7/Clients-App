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

        $consult = "UPDATE users SET phone=?, `name`=?, dni=?, sex=?, `address`=? WHERE user=?";
        $stmt = $conecbd -> prepare($consult);

        if($stmt){
            $stmt->bind_param("ssssss", $phone, $name, $dni, $sex, $address, $user);

            if($stmt->execute()){
                echo json_encode("OK");
                exit;
            }else{
                echo json_encode('Error');
                exit;
            }

            $stmt->close();
        }


        $conecbd -> close();
    }
?>