    <div class="container">
        <div class="row text-center mt-5">
            <div class="col">
                <div class="p-2">
                    <img style="width: 50px" src="/assets/img/workflow-mark-indigo-600.svg" />
                </div>
                <h2>ลงชื่อเข้าสู่ระบบ</h2>
            </div>
        </div>

        <div class="row mt-5 justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <?php echo validation_errors(); ?>
                        <form id="authForm" method="post" action="/auth_login.php">
                            <div class="mb-3">
                                <label for="inputEmail" class="form-label">อีเมล์</label>
                                <input type="email" class="form-control" id="inputEmail" name="email"
                                    value="<?php echo $this->data['email']; ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="inputPassword" class="form-label">รหัสผ่าน</label>
                                <input type="password" class="form-control" id="inputPassword" name="password"
                                    value="<?php echo $this->data['password']; ?>" />
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                ลงชื่อเข้าสู่ระบบ
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