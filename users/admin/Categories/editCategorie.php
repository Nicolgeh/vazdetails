<?php
include '../../app/controllers/categorie.php';
include_once '../../app/database/db.php';
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
    <link rel="stylesheet" href="../../../assets/css/style.css">
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
    <?php include '../../../assets/include/header.php'; ?>

    <!-- title -->
    <div class="title mb-4">
        <span>
            Создание категории
        </span>
    </div>

    <!-- Auth -->
    <div class="container">


        <form class="m-auto col-10 col-md-6 w-70" method="POST">
            <!-- Name input -->
            <div class="form-outline mb-4 col-12 col-md-12">
                <input name="name" type="text" id="form2Example1" class="form-control" />
                <label class="form-label" for="form2Example1">Наименование</label>
            </div>

            <!-- Description input -->
            <div class="form-outline mb-4">
                <input name="description" type="text" id="form2Example2" class="form-control" />
                <label class="form-label" for="form2Example2">Описание</label>
            </div>
            <!-- Type input -->
            <div class="row">
                <div class="col-sm-3 col-md-10 mb-4">
                    Тип: 
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="checkCategorie" id="flexRadioDefault1" value="0" <?php if(selectOne('categories', ['id_category' => $_GET['id_category']])['type'] === 0) : ?> checked <?php endif; ?>>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Машины
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input " type="radio" name="checkCategorie" id="flexRadioDefault2" value="1" <?php if(selectOne('categories', ['id_category' => $_GET['id_category']])['type'] === 1) : ?> checked <?php endif; ?>>
                        <label class="form-check-label " for="flexRadioDefault2">
                            Категория
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input " type="radio" name="checkCategorie" id="flexRadioDefault2" value="2" <?php if(selectOne('categories', ['id_category' => $_GET['id_category']])['type'] === 2) : ?> checked <?php endif; ?>>
                        <label class="form-check-label " for="flexRadioDefault2">
                            Подкатегория
                        </label>
                    </div>
                </div>
            </div>


            <!-- Submit button -->
            <button name="button-edit-categorie" type="submit" class="btn btn-primary btn-block mb-4 w-100">Создать</button>


        </form>
    </div>
    <div class="title mb-4">
        <span>
            ↑
        </span>
    </div>
    <!-- Footer -->
    <?php include '../../../assets/include/footer.php'; ?>
</body>

</html>