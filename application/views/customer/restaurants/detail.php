<?php
$restaurant_thumbnail = array_value($this->data['item'], 'restaurant_thumbnail');
$restaurant_name = array_value($this->data['item'], 'restaurant_name');
$restaurant_type_name = array_value($this->data['item'], 'restaurant_type_name');

$restaurant_id = array_value($this->data['item'], 'id');
$all_category_link = "/customer_restaurants.php?action=detail&id={$restaurant_id}";

$cate_id = $this->data['cate_id'];
?>

<main>
    <div class="container">
        <div>
            <div class="border"><img src="<?php echo $restaurant_thumbnail; ?>" width="100%"></div>
            <h2 class="text-center mt-5"><?php echo $restaurant_name; ?></h2>
            <h5 class="text-center mb-3">(<?php echo $restaurant_type_name; ?>)</h5>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="card mb-3 mt-3 d-none d-sm-flex">
                    <?php echo $this->data['left_menu']; ?>
                </div>

                <!-- start: food categories -->
                <div class="card mb-3 mt-3 d-none d-sm-flex">
                    <div class="card-header">
                        หมวดหมู่อาหาร
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($cate_id == 0) ? 'active' : ''; ?>"
                                href="<?php echo $all_category_link; ?>">
                                <i class="bi-box"></i> แสดงอาหารทุกหมวดหมู่
                            </a>
                        </li>
                        <?php
                        if (count($this->data['food_categories']) <= 0) {
                            echo '<li class="nav-item">ไม่มีหมวดหมู่อาหาร</li>';
                        } else {
                            for ($i = 0; $i < count($this->data['food_categories']); ++$i) {
                                $item = $this->data['food_categories'][$i];
                                $category_link = "/customer_restaurants.php?action=detail&id={$restaurant_id}&cate_id={$item['id']}";
                                ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($item['id'] == $cate_id) ? 'active' : ''; ?>"
                                href="<?php echo $category_link; ?>">
                                <i class="bi-box"></i> <?php echo array_value($item, 'title'); ?>
                            </a>
                        </li>
                        <?php
                            }
                        }
?>
                    </ul>
                </div>
                <!-- end: food categories -->
            </div>
            <!-- end: col-lg-3 -->


            <!-- start: main content -->
            <div class="col-lg-9">
                <!-- menus -->
                <div class="row">
                    <?php
        if (count($this->data['food_menus']) <= 0) {
            echo '<h6 class="text-center p-4 border">ไม่มีข้อมูลสำหรับแสดงผล...</h6>';
        } else {
            for ($i = 0; $i < count($this->data['food_menus']); ++$i) {
                $item = $this->data['food_menus'][$i];
                $add_to_cart_link = "/customer_restaurants.php?action=add_to_cart&id={$restaurant_id}&cate_id={$this->data['cate_id']}&food_id={$item['id']}";

                $percent = (float) $item['discount_percent'];
                $old_price = (float) $item['price'];
                $discount_value = ($old_price / 100) * $percent;
                $price_after_discount = $old_price - $discount_value;

                ?>
                    <div class="col-4">
                        <div class="card mb-4">
                            <img src="<?php echo $item['thumbnail']; ?>" width="100%" class="card-img-top">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?php echo $item['title']; ?></h5>
                                <p class="card-text">
                                <div class="fw-bold fs-3">( <?php echo $old_price; ?> บาท )</div>
                                <div class="text-danger text-decoration-line-through">(
                                    <?php echo $price_after_discount; ?> บาท )</div>
                                </p>
                                <a href="<?php echo $add_to_cart_link; ?>" class="btn btn-primary">เพิ่มลงตะกร้า</a>
                            </div>
                        </div>
                    </div>
                    <?php
            }
        }
?>
                </div>
                <!-- end: menus -->

                <!-- start: reviews -->
                <div>
                    <div class="text-bg-secondary">
                        <h3 class="p-2">รีวิวอาหาร</h3>
                    </div>
                    <div>
                        <?php
                        if (count($this->data['reviews']) <= 0) {
                            echo '<h6 class="text-center p-4 border">ไม่มีข้อมูลรีวิวอาหาร...</h6>';
                        } else {
                            for ($i = 0; $i < count($this->data['reviews']); ++$i) {
                                $item = $this->data['reviews'][$i];
                                ?>
                        <div class="border p-2 mt-2">
                            <h4><?php echo $item['customer_firstname'].' '.$item['customer_lastname']; ?>
                            </h4>
                            <h6><?php echo $item['created_at']; ?></h6>
                            <div class="mt-2"><?php echo $item['detail']; ?></div>
                        </div>
                        <?php
                            }
                        }
?>
                    </div>
                </div>
                <!-- end: reviews -->
            </div>
            <!-- end: main content -->
        </div>
        <!-- end: row -->
    </div>
    <!-- end: container -->
</main>

<?php
// แสดงผลเมื่อมีการกดปุ่ม add_to_cart
if ($this->input_lib->get('msg_status') == 'addtocart_ok') {
    ?>
<script type="text/javascript">
(function() {
    alert('เพิ่มรายการอาหารลงในตระกร้าเรียบร้อยค่ะ.');
})();
</script>
<?php
}
?>