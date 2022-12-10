<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card mb-5">
                <div class="card-header">
                    <h2 class="card-title h4">ลงทะเบียนสำหรับผู้ดูแลร้านอาหาร (Staff)</h2>
                </div>
                <div class="card-body">
                    <?php echo validation_errors(); ?>
                    <form id="mainForm" method="post" enctype="multipart/form-data">
                        <!-- field: firstname -->
                        <div class="row mb-4">
                            <label for="firstnameLabel" class="col-sm-3 col-form-label form-label">ชื่อ *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="firstname" id="firstnameLabel"
                                    value="<?php echo $this->data['firstname']; ?>" required />
                            </div>
                        </div>
                        <!-- End field: firstname -->

                        <!-- field: lastname -->
                        <div class="row mb-4">
                            <label for="lastnameLabel" class="col-sm-3 col-form-label form-label">นามสกุล *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="lastname" id="lastnameLabel"
                                    value="<?php echo $this->data['lastname']; ?>" required />
                            </div>
                        </div>
                        <!-- End field: lastname -->

                        <!-- end field: mobile_no -->
                        <div class="row mb-4">
                            <label for="phoneLabel" class="col-sm-3 col-form-label form-label">เบอร์โทรศัพท์
                                *</label>

                            <div class="col-sm-9">
                                <input type="text" class="js-input-mask form-control" name="mobile_no" id="phoneLabel"
                                    value="<?php echo $this->data['mobile_no']; ?>" required />
                            </div>
                        </div>
                        <!-- end field: mobile_no -->

                        <!-- field: address -->
                        <div class="row mb-4">
                            <label for="addressLine1Label" class="col-sm-3 col-form-label form-label">ที่อยู่
                                *</label>

                            <div class="col-sm-9">
                                <textarea row="4" class="form-control" name="address" id="addressLine1Label"
                                    required><?php echo $this->data['address']; ?></textarea>
                            </div>
                        </div>
                        <!-- end field: address -->

                        <!-- field: thumbnail -->
                        <div class="row mb-4">
                            <label for="thumbnailLabel" class="col-sm-3 col-form-label form-label">รูปภาพประจำตัว
                                *</label>
                            <div class="col-sm-9">
                                <img src="/storage/profile/no-thumbnail.png" class="mb-3 w-25 border">
                                <input type="file" class="form-control" name="thumbnail" required />
                            </div>
                        </div>
                        <!-- end field: thumbnail -->

                        <!-- field: email -->
                        <div class="row mb-4">
                            <label for="emailLabel" class="col-sm-3 col-form-label form-label">อีเมล์ *</label>

                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" id="emailLabel"
                                    value="<?php echo $this->data['email']; ?>" required />
                            </div>
                        </div>
                        <!-- end field: email -->

                        <!-- field: password -->
                        <div class="row mb-4">
                            <label for="passwordLabel" class="col-sm-3 col-form-label form-label">รหัสผ่าน</label>

                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password" id="passwordLabel"
                                    value="<?php echo $this->data['password']; ?>" />
                            </div>
                        </div>
                        <!-- end field: password -->

                        <div class="text-bg-secondary mt-5 mb-5">
                            <h4 class="p-2">ข้อมูลร้านอาหาร</h4>
                        </div>
                        <!-- field: restaurant name -->
                        <div class="row mb-4">
                            <label for="restaurantNameLabel" class="col-sm-3 col-form-label form-label">ชื่อร้านอาหาร *</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="restaurant_name" id="restaurantNameLabel" value="<?php echo $this->data['restaurant_name']; ?>"
                                    required />
                            </div>
                        </div>
                        <!-- end field: restaurant name -->

                        <!-- field: restaurant type -->
                        <div class="row mb-4">
                            <label for="restaurantTypeIdLabel" class="col-sm-3 col-form-label form-label">ประเภทร้านอาหาร *</label>

                            <div class="col-sm-9">
                                <select class="form-select" name="restaurant_type_id" id="restaurantTypeIdLabel" required>
                                    <option value="0">-- กรุณาเลือกประเภทร้านอาหาร --</option>
                                    <?php
                                    for ($i = 0; $i < count($this->data['restaurant_types']); ++$i) {
                                        $row = $this->data['restaurant_types'][$i];
                                        ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
                                    <?php
                                    }?>
                                </select>
                            </div>
                        </div>
                        <!-- end field: restaurant type -->

                        <!-- field: restaurant address -->
                        <div class="row mb-4">
                            <label for="restaurantAddressLabel" class="col-sm-3 col-form-label form-label">ที่อยู่ร้านอาหาร
                                *</label>

                            <div class="col-sm-9">
                                <textarea row="4" class="form-control" name="restaurant_address" id="restaurantAddressLabel" required><?php echo $this->data['restaurant_address']; ?></textarea>
                            </div>
                        </div>
                        <!-- end field: restaurantaddress -->

                        <!-- field: restaurant thumbnail -->
                        <div class="row mb-4">
                            <label for="restaurantThumbnailLabel"
                                class="col-sm-3 col-form-label form-label">รูปภาพร้านอาหาร</label>
                            <div class="col-sm-9">
                                <img src="/storage/restaurant/no-thumbnail.png" class="mb-3 w-25">
                                <input type="file" class="form-control" name="restaurant_thumbnail"  required />
                            </div>
                        </div>
                        <!-- end field: restaurant thumbnail -->

                        <!-- submit button -->
                        <div class="row mb-4">
                            <label for="levelLabel" class="col-sm-3 col-form-label form-label">.</label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    ลงทะเบียน
                                </button>
                            </div>
                        </div>

                    </form>
                    <hr />
                    <div class="text-center">
                        <a href="/" class="link-secondary">กลับหน้าหลัก</a>
                    </div>
                </div><!-- end: card-body -->
            </div><!-- end: card -->
        </div>
    </div>
</div>