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
    <div class="title">
        <span>
            Позиции
        </span>
    </div>
    <!-- Table -->
    <div class="container">
        <div class="row">
        <button type="submit" class="btn btn-success col-12 col-md-12 mb-4 mt-4"><a href="createItem.php">Создать позицию</a></button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Подкатегория</th>
                    <th scope="col">Машина</th>
                    <th scope="col">Редактировать</th>
                    <th scope="col">Удалить</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach(selectAll('items') as $key => $value) : ?>
                <tr>
                    <th scope="row"><?= $value['id_item'] ?></th>
                    <td><?= $value['name'] ?></td>
                    <td><?= $value['description'] ?></td>
                    <td><?= $value['price'] ?></td>
                    <td><?= selectOne('categories', ['id_category' => $value['type']])['name'] ?></td>
                    <td><?= selectOne('categories', ['id_category' => $value['podtype']])['name'] ?></td>
                    <td><?= selectOne('categories', ['id_category' => $value['car']])['name'] ?></td>
                    <td><button type="submit" class="btn btn-warning col-12 col-md-12"><a href="editItem.php?id_item=<?=$value['id_item'] ?>">Редактировать</a></button></td>
                    <td><button type="submit" class="btn btn-danger col-12 col-md-12"><a href="deleteItem.php?id_item=<?=$value['id_item'] ?>">Удалить</a></button></td>             
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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