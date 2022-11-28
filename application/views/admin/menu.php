<div class="col-lg-3">
    <div class="card mb-3 mt-3 d-none d-sm-flex">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo ($this->data['active_menu'] == 'index') ? 'active' : ''; ?>"
                    href="/admin.php">
                    <i class="bi-house"></i> หน้าหลัก (Home)
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($this->data['active_menu'] == 'restaurant_types') ? 'active' : ''; ?>"
                    href="/admin_restaurant_types.php">
                    <i class="bi-box"></i> จัดการประเภทร้านอาหาร
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($this->data['active_menu'] == 'restaurants') ? 'active' : ''; ?>"
                    href="/admin_restaurants.php">
                    <i class="bi-shop"></i> จัดการร้านอาหาร
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($this->data['active_menu'] == 'riders') ? 'active' : ''; ?>"
                    href="/admin_riders.php">
                    <i class="bi-car-front"></i> จัดการผู้ส่งอาหาร
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($this->data['active_menu'] == 'users') ? 'active' : ''; ?>"
                    href="/admin_users.php">
                    <i class="bi-person"></i> จัดการสมาชิกทั้งหมด
                </a>
            </li>
        </ul>
    </div>
</div>