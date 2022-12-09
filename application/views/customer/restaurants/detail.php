<main>
    <div class="container">
        <div>
            <div class="border"><img src="/assets/img/admin_index.png" width="100%"></div>
            <h2 class="text-center mt-5 mb-3">ร้านเกือบเจ้ง</h2>
        </div>
        <div class="row">
            <div class="col-lg-3">

                <!-- start: left menu -->
                <?php echo $this->data['left_menu']; ?>
                <!-- end: left menu -->

                <!-- start: food categories -->

                <div class="card mb-3 mt-3 d-none d-sm-flex">
                    <div class="card-header">
                        หมวดหมู่อาหาร
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($this->data['cate_id'] == 1) ? 'active' : ''; ?>"
                                href="/customer_restaurants.php?action=detail&id=1&cate_id=1">
                                <i class="bi-box"></i> ส้มตำ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($this->data['cate_id'] == 2) ? 'active' : ''; ?>"
                                href="/customer_restaurants.php?action=detail&id=1&cate_id=2">
                                <i class="bi-shop"></i> ลาบ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($this->data['cate_id'] == 3) ? 'active' : ''; ?>"
                                href="/customer_restaurants.php?action=detail&id=1&cate_id=3">
                                <i class="bi-car-front"></i> ต้ม
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($this->data['cate_id'] == 4) ? 'active' : ''; ?>"
                                href="/customer_restaurants.php?action=detail&id=1&cate_id=4">
                                <i class="bi-car-front"></i> ของหวาน
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($this->data['cate_id'] == 5) ? 'active' : ''; ?>"
                                href="/customer_restaurants.php?action=detail&id=1&cate_id=5">
                                <i class="bi-car-front"></i> เครื่องดื่ม
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- end: food categories -->

            </div>


            <!-- start: main content -->
            <div class="col-lg-9">
                <div class="mb-5 mt-3">

                    <!-- menus -->
                    <div class="row">
                        <?php
                        for ($i = 0; $i < 9; ++$i) {
                            ?>
                        <div class="col-4">
                            <div class="card mb-4">
                                <img src="/assets/img/admin_index.png" width="100%" class="card-img-top">
                                <div class="card-body text-center">
                                    <h5 class="card-title">ลาบเป็ด <?php echo $i + 1; ?></h5>
                                    <p class="card-text">
                                    <div class="fw-bold fs-3">( 90 บาท )</div>
                                    <div class="text-danger text-decoration-line-through">( 100 บาท )</div>
                                    </p>
                                    <a href="#" class="btn btn-primary">เพิ่มลงตะกร้า</a>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                ?>
                    </div>
                    <!-- end: menus -->

                    <!-- start: reviews -->
                    <div class="text-bg-secondary">
                        <h3 class="p-2">รีวิวอาหาร</h3>
                    </div>
                    <div>
                        <?php
                        for ($i = 0; $i < 10; ++$i) {
                            ?>
                        <div class="border p-2 mt-2">
                            <h4>AODTO WK</h4>
                            <h6>2022/12/13 12:00:34</h6>
                            <div class="mt-2">สมคำลำรือกับร้านจริงๆครับ</div>
                        </div>
                        <?php
                        }
                ?>
                    </div>
                    <!-- end: reviews -->


                </div>
            </div>
            <!-- end: main content -->
        </div>
    </div>
</main>