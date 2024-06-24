<?php 
    session_start();

    include_once('config.php');

    $conecbd -> set_charset('utf8');

    if($conecbd -> connect_error){
        $dates = 'Error connect';
    }else{
        $date = $_POST['comment_date'];
        $time = $_POST['comment_time'];
        $text = $_POST['comment_text'];

        $consult = "DELETE FROM comments WHERE comment=? and `time`=?";
        $stmt = $conecbd -> prepare($consult);

        if($stmt){
            $stmt->bind_param("ss", $text, $time);

            if($stmt->execute()){
                echo json_encode("deleted_comment");
                exit;
            }else{
                echo json_encode('Error');
                exit;
            }
        }

        $conecbd -> close();
    }


?>