<div class="container">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">ระบบสั่งอาหารออนไลน์</h1>
            <p class="col-md-8 fs-4">คุณสามารถเข้าใช้งานระบบสั่งอาหารออนไลน์ได้อย่างสะดวกและปลอดภัยตลอด 24 ชั่วโมง
                มีร้านอาหารให้เลือกใช้บริการมากกว่า 10,000 ร้านทั่วประเทศ</p>
        </div>

        <?php
        // new register menu
        if (!$this->auth_lib->is_login()) {
            ?>
        <div class="row text-center p-4">
            <div class="col border p-4 ">
                <a href="/customer_register.php" class="btn btn-lg">ลงทะเบียนสำหรับลูกค้า<br />(Customer)</a>
            </div>
            <div class="col border p-4">
                <a href="/staff_register.php" class="btn btn-lg">ลงทะเบียนสำหรับร้านอาหาร<br />(Restaurant)</a>
            </div>
            <div class="col border p-4">
                <a href="/rider_register.php" class="btn btn-lg">ลงทะเบียนสำหรับผู้ส่งอาหาร<br />(Rider)</a>
            </div>
        </div>
        <?php
        }
        ?>

        <?php
        // if user type = customer
        if ($this->profile_lib->get_user_type() == 'customer') {
            ?>
        <div class="row text-center p-4">
            <div class="col border p-4 ">
                <a href="/customer_restaurants.php" class="btn btn-lg">แสดงร้านอาหารทั้งหมด</a>
            </div>
            <div class="col border p-4">
                <a href="/customer_cart.php" class="btn btn-lg">ตะกร้าสินค้า</a>
            </div>
            <div class="col border p-4">
                <a href="/customer_history_order.php" class="btn btn-lg">ประวัติการสั่งซื้อ</a>
            </div>
        </div>
        <?php
        }
        ?>

        <?php
        // if user type = staff
        if ($this->profile_lib->get_user_type() == 'staff') {
            ?>
        <div class="row text-center p-4">
            <div class="col border p-4 ">
                <a href="/staff_food_category.php" class="btn btn-lg">หมวดหมู่อาหาร</a>
            </div>
            <div class="col border p-4">
                <a href="/staff_food_menus.php" class="btn btn-lg">รายการอาหาร</a>
            </div>
            <div class="col border p-4">
                <a href="/staff_ordering.php" class="btn btn-lg">รายการสั่งซื้ออาหาร</a>
            </div>
            <div class="col border p-4">
                <a href="/staff_reporting.php" class="btn btn-lg">รายงานการขาย</a>
            </div>
        </div>
        <?php
        }
        ?>

        <?php
        // if user type = admin
        if ($this->profile_lib->get_user_type() == 'admin') {
            ?>
        <div class="row text-center p-4">
            <div class="col border p-4 ">
                <a href="/admin_restaurant_types.php" class="btn btn-lg">จัดการประเภทร้านอาหาร<br />(Restaurant
                    Types)</a>
            </div>
            <div class="col border p-4">
                <a href="/admin_restaurants.php" class="btn btn-lg">จัดการร้านอาหาร<br />(Restaurants)</a>
            </div>
            <div class="col border p-4">
                <a href="/admin_riders.php" class="btn btn-lg">จัดการผู้ส่งอาหาร<br />(Riders)</a>
            </div>
            <div class="col border p-4">
                <a href="/admin_customer.php" class="btn btn-lg">จัดการลูกค้า<br />(Customer)</a>
            </div>
        </div>
        <?php
        }
        ?>

    </div>
</div>