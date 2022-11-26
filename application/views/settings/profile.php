   <div class="container">
       <!-- start: breadcrumb -->
       <div class="page-header mt-3">
           <div class="row align-items-end">
               <div class="col-sm mb-2 mb-sm-0">
                   <nav aria-label="breadcrumb">
                       <ol class="breadcrumb breadcrumb-no-gutter">
                           <li class="breadcrumb-item">
                               <a class="breadcrumb-link" href="/">หน้าหลัก</a>
                           </li>
                           <li class="breadcrumb-item active" aria-current="page">
                               การตั้งค่า
                           </li>
                       </ol>
                   </nav>
                   <h1 class="page-header-title">ข้อมูลโปรไฟล์</h1>
               </div>
               <div class="col-sm-auto">
                   <a class="btn btn-primary" href="/profile">
                       <i class="bi-person-fill me-1"></i> โปรไฟล์ของฉัน
                   </a>
               </div>
           </div>
       </div>
       <!-- end: breadcrumb -->

       <div class="row">
           <!-- start: left menu -->
           <?php echo $this->data['left_menu']; ?>
           <!-- end: left menu -->

           <!-- start: main content -->
           <div class="col-lg-9">
               <?php echo validation_errors(); ?>
               <?php echo action_messages(); ?>
               <div class="card mb-5">
                   <div class="card-header">
                       <h2 class="card-title h4">แก้ไขข้อมูลส่วนตัว</h2>
                   </div>
                   <div class="card-body">
                       <form id="editProfileForm" class="needs-validation" method="post" novalidate>
                           <!-- field: firstname -->
                           <div class="row mb-4">
                               <label for="firstnameLabel" class="col-sm-3 col-form-label form-label">ชื่อ *</label>
                               <div class="col-sm-9">
                                   <input type="text" class="form-control" name="firstname" id="firstnameLabel"
                                       value="<?php echo $this->data['profile']->firstname; ?>" required />
                               </div>
                           </div>
                           <!-- End field: firstname -->

                           <!-- field: lastname -->
                           <div class="row mb-4">
                               <label for="lastnameLabel" class="col-sm-3 col-form-label form-label">นามสกุล *</label>
                               <div class="col-sm-9">
                                   <input type="text" class="form-control" name="lastname" id="lastnameLabel"
                                       value="<?php echo $this->data['profile']->lastname; ?>" required />
                               </div>
                           </div>
                           <!-- End field: lastname -->

                           <!-- field: address -->
                           <div class="row mb-4">
                               <label for="addressLine1Label" class="col-sm-3 col-form-label form-label">ที่อยู่
                                   *</label>

                               <div class="col-sm-9">
                                   <input type="text" class="form-control" name="address" id="addressLine1Label"
                                       value="<?php echo $this->data['profile']->address; ?>" required />
                               </div>
                           </div>
                           <!-- end field: address -->

                           <!-- field: province -->
                           <div class="row mb-4">
                               <label for="provinceLabel" class="col-sm-3 col-form-label form-label">จังหวัด *</label>

                               <div class="col-sm-9">
                                   <select class="form-select" name="province_id" id="provinceLabel" required>
                                       <option>--- เลือกจังหวัด ---</option>
                                       <?php
                                        for ($i = 0; $i < count($this->data['provinces']); ++$i) {
                                            $province = $this->data['provinces'][$i];
                                            $selected = ($province['id'] == $this->data['profile']->province_id) ? 'selected' : '';
                                            echo "<option value='{$province['id']}' {$selected}>{$province['province_name']}</option>";
                                        }?>
                                   </select>
                               </div>
                           </div>
                           <!-- end field: province -->

                           <!-- field: zip_code -->
                           <div class="row mb-4">
                               <label for="zipCodeLabel" class="col-sm-3 col-form-label form-label">รหัสไปรษณีย์ *<i
                                       class="bi-question-circle text-body ms-1"></i></label>

                               <div class="col-sm-9">
                                   <input type="text" class="js-input-mask form-control" id="zipCodeLabel"
                                       value="<?php echo $this->data['profile']->zip_code; ?>" name="zip_code"
                                       required />
                               </div>
                           </div>
                           <!-- end field: zip_code -->

                           <!-- field: email -->
                           <div class="row mb-4">
                               <label for="emailLabel" class="col-sm-3 col-form-label form-label">อีเมล์ *</label>

                               <div class="col-sm-9">
                                   <input type="email" class="form-control" name="email" id="emailLabel"
                                       value="<?php echo $this->data['profile']->email; ?>" required />
                               </div>
                           </div>
                           <!-- end field: email -->

                           <!-- end field: mobile_no -->
                           <div class="row mb-4">
                               <label for="phoneLabel" class="col-sm-3 col-form-label form-label">เบอร์โทรศัพท์
                                   *</label>

                               <div class="col-sm-9">
                                   <input type="text" class="js-input-mask form-control" name="mobile_no"
                                       id="phoneLabel" value="<?php echo $this->data['profile']->mobile_no; ?>"
                                       required />
                               </div>
                           </div>
                           <!-- end field: mobile_no -->

                           <!-- submit button -->
                           <div class="row mb-4">
                               <label for="levelLabel" class="col-sm-3 col-form-label form-label">.</label>
                               <div class="col-sm-9">
                                   <button type="submit" class="btn btn-primary btn-lg">
                                       บันทึกข้อมูล
                                   </button>
                               </div>
                           </div>
                           <!-- end: submit button -->

                           <input type="hidden" name="id" value="<?php echo $this->data['profile']->id; ?>" />
                       </form>
                   </div>
               </div>
           </div>
           <!-- end: main content -->
       </div>
   </div>