<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link <?php echo ($this->data['active_menu'] == 'index') ? 'active' : ''; ?>"
            href="/staff.php">
            <i class="bi-box"></i> หน้าแรก
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo ($this->data['active_menu'] == 'food_category') ? 'active' : ''; ?>"
            href="/staff_food_category.php">
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
        <a class="nav-link <?php echo ($this->data['active_menu'] == 'ordering') ? 'active' : ''; ?>"
            href="/staff_ordering.php">
            <i class="bi-minecart"></i> รายการสั่งซื้ออาหาร
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo ($this->data['active_menu'] == 'reporting') ? 'active' : ''; ?>"
            href="/staff_reporting.php">
            <i class="bi-graph-up"></i> รายงานการขาย
        </a>
    </li>
</ul>