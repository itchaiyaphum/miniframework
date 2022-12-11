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
                <form id="mainForm" method="post">
                    <div class="card mt-3 mb-3" id="mainSection">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 col-sm-5 mb-2">
                                    <?php echo admin_filter_search_html('filter_search'); ?>
                                </div>
                                <div class="col-12 col-sm-7 mb-2 d-flex justify-content-end">
                                    <a href="/staff_food_menus.php?action=edit&id=0" class="btn btn-primary">เพิ่มข้อมูล</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php
                    for ($i = 0; $i < count($this->data['items']); ++$i) {
                        $item = $this->data['items'][$i];
                        $edit_link = "/staff_food_menus.php?action=edit&id={$item['id']}";
                        $delete_link = "/staff_food_menus.php?action=delete&id={$item['id']}";

                        $percent = (float) $item['discount_percent'];
                        $old_price = (float) $item['price'];
                        $discount_value = ($old_price / 100) * $percent;
                        $price_after_discount = $old_price - $discount_value;
                        ?>
                                <div class="col-4">
                                    <div class="card mb-4">
                                        <img src="<?php echo $item['thumbnail']; ?>" width="100%" class="card-img-top">
                                        <div class="card-body text-center">
                                        <h5 class="card-title">ชื่อ: <?php echo $item['title']; ?></h5>
                                            <h5 class="card-title">หมวดหมู่: <?php echo $item['food_category_name']; ?></h5>
                                            <h5 class="card-title">ราคา: <?php echo $item['price']; ?> บาท</h5>
                                            <h5 class="card-title">ส่วนลด: <?php echo $item['discount_percent']; ?>%</h5>
                                            <h5 class="card-title">ราคาหลังหักส่วนลด: <?php echo $price_after_discount; ?> บาท</h5>
                                            <a href="<?php echo $edit_link; ?>" class="btn btn-primary">แก้ไข</a>
                                            <a href="<?php echo $delete_link; ?>" class="btn btn-danger">ลบ</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                    }
                    ?>
                            </div>
                        </div>
                    </div>
                </form>
                    
                </div>
            </div>
            <!-- end: main content -->
        </div>
    </div>
</main>