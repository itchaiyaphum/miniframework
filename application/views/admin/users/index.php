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
                        <h1>จัดการสมาชิกทั้งหมด</h1>
                        <!--
                        <a class="btn btn-primary align-self-end" href="/admin_users_edit.php?id=0">
                            <i class="bi-person-plus-fill me-1"></i> เพิ่มผู้ใช้งาน
                        </a>
                        -->
                    </div>
                </div>
                <!-- end: breadcrumb -->
                <form id="adminForm" method="post">
                    <div class="card mb-3" id="passwordSection">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 col-sm-5 mb-2">
                                    <?php echo admin_filter_search_html('users_filter_search'); ?>
                                </div>
                                <div class="col-12 col-sm-7">
                                    <div class="d-flex justify-content-end">
                                        <select class="form-select me-2" name="users_filter_user_type"
                                            onchange="this.form.submit();">
                                            <option value="">- เลือกประเภทผู้ใช้งาน -</option>
                                            <option value="customer"
                                                <?php echo set_select('users_filter_user_type', 'customer'); ?>>ลูกค้า
                                                (Customer)</option>
                                            <option value="rider"
                                                <?php echo set_select('users_filter_user_type', 'rider'); ?>>ผู้ส่งอาหาร
                                                (Rider)</option>
                                            <option value="staff"
                                                <?php echo set_select('users_filter_user_type', 'staff'); ?>>
                                                ผู้ดูแลร้านอาหาร (Staff)</option>
                                            <option value="admin"
                                                <?php echo set_select('users_filter_user_type', 'admin'); ?>>ผู้ดูแลระบบ
                                                (Admin)</option>
                                        </select>

                                        <?php echo admin_filter_status_html('users_filter_status'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="row d-none d-md-flex">
                                    <div class="col-1"><strong>#</strong></div>
                                    <div class="col-4"><strong>ชื่อ-นามสกุล</strong></div>
                                    <div class="col-2"><strong>ประเภทผู้ใช้</strong></div>
                                    <div class="col-2"><strong>Login as owner</strong></div>
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
                    $link_edit = base_url('/admin_users.php?action=save&id='.$row['id'].'&per_page='.$per_page);
                    $link_restore = base_url('/admin_users.php?action=restore&id='.$row['id'].'&per_page='.$per_page);
                    $link_trash = base_url('/admin_users.php?action=trash&id='.$row['id'].'&per_page='.$per_page);
                    $link_delete = base_url('/admin_users.php?action=delete&id='.$row['id'].'&per_page='.$per_page);
                    $link_bypass = base_url('/admin_users.php?action=bypass&id='.$row['id'].'&per_page='.$per_page);

                    $status_link = base_url('/admin_users.php?action=unpublish&id='.$row['id'].'&per_page='.$per_page);
                    if ($row['status'] == 0) {
                        $status_link = base_url('/admin_users.php?action=publish&id='.$row['id'].'&per_page='.$per_page);
                    } ?>
                                <div class="row gy-2">
                                    <div class="col-12 col-md-1">
                                        <div class="d-flex">
                                            <span class="d-md-none w-50">ลำดับที่: </span>
                                            <div><?php echo get_pagination_index($i + 1); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="d-flex">
                                            <span class="d-md-none w-50">ชื่อ-นามสกุล:<br />อีเมล์:</span>
                                            <div>
                                                <div class="d-block"><?php echo $row['firstname']; ?>
                                                    <?php echo $row['lastname']; ?></div>
                                                <div class="d-block"><?php echo $row['email']; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="d-flex">
                                            <span class="d-md-none w-50">ประเภทผู้ใช้:
                                            </span><?php echo $row['user_type']; ?>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="d-flex">
                                            <span class="d-md-none w-50">login as owner: </span>
                                            <a class="btn btn-sm btn-outline-secondary"
                                                href="<?php echo $link_bypass; ?>">bypass</a>
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
                                            <a class="btn btn-sm btn-outline-secondary me-2"
                                                href="<?php echo $link_edit; ?>"><i class="bi-pen"></i></a>
                                            <?php
                                            if (get_filter_status('users_filter_status') == 'trash') {
                                                ?>
                                            <a class="btn btn-sm btn-outline-primary me-2"
                                                href="<?php echo $link_restore; ?>"><i class="bi-reply"></i></a>
                                            <a class="btn btn-sm btn-outline-danger"
                                                href="<?php echo $link_delete; ?>"><i class="bi-x-circle"></i></a>
                                            <?php
                                            } else {?>
                                            <a class="btn btn-sm btn-outline-secondary"
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