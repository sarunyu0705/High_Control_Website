<?php
require_once "../config.php";
session_start();
if (isset($_SESSION['no']) && isset($_SESSION['admin_user'])) {
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $deletestmt = $conn->query("DELETE FROM product WHERE product_id = $delete_id");
    $deletestmt->execute();

    if ($deletestmt) {
        echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว');</script>";
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อยแล้ว";
        header("refresh:1; url=product_fav1.php");
    }
}

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../../Login.php');
}
?>
<!------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Link CSS File -->
    <link rel="stylesheet" href="../../css/vertical_navbar.css">
    <link rel="stylesheet" href="../../css/vartical_nav_list.css">
    <link rel="stylesheet" href="../../css/colors.css">
    <link rel="stylesheet" href="../../css/responesive.css">
    <link rel="stylesheet" href="../../css/text_overflow.css">
    <link rel="stylesheet" href="../../css/aligment_&_padding.css">
    <link rel="stylesheet" href="../../css/aligment_&_padding.css">
    <link rel="stylesheet" href="../../css/allpage.css">
    <!-- Titel name & img -->
    <title>airpumphc.com จำหน่าย ปั๊มน้ำ เครื่องเติมอากาศ ถังแรงดัน มอเตอร์ไฟฟ้า</title>
    <link rel="icon" type="image/x-icon" href="/image/Logo.png">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400&display=swap" rel="stylesheet">
    <!-- font -->
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <div class="mt-5">
        <!-- Navbar ของ บัญชี -->
        <nav class="navbar navbar-expand-md navbar-dark bg_color_nav2">
            <div class="container-fluid">
                <a class="navbar-brand" href="../Login_system/homepage.php">
                    <h4> เว็บไซต์จัดการฐานข้อมูล </h4>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    </ul>
                    <h4>ยินดีต้อนรับ : " <?php echo $_SESSION['username']; ?> "</h4>&nbsp;&nbsp;
                    <a href="../Login_system/logout.php"><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="">ออกจากระบบ</button></a>
                </div>
            </div>
        </nav>
        <!-- Navbar ของ เมนูหน้าต่างๆ -->
        <nav class="navbar navbar-expand-sm navbar-dark bg_color_nav2">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item me-5">
                        <a class="nav-link active" aria-current="page" href="../Login_system/homepage.php">จัดการข้อมูลสินค้า</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link" href="../manage_portfolio/portfolio_table.php">จัดการผลงานบริษัท</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link" href="../manage_news/news_table.php">จัดการกระทู้ข่าวสาร</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link" href="https://airpumphc.com/phpmyadmin/">ฐานข้อมูลระบบ (phpmyadmin DB)</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- Modal เพิ่มสินค้า-->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลสินค้า</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../manage_pd/add_product.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="product_id" class="col-form-label">รหัสสินค้า</label>
                            <input type="text" require class="form-control" name="product_id">
                        </div>
                        <div class="mb-3">
                            <label for="product_type" class="col-form-label">ประเภทสินค้า</label>
                            <select require class="form-select form-control" aria-label="Default select example" name="product_type">
                                <option value="กรุณาเลือกประเภทสินค้า" selected>--- กรุณาเลือกประเภทสินค้า ---</option>
                                <option value="Roots Blower">Roots Blower (รูท โบว์เวอร์)</option>
                                <option value="Ring Blower">Ring Blower (ริง โบว์เวอร์)</option>
                                <option value="Turbo Blower">Turbo Blower (เทอร์โบว์ โบว์เวอร์)</option>
                                <option value="Air Pumps">Air Pumps (เครื่องเติมอากาศ)</option>
                                <option value="Centrifugal Pumps">Centrifugal Pumps(ปั๊มหอยโข่ง)</option>
                                <option value="Chemical & Gear Pumps">Chemical & Gear Pumps (ปั๊มสูบเคมีและน้ำมัน)</option>
                                <option value="Submersible Pumps">Submersible (ซับมิสซิเบิ้ล ปั๊ม)</option>
                                <option value="Areator Pumps">Areator (แอร์เรียลเตอร์ ปั๊ม)</option>
                                <option value="Ejector Pumps">Ejector (อีเจ็ทเตอร์ ปั๊ม)</option>
                                <option value="Pressure Diaphragm Tank">Pressure Tank (ถังแรงดัน)</option>
                                <option value="Gear Motor">Gear Motor (มอเตอร์เกียร์ & มอเตอร์ไฟฟ้า)</option>
                                <option value="Control Panel">Control Panel (ตู้ควบคุม)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="product_brand" class="col-form-label">แบรนด์สินค้า</label>
                            <input type="text" require class="form-control" name="product_brand">
                        </div>
                        <div class="mb-3">
                            <label for="product_model" class="col-form-label">รุ่นสินค้า</label>
                            <input type="text" require class="form-control" name="product_model">
                        </div>
                        <div class="mb-3">
                            <label for="product_category" class="col-form-label">จำแนกหมวดหมู่</label>
                            <select require class="form-select form-control" aria-label="Default select example" name="product_category">
                                <option value="ทั่วไป" selected>ทั่วไป</option>
                                <option value="รายการโปรดที่ 1">สินค้ารายการโปรดที่ 1</option>
                                <option value="รายการโปรดที่ 2">สินค้ารายการโปรดที่ 2</option>
                                <option value="รายการโปรดที่ 3">สินค้ารายการโปรดที่ 3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="product_detail" class="col-form-label">รายละเอียดสินค้า</label>
                            <input type="text" require class="form-control" name="product_detail">
                        </div>
                        <div class="mb-3">

                        </div>
                        <div class="mb-3">
                            <label for="img" class="col-form-label">รูปสินค้า</label>
                            <input type="file" require class="form-control" id="imgInput" name="img">
                            <img id="previewImg" width="100%" alt="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                            <button type="submit" name="submit" class="btn btn-primary">อัพเดทข้อมูล</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal หรือเรียกอีกชื่อว่า Dialog -->
    <!--  -->
    <div class="container mt-5">
        <div class="row">
            <h2>สามารถแก้ไข เพิ่ม ลบ ข้อมูลสินค้า</h2>
            <div class="col-md-6">
                <h2>ฐานข้อมูลสินค้ารายการโปรดที่ 1</h2>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal">เพิ่มข้อมูลสินค้า</button>
            </div>
        </div>
        <hr>
        <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-danger">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php } ?>
        <!------------------------------------------ Table Data ------------------------------------------>

        <!-- *********************************************************************************************** -->
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-2">
            <ul id="ul_navlist" class="col text_center padding_top">
                <p id="padding_nav_brand" class="font_size_main bg_color_nav2"><b>รายการโปรด</b></p>
                <li class="li_navlist"><a class="active" href="./product_fav1.php">รายการโปรด 1 <br> (Favorite 1)</a></li>
                <li class="li_navlist"><a href="./product_fav2.php">รายการโปรด 2 <br> (Favorite 2)</a></li>
                <li class="li_navlist"><a href="../../php/manage_pd/product_fav3.php">รายการโปรด 3 <br> (Favorite 3)</a></li>
                <p id="padding_nav_brand" class="font_size_main bg_color_nav2"><b>หมวดหมู่สินค้า </b></p>
                <li class="li_navlist"><a href="product_rb.php">เครื่องเติมอากาศ <br> (Roots Blower)</a></li>
                <li class="li_navlist"><a href="product_r&tb.php">เครื่องเติมอากาศ <br> (Ring & Turbo
                        Blower)</a></li>
                <li class="li_navlist"><a href="product_ap.php">เครื่องเติมอากาศ <br> (Air Pumps)</a></li>
                <li class="li_navlist"><a href="product_cp.php">ปั้มน้ำ <br> (Centrifugal Pumps)</a>
                </li>
                <li class="li_navlist"><a href="product_cg.php">ปั้มสูบเคมีและน้ำมัน<br>(Chemical &
                        Gear pumps)</a>
                </li>
                <li class="li_navlist"><a href="product_sp.php">ปั้มจุ่ม <br> (SUBMERSIBLE PUMPS &
                        AERATOR PUMPS & EJECTOR PUMPS)</a>
                </li>
                <li class="li_navlist"><a href="product_pdt.php">ถังแรงดัน <br> (PRESSURE DIAPHARGM TANK)</a>
                </li>
                <li class="li_navlist"><a href="product_motor.php">มอเตอร์เกียร์ & มอเตอร์ไฟฟ้า<br> (Gear Motors)</a>
                </li>
                <li class="li_navlist"><a href="product_controlpanel.php">ตู้ควบคุม<br>(Control Panel)</a>
                </li>
            </ul>
        </div>
        <div class="col-10">
            <!------------------------------------------ Table Data ------------------------------------------>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">รหัสสินค้า</th>
                        <th scope="col">ประเภทสินค้า</th>
                        <th scope="col">แบรนด์</th>
                        <th scope="col">รุ่น</th>
                        <th scope="col">จำแนก</th>
                        <th scope="col">รายละเอียด</th>
                        <th scope="col">รูปภาพ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = $conn->query("SELECT * FROM product WHERE product_category = 'รายการโปรดที่ 1'");
                    $stmt->execute();
                    $products = $stmt->fetchAll();

                    if (!$products) {
                        echo "ไม่มีข้อมูลสินค้า";
                    } else {
                        foreach ($products as $product) {
                    ?>
                            <tr>
                                <th scope="row"><?php echo $product['product_id']; ?></th>
                                <td scope="row"><?= $product['product_type']; ?></td>
                                <td scope="row"><?= $product['product_brand']; ?></td>
                                <td scope="row"><?= $product['product_model']; ?></td>
                                <td scope="row"><?= $product['product_category']; ?></td>
                                <td scope="row"><?= $product['product_detail']; ?></td>
                                <td width="250px"><img width="100%" src="../upload/<?= $product['img']; ?>" class="rounded" alt=""></td>
                                <td>
                                    <a href="edit_product.php?product_id=<?php echo $product['product_id']; ?>" class="btn btn-warning">แก้ไขข้อมูลสินค้า</a>
                                    <a onclick="return confirm('แน่ใจใช่ไหมว่าจะทำการลบข้อมูล ?');" href="?delete=<?php echo $product['product_id']; ?>" class="btn btn-danger">ลบข้อมูลสินค้า</a>
                                </td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        let imgInput = document.getElementById('imgInput');
        let previewImg = document.getElementById('previewImg');

        imgInput.onchange = evt => {
            const [file] = imgInput.files;
            if (file) {
                previewImg.src = URL.createObjectURL(file);
            }
        }
    </script>
</body>

</html>