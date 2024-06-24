<?php

    session_start();

    include_once('config.php');

    $conecbd -> set_charset('utf8');

    if($conecbd -> connect_error){
        $dates = 'Error connect';
    }else{
        $user = $_POST['delete_user'];

        $consult2 = "DELETE FROM comments WHERE userID=?";
        $stmt2 = $conecbd -> prepare($consult2);

        $consult = "DELETE FROM users WHERE user=?";
        $stmt = $conecbd -> prepare($consult);

        if($stmt2 and $stmt){
            $stmt2->bind_param("s", $user);

            if($stmt2->execute()){
                $stmt->bind_param("s", $user);
                
                if($stmt->execute()){
                    echo json_encode("deleted");
                    exit;
                }else{
                    echo json_encode('Error');
                    exit;
                }
            }else{
                echo json_encode('Error');
                exit;
            }
            $stmt2->close();
            $stmt->close();
        }

        $conecbd -> close();
    }
?>