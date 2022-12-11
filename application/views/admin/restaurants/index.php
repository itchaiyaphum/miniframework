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
                            <h2>รออนุมัติ</h2>
                            <div class="row">
                                <?php
                                for ($i = 0; $i < count($this->data['items']); ++$i) {
                                    $item = $this->data['items'][$i];
                                    $approve_link = "/admin_restaurants.php?action=approve&id={$item['id']}";

                                    if ($item['status'] != 0) {
                                        continue;
                                    }
                                    ?>
                                <div class="col-4">
                                    <div class="card mb-4">
                                        <img src="<?php echo $item['restaurant_thumbnail']; ?>" width="100%"
                                            class="card-img-top">
                                        <div class="card-body text-center">
                                            <h5 class="card-title"><?php echo $item['restaurant_name']; ?></h5>
                                            <a href="<?php echo $approve_link; ?>" class="btn btn-primary">อนุมัติ</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
            ?>
                            </div>

                            <br /><br />
                            <h2>อนุมัติแล้ว</h2>
                            <div class="row">
                                <?php
                                for ($i = 0; $i < count($this->data['items']); ++$i) {
                                    $item = $this->data['items'][$i];
                                    $cancel_link = "/admin_restaurants.php?action=cancel&id={$item['id']}";

                                    if ($item['status'] != 1) {
                                        continue;
                                    }
                                    ?>
                                <div class="col-4">
                                    <div class="card mb-4">
                                        <img src="<?php echo $item['restaurant_thumbnail']; ?>" width="100%"
                                            class="card-img-top">
                                        <div class="card-body text-center">
                                            <h5 class="card-title"><?php echo $item['restaurant_name']; ?></h5>
                                            <a href="<?php echo $cancel_link; ?>" class="btn btn-danger">ยกเลิก</a>
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