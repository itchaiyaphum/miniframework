<div class="container">
    <div class="row text-center mt-5">
        <div class="col">
            <div class="w-100 p-2">
                <img style="width: 50px" src="../assets/img/workflow-mark-indigo-600.svg" />
            </div>
            <h2 class="w-100">ลงทะเบียนใหม่</h2>
            <p class="w-100">
                สมัครใช้บริการง่ายๆ เพียงแค่กรอกข้อมูลไม่ถึง 1 นาที. หรือ
                <a href="/auth_login.php" class=""> ลงชื่อเข้าสู่ระบบ </a>
            </p>
        </div>
    </div>
    <div class="row mt-5 justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card">
                <div class="card-body">
                        <?php echo validation_errors(); ?>
                        <form id="authForm" method="post" action="/auth_register.php">
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-6">
                                <label for="inputFirstname" class="form-label">ชื่อ</label>
                                <input type="text" class="form-control" id="inputFirstname" name="firstname" value="<?php echo $this->data['firstname']; ?>" />
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <label for="inputLastname" class="form-label">นามสกุล</label>
                                <input type="text" class="form-control" id="inputLastname" name="lastname" value="<?php echo $this->data['lastname']; ?>"/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="SelectUserType" class="form-label">ประเภทผู้ใช้งาน</label>
                            <select class="form-control" id="SelectUserType" name="user_type">
                                <option value="customer">ลูกค้า (Customer)</option>
                                <option value="rider">ผู้ส่งอาหาร (Rider)</option>
                                <option value="staff">ผู้ดูแลร้านอาหาร (Staff)</option>
                                <option value="admin">ผู้ดูแลระบบ (Admin)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">อีเมล์</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" value="<?php echo $this->data['email']; ?>"/>
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">รหัสผ่าน</label>
                            <input type="password" class="form-control" id="inputPassword" name="password" value="<?php echo $this->data['password']; ?>"/>
                        </div>
                        <div class="mb-3">
                            <label for="inputConfirmPassword" class="form-label">ยืนยันรหัสผ่าน</label>
                            <input type="password" class="form-control" id="inputConfirmPassword" name="confirm_password" value="<?php echo $this->data['confirm_password']; ?>"/>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            ลงทะเบียนเดี๋ยวนี้
                        </button>
                    </form>
                    <hr />
                    <div class="text-center">
                        <a href="/" class="link-secondary">กลับหน้าหลัก</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>