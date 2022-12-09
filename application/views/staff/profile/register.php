<div class="container mt-3">
    <?php echo validation_errors(); ?>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card mb-5">
                <div class="card-header">
                    <h2 class="card-title h4">ลงทะเบียนใหม่ สำหรับผู้ดูแลร้านอาหาร (Staff)</h2>
                </div>
                <div class="card-body">
                    <form id="mainForm" method="post" >
                        <!-- field: firstname -->
                        <div class="row mb-4">
                            <label for="firstnameLabel" class="col-sm-3 col-form-label form-label">ชื่อ *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="firstname" id="firstnameLabel" value=""
                                    required />
                            </div>
                        </div>
                        <!-- End field: firstname -->

                        <!-- field: lastname -->
                        <div class="row mb-4">
                            <label for="lastnameLabel" class="col-sm-3 col-form-label form-label">นามสกุล *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="lastname" id="lastnameLabel" value=""
                                    required />
                            </div>
                        </div>
                        <!-- End field: lastname -->

                        <!-- end field: mobile_no -->
                        <div class="row mb-4">
                            <label for="phoneLabel" class="col-sm-3 col-form-label form-label">เบอร์โทรศัพท์
                                *</label>

                            <div class="col-sm-9">
                                <input type="text" class="js-input-mask form-control" name="mobile_no" id="phoneLabel"
                                    value="" required />
                            </div>
                        </div>
                        <!-- end field: mobile_no -->

                        <!-- field: address -->
                        <div class="row mb-4">
                            <label for="addressLine1Label" class="col-sm-3 col-form-label form-label">ที่อยู่
                                *</label>

                            <div class="col-sm-9">
                                <textarea row="4" class="form-control" name="address" id="addressLine1Label"></textarea>
                            </div>
                        </div>
                        <!-- end field: address -->

                        <!-- field: thumbnail -->
                        <div class="row mb-4">
                            <label for="thumbnailLabel"
                                class="col-sm-3 col-form-label form-label">รูปภาพประจำตัว</label>
                            <div class="col-sm-9">
                                <img src="/assets/img/admin_index.png" class="mb-3 w-25">
                                <input type="file" class="form-control" name="thumbnail" value="" required />
                            </div>
                        </div>
                        <!-- end field: thumbnail -->

                        <!-- field: email -->
                        <div class="row mb-4">
                            <label for="emailLabel" class="col-sm-3 col-form-label form-label">อีเมล์ *</label>

                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" id="emailLabel" value=""
                                    required />
                            </div>
                        </div>
                        <!-- end field: email -->

                        <!-- field: password -->
                        <div class="row mb-4">
                            <label for="passwordLabel" class="col-sm-3 col-form-label form-label">รหัสผ่าน</label>

                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password" id="passwordLabel"
                                    value="" />
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
                                <input type="text" class="form-control" name="restaurant_name" id="restaurantNameLabel" value=""
                                    required />
                            </div>
                        </div>
                        <!-- end field: restaurant name -->

                        <!-- field: restaurant type -->
                        <div class="row mb-4">
                            <label for="restaurantTypeLabel" class="col-sm-3 col-form-label form-label">ประเภทร้านอาหาร *</label>

                            <div class="col-sm-9">
                                <select class="form-select" name="restaurant_type" id="restaurantTypeLabel" required>
                                    <option>-- กรุณาเลือกประเภทร้านอาหาร --</option>
                                    <option value="1">อาหารอีสาน</option>
                                    <option value="2">อาหารอินเดีย</option>
                                    <option value="3">อาหารเวียดนาม</option>
                                    <option value="4">อาหารไทย</option>
                                    <option value="5">อาหารนานาชาติ</option>
                                </select>
                            </div>
                        </div>
                        <!-- end field: restaurant type -->

                        <!-- field: restaurant address -->
                        <div class="row mb-4">
                            <label for="restaurantAddressLabel" class="col-sm-3 col-form-label form-label">ที่อยู่ร้านอาหาร
                                *</label>

                            <div class="col-sm-9">
                                <textarea row="4" class="form-control" name="restaurant_address" id="restaurantAddressLabel" required></textarea>
                            </div>
                        </div>
                        <!-- end field: restaurantaddress -->

                        <!-- field: restaurant thumbnail -->
                        <div class="row mb-4">
                            <label for="restaurantThumbnailLabel"
                                class="col-sm-3 col-form-label form-label">รูปภาพร้านอาหาร</label>
                            <div class="col-sm-9">
                                <img src="/assets/img/admin_index.png" class="mb-3 w-25">
                                <input type="file" class="form-control" name="restaurant_thumbnail" value="" required />
                            </div>
                        </div>
                        <!-- end field: restaurant thumbnail -->


                        <!-- submit button -->
                        <div class="row mt-5 mb-4">
                            <label for="levelLabel" class="col-sm-3 col-form-label form-label">.</label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    ลงทะเบียนใหม่
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