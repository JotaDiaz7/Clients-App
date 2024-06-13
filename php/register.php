<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300&family=Pacifico&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/responsive_register.css">
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
                <form  id="register" method="post" enctype="multipart/form-data">
                    <div id="form-body">
                        <div class="wrap">
                            <div class="mini_wrap">
                                <i class="fa-solid fa-user"></i>
                                <input type="text" name="name" id="name" class="register_input" placeholder="Name and Surname">
                            </div>
                        </div>
                        <div class="wrap">
                            <div class="mini_wrap">
                                <i class="fa-solid fa-location-dot"></i>
                                <input type="text" name="address" id="address" class="register_input" placeholder="Address">
                            </div>
                        </div>                    
                        <div class="wrap">
                            <div class="mini_wrap">
                                <i class="fa-solid fa-calendar-days"></i>
                                <input type="date" name="birth" id="birth" class="register_input">
                            </div>
                        </div>
                        <div class="wrap">
                            <div class="mini_wrap">
                                <i class="fa-solid fa-arrow-up-from-bracket"></i>
                                <label for="file" id="photo" >Foto</label>
                                <input type="file" name="file" id="file" aria-label="Archivo" class="register_input" accept="image/*" multiple>
                            </div>
                        </div>
                        <div class="wrap">
                            <div class="mini_wrap">
                                <i class="fa-solid fa-address-card"></i>
                                <input type="text" name="dni" id="dni" class="register_input" placeholder="DNI">
                            </div>
                        </div>   
                        <div class="wrap">
                            <div class="mini_wrap">
                                <i class="fa-solid fa-phone"></i>
                                <input type="tel" name="phone" id="phone" class="register_input" placeholder="Phone">
                            </div>
                        </div>
                        <div class="wrap">
                            <div class="mini_wrap">
                                <select name="sex" id="sex" class="register_input" aria-placeholder="Sex">
                                    <option value="">Sex</option>
                                    <option value="Man">Man</option>
                                    <option value="Woman">Woman</option>
                                </select>
                            </div>
                        </div>  
                        <div class="wrap">
                            <div class="mini_wrap">
                                <i class="fa-solid fa-user-tag"></i>
                                <input type="text" readonly name="user" id="user" class="register_user" placeholder="User number" >
                            </div>
                        </div>  
                        <div class="wrap hidden">
                            <div class="mini_wrap">
                                <input type="date" name="date" id="date" class="register_input ">
                            </div>
                        </div>
                    </div>
                    <div id="form-footer">
                        <input type="submit" value="send" name="send" id="send" class="regsiter_button">
                    </div>
                </form>
                <div id="sent" class="d-none">
                    <i class="fa-regular fa-thumbs-up"></i>
                    <p>Successfully registered user</p>
                </div>
            </section>
        </section>
    </main>
    <script type="module" src="../js/register.js"></script>
</body>
</html>