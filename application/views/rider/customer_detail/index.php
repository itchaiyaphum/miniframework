<main>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-3">
                <div class="card mb-3 mt-3 d-none d-sm-flex">
                    <!-- start: left menu -->
                    <?php echo $this->data['left_menu']; ?>
                    <!-- end: left menu -->
                </div>
            </div>

            <div class="col-lg-9 mt-3">
                <div class="card mb-5">
                    <div class="card-header">
                        <h2 class="card-title h4">แสดงข้อมูลผู้สั่งอาหาร</h2>
                    </div>
                    <div class="card-body">
                        <form id="mainForm">
                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label form-label">ชื่อ-นามสกุล</label>
                                <div class="col-sm-9">
                                    <div class="form-control"><?php echo $this->data['customer_detail']->firstname.' '.$this->data['customer_detail']->lastname; ?></div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label form-label">เบอร์โทร</label>
                                <div class="col-sm-9">
                                    <div class="form-control"><?php echo $this->data['customer_detail']->mobile_no; ?></div>
                                </div>
                            </div>

                            <!-- field: address -->
                            <div class="row mb-4">
                                <label for="addressLine1Label"
                                    class="col-sm-3 col-form-label form-label">ที่อยู่</label>
                                <div class="col-sm-9">
                                    <div class="form-control">
                                    <?php echo $this->data['customer_detail']->address; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- end field: address -->

                            <!-- field: thumbnail -->
                            <div class="row mb-4">
                                <label for="thumbnailLabel"
                                    class="col-sm-3 col-form-label form-label">รูปภาพประจำตัว</label>
                                <div class="col-sm-9">
                                    <img src="<?php echo $this->data['customer_detail']->thumbnail; ?>" class="mb-3 w-25">
                                </div>
                            </div>
                            <!-- end field: thumbnail -->
                        </form>
                        <hr />
                        <div class="text-center">
                            <a href="/rider_order_delivery.php" class="btn btn-primary">กลับหน้า
                                รายการสั่งอาหารที่รอจัดส่ง</a>
                        </div>
                    </div><!-- end: card-body -->
                </div><!-- end: card -->
            </div>
        </div>
    </div>
</main>