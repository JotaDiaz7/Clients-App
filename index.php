<?php
    session_start();

    include_once('./php/config.php');

    if($conecbd->connect_error){
        echo json_encode('Error');
        exit;
    }else{
        $consult = "SELECT * FROM users order by date desc";
        $result = $conecbd->query($consult);

        if($result){
            if($result->num_rows > 0){
                $dates = $result->fetch_all(MYSQLI_ASSOC);
            }else{
                $dates = 'Empty data base';
            }
        }else{
            echo json_encode($dates);
            exit;
        }
    }

    function increment(){
        static $cont = 0;

        $cont++;

        echo $cont;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300&family=Pacifico&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/responsive.css">
    <link rel="stylesheet" href="./fonts/awesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="./fonts/awesome/css/solid.min.css">
    <title>Administración de usuarios</title>
</head>
<body>
    <main>
        <section class="first1">
            <div id="h1"><h1>JD</h1></div>
            <a id="add" href="./php/register.php">
                <i></i>
                <p><i class="fa-solid fa-circle-plus"></i>ADD</p>
            </a>
        </section>
        <section class="first2">
            <section class="second second1">
                <ul>
                    <li class="one">Nº</li>
                    <li class="two">NAME</li>
                    <li class="three">USER</li>
                    <li class="four">DATE</li>
                </ul>
            </section>
            <section class="second second2">
                <div id="search_wrap_main">
                    <div id="search_wrap"><input id="search" type="search"><i for="search" class="fa-solid fa-magnifying-glass"></i></div>
                </div>
                <div id="users">
                    <?php
                        foreach($dates as $user){
                    ?>
                        <ul class="user <?php echo $user['name']; ?>">
                            <li class='one'><?php increment() ?></li>
                            <li class="two text-cap"><a href="./php/user.php?user=<?php echo $user['user']; ?>"><?php echo $user['name']; ?></a></li>
                            <li class="three"><?php echo $user['user']; ?></li>
                            <li class="four small"><?php echo $user['date']; ?></li>
                        </ul>
                    <?php } ?>
                </div>
            </section>
        </section>
    </main>
    <script src="./js/index.js"></script>
</body>
<?php 
    $conecbd->close();
?>
</html>