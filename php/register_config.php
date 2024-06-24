<?php
    session_start();

    if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['birth']) || empty($_POST['dni']) || empty($_POST['sex']) || empty($_POST['phone'])){
        echo json_encode('Error1');
        exit;
    }

    include_once('config.php');

    $conecbd = new mysqli($serverbd, $userbd, $passbd, $db);

    $conecbd -> set_charset('utf8');

    if($conecbd->connect_error){
        echo json_encode('Error2');
        exit;
    }else{
        $name = htmlspecialchars(trim($_POST['name']));
        $address = htmlspecialchars(trim($_POST['address']));
        $birth = htmlspecialchars(trim($_POST['birth']));
        $dni = htmlspecialchars(trim($_POST['dni']));
        $sex = htmlspecialchars(trim($_POST['sex']));
        $phone = htmlspecialchars(trim($_POST['phone']));
        $user = htmlspecialchars($_POST['user']);
        $date = htmlspecialchars($_POST['date']);
        //$file = addslashes(file_get_contents($_FILES['file']));

        $consult = "INSERT INTO users (`name`,`address`, `birth`, `dni`, `sex`, `user`, `date`, `phone`) VALUES (?, ?, ?, ?, ?, ?, ?,?)";
        $stmt = $conecbd->prepare($consult);

        if($stmt){
            $stmt->bind_param("ssssssss", $name, $address, $birth, $dni, $sex, $user, $date, $phone);

            if($stmt->execute()){
                echo json_encode("OK");
            }else{
                echo json_encode('Error3');
                exit;
            }

            $stmt->close();
        }
    }

    $conecbd->close();
?>