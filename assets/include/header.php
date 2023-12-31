<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/app/database/db.php'; ?>
<header class="pt-3 border-bottom sticky-top">
    <div class="container ">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 link-secondary">Главная</a></li>
                <li><a href="../../../catalog.php" class="nav-link px-2 text-white">Каталог</a></li>
                <li><a href="../../../about_us.php" class="nav-link px-2 text-white">О Нас</a></li>
                <li><a href="../../../contacts.php" class="nav-link px-2 text-white">Контакты</a></li>
                <li><a href="../../../reviews.php" class="nav-link px-2 text-white">Отзывы</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control" placeholder="Поиск..." aria-label="Search">
            </form>

            <?php if (isset($_SESSION['id_user']) && !$_SESSION['admin']) : ?>
                <div class="dropdown text-end">
                    <a href="" class="d-block text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?= '../../assets/images/avatars/' . selectOne('usersAvatars', ['id_user' => $_SESSION['id_user']])['name']; ?>" alt="ava" width="32" height="32" class="rounded-circle">
                    </a>

                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="../../users/user/orders.php">Заказы</a></li>
                        <li><a class="dropdown-item" href="../../users/user/profile.php">Профиль</a></li>
                        <li><a class="dropdown-item" href="../../users/user/review-create.php">Написать отзыв</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../../logout.php">Выйти</a></li>
                    </ul>


                <?php elseif (isset($_SESSION['id_user']) && $_SESSION['admin']) : ?>
                    <div class="dropdown text-end">
                        <a href="" class="d-block text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= '../../../assets/images/avatars/' . selectOne('usersAvatars', ['id_user' => $_SESSION['id_user']])['name']; ?>" alt="ava" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="../../../users/admin/Orders/orders.php">Заказы</a></li>
                            <li><a class="dropdown-item" href="../../../users/admin/Categories/categories.php">Категории</a></li>
                            <li><a class="dropdown-item" href="../../../users/admin/Items/items.php">Товары</a></li>
                            <li><a class="dropdown-item" href="../../../users/admin/Users/users.php">Пользователи</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../../users/user/profile.php">Профиль</a></li>
                            <li><a class="dropdown-item" href="../../../logout.php">Выйти</a></li>

                        </ul>
                    <?php else : ?>
                        <div class="dropdown text-end">
                            <a href="" class="d-block text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../../assets/images/avatars/prewiew.png" alt="ava" width="32" height="32" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                                <li><a class="dropdown-item" href="../../auth.php">Войти</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../../reg.php">Регистрация</a></li>
                            </ul>
                        <?php endif; ?>
                        </div>
                    </div>

                </div>




</header>