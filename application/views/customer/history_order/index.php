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
                    <h2 class="text-center">ประวัติการสั่งซื้ออาหาร</h2>
                    <?php
                    if (count($this->data['order_items']) <= 0) {
                        echo '<h6 class="text-center p-4">ไม่มีข้อมูลสำหรับแสดงผล...</h6>';
                    } else {
                        for ($i = 0; $i < count($this->data['order_items']); ++$i) {
                            $item = $this->data['order_items'][$i];
                            $review_link = "/customer_food_review.php?id={$item['id']}";

                            $order_status_text = 'รอยืนยันการสั่งซื้อ';
                            $order_status_bg = 'text-bg-secondary';
                            if ($item['status'] == 1) {
                                $order_status_text = 'รับออร์เดอร์เรียบร้อยแล้ว...กำลังจัดเตรียมอาหาร';
                                $order_status_bg = 'text-bg-primary';
                            } elseif ($item['status'] == 2) {
                                $order_status_text = 'กำลังนำอาหารไปส่งลูกค้า... รอสักครู่';
                                $order_status_bg = 'text-bg-warning';
                            } elseif ($item['status'] == 3) {
                                $order_status_text = 'นำส่งอาหารและได้รับชำระเงิน เรียบร้อยแล้ว';
                                $order_status_bg = 'text-bg-success';
                            }
                            ?>
                    <div class="border mb-3">
                        <div class="row g-0">
                            <div class="col-6">
                                <div class="<?php echo $order_status_bg; ?> p-2">ร้าน:
                                    <?php echo $item['restaurant_name']; ?> /
                                    สั่งซื้อเมื่อ: <?php echo $item['created_at']; ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="<?php echo $order_status_bg; ?> p-2 h-100"><?php echo $order_status_text; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row g-0">
                            <div class="col-12">
                                <div class="text-bg-light p-2">
                                    <div class="row">
                                        <?php
                                        for ($j = 0; $j < count($this->data['food_items']); ++$j) {
                                            $item2 = $this->data['food_items'][$j];
                                            if ($item2['order_id'] == $item['id']) {
                                                ?>
                                        <div class="col-2 mt-2">
                                            <img src="<?php echo $item2['food_thumbnail']; ?>" width="100%">
                                        </div>
                                        <div class="col-10">
                                            <h5><?php echo $item2['food_name']; ?></h5>
                                            <div>x<?php echo $item2['food_amount']; ?></div>
                                        </div>
                                        <?php
                                            }
                                        }
                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-0 border">
                            <div class="col-8">
                                <div class="text-bg-light p-2 d-flex justify-content-between">
                                    <h6>รหัสการสั่งซื้อ: #<?php echo $item['id']; ?></h6>
                                    <?php
                                    if ($item['status'] == 3) {
                                        ?>
                                    <div>
                                        <a href="<?php echo $review_link; ?>" class="btn btn-primary">รีวิวอาหาร</a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="p-2 h-100">
                                    <h5>ยอดคําสั่งซื้อทั้งหมด: <?php echo number_format($item['total_price']); ?> บาท
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
            <!-- end: main content -->
        </div>
    </div>
</main>