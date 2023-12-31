<?php
//include 'path.php';
include 'app/controllers/users.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ФАРЫ ТЛТ</title>
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/70351fc90b.js" crossorigin="anonymous"></script>
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Fonts Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap');
    </style>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <!-- Header -->
    <?php include 'assets/include/header.php'; ?>

    <!-- title -->
    <div class="title mb-4">
        <span>
            Регистрация
        </span>
    </div>

    <!-- Auth -->
    <div class="container">


        <form class=" m-auto col-10 col-md-6 w-70" method="POST">
            <div class="err text-center mb-4 text-danger text-bold">
                <?= $errMsg; ?>
            </div>
            <div class="fi-reg row">
                <!-- Firstname input -->
                <div class="form-outline mb-4 col-6 col-md-6">
                    <input name="firstname" type="text" id="form2Example1" class="form-control" />
                    <label class="form-label" for="form2Example1">Имя</label>
                </div>
                <!-- Lastname input -->
                <div class="form-outline mb-4 col-6 col-md-6">
                    <input name="lastname" type="text" id="form2Example1" class="form-control" />
                    <label class="form-label" for="form2Example1">Фамилия</label>
                </div>
            </div>

            <div class="fi-reg row">
                <!-- phone input -->
                <div class="form-outline mb-4 col-6 col-md-6">
                    <input name="phone" type="text" id="form2Example1" class="form-control" />
                    <label class="form-label" for="form2Example1">Телефон</label>
                </div>
                <!-- Email input -->
                <div class="form-outline mb-4 col-6 col-md-6">
                    <input name="email" type="email" id="form2Example1" class="form-control" />
                    <label class="form-label" for="form2Example1">Email</label>
                </div>
            </div>
            <!-- Password input -->
            <div class="form-outline mb-4">
                <input name="password" type="password" id="form2Example2" class="form-control" />
                <label class="form-label" for="form2Example2">Пароль</label>
            </div>
            <!-- Rep-Password input -->
            <div class="form-outline mb-4">
                <input name="repeat_password" type="password" id="form2Example2" class="form-control" />
                <label class="form-label" for="form2Example2">Повторите пароль</label>
            </div>

            <!-- 2 column grid layout for inline styling
            <div class="text-center mb-4">
                Simple lin
                <a href="#!">Забыли пароль? Нажми на меня!</a>
            </div> -->

            <!-- Submit button -->
            <button name="button-reg" type="submit" class="btn btn-primary btn-block mb-4 w-100">Войти</button>

        </form>
    </div>
    <div class="title mb-4">
        <span>
            ↑
        </span>
    </div>
    <!-- Footer -->
    <?php include 'assets/include/footer.php'; ?>
</body>

</html>