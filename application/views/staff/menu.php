<div class="col-lg-3">
    <div class="card mb-3 mt-3 d-none d-sm-flex">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo ($this->data['active_menu'] == 'index') ? 'active' : ''; ?>"
                    href="/staff.php">
                    <i class="bi-house"></i> หน้าหลัก (Home)
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($this->data['active_menu'] == 'food_categories') ? 'active' : ''; ?>"
                    href="/staff_food_categories.php">
                    <i class="bi-box"></i> หมวดหมู่อาหาร
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($this->data['active_menu'] == 'food_menus') ? 'active' : ''; ?>"
                    href="/staff_food_menus.php">
                    <i class="bi-justify"></i> รายการอาหาร
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($this->data['active_menu'] == 'orders') ? 'active' : ''; ?>"
                    href="/staff_orders.php">
                    <i class="bi-minecart"></i> ออเดอร์อาหาร
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($this->data['active_menu'] == 'reports') ? 'active' : ''; ?>"
                    href="/staff_reports.php">
                    <i class="bi-graph-up"></i> รายงานการขาย
                </a>
            </li>
        </ul>
    </div>
</div>