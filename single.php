<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/path.php';
include $_SERVER['DOCUMENT_ROOT'] . '/app/database/db.php';
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
            <?= selectOne('items', ['id_item' => $_GET['id_item']])['name']?>
        </span>
    </div>

    <!-- IMG -->
    <div class="container">
        <div class="img-single">
            <img class="d-block w-100" src="<?= '../../assets/images/details/' . selectOne('itemsFile', ['id_item' => $_GET['id_item']])['name']; ?>" alt="fary2110">
        </div>
    </div>

    <!-- Category -->
    <div class="container">
        <div class="category-single col-xs-12 col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Категория</th>
                        <th scope="col">Подкатегория</th>
                        <th scope="col">Машина</th>
                    </tr>
                </thead>
                <tr>
                    <th scope="col"><a href="#"><?= selectOne('categories', [ 'id_category' => selectOne('items', ['id_item' => $_GET['id_item']])['type']])['name']?></a></th>
                    <th scope="col"><a href="#"><?= selectOne('categories', [ 'id_category' => selectOne('items', ['id_item' => $_GET['id_item']])['podtype']])['name']?></a></th>
                    <th scope="col"><a href="#"><?= selectOne('categories', [ 'id_category' => selectOne('items', ['id_item' => $_GET['id_item']])['car']])['name']?></a></th>
                </tr>
            </table>
        </div>
    </div>

    <!-- Description -->
    <div class="container">
        <div class="description-single">
            <p><h4>Описание:</h4>  <?= selectOne('items', ['id_item' => $_GET['id_item']])['description']?></p>
            <p><h4>Цена:</h4> <?= selectOne('items', ['id_item' => $_GET['id_item']])['price']?>₽</p>
            <div class="buttons-single row mb-4">
            <button type="submit" class="btn btn-success col-12 col-md-12"><a href="<?php if (isset($_SESSION)) : ?> buying.php?id_item=<?= $_GET['id_item'] ?> <?php else : ?> auth.php <?php endif; ?>">Приобрести</a></button>

            </div>

        </div>
    </div>
    <!-- Footer -->
    <?php include 'assets/include/footer.php'; ?>
</body>

</html>