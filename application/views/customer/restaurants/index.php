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
                                        <h4>แสดงร้านอาหารทั้งหมด</h4>
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
                                if (count($this->data['items']) <= 0) {
                                    echo '<h6 class="text-center p-4">ไม่มีข้อมูลสำหรับแสดงผล...</h6>';
                                } else {
                                    for ($i = 0; $i < count($this->data['items']); ++$i) {
                                        $item = $this->data['items'][$i];
                                        $detail_link = "/customer_restaurants.php?action=detail&id={$item['id']}";
                                        ?>
                                <div class="col-4">
                                    <div class="card mb-4">
                                        <a href="<?php echo $detail_link; ?>"><img
                                                src="<?php echo $item['restaurant_thumbnail']; ?>" width="100%"
                                                class="card-img-top"></a>
                                        <div class="card-body text-center">
                                            <h5 class="card-title"><a
                                                    href="<?php echo $detail_link; ?>"><?php echo $item['restaurant_name']; ?></a>
                                            </h5>
                                            <h5 class="card-title">(<?php echo $item['restaurant_type_name']; ?>)</h5>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
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