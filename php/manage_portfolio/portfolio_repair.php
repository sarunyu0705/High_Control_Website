<?php
require_once "../config.php";
include_once "add_portfolio.php";
// session_start();
if (isset($_SESSION['no']) && isset($_SESSION['admin_user'])) {
}

// Process การลบข้อมูล
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $deletestmt = $conn->query("DELETE FROM portfolio WHERE portfolio_id = $delete_id");
    $deletestmt->execute();


    if ($deletestmt) {
        echo "<script>alert('ลบข้อมูลผลงานเรียบร้อยแล้ว');</script>";
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อยแล้ว";
        header("refresh:1; url=portfolio_repair.php");
    }
}
// Process Logout Clear
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
    <!-- Jquery -->
    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/
ui-lightness/jquery-ui.css' rel='stylesheet'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js">
    </script>
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
        <nav class="navbar navbar-expand-lg navbar-dark bg_color_nav2">
            <div class="container-fluid">
                <a class="navbar-brand" href="../Login_system/homepage.php">
                    <h4> เว็บไซต์จัดการฐานข้อมูล </h4>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
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
        <nav class="navbar navbar-expand-sm navbar-dark bg_color_nav2">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item me-5">
                        <a class="nav-link" aria-current="page" href="../Login_system/homepage.php">จัดการข้อมูลสินค้า</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link active" href="../manage_portfolio/portfolio_table.php">จัดการผลงานบริษัท</a>
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
    <!-- Modal หรือเรียกอีกชื่อว่า Dialog -->
    <!--  -->
    <div class="container mt-5">
        <div class="row">
            <h2>สามารถแก้ไข เพิ่ม ลบ อัลบั้มผลงาน</h2>
            <div class="col-md-6">
                <h2>ผลงานบริษัทประเภท "งานซ่อมบำรุง"</h2>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#userModal">เพิ่มผลงาน</button>
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
                <p id="padding_nav_brand" class="font_size_main bg_color_nav2"><b>ประเภทของผลงาน </b></p>
                <li class="li_navlist my-2"><a href="portfolio_sale.php">งานขายสินค้า</a></li>
                <li class="li_navlist my-2"><a href="portfolio_system.php">งานระบบ</a></li>
                <li class="li_navlist my-2"><a href="portfolio_structure.php">งานโครงสร้าง</a></li>
                <li class="li_navlist my-2"><a class="active" href="portfolio_repair.php">งานซ่อมบำรุง</a></li>
            </ul>
        </div>
        <div class="col">
            <!------------------------------------------ Table Data ------------------------------------------>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-1" scope="col">ลำดับ</th>
                            <th class="col-3" scope="col">ชื่อผลงาน</th>
                            <th class="col-2" scope="col">สถานที่</th>
                            <th class="col-2" scope="col">ประเภท</th>
                            <th class="col-2" scope="col">วัน/เวลา</th>
                            <th class="col-2" scope="col">รายละเอียด</th>
                            <th class="col-2" scope="col">รูปภาพ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $stmt = $conn->query("SELECT * FROM portfolio WHERE portfolio_type = 'งานซ่อมบำรุง'");
                            $stmt->execute();
                            $portfolio = $stmt->fetchAll();
                            if (!$portfolio) {
                                echo "ไม่พบข้อมูลผลงาน";
                            } else {
                                foreach ($portfolio as $portfolio) {
                            ?>
                                    <th scope="row"><?php echo $portfolio['portfolio_id']; ?></th>
                                    <td scope="row"><?= $portfolio['portfolio_name']; ?></td>
                                    <td scope="row"><?= $portfolio['portfolio_local']; ?></td>
                                    <td scope="row"><?= $portfolio['portfolio_type']; ?></td>
                                    <td scope="row"><?= $portfolio['portfolio_date']; ?></td>
                                    <td scope="row">
                                        <p class="text_over"><?= $portfolio['portfolio_detail']; ?></p>
                                    </td>
                                    <td width="250px"><img width="100px" height="100px" src="../../image/Portfolio/<?= $portfolio['portfolio_img_main']; ?>" class="rounded" alt=""></td>
                                    <td>
                                        <a href="edit_portfolio.php?portfolio_id=<?php echo $portfolio['portfolio_id']; ?>" class="btn btn-warning m-2">แก้ไข</a>
                                        <a onclick="return confirm('แน่ใจใช่ไหมว่าจะทำการลบข้อมูล ?');" href="?delete=<?php echo $portfolio['portfolio_id']; ?>" class="btn btn-danger m-2">ลบ</a>

                                    </td>
                        </tr>
                <?php }
                            } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal เพิ่มผลงาน-->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มผลงานบริษัท</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Add Portfolio -->
                <div class="modal-body">
                    <form action="add_portfolio.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="portfolio_name" class="col-form-label">ชื่อผลงาน</label>
                            <input type="text" require class="form-control" name="portfolio_name">
                        </div>
                        <div class="mb-3">
                            <label for="portfolio_local" class="col-form-label">สถานที่</label>
                            <input type="text" require class="form-control" name="portfolio_local">
                        </div>
                        <div class="mb-3">
                            <label for="portfolio_type" class="col-form-label">ประเภทของผลงาน</label>
                            <select require class="form-select form-control" aria-label="Default select example" name="portfolio_type">
                                <option value="" selected>- กรุณาเลือกประเภทงาน -</option>
                                <option value="งานขายสินค้า">งานขายสินค้า</option>
                                <option value="งานระบบ">งานระบบ</option>
                                <option value="งานโครงสร้าง">งานโครงสร้าง</option>
                                <option value="งานซ่อมบำรุง">งานซ่อมบำรุง</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="portfolio_date" class="col-form-label">วัน/เดือน/ปี</label>
                            <input type="text" id="my_date_picker" require class="form-control" name="portfolio_date">
                            <script>
                                $(function() {
                                    $("#my_date_picker").datepicker({
                                        dateFormat: 'dd-mm-yy',
                                        defaultDate: ""
                                    });
                                });
                            </script>
                        </div>
                        <div class="mb-3">
                            <label for="portfolio_detail" class="col-form-label">รายละเอียด</label>
                            <input type="text" require class="form-control" name="portfolio_detail">
                        </div>
                        <div class="mb-3">
                            <label for="portfolio_img_main" class="col-form-label">รูปสินค้า</label>
                            <input type="file" require class="form-control" id="imgInput" name="portfolio_img_main" multiple>
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