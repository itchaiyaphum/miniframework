<main>
    <div class="container">
        <form id="mainForm" method="post">
            <div class="mb-5 mt-3">
                <h2 class="text-center">ใบเสร็จรับเงิน</h2>
                <div class="border mb-3 p-4 text-bg-light">
                    <div class="text-center fw-bold fs-5 text-decoration-underline">ข้อมูลร้านค้า</div>
                    <div><?php echo $this->data['profile']->restaurant_name; ?></div>
                    <div><?php echo $this->data['profile']->mobile_no; ?> / <?php echo $this->data['profile']->email; ?></div>
                    <div><?php echo $this->data['profile']->restaurant_address; ?></div>
                </div>

                <div class="border mb-3 p-4 text-bg-light">
                    <div class="text-center fw-bold fs-5 text-decoration-underline">ข้อมูลลูกค้า</div>
                    <div><?php echo $this->data['item']['firstname'].' '.$this->data['item']['lastname']; ?></div>
                    <div><?php echo $this->data['item']['mobile_no']; ?> / <?php echo $this->data['item']['email']; ?></div>
                    <div><?php echo $this->data['item']['address']; ?></div>
                </div>

                <div>รหัสการสั่งซื้อ #<?php echo $this->data['item']['id']; ?></div>
                <div>วันที่ซื้อ: <?php echo $this->data['item']['created_at']; ?></div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">รายการอาหาร</th>
                        <th scope="col">ราคาต่อชิ้น</th>
                        <th scope="col">
                            จำนวน</th>
                        <th scope="col">ราคารวม</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    $sum_total_price = 0;
                    if (count($this->data['food_items']) <= 0) {
                        echo '<h6 class="text-center p-4 border">ไม่มีข้อมูลสำหรับแสดงผล...</h6>';
                    } else {
                        for ($i = 0; $i < count($this->data['food_items']); ++$i) {
                            $item = $this->data['food_items'][$i];

                            $food_amount = (int) $item['food_amount'];
                            $percent = (float) $item['food_discount_percent'];
                            $old_price = (float) $item['food_price'];
                            $discount_value = ($old_price / 100) * $percent;
                            $price_after_discount = $old_price - $discount_value;
                            $total_price = $price_after_discount * $food_amount;

                            $sum_total_price += $total_price;
                            ?>
                    <tr>
                        <td><?php echo $item['food_name']; ?></td>
                        <td>
                            <div>
                                <span class="text-decoration-line-through text-danger"><?php echo $old_price; ?></span>
                                <span><?php echo $price_after_discount; ?></span>
                            </div>
                        </td>
                        <td><?php echo $food_amount; ?></td>
                        <td><?php echo $total_price; ?></td>
                    </tr>
                   <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <div class="fs-4 fw-bold text-center">ยอดรวมทั้งหมด: <?php echo number_format($sum_total_price); ?> บาท</div>
        </form>
    </div>
    <!-- end: main content -->

    <script type="text/javascript">
    // แสดง popup สำหรับ print
    (function() {
        window.print()
    })();
    </script>

</main>