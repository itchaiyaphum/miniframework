<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <!-- start: left menu -->
                <?php echo $this->data['left_menu']; ?>
                <!-- end: left menu -->
            </div>

            <!-- start: main content -->
            <div class="col-lg-9 mb-3">
                <form id="mainForm" method="post">
                    <div class="mb-5 mt-3">
                        <h2 class="text-center">ตระกร้าสินค้า</h2>
                        <div class="border mb-3 p-4 text-bg-light">
                            <div class="text-center fw-bold fs-5 text-decoration-underline">ข้อมูลการจัดส่งสินค้า</div>
                            <div>AODTO WK</div>
                            <div>096-520-7008 / aodto.wk@gmail.com</div>
                            <div>18/116 ซอยสุขสวัสดิ์ 30 แยก 8-2 แขวงบางปะกอก เขตราษฎร์บูรณะ กรุงเทพมหานคร 10140</div>
                        </div>
                    </div>

                    <div class="row d-none d-md-flex bg-light p-2">
                        <div class="col-4"><strong>รายการอาหาร</strong></div>
                        <div class="col-2"><strong>ราคาต่อชิ้น</strong></div>
                        <div class="col-2"><strong>จำนวน</strong></div>
                        <div class="col-2"><strong>ราคารวม</strong></div>
                        <div class="col-2"><strong>-</strong></div>
                    </div>

                    <?php
                for ($i = 0; $i < 5; ++$i) {
                    $link_trash = 'customer_cart.php?action=delete';
                    ?>
                    <div class="row gy-2 p-2">
                        <div class="col-12 col-md-4">
                            <div class="d-flex">
                                <span class="d-md-none w-50">รายการอาหาร: </span>
                                <div>ยำสามกรอบ</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="d-flex">
                                <span class="d-md-none w-50">ราคาต่อชิ้น:</span>
                                <div>
                                    <span class="text-decoration-line-through text-danger">100</span>
                                    <span>90</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="d-flex">
                                <span class="d-md-none w-50">จำนวน:</span>
                                1
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="d-flex">
                                <span class="d-md-none w-50">ราคารวม: </span>
                                90
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="d-flex">
                                <span class="d-md-none w-50"></span>
                                <a class="btn btn-sm btn-danger" href="<?php echo $link_trash; ?>"><i
                                        class="bi-trash"></i></a>

                            </div>
                        </div>
                    </div>
                    <hr />
                    <?php
                }
                ?>
                    <div class="fs-4 fw-bold text-center">ยอดรวมทั้งหมด: 400 บาท</div>
                    <div class="fs-4 fw-bold text-center mt-5">
                        <button type="submit" class="btn btn-primary btn-lg">
                            สั่งซื้ออาหารเดี๋ยวนี้
                        </button>
                    </div>
                </form>
            </div>
            <!-- end: main content -->
        </div>
    </div>
</main>