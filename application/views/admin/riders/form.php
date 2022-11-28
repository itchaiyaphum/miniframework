    <main>
        <div class="container">
            <div class="row">
                <!-- start: left menu -->
                <?php echo $this->data['left_menu']; ?>
                <!-- end: left menu -->
                <!-- start: main content -->
                <div class="col-lg-9">
                    <!-- start: page header -->
                    <form id="adminForm" class="needs-validation" method="post" novalidate>
                        <div class="page-header mt-3">
                            <div class="d-flex justify-content-between">
                                <h1>จัดการรายชื่อผู้ใช้งาน [แก้ไข]</h1>
                                <div>
                                    <a class="btn btn-outline-secondary align-self-end mb-2" href="/admin_riders.php">
                                        <i class="bi-x me-1"></i> ยกเลิก
                                    </a>
                                    <button class="btn btn-primary align-self-end mb-2" type="submit">
                                        <i class="bi-save me-1"></i> บันทึกข้อมูล
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- end: page header -->
                        <div class="card mb-5">
                            <div class="card-body">
                                <?php echo validation_errors(); ?>
                                <form id="editProfileForm" class="needs-validation" method="post" novalidate>
                                    <!-- field: firstname -->
                                    <div class="row mb-4">
                                        <label for="firstnameLabel" class="col-sm-3 col-form-label form-label">ชื่อ *
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="firstname" id="firstnameLabel"
                                                value="<?php echo $this->data['item']['firstname']; ?>" required />
                                        </div>
                                    </div>
                                    <!-- End field: firstname -->

                                    <!-- field: lastname -->
                                    <div class="row mb-4">
                                        <label for="lastnameLabel" class="col-sm-3 col-form-label form-label">นามสกุล *
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="lastname" id="lastnameLabel"
                                                value="<?php echo $this->data['item']['lastname']; ?>" required />
                                        </div>
                                    </div>
                                    <!-- End field: lastname -->

                                    <!-- field: address -->
                                    <div class="row mb-4">
                                        <label for="addressLine1Label"
                                            class="col-sm-3 col-form-label form-label">ที่อยู่ *
                                        </label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="address"
                                                id="addressLine1Label"
                                                value="<?php echo $this->data['item']['address']; ?>" required />
                                        </div>
                                    </div>
                                    <!-- end field: address -->

                                    <!-- field: province -->
                                    <div class="row mb-4">
                                        <label for="provinceLabel" class="col-sm-3 col-form-label form-label">จังหวัด *
                                        </label>

                                        <div class="col-sm-9">
                                            <select class="form-select" name="province_id" id="provinceLabel" required>
                                                <option>--- เลือกจังหวัด ---</option>
                                                <?php
                                        for ($i = 0; $i < count($this->data['provinces']); ++$i) {
                                            $province = $this->data['provinces'][$i];
                                            $selected = ($province['id'] == $this->data['item']['province_id']) ? 'selected' : '';
                                            echo "<option value='{$province['id']}' {$selected}>{$province['province_name']}</option>";
                                        }?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- end field: province -->

                                    <!-- field: zip_code -->
                                    <div class="row mb-4">
                                        <label for="zipCodeLabel"
                                            class="col-sm-3 col-form-label form-label">รหัสไปรษณีย์ *<i
                                                class="bi-question-circle text-body ms-1"></i></label>

                                        <div class="col-sm-9">
                                            <input type="text" class="js-input-mask form-control" id="zipCodeLabel"
                                                value="<?php echo $this->data['item']['zip_code']; ?>" name="zip_code"
                                                required />
                                        </div>
                                    </div>
                                    <!-- end field: zip_code -->

                                    <!-- field: email -->
                                    <div class="row mb-4">
                                        <label for="emailLabel" class="col-sm-3 col-form-label form-label">อีเมล์ *
                                        </label>

                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="email" id="emailLabel"
                                                value="<?php echo $this->data['item']['email']; ?>" required />
                                        </div>
                                    </div>
                                    <!-- end field: email -->

                                    <!-- end field: mobile_no -->
                                    <div class="row mb-4">
                                        <label for="phoneLabel" class="col-sm-3 col-form-label form-label">เบอร์โทรศัพท์ *
                                        </label>

                                        <div class="col-sm-9">
                                            <input type="text" class="js-input-mask form-control" name="mobile_no"
                                                id="phoneLabel" value="<?php echo $this->data['item']['mobile_no']; ?>"
                                                required />
                                        </div>
                                    </div>
                                    <!-- end field: mobile_no -->

                                    <input type="hidden" name="id" value="<?php echo $this->data['item']['id']; ?>" />
                                </form>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end: main content -->
            </div>
        </div>
    </main>