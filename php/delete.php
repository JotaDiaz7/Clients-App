<?php

    session_start();

    include_once('config.php');

    $conecbd -> set_charset('utf8');

    if($conecbd -> connect_error){
        $dates = 'Error connect';
    }else{
        $user = $_POST['delete_user'];

        $consult2 = "DELETE FROM comments WHERE user='$user'";
        $result2 = $conecbd -> query($consult2);

        $consult = "DELETE FROM users WHERE user='$user'";
        $result = $conecbd -> query($consult);

        if($result2 and $result){
            echo json_encode("deleted");
            exit;
        }else{
            echo json_encode('Error');
            exit;
        }

        $conecbd -> close();
    }
?>