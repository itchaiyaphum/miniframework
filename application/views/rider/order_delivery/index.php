<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card mb-5">
                <div class="card-header">
                    <h2 class="card-title h4 text-center">รายการสั่งซื้ออาหารที่รอจัดส่ง</h2>
                </div>
                <div class="card-body">
                    <form id="profileForm" class="needs-validation" method="get">
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label form-label" for="restaurantLabel">เลือกร้านอาหาร</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="restaurant_id" id="restaurantLabel" onchange="this.form.submit()">
                                    <option>--- แสดงทุกร้าน ---</option>
                                    <option value="1">Aka</option>
                                    <option value="2">MK</option>
                                    <option value="3">Fuji</option>
                                    <option value="4">KFC</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mb-5">
                <!-- status: 1 -->
                <div class="border mb-3">
                    <div class="row g-0">
                        <div class="col-6">
                            <div class="text-bg-secondary p-2">ร้าน: เกือบเจ้ง / สั่งซื้อเมื่อ: 2022/12/13 09:00
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-bg-primary p-2 h-100">รอยืนยันการจะจัดส่งอาหาร</div>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-12">
                            <div class="text-bg-light p-2">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/assets/img/admin_index.png" width="100%">
                                    </div>
                                    <div class="col-10">
                                        <h5>ยำสามกรอบ</h5>
                                        <div>x1</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/assets/img/admin_index.png" width="100%">
                                    </div>
                                    <div class="col-10">
                                        <h5>ต้มยำไก่บ้าน</h5>
                                        <div>x1</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/assets/img/admin_index.png" width="100%">
                                    </div>
                                    <div class="col-10">
                                        <h5>ลาบเป็ด</h5>
                                        <div>x1</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-0 border">
                        <div class="col-8">
                            <div class="text-bg-light p-2">
                                <a href="/rider_order_delivery.php?action=accept_order"
                                    class="btn btn-primary">รับรายการสั่งอาหาร</a>
                                <a href="/rider_order_delivery.php?action=customer_detail"
                                    class="btn btn-secondary">แสดงที่อยู่ผู้สั่งอาหาร</a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="p-2 h-100">
                                <h5>ยอดคําสั่งซื้อทั้งหมด:฿600</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- status: 2 -->
                <div class="border  mb-3">
                    <div class="row g-0">
                        <div class="col-6">
                            <div class="text-bg-secondary p-2">ร้าน: เกือบเจ้ง / สั่งซื้อเมื่อ: 2022/12/13 09:00
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-bg-warning p-2 h-100">กำลังนำอาหารไปส่งลูกค้า</div>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-12">
                            <div class="text-bg-light p-2">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/assets/img/admin_index.png" width="100%">
                                    </div>
                                    <div class="col-10">
                                        <h5>ยำสามกรอบ</h5>
                                        <div>x1</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/assets/img/admin_index.png" width="100%">
                                    </div>
                                    <div class="col-10">
                                        <h5>ต้มยำไก่บ้าน</h5>
                                        <div>x1</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/assets/img/admin_index.png" width="100%">
                                    </div>
                                    <div class="col-10">
                                        <h5>ลาบเป็ด</h5>
                                        <div>x1</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-0 border">
                        <div class="col-8">
                            <div class="text-bg-light p-2">
                                <a href="/rider_order_delivery.php?action=accept_order"
                                    class="btn btn-primary">ยืนยันการชำระเงินและการส่งอาหารเสร็จสิ้น</a>
                                <a href="/rider_order_delivery.php?action=customer_detail"
                                    class="btn btn-secondary">แสดงที่อยู่ผู้สั่งอาหาร</a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="p-2 h-100">
                                <h5>ยอดคําสั่งซื้อทั้งหมด:฿600</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- status: 3 -->
                <div class="border  mb-3">
                    <div class="row g-0">
                        <div class="col-6">
                            <div class="text-bg-secondary p-2">ร้าน: เกือบเจ้ง / สั่งซื้อเมื่อ: 2022/12/13 09:00
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-bg-success p-2 h-100">การชำระเงินและการส่งอาหารเสร็จสิ้นแล้ว</div>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-12">
                            <div class="text-bg-light p-2">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/assets/img/admin_index.png" width="100%">
                                    </div>
                                    <div class="col-10">
                                        <h5>ยำสามกรอบ</h5>
                                        <div>x1</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/assets/img/admin_index.png" width="100%">
                                    </div>
                                    <div class="col-10">
                                        <h5>ต้มยำไก่บ้าน</h5>
                                        <div>x1</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/assets/img/admin_index.png" width="100%">
                                    </div>
                                    <div class="col-10">
                                        <h5>ลาบเป็ด</h5>
                                        <div>x1</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-0 border">
                        <div class="col-8">
                            <div class="text-bg-light p-2"></div>
                        </div>
                        <div class="col-4">
                            <div class="p-2 h-100">
                                <h5>ยอดคําสั่งซื้อทั้งหมด:฿600</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>