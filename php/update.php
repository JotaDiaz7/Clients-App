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

        $image = $_FILES['file']['name'];
        
        $sourceFile = $_SERVER['DOCUMENT_ROOT'].'/pictures/';
        move_uploaded_file($_FILES['file']['tmp_name'], $sourceFile.$image);

        $consult = "UPDATE users SET phone=?, `name`=?, dni=?, sex=?, `address`=?, `image`=? WHERE user=?";
        $stmt = $conecbd -> prepare($consult);

        if($stmt){
            $stmt->bind_param("sssssss", $phone, $name, $dni, $sex, $address, $image, $user);

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