<?php 
include 'path.php';
include 'app/database/db.php';
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

    <!-- Carousel -->
    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/assets/images/details/1.jpg" class="d-block w-80" alt="vaz2112">
                    <div class="carousel-caption d-none d-md-block">
                    <a href="single.php">
                        <h5>Блок Фара 2112 ОРИГИНАЛ</h5>
                        <p>Оригинальный фары на ваз 2112 в наличие</p>
                        </a>
                    </div>
                </div>
                <?php foreach(selectAll('items') as $key => $value) : ?>
                <div class="carousel-item">
                    <img src="/assets/images/details/2.webp" class="d-block w-80" alt="vazprioraamg">
                    <div class="carousel-caption d-none d-md-block">
                    <a href="single.php?id-item=<?=  $value['id-item'] ?>">
                        <h5><?= $value['name'] ?></h5>
                        <p><?= $value['description'] ?></p>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Предыдущее</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Следущее</span>
            </button>
        </div>
    </div>
    <!-- title -->
    <div class="title">
        <span>
            Новые поступления
        </span>
    </div>
    <!-- cards -->
    <div class="container">
        <div class="row" id="ads">
            <!-- Category Card -->
            <?php foreach(selectAll('items') as $key => $value) : ?>
                    <div class="col-md-4">
                        <a href="single.php?id_item=<?= $value['id_item'] ?>">
                            <div class="card rounded">
                                <div class="card-image">
                                    <span class="card-notify-badge"><?= selectOne('categories', ['id_category' => $value['car']])['name'] ?></span>
                                    <span class="card-notify-year">NEW</span>
                                    <img class="img-fluid" src="/assets/images/details/1.jpg" alt="Alternate Text" />
                                </div>
                                <div class="card-image-overlay m-auto">
                                    <span class="card-detail-badge"><?= selectOne('categories', ['id_category' => $value['podtype']])['name'] ?></span>
                                    <span class="card-detail-badge"><?= $value['price'] ?>₽</span>
                                    <span class="card-detail-badge"><?= selectOne('categories', ['id_category' => $value['type']])['name'] ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                        <?php endforeach; ?>
            <!-- new card here -->
        </div>
    </div>

    <!-- title -->
    <div class="title">
        <span>
            Отзывы
        </span>
    </div>
    <!-- Reviews -->
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-6">
            <a href="reviews.php">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Тольятти</strong>
                        <h3 class="mb-0">Фары на Калину 1</h3>
                        <div class="mb-1 text-muted">5 Июня 2023</div>
                        <p class="card-text mb-auto">Отлично подошли новые фары, хорошо светят, не слепят других водителей</p>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="assets/images/reviews/calina1.jpg" alt="">
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-6">
            <a href="reviews.php">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success">Самара</strong>
                        <h3 class="mb-0">Фары на ВАЗ 2115</h3>
                        <div class="mb-1 text-muted">2 Июня 2023</div>
                        <p class="mb-auto">Машина конечно сама по себе ужас, но вот эти фары хоть как-то спасают положение и делают ее приемлимой</p>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="assets/images/reviews/VAZ-2115.jpg" alt="">
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
    <!-- title -->
    <div class="title">
        <span>
            О Нас
        </span>
    </div>
    <!-- About us -->
    <div class="container">
        <div class="p-4 mb-3 bg-light rounded">
            <h4 class="fst-italic">Мы</h4>
            <p class="mb-0">Перспективная команда по продаже оригинальных/переделанных деталей для отечественного автопрома от производителя</p>
        </div>
        <div class="p-4 mb-3 bg-light rounded">
            <h4 class="fst-italic">Мы - Везде</h4>
            <p class="mb-0">Продаем детали по всей России: Авито Доставка, Почта России, Яндекс Маркет, Ozon, Boxberry</p>
        </div>
        <div class="p-4 mb-3 bg-light rounded">
            <h4 class="fst-italic">Мы - Качество</h4>
            <p class="mb-0">Только лучшие запчасти, только со станка</p>
        </div>
        <div class="p-4 mb-3 bg-light rounded">
            <h4 class="fst-italic">Мы - Гарантия</h4>
            <p class="mb-0">В случае брака идем на контакт и компенсируем товар</p>
        </div>
        <div class="p-4 mb-3 bg-light rounded">
            <h4 class="fst-italic">Мы - Количество</h4>
            <p class="mb-0">Напрямую от производителя каждый день новые поступления товара</p>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'assets/include/footer.php'; ?>
</body>

</html>