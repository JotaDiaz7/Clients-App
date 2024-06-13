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

        $consult = "DELETE FROM comments WHERE comment='$text' and `time`='$time'";
        $result = $conecbd -> query($consult);

        if($result){
            echo json_encode("deleted_comment");
            exit;
        }else{
            echo json_encode('Error');
            exit;
        }

        $conecbd -> close();
    }


?>