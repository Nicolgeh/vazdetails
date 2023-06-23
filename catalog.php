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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Fonts Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap');
    </style>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

</head>

<body>
    <script src="https://kit.fontawesome.com/70351fc90b.js" crossorigin="anonymous"></script>

    <!-- Header -->
    <?php include 'assets/include/header.php'; ?>

    <!-- title -->
    <div class="title">
        <span>
            Каталог
        </span>
    </div>

    <!-- Catalog -->

    <main class="container">
        <!-- Search -->
        <form class="search-catalog row">
            <input type="search" class="form-control col-8" placeholder="Поиск..." aria-label="Search">
        </form>
        <!-- Filters -->
        <div class="row">
            <div class="col-12 col-md-3">
                <select class="form-select mt-4" aria-label="Default select example">
                    <option selected>Выберите категорию</option>
                    <option value="1">Оптика</option>
                    <option value="2">Салон</option>
                </select>
                <select class="form-select mt-4" aria-label="Default select example">
                    <option selected>Выберите подкатегорию</option>
                    <option value="1">Оригинал</option>
                    <option value="2">Стиль</option>
                    <option value="2">AMG</option>
                </select>
                <select class="form-select mt-4" aria-label="Default select example">
                    <option selected>Выберите машину</option>
                    <option value="1">Классика</option>
                    <option value="2">ВАЗ 2110-12</option>
                    <option value="2">Приора</option>
                    <option value="2">Калина 1</option>
                </select>
                <button class="w-100 btn btn-success btn-lg mb-4 mt-4" type="submit">Искать</button>
            </div>
            <div class="col-12 col-md-9">
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
    </main>
    <!-- Footer -->
    <?php include 'assets/include/footer.php'; ?>
</body>

</html>