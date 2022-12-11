<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="card mb-3 mt-3 d-none d-sm-flex">
                    <!-- start: left menu -->
                    <?php echo $this->data['left_menu']; ?>
                    <!-- end: left menu -->
                </div>
            </div>
            <!-- start: main content -->
            <div class="col-lg-9">
                <!-- start: page header -->
                <form id="adminForm" method="post" enctype="multipart/form-data">
                    <div class="page-header mt-3">
                        <div class="d-flex justify-content-between">
                            <h1>รายการอาหาร
                                [<?php echo (array_value($this->data['item'], 'id', 0) == 0) ? 'เพิ่ม' : 'แก้ไข'; ?>]
                            </h1>
                            <div>
                                <a class="btn btn-outline-secondary align-self-end mb-2" href="/staff_food_menus.php">
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
                            <!-- field: title -->
                            <div class="row mb-4">
                                <label for="titleLabel" class="col-sm-3 col-form-label form-label">ชื่ออาหาร *
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="title" id="titleLabel"
                                        value="<?php echo array_value($this->data['item'], 'title'); ?>" required />
                                </div>
                            </div>
                            <!-- End field: title -->
                            <!-- field: food_category_id -->
                            <div class="row mb-4">
                                <label for="foodCategoryIdLabel"
                                    class="col-sm-3 col-form-label form-label">หมวดหมู่อาหาร *</label>

                                <div class="col-sm-9">
                                    <select class="form-select" name="food_category_id" id="foodCategoryIdLabel"
                                        required>
                                        <option value="0">-- กรุณาเลือกหมวดหมู่อาหาร --</option>
                                        <?php
                                    for ($i = 0; $i < count($this->data['food_categories']); ++$i) {
                                        $row = $this->data['food_categories'][$i];
                                        ?>
                                        <option value="<?php echo $row['id']; ?>"
                                            <?php echo ($row['id'] == array_value($this->data['item'], 'food_category_id')) ? 'selected' : ''; ?>>
                                            <?php echo $row['title']; ?></option>
                                        <?php
                                    }?>
                                    </select>
                                </div>
                            </div>
                            <!-- end field: restaurant type -->

                            <!-- field: price -->
                            <div class="row mb-4">
                                <label for="priceLabel" class="col-sm-3 col-form-label form-label">ราคาอาหาร *
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="price" id="priceLabel"
                                        value="<?php echo array_value($this->data['item'], 'price'); ?>" required />
                                </div>
                            </div>
                            <!-- End field: price -->

                            <!-- field: discount_percent -->
                            <div class="row mb-4">
                                <label for="discountPercentLabel" class="col-sm-3 col-form-label form-label">ส่วนลดราคาอาหาร (%)
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="discount_percent" id="discountPercentLabel"
                                        value="<?php echo array_value($this->data['item'], 'discount_percent'); ?>" required />
                                </div>
                            </div>
                            <!-- End field: discount_percent -->


                            <!-- field: thumbnail -->
                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label form-label">รูปภาพประกอบ
                                </label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="thumbnail" />
                                    <img src="<?php echo array_value($this->data['item'], 'thumbnail'); ?>"
                                        class="w-50 mt-2">
                                </div>
                            </div>
                            <!-- End field: thumbnail -->

                            <input type="hidden" name="id"
                                value="<?php echo array_value($this->data['item'], 'id', 0); ?>" />
                        </div>
                    </div>
                </form>
            </div>
            <!-- end: main content -->
        </div>
    </div>
</main>