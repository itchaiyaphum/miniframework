<div class="col-lg-3">
    <div class="card mb-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo ($this->data['active_menu'] == 'settings_profile') ? 'active' : ''; ?>" href="/settings_profile.php">
                    <i class="bi-person"></i> แก้ไขข้อมูลส่วนตัว
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($this->data['active_menu'] == 'settings_password') ? 'active' : ''; ?>" href="/settings_password.php">
                    <i class="bi-key"></i> เปลี่ยนรหัสผ่าน
                </a>
            </li>
        </ul>
    </div>
</div>