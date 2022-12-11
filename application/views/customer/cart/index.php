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
            <div class="col-lg-9 mb-3">
                <form id="mainForm" method="post" action="/customer_cart.php?action=order">
                    <div class="mb-5 mt-3">
                        <h2 class="text-center">ตระกร้าสินค้า</h2>
                        <div class="border mb-3 p-4 text-bg-light">
                            <div class="text-center fw-bold fs-5 text-decoration-underline">ข้อมูลการจัดส่งสินค้า</div>
                            <div><?php echo $this->data['profile']->firstname.' '.$this->data['profile']->lastname; ?></div>
                            <div><?php echo $this->data['profile']->mobile_no; ?> / <?php echo $this->data['profile']->email; ?></div>
                            <div><?php echo $this->data['profile']->address; ?></div>
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
                    $sum_total_price = 0;
                    $enable_order_button = false;
                    if (count($this->data['items']) <= 0) {
                        echo '<h6 class="text-center p-4 border">ไม่มีข้อมูลสำหรับแสดงผล...</h6>';
                    } else {
                        for ($i = 0; $i < count($this->data['items']); ++$i) {
                            $item = $this->data['items'][$i];

                            $enable_order_button = true;

                            $delete_link = "/customer_cart.php?action=delete&id={$item['id']}";

                            $food_amount = (int) $item['food_amount'];
                            $percent = (float) $item['food_discount_percent'];
                            $old_price = (float) $item['food_price'];
                            $discount_value = ($old_price / 100) * $percent;
                            $price_after_discount = $old_price - $discount_value;

                            $total_price = $price_after_discount * $food_amount;

                            $sum_total_price += $total_price;
                            ?>
                    <div class="row gy-2 p-2">
                        <div class="col-12 col-md-4">
                            <div class="d-flex">
                                <span class="d-md-none w-50">รายการอาหาร: </span>
                                <div><?php echo $item['food_name']; ?></div>
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="d-flex">
                                <span class="d-md-none w-50">ราคาต่อชิ้น:</span>
                                <div>
                                    <span class="text-decoration-line-through text-danger"><?php echo $old_price; ?></span>
                                    <span><?php echo $price_after_discount; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="d-flex">
                                <span class="d-md-none w-50">จำนวน:</span>
                                <?php echo $food_amount; ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="d-flex">
                                <span class="d-md-none w-50">ราคารวม: </span>
                                <?php echo $total_price; ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="d-flex">
                                <span class="d-md-none w-50"></span>
                                <a class="btn btn-sm btn-danger" href="<?php echo $delete_link; ?>"><i
                                        class="bi-trash"></i></a>

                            </div>
                        </div>
                    </div>
                    <hr />
                    <?php
                        }
                    }
                    ?>
                    <div class="fs-4 fw-bold text-center mt-5">ยอดรวมทั้งหมด: <?php echo number_format($sum_total_price); ?> บาท</div>
                    <div class="fs-4 fw-bold text-center mt-5">
                        <?php
                        if ($this->data['multiple_restaurant']) {
                            ?>
                        <div class="alert alert-danger">คุณมีการสั่งซื้ออาหารจากหลายร้านอาหาร, กรุณาสั่งซื้ออาหารจาก 1 ร้านอาหาร/1 การสั่งซื้อเท่านั้น</div>
                        <?php
                        } else {
                            ?>
                        <button type="submit" class="btn btn-primary btn-lg" <?php echo ($enable_order_button) ? '' : 'disabled'; ?> >
                            สั่งซื้ออาหารเดี๋ยวนี้
                        </button>
                        <?php
                        }
                    ?>
                    </div>
                </form>
            </div>
            <!-- end: main content -->
        </div>
    </div>
</main>