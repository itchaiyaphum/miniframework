<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link <?php echo ($this->data['active_menu'] == 'index') ? 'active' : ''; ?>"
            href="/rider.php">
            <i class="bi-box"></i> หน้าหลัก
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo ($this->data['active_menu'] == 'order_delivery') ? 'active' : ''; ?>"
            href="/rider_order_delivery.php">
            <i class="bi-justify"></i> รายการสั่งซื้ออาหารที่รอจัดส่ง
        </a>
    </li>
</ul>