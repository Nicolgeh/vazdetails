<!-- Footer -->
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/app/database/db.php'; ?>
<footer class="text-center text-lg-start text-white" style="background-color: #1f1f21;">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-between p-4" style="background-color: #ff4444; color: black;">

        <div class="me-5 text-white">
            <span>Мы в социальных сетях:</span>
        </div>

        <div>
            <a href="" class="text-white me-4">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="text-white me-4">
                <i class="fab fa-vk"></i>
            </a>
            <a href="" class="text-white me-4">
                <i class="fab fa-telegram"></i>
            </a>
        </div>

    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5 ">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold text-white"><a href="/">ФАРЫ ТЛТ</a> </h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #f2d900; height: 2px" />
                    <p class="text-white">
                        Перспективная команда по продаже оригинальных/переделанных деталей для отечественного автопрома от производителя
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold text-white">Продукты</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #f2d900; height: 2px" />
                    <?php foreach(selectAll('categories', ['type' => 1]) as $key => $value) : ?>
                    <p>
                        <a href="#!" class="text-white"><?= $value['name']; ?></a>
                    </p>
                    <?php endforeach; ?>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold text-white">Полезные ссылки</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #f2d900; height: 2px" />
                    <p>
                        <a href="../../users/user/profile.php" class="text-white">Аккаунт</a>
                    </p>
                    <p>
                        <a href="../../catalog.php" class="text-white">Каталог</a>
                    </p>
                    <p>
                        <a href="../../about_us.php" class="text-white">О нас</a>
                    </p>
                    <p>
                        <a href="../../contacts.php" class="text-white">Контакты</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold text-white">Контакты</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto text-white" style="width: 60px; background-color: #7c4dff; height: 2px" />
                    <p class="text-white"><i class="fas fa-home mr-3 text-white"></i> Тольятти</p>
                    <p class="text-white" ><i class="fas fa-envelope mr-3 text-white"></i> farytlt@gmail.com</p>
                    <p class="text-white" ><i class="fas fa-phone mr-3 text-white"></i> 8 999 999 99 99</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2023 Права:
        <a class="text-white" href="<?= "/" ?>">ФАРЫ ТЛТ</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->