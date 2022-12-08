<main>
    <div class="container">
        <div class="row">
            <!-- start: left menu -->
            <?php echo $this->data['left_menu']; ?>
            <!-- end: left menu -->

            <!-- start: main content -->
            <div class="col-lg-9">
                <div class="page-header mt-3">
                    <div class="d-flex justify-content-between">
                        <h1>จัดการร้านอาหาร (Restaurants)</h1>
                    </div>
                </div>
                <form id="adminForm" method="post">
                    <div class="card mb-3" id="mainSection">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 col-sm-5 mb-2">
                                    <?php echo admin_filter_search_html('filter_search'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h2>รออนุมัติ (5 ร้าน)</h2>
                            <div class="row">
                                <?php
                                for ($i = 0; $i < 5; ++$i) {
                                    ?>
                                <div class="col-4">
                                    <div class="card mb-4">
                                        <img src="/assets/img/admin_index.png" width="100%" class="card-img-top">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">ร้านไข่ต้ม <?php echo $i + 1; ?></h5>
                                            <p class="card-text">(อาหารอีสาน)</p>
                                            <a href="#" class="btn btn-primary">อนุมัติ</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
            ?>
                            </div>

                            <br /><br />
                            <h2>อนุมัติแล้ว (5 ร้าน)</h2>
                            <div class="row">
                                <?php
            for ($i = 0; $i < 5; ++$i) {
                ?>
                                <div class="col-4">
                                    <div class="card mb-4">
                                        <img src="/assets/img/admin_index.png" width="100%" class="card-img-top">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Fuji <?php echo $i + 1; ?></h5>
                                            <p class="card-text">(อาหารญี่ปุ่น)</p>
                                            <a href="#" class="btn btn-danger">ยกเลิก</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
            }
            ?>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="filter_status" value="all" />
                </form>
            </div>
            <!-- end: main content -->
        </div>
    </div>
</main>