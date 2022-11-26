<header class="border-bottom sticky-top">
    <nav class="navbar bg-light p-0">
        <div class="container justify-content-between justify-sm-content-start">
            <a class="navbar-brand" href="/">
                <img height="30" src="/assets/img/workflow-logo-indigo-600-mark-gray-800-text.svg"
                    alt="Workshop For Beginners" />
            </a>
            <!-- start: responsive menu -->
            <button class="navbar-toggler m-2 d-sm-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start d-block d-sm-none" id="navbarMenu">
                <ul class="list-group">
                    <li class="list-group-item">เมนูหลัก</li>
                    <li>
                        <a class="list-group-item active" href="/"><i class="bi-house"></i> หน้าหลัก</a>
                    </li>
                    <li class="list-group-item">ผู้ใช้งาน</li>
                    <li>
                        <a class="list-group-item" href="/profile.php"><i class="bi-person-circle"></i>
                            โปรไฟล์ของฉัน</a>
                    </li>
                    <li class="list-group-item">ตั้งค่าบัญชี</li>
                    <li>
                        <a class="list-group-item" href="/settings_profile.php"><i class="bi-pencil-square"></i>
                            แก้ไขข้อมูลส่วนตัว</a>
                    </li>
                    <li>
                        <a class="list-group-item" href="/settings_password.php"><i class="bi-lock"></i>
                            เปลี่ยนรหัสผ่าน</a>
                    </li>
                    <li>
                        <a class="list-group-item" href="/auth_logout.php"><i class="bi-power"></i> ออกจากระบบ</a>
                    </li>
                </ul>
            </div>
            <!-- end: responsive menu -->

            <div class="d-none d-sm-flex flex-grow-1">
                <ul class="nav flex-row">
                    <li class="nav-item active">
                        <a href="/" class="nav-link">หน้าหลัก</a>
                    </li>
                </ul>
            </div>

            <div class="dropdown dropstart d-none d-sm-flex">
                <?php
                if ($this->profile_lib->is_login()) {
                    ?>
                <a href="#" class="d-block link-dark text-decoration-none" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img src="/assets/img/profile.jpeg" width="30" height="30" class="rounded-circle" />
                    <span class="position-absolute translate-middle rounded-circle profile-online"></span>
                </a>
                <ul class="dropdown-menu text-small">
                    <li>
                        <a class="dropdown-item" href="/profile.php"><i class="bi-person-circle"></i>
                            <?php echo $this->profile_lib->firstname.' '.$this->profile_lib->lastname; ?></a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/settings_profile.php"><i class="bi-pencil-square"></i>
                            แก้ไขข้อมูลส่วนตัว</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/settings_password.php"><i class="bi-lock"></i>
                            เปลี่ยนรหัสผ่าน</a>
                    </li>

                    <?php
                    if ($this->profile_lib->get_user_type() == 'admin') {
                        echo '<li><hr class="dropdown-divider" /></li>';
                        echo '<a class="dropdown-item" href="/admin.php"><i class="bi-person"></i> ระบบบริหารจัดการหลังบ้าน</a>';
                    }
                    ?>
                    
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <a class="dropdown-item" href="/auth_logout.php"><i class="bi-power"></i> ออกจากระบบ</a>
                    </li>
                </ul>
                <?php } else {
                    ?>
                <a class="btn btn-primary" href="/auth_login.php"><i class="bi-person"></i> ลงชื่อเข้าสู่ระบบ</a>
                <?php
                } ?>
            </div>
        </div>
    </nav>
</header>