<main>
    <div class="container">
        <form id="mainForm" method="post">
            <div class="mb-5 mt-3">
                <h2 class="text-center">ใบเสร็จรับเงิน</h2>
                <div class="border mb-3 p-4 text-bg-light">
                    <div class="text-center fw-bold fs-5 text-decoration-underline">ข้อมูลร้านค้า</div>
                    <div>บริษัท ทินิคอร์น จํากัด (TINICORN CO.,LTD.)</div>
                    <div>096-520-7008 / support@phalconhost.com</div>
                    <div>18/116 ซอยสุขสวัสดิ์ 30 แยก 8-2 แขวงบางปะกอก เขตราษฎร์บูรณะ กรุงเทพมหานคร 10140</div>
                </div>

                <div class="border mb-3 p-4 text-bg-light">
                    <div class="text-center fw-bold fs-5 text-decoration-underline">ข้อมูลลูกค้า</div>
                    <div>AODTO WK</div>
                    <div>096-520-7008 / aodto.wk@gmail.com</div>
                    <div>18/116 ซอยสุขสวัสดิ์ 30 แยก 8-2 แขวงบางปะกอก เขตราษฎร์บูรณะ กรุงเทพมหานคร 10140</div>
                </div>

                <div>รหัสการสั่งซื้อ #1</div>
                <div>วันที่ซื้อ: 2022/12/13</div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">รายการอาหาร</th>
                        <th scope="col">ราคาต่อชิ้น</th>
                        <th scope="col">
                            จำนวน</th>
                        <th scope="col">ราคารวม</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                for ($i = 0; $i < 3; ++$i) {
                    ?>
                    <tr>
                        <td>ยำสามกรอบ</td>
                        <td>
                            <div>
                                <span class="text-decoration-line-through text-danger">100</span>
                                <span>90</span>
                            </div>
                        </td>
                        <td>1</td>
                        <td>90</td>
                    </tr>
                    <?php
                }
                    ?>
                </tbody>
            </table>
            <div class="fs-4 fw-bold text-center">ยอดรวมทั้งหมด: 400 บาท</div>
        </form>
    </div>
    <!-- end: main content -->

    <script type="text/javascript">
    // popup for printing
    (function() {
        window.print()
    })();
    </script>

</main>