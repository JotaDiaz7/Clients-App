<?php
    if(empty($_POST['comment'])){
        echo json_encode('Error1');
        exit;
    }

    include_once('config.php');

    $conecbd -> set_charset('utf8');

    if($conecbd->connect_error){
        echo json_encode('Error2');
        exit;
    }else{
        $comment = htmlspecialchars(trim($_POST['comment']));
        $user = htmlspecialchars($_POST['user_comment']);
        $date = htmlspecialchars($_POST['date']);
        $time = htmlspecialchars($_POST['time']);
        //$file = addslashes(file_get_contents($_FILES['file']));

        $consult = "INSERT INTO comments (`userID`, `date`, `time`, `comment`) VALUES (?, ?, ?, ?)";
        $stmt = $conecbd->prepare($consult);

        if($stmt){
            $stmt->bind_param("ssss", $user, $date, $time, $comment);

            if($stmt->execute()){
                echo json_encode("OK");
            }else{
                echo json_encode('Error3');
                exit;
            }
            $stmt -> close();
        }

        $conecbd -> close();
    }

?>