<?php
include '../../path.php';
include '../../app/controllers/users.php';
include '../../app/database/db.php';
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
    <link rel="stylesheet" href="../../assets/css/style.css">
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
    <?php include '../../assets/include/header.php'; ?>

    <!-- title -->
    <div class="title mb-4">
        <span>
            Профиль
        </span>
    </div>
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <form method="POST" class="row" enctype="multipart/form-data">
                    <div class="col-lg-4">
                        <div class="card mb-4 h-100 ">
                            <div class="card-body text-center">
                                <img src="../../assets/images/avatars/prewiew.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                <input type="file" name="filename" class="form-control mt-4">
                                <?php
                                if ($_FILES && $_FILES["filename"]["error"] == UPLOAD_ERR_OK) {
                                    $name = $_FILES["filename"]["name"];
                                    move_uploaded_file($_FILES["filename"]["tmp_name"], '../../assets/images/avatars');
                                    echo "Файл загружен";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Фамилия</p>
                                    </div>
                                    <div class="col-sm-9 form-outline">
                                        <input type="text" name="lastname" class="form-control" placeholder="<?php echo selectOne('users', ['id_user' => $_SESSION['id_user']])['lastname']; ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Имя</p>
                                    </div>
                                    <div class="col-sm-9 form-outline">
                                        <input type="text" name="firstname" class="form-control" placeholder="<?php echo selectOne('users', ['id_user' => $_SESSION['id_user']])['firstname']; ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9 form-outline">
                                        <input type="email" name="email" class="form-control" placeholder="<?php echo selectOne('users', ['id_user' => $_SESSION['id_user']])['email']; ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Phone</p>
                                    </div>
                                    <div class="col-sm-9 form-outline">
                                        <input type="text" name="phone" class="form-control" placeholder="<?php echo selectOne('users', ['id_user' => $_SESSION['id_user']])['phone']; ?>">
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="edit-profile">
                            <button type="submit" class="btn btn-warning w-100" name="button-edit">Сохранить профиль</button>
                        </div>
                    </div>
                </form>
    </section>
    <!-- Footer -->
    <?php include '../../assets/include/footer.php'; ?>
</body>

</html>