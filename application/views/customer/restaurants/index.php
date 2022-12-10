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

                <form id="mainForm" method="post">
                    <div class="card mt-3 mb-3" id="mainSection">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 col-sm-5 mb-2">
                                    <div class="d-flex align-items-center">
                                        <h4>แสดงร้านอาหารทั้งหมด (5)</h4>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-7 mb-2">
                                    <?php echo admin_filter_search_html('filter_search'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php
                                for ($i = 0; $i < 5; ++$i) {
                                    $link_detail = '/customer_restaurants.php?action=detail';
                                    ?>
                                <div class="col-4">
                                    <div class="card mb-4">
                                        <a href="<?php echo $link_detail; ?>"><img src="/assets/img/admin_index.png"
                                                width="100%" class="card-img-top"></a>
                                        <div class="card-body text-center">
                                            <h5 class="card-title"><a href="<?php echo $link_detail; ?>">ร้านไข่ต้ม
                                                    <?php echo $i + 1; ?></a></h5>
                                            <p class="card-text">(อาหารอีสาน)</p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                    ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end: main content -->
        </div>
    </div>
</main>