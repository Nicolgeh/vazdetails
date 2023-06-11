<?php
include 'path.php';
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
    <div class="title">
        <span>
            Контакты
        </span>
    </div>
    <!-- Description -->
    <div class="container">
        <div class="description-contacts row">
            <div class="desc col-8">
                <p>Хотите обсудить с нами сотрудничество?</p>
                <p>Может быть хотите обсудить вопросы насчет заказа?</p>
                <p>Или вопросы насчет доставки?</p>
                <p>А может вопросы по оптовым покупкам?</p>
                <p>Заполняйте форму ниже и вскоре с вами свяжется наш агент!</p>
                <p>Также пишите письма на email или звоните на контактный номер</p>
            </div>
            <div class="address col-4">
                <p><i class="fa-sharp fa-solid fa-location-dot"></i> Тольятти</p>
                <p><i class="fa-solid fa-address-book"></i> ФИО</p>
                <p><i class="fa-solid fa-phone"></i> 8 999 999 99 99</p>
                <p><i class="fa-solid fa-envelope"></i> Email</p>
            </div>
        </div>
        <div class="form-contacts col-12">
            <hr class="my-4">
            <form class="needs-validation" novalidate="">
                <div class="row g-3">
                    <div class="col-sm-6 col-12">
                        <label for="firstName" class="form-label">Имя</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="lastName" class="form-label">Фамилия</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com">
                    </div>
                    <div class="col-sm-6 col-12">
                        <label for="phone" class="form-label">Телефон</label>
                        <input type="text" class="form-control" id="phone" placeholder="8 999 999 99 99">
                    </div>
                </div>

                <div class="col-sm-12 col-12 mt-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Ваше сообщение</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <hr class="my-4">



                <button class="w-100 btn btn-success btn-lg mb-4" type="submit">Отправить</button>
            </form>
        </div>
    </div>
    <!-- Footer -->
    <?php include 'assets/include/footer.php'; ?>
</body>

</html>