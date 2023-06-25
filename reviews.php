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
            Отзывы
        </span>
    </div>
    <div class="container">
        <div class="row mb-2 mt-4">
            <?php foreach(selectAll('reviews') as $key => $value) : ?>
            <div class="col-md-6">
            <a href="review.php?id_review=<?= $value['id_review']; ?>">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class=" bg-dark col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary"><?= $value['city']; ?></strong>
                        <h3 class="mb-0 text-white"><?= $value['name']; ?></h3>
                        <div class="mb-1 text-white "><?= date("d.m.Y", strtotime($value['timestamp'])) ?></div>
                        <p class="card-text mb-auto text-white"><?= $value['description']; ?></p>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="<?= '/assets/images/reviews/' . selectOne('reviewsFile', ['id_review' => $value['id_review']])['name']; ?>" alt="">
                    </div>
                </div>
                </a>
            </div>
            <?php endforeach; ?>

            
        </div>
    </div>

                    
                    <!-- new card here -->
                </div>
            </div>
    </main>
    <!-- Footer -->
    <?php include 'assets/include/footer.php'; ?>
</body>

</html>