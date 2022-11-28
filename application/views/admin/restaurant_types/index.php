<main>
    <div class="container">
        <div class="row">
            <!-- start: left menu -->
            <?php echo $this->data['left_menu']; ?>
            <!-- end: left menu -->

            <!-- start: main content -->
            <div class="col-lg-9">
                <!-- start: breadcrumb -->
                <div class="page-header mt-3">
                    <div class="d-flex justify-content-between">
                        <h1>จัดการประเภทร้านอาหาร (Restaurant Types)</h1>
                        <!--
                        <a class="btn btn-primary align-self-end" href="/admin_users_edit.php?id=0">
                            <i class="bi-person-plus-fill me-1"></i> เพิ่มผู้ใช้งาน
                        </a>
                        -->
                    </div>
                </div>
                <!-- end: breadcrumb -->
                <form id="adminForm" method="post">
                    <div class="card mb-3" id="adminSection">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 col-sm-5 mb-2">
                                    <?php echo admin_filter_search_html('filter_search'); ?>
                                </div>
                                <div class="col-12 col-sm-7">
                                    <div class="d-flex justify-content-end">
                                        <?php echo admin_filter_status_html('filter_status'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="row d-none d-md-flex">
                                    <div class="col-1"><strong>#</strong></div>
                                    <div class="col-6"><strong>ประเภทร้านอาหาร</strong></div>
                                    <div class="col-1"><strong>สถานะ</strong></div>
                                    <div class="col-2"><strong>-</strong></div>
                                </div>
                                <hr />
                                <?php
            if (!empty($this->data['items']) <= 0) {
                echo '<div class="text-center">ไม่มีข้อมูล</div><br/><hr/>';
            } else {
                $n = count($this->data['items']);
                for ($i = 0; $i < $n; ++$i) {
                    $row = &$this->data['items'][$i];

                    $per_page = $this->input->get_post('per_page', 1);
                    $link_edit = base_url('/admin_restaurant_types.php?action=edit&id='.$row['id'].'&per_page='.$per_page);
                    $link_restore = base_url('/admin_restaurant_types.php?action=restore&id='.$row['id'].'&per_page='.$per_page);
                    $link_trash = base_url('/admin_restaurant_types.php?action=trash&id='.$row['id'].'&per_page='.$per_page);
                    $link_delete = base_url('/admin_restaurant_types.php?action=delete&id='.$row['id'].'&per_page='.$per_page);

                    $status_link = base_url('/admin_restaurant_types.php?action=unpublish&id='.$row['id'].'&per_page='.$per_page);
                    if ($row['status'] == 0) {
                        $status_link = base_url('/admin_restaurant_types.php?action=publish&id='.$row['id'].'&per_page='.$per_page);
                    } ?>
                                <div class="row gy-2">
                                    <div class="col-12 col-md-1">
                                        <div class="d-flex">
                                            <span class="d-md-none w-50">ลำดับที่: </span>
                                            <div><?php echo get_pagination_index($i + 1); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="d-flex">
                                            <span class="d-md-none w-50">ประเภทร้านอาหาร:</span>
                                            <div>
                                                <div class="d-block"><?php echo $row['title']; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-1">
                                        <div class="d-flex">
                                            <span class="d-md-none w-50">สถานะ: </span>
                                            <a
                                                href="<?php echo $status_link; ?>"><?php echo get_status_icon($row['status']); ?></a>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="d-flex">
                                            <span class="d-md-none w-50">แก้ไข: </span>
                                            <a class="btn btn-sm btn-outline-secondary me-2" title="แก้ไขข้อมูล"
                                                href="<?php echo $link_edit; ?>"><i class="bi-pen"></i></a>
                                            <?php
                                            if (get_filter_status('filter_status') == 'trash') {
                                                ?>
                                            <a class="btn btn-sm btn-outline-primary me-2" title="กู้คืนข้อมูล"
                                                href="<?php echo $link_restore; ?>"><i class="bi-reply"></i></a>
                                            <a class="btn btn-sm btn-outline-danger" title="ลบข้อมูลถาวร"
                                                href="<?php echo $link_delete; ?>"><i class="bi-x-circle"></i></a>
                                            <?php
                                            } else {?>
                                            <a class="btn btn-sm btn-outline-secondary" title="ลบข้อมูลลงถังขยะ"
                                                href="<?php echo $link_trash; ?>"><i class="bi-trash"></i></a>
                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>
                                <hr />
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