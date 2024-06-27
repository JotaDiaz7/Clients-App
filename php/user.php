<?php
    session_start();

    if(!isset($_GET['user']) || empty($_GET['user'])){
        $flag = "no";
    }else{
        $flag = "yes";
        $user = $_GET["user"];

        include_once('./config.php');

        if($conecbd->connect_error){
            $flag = "no";
        }else{
            $consult = "SELECT * FROM users WHERE user=?";
            $stmt = $conecbd->prepare($consult);

            if ($stmt) {
                $stmt->bind_param("s", $user);
                $stmt->execute();
                $result = $stmt->get_result();
    
                if ($result) {

                    if ($result->num_rows == 0) {
                        $flag = "no";
                    } else {
                        $user_date = $result->fetch_assoc();
                    }

                } else {
                    $flag = "no";
                }
            } else {
                $flag = "no";
            }

            $consult_comment = "SELECT * FROM comments WHERE userID=?";
            $stmt_comment = $conecbd->prepare($consult_comment);
    
            if ($stmt_comment) {
                $stmt_comment->bind_param("s", $user);
                $stmt_comment->execute();
                $result_comment = $stmt_comment->get_result();
    
                if ($result_comment) {
                    if ($result_comment->num_rows == 0) {
                        $comment_date = 'No comments';
                    } else {
                        $comment_date = $result_comment->fetch_all(MYSQLI_ASSOC);
                    }
                } else {
                    $comment_date = 'No comments';
                }
            } else {
                echo json_encode($comment_date);
                exit;
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300&family=Pacifico&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/responsive_user.css">
    <link rel="stylesheet" href="../fonts/awesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../fonts/awesome/css/solid.min.css">
    <title>Administración de usuarios</title>
</head>
<body>
    <main>
        <section class="first1">
            <div id="h1"><h1>JD</h1></div>
            <a id="add" href="./register.php">
                <i></i>
                <p><i class="fa-solid fa-circle-plus"></i>ADD</p>
            </a>
        </section>
        <section class="first2">
            <section class="second1">
                <a href="../index.php"><i class="fa-solid fa-left-long"></i></a>
            </section>
            <section class="second2">
                <?php if($flag == "yes"){ ?>
                    <form id="wrap_dates" class="">
                        <div id="wrap_img">
                            <label id="container_img">
                                <img id="imageDates" src="../pictures/<?php echo $user_date['image']; ?>" alt="">
                            </label>
                            <input type="file" name="file" id="file" aria-label="Archivo" class="update hidden" accept="image/*" multiple>
                        </div>
                        <div id="wrap_dates_main">
                            <div id="wrap_dates_head">
                                <div class="date">
                                    <label for="name_date">Name:</label>
                                    <input type="text" id="name_date" name="name_date" class="update" readonly value="<?php echo $user_date['name']; ?>">
                                </div>
                                <div class="date">
                                    <label for="phone_date">Phone:</label>
                                    <input type="tel" id="phone_date" name="phone_date" class="update" readonly value="<?php echo $user_date['phone']; ?>">
                                </div>
                                <div class="date">
                                    <label for="dni_date">DNI:</label>
                                    <input type="text" id="dni_date" name="dni_date" class="update" readonly value="<?php echo $user_date['dni']; ?>">
                                </div>
                                <div class="date">
                                    <label for="birth_date">Birth:</label>
                                    <input type="date" id="birth_date" readonly value="<?php echo $user_date['birth']; ?>">
                                </div>
                                <div class="date">
                                    <label for="sex_date">Sex:</label>
                                    <input type="text" id="sex_date" name="sex_date"  class="update" readonly value="<?php echo $user_date['sex']; ?>">
                                </div>
                                <div class="date hidden">
                                    <label for="sex_date">Sex:</label>
                                    <select name="sex" id="sex" aria-placeholder="Sex" class="update">
                                        <option value="<?php echo $user_date['sex']; ?>"><?php echo $user_date['sex']; ?></option>
                                        <?php if($user_date['sex'] == "Woman"){ ?>
                                            <option value="Man">Man</option>
                                        <?php }else{ ?>
                                            <option value="Woman">Woman</option>
                                        <?php } ?>
                                    </select>                                
                                </div>
                                <div class="date">
                                    <label for="user_date">User:</label>
                                    <input type="text" id="user_date" name='user_date' readonly value="<?php echo $user_date['user']; ?>">
                                </div>
                                <div class="date">
                                    <label for="register_date">Registered:</label>
                                    <input type="date" id="register_date" readonly value="<?php echo $user_date['date']; ?>">
                                </div>
                                <div class="date address">
                                    <label for="address_date">Address:</label>
                                    <input type="text" id="address_date" name="address_date" class="update" readonly value="<?php echo $user_date['address']; ?>">
                                </div>
                            </div>
                            <div id="buttons_form" class="wrap_dates_foot">
                                <button id="delete" class="submit_dates">Delete</button>
                                <button id="update" class="submit_dates">Update</button>
                            </div>
                            <div id="submit_form" class="wrap_dates_foot hidden">
                                <input type="submit" id="send" value="Send" class="submit_dates">
                                <input type="submit" id="cancel" value="Cancel" class="submit_dates">
                            </div>
                        </div>
                    </form>
                    <div id="wrap_foot" class="">
                        <form id="form_comments">
                            <div class="hidden">
                                <input type="date" id="date" name="date" readonly>
                            </div>
                            <div class="hidden">
                                <input type="time" id="time" name="time" readonly>
                            </div>
                            <div class="hidden">
                                <input type="text" id="user_comment" name='user_comment' readonly value="<?php echo $user_date['user']; ?>">
                            </div>
                            <div id="wrap_comment">
                                <input type="text" id="comment" name="comment" class="input_comment" placeholder="Write a comment">
                            </div>
                            <div id="wrap_submit_comment">
                                <input type="submit" id="submit_comment" value="Comment" name="submit_comment" class="">
                            </div>
                        </form>
                        <div id="section_comments">
                            <?php if($comment_date == "No comments"){?>
                            <div></div>
                            <?php }else{ ?>
                                <?php
                                    foreach($comment_date as $comment){
                                ?>
                                    <form class="comments form_comment">
                                        <div class="comment_wrap comment_wrap_one">
                                            <div class="comment_date_wrap">
                                                <input type="date" class="comment_date" id='comment_date' name='comment_date' value="<?php echo $comment['date']; ?>" readonly>
                                            </div>
                                            <div class="comment_time_wrap">
                                                <input type="time" class="comment_time" id='comment_time' name='comment_time' value="<?php echo $comment['time']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div  class="comment_wrap comment_wrap_two">
                                            <div class="div_comment">
                                                <input type="text" class="comment_text" id='comment_text' name='comment_text' value="<?php echo $comment['comment']; ?>" readonly>
                                            </div>
                                            <div class="delete_comment">
                                                <button type='submit' class='delete_comment_button'><i class="fa-regular fa-trash-can"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                <?php }else{ ?>
                    <div id="no_found">
                        <i class="fa-solid fa-face-meh"></i>
                        <p>User not found</p>
                    </div>
                <?php } ?>
            </section>
        </section>
    </main>
    <section id="wrap_delete">
        <form id="message_delete">
            <div id="message_delete_head">
                <label for="delete_name" id="delete_label">
                    Are you sure you want to delete to
                </label>
                <input type="text" readonly id="delete_name" value="<?php echo $user_date['name']; ?>">
                <input type="text" readonly id="delete_user" class="hidden" name="delete_user" value="<?php echo $user_date['user']; ?>">
            </div>
            <div id="message_delete_foot">
                <input type="submit" id="yes" value="Yes" class="submit_dates">
                <input type="submit" id="no" value="No" class="submit_dates">
            </div>
        </form>
    </section>
    <script type="module" src="../js/user.js"></script>
</body>
<?php 
    $conecbd->close();
?>
</html>