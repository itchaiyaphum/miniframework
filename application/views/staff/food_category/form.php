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
                <form id="mainForm"  method="post" >
                    <div class="page-header mt-3">
                        <div class="d-flex justify-content-between">
                            <h1>หมวดหมู่อาหาร [แก้ไข]</h1>
                            <div>
                                <a class="btn btn-outline-secondary align-self-end mb-2"
                                    href="/staff_food_category.php">
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
                                    <label for="titleLabel" class="col-sm-3 col-form-label form-label">ประเภทร้านอาหาร *
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title" id="titleLabel"
                                            value="<?php echo array_value($this->data['item'], 'title'); ?>" required />
                                    </div>
                                </div>
                                <!-- End field: title -->

                                <input type="hidden" name="id" value="<?php echo array_value($this->data['item'], 'id', 0); ?>" />
                        </div>
                    </div>
                </form>
            </div>
            <!-- end: main content -->
        </div>
    </div>
</main>