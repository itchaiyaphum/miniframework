<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
            <div class="card mb-3 mt-3 d-none d-sm-flex">
                <!-- start: left menu -->
                <?php echo $this->data['left_menu']; ?>
                <!-- end: left menu -->
            </div>
            </div>

            <!-- start: main content -->
            <div class="col-lg-9">
                <div class="mb-5 mt-3">
                    <h2 class="text-center">รีวิวอาหาร</h2>
                    <div class="border mb-3">
                        <div class="row g-0">
                            <div class="col-6">
                                <div class="text-bg-secondary p-2">ร้าน: เกือบเจ้ง / สั่งซื้อเมื่อ: 2022/12/13 09:00
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-bg-success p-2 h-100">นำส่งอาหารและได้รับชำระเงิน เรียบร้อยแล้ว</div>
                            </div>
                        </div>
                        <div class="row g-0">
                            <div class="col-12">
                                <div class="text-bg-light p-2">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="/assets/img/admin_index.png" width="100%">
                                        </div>
                                        <div class="col-10">
                                            <h5>ยำสามกรอบ</h5>
                                            <div>x1</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="/assets/img/admin_index.png" width="100%">
                                        </div>
                                        <div class="col-10">
                                            <h5>ต้มยำไก่บ้าน</h5>
                                            <div>x1</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="/assets/img/admin_index.png" width="100%">
                                        </div>
                                        <div class="col-10">
                                            <h5>ลาบเป็ด</h5>
                                            <div>x1</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-0 border">
                            <div class="col-8">
                                <h6 class="p-3">รหัสการสั่งซื้อ: #1</h6>
                            </div>
                            <div class="col-4">
                                <div class="p-2 h-100">
                                    <h5>ยอดคําสั่งซื้อทั้งหมด:฿600</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-bg-secondary">
                        <h3 class="p-2">แสดงความคิดเห็น</h3>
                    </div>
                    <div class="border p-2 mt-2">
                        <form method="post" action="/customer_food_review.php">
                            <textarea class="form-control" name="review_detail" rows="5" required></textarea>
                            <button type="submit" class="btn btn-primary btn-lg mt-3">รีวิวอาหาร</button>
                            <input type="hidden" name="order_id" value="1"/>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end: main content -->
        </div>
    </div>
</main>