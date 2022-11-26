<div class="container">
    <!-- start: breadcrumb -->
    <div class="page-header mt-3">
        <div class="row align-items-end">
            <div class="col-sm mb-2 mb-sm-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-no-gutter">
                        <li class="breadcrumb-item">
                            <a class="breadcrumb-link" href="/">หน้าหลัก</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            การตั้งค่า
                        </li>
                    </ol>
                </nav>
                <h1 class="page-header-title">ข้อมูลโปรไฟล์</h1>
            </div>
            <div class="col-sm-auto">
                <a class="btn btn-primary" href="/profile">
                    <i class="bi-person-fill me-1"></i> โปรไฟล์ของฉัน
                </a>
            </div>
        </div>
    </div>
    <!-- end: breadcrumb -->

    <div class="row">
        <!-- start: left menu -->
        <?php echo $this->data['left_menu']; ?>
        <!-- end: left menu -->

        <!-- start: main content -->
        <div class="col-lg-9">
            <?php echo validation_errors(); ?>
            <?php echo action_messages(); ?>
            <div class="card mb-5">
                <div class="card-header">
                    <h2 class="card-title h4">เปลี่ยนรหัสผ่าน</h2>
                </div>
                <div class="card-body">
                    <form id="editProfileForm" class="needs-validation" method="post" novalidate>
                        <!-- field: current_password -->
                        <div class="row mb-4">
                            <label for="current_passwordLabel" class="col-sm-3 col-form-label form-label">รหัสผ่านเดิม
                                *</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="current_password"
                                    id="current_passwordLabel" required />
                            </div>
                        </div>
                        <!-- End field: current_password -->

                        <!-- field: new_password -->
                        <div class="row mb-4">
                            <label for="new_passwordLabel" class="col-sm-3 col-form-label form-label">รหัสผ่านใหม่
                                *</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="new_password" id="new_passwordLabel"
                                    required />
                            </div>
                        </div>
                        <!-- End field: new_password -->

                        <!-- field: confirm_new_password -->
                        <div class="row mb-4">
                            <label for="confirm_new_passwordLabel"
                                class="col-sm-3 col-form-label form-label">ยืนยันรหัสผ่านใหม่ *</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="confirm_new_password"
                                    id="confirm_new_passwordLabel" required />
                            </div>
                        </div>
                        <!-- End field: confirm_new_password -->

                        <!-- submit button -->
                        <div class="row mb-4">
                            <label for="levelLabel" class="col-sm-3 col-form-label form-label">.</label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    บันทึกข้อมูล
                                </button>
                            </div>
                        </div>
                        <!-- end: submit button -->

                        <input type="hidden" name="id" value="1" />
                    </form>
                </div>
            </div>
        </div>
        <!-- end: main content -->
    </div>
</div>