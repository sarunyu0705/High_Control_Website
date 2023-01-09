<?php
session_start();
require_once "php/config.php";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="M6-aqLkOMxt5hnrqoDWb_hQIPAY1Jb61RF05WQRHVNA" />
    <meta name="description" content="บริษัท ไฮคอนโทรล จำกัด จำหน่ายสินค้าอุตสาหกรรม และอุปกรณ์ ต่างๆ ติดตั้งปั๊มน้ำ และซ่อมบำรุงระบบน้ำ พร้อมให้คำปรึกษาและบริการหลังการขายโดยช่างและฝ่ายขายผู้มีประสบการณ์ | airpumphc.com">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Link CSS File -->
    <link rel="stylesheet" href="css/vertical_navbar.css">
    <link rel="stylesheet" href="css/vartical_nav_list.css">
    <link rel="stylesheet" href="css/colors.css">
    <link rel="stylesheet" href="css/responesive.css">
    <link rel="stylesheet" href="css/text_overflow.css">
    <link rel="stylesheet" href="css/aligment_&_padding.css">
    <link rel="stylesheet" href="css/popup.css">
    <link rel="stylesheet" href="css/allpage.css">

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
    <header>
        <!-- NavBar Bard HIGH CONTROL -->
        <nav class="navbar bg_color_nav1">
            <a href="index.php" class="navbar-brand row">
                <div class="col container text-color">
                    <h1>
                        <img src="image/Logo.png" width="80" height="80" alt="Logo Header">
                        บริษัท&nbsp;ไฮ&ensp;คอนโทรล จำกัด
                    </h1>
                </div>
            </a>
            <!-- NavBar Contact -->
            <div>
                <div class="row">
                    <div class="col-4">
                        <img src="image/telephone.gif" alt="" width="65" height="60">
                    </div>
                    <div class="col">
                        <p><b> โทร. 0-2073-7878 </b></p>
                        <p><b> โทร. 088-924-9789</b></p>
                    </div>
                </div>
                <div>
                    <a href="https://line.me/ti/p/~highcontrol" aria-label="LINE" target="_blank" rel="noopener">
                        <img src="image/LINE_APP_Android.png" alt="" width="40" height="40"></a>
                    <a href="https://www.facebook.com/hcpumps" aria-label="facebook" target="_blank" rel="noopener"><img src="image/facebook.png" alt="" width="40" height="40"></a>
                    <a href="https://www.google.co.th/maps/place/%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%A9%E0%B8%B1%E0%B8%97+%E0%B9%84%E0%B8%AE%E0%B8%84%E0%B8%AD%E0%B8%99%E0%B9%82%E0%B8%97%E0%B8%A3%E0%B8%A5+%E0%B8%88%E0%B8%B3%E0%B8%81%E0%B8%B1%E0%B8%94/@14.0250272,100.6601931,17z/data=!3m1!4b1!4m5!3m4!1s0x311d7fe8c985c20f:0x710911b50d6f34d1!8m2!3d14.025022!4d100.6623818?hl=th" aria-label="facebook" target="_blank" rel="noopener"><img src="image/google_map.png" alt="" width="40" height="40"></a>
                </div>
            </div>
        </nav>
        <!--NavBar MENU -->
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg_color_nav2">
            <div class="container">
                <a class="navbar-brand" href="index.php"><b>บริษัท&nbsp;ไฮ&ensp;คอนโทรล&nbsp;จำกัด</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">หน้าหลัก</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Service.php">บริการ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Portfolio.php">ผลงาน</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="News.php">ข่าวสาร</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="About.php">เกี่ยวกับเรา</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Login.php" aria-label="Login">ล็อคอิน</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-------------- Body Main ------------>
    <main>
        <div class="row">
            <div class="col-2 text_center navlogo_res_mobile ">
                <p id="padding_nav_brand" class="mt-4 font_size_main bg_color_nav2"><b>หมวดหมู่สินค้า </b></p>
                <ul id="ul_navlist" class="col text_center padding_top">
                    <li class="li_navlist"><a href="Roots_Blower.php">เครื่องเติมอากาศ <br> (Roots Blower)</a></li>
                    <li class="li_navlist"><a href="Ring&Turbo_Blower.php">เครื่องเติมอากาศ <br> (Ring & Turbo
                            Blower)</a></li>
                    <li class="li_navlist"><a href="Air_Pump.php">เครื่องเติมอากาศ <br> (Air Pumps)</a></li>
                    <li class="li_navlist"><a href="Centrifugal_Pumps.php">ปั๊มหอยโข่ง <br> (Self Priming & Multistage
                            pumps)</a>
                    </li>
                    <li class="li_navlist"><a href="Chemical&Gear_Pumps.php">ปั๊มสูบเคมีและน้ำมัน<br>(Chemical &
                            Gear pumps)</a>
                    </li>
                    <li class="li_navlist"><a href="Submersible_Pumps.php">ปั๊มจุ่ม <br> (SUBMERSIBLE PUMPS &
                            AERATOR PUMPS & EJECTOR PUMPS)</a>
                    </li>
                    <li class="li_navlist"><a href="Pressure_Tank.php">ถังแรงดัน <br> (PRESSURE DIAPHARGM TANK)</a>
                    </li>
                    <li class="li_navlist"><a href="Gear_motor.php">มอเตอร์เกียร์ & มอเตอร์ไฟฟ้า<br> (Gear Motors)</a>
                    </li>
                    <li class="li_navlist"><a href="Control_Panel.php">ตู้ควบคุม<br>(Control Panel)</a>
                    </li>
                </ul>
                <div class="padding_top">
                    <p id="padding_nav_brand" class="mt-4 font_size_main bg_color_nav2 ">
                        <b>แบรนด์สินค้าที่จัดจำหน่าย </b>
                    </p>
                    <ul>
                        <li><a class="" href="./HC.php" title="High Control"><img src="image/Logo_lanscape.png" width="200" height="120" alt=""></a></li>
                        <li><a class="" href="Ebara.php" title="Ebara"><img src="image/product_logo/ebara_logo.png" width="200" height="80" alt=""></a></li>
                        <li><a class="" href="Tsurumi.php" title="Tsurumi"><img src="image/product_logo/tsurumi_logo.png" width="200" height="80" alt=""></a></li>
                        <li><a class="" href="Secoh.php" title="Secoh"><img src="image/product_logo/Secoh.png" width="200" height="80" alt=""></a></li>
                        <li><a class="" href="Best_tank.php" title="Best Tank"><img src="image/product_logo/Best_tank_logo.png" width="200" height="80" alt=""></a></li>
                        <li><a class="" href="Greatech.php" title="Greatech"><img src="image/product_logo/Greatech_logo.png" width="200" height="80" alt=""></a></li>
                        <li><a class="" href="Grundfos.php" title="Grundfos"><img src="image/product_logo/Grundfos_logo.png" width="200" height="80" alt=""></a></li>
                    </ul>
                </div>
            </div>

            <!-- สิ้นสุด navbar -->
            <div class="col container">
                <br>
                <h2 class="text-center"> บริษัท&nbsp;ไฮ&ensp;คอนโทรล จำหน่าย ปั๊มน้ำ เครื่องเติมอากาศ
                    ถังแรงดัน มอเตอร์ไฟฟ้า</h2>
                <div class="container">
                    <div id="carouselExampleCaptions" class="carousel slide padding_top " data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="image/Cover_Page/Page_1.png" class="d-block w-100" alt="Page_1">
                                <div class="carousel-caption d-none d-md-block mg-fluid">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="image/Cover_Page/Page_2.png" class="d-block w-100 " alt="Page_2">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="image/Cover_Page/Page_3.png" class="d-block w-100" alt="Page_3">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <br>
                <div>
                    <h3 class="text-center">สินค้าและผลิตภัณฑ์แนะนำ</h3>
                </div>
                <!-- slide recommend product-->
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="1800">
                            <div>
                                <img src="image/Logo_lanscape.png" class="img-fluid rounded mx-auto d-block" alt="" width="300" height="120">
                            </div>
                            <div class="row row-cols-2 row-cols-md-4 g-4">
                                <?php
                                $stmt = $conn->query("SELECT * FROM product WHERE Product_category = 'รายการโปรดที่ 1'");
                                $stmt->execute();
                                $products = $stmt->fetchAll();
                                if (!$products) {
                                    echo "&nbsp;&nbsp;&nbsp; *** ยังไม่ได้เลือกสินค้า ***";
                                } else {
                                    foreach ($products as $product) {
                                ?>
                                        <!-- เริ่ม Design Card -->
                                        <div class="col align-items-center">
                                            <div class="card delete_boder" style="width: 20rem;">
                                                <img src="./php/upload/<?php echo $product['img']; ?>" class="card-img-top img_res_mobile" alt="รูปภาพสินค้า" width="300px" height="200px">
                                                <div class="card-body">
                                                    <h7 class="card-title"><?php echo $product['product_type']; ?></h7>
                                                    <h5 class="card-title"><?php echo $product['product_model']; ?></h5>
                                                    <a href="./php/detail_product.php?product_id=<?php echo $product['product_id']; ?>" class="btn btn-primary">รายละเอียด</a>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                }
                                ?>
                            </div>

                        </div>
                        <div class="carousel-item" data-bs-interval="1800">
                            <div>
                                <img src="image/product_logo/Secoh.png" class="img-fluid rounded mx-auto d-block" alt="" width="300" height="120">
                            </div>
                            <div class="row row-cols-2 row-cols-md-4 g-4">
                                <?php
                                $stmt = $conn->query("SELECT * FROM product WHERE Product_category = 'รายการโปรดที่ 2'");
                                $stmt->execute();
                                $products = $stmt->fetchAll();
                                if (!$products) {
                                    echo "&nbsp;&nbsp;&nbsp; *** ยังไม่ได้เลือกสินค้า ***";
                                } else {
                                    foreach ($products as $product) {
                                ?>
                                        <!-- เริ่ม Design Card -->
                                        <div class="col">
                                            <div class="card delete_boder" style="width: 18rem;">
                                                <img src="./php/upload/<?php echo $product['img']; ?>" class="card-img-top img_res_mobile" alt="รูปภาพสินค้า" width="300px" height="200px">
                                                <div class="card-body">
                                                    <h7 class="card-title"><?php echo $product['product_type']; ?></h7>
                                                    <h5 class="card-title"><?php echo $product['product_model']; ?></h5>
                                                    <a href="./php/detail_product.php?product_id=<?php echo $product['product_id']; ?>" class="btn btn-primary">รายละเอียด</a>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="1800">
                            <div>
                                <img src="image/product_logo/TANK.png" class="img-fluid rounded mx-auto d-block" alt="" width="300" height="120">
                            </div>
                            <div class="row row-cols-2 row-cols-md-4 g-4">
                                <?php
                                $stmt = $conn->query("SELECT * FROM product WHERE Product_category = 'รายการโปรดที่ 3'");
                                $stmt->execute();
                                $products = $stmt->fetchAll();
                                if (!$products) {
                                    echo "&nbsp;&nbsp;&nbsp; *** ยังไม่ได้เลือกสินค้า ***";
                                } else {
                                    foreach ($products as $product) {
                                ?>
                                        <!-- เริ่ม Design Card -->
                                        <div class="col">
                                            <div class="card delete_boder" style="width: 18rem;">
                                                <img src="./php/upload/<?php echo $product['img']; ?>" class="card-img-top img_res_mobile" alt="รูปภาพสินค้า" width="300px" height="200px">
                                                <div class="card-body">
                                                    <h7 class="card-title"><?php echo $product['product_type']; ?></h7>
                                                    <h5 class="card-title"><?php echo $product['product_model']; ?></h5>
                                                    <a href="./php/detail_product.php?product_id=<?php echo $product['product_id']; ?>" class="btn btn-primary">รายละเอียด</a>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div>
                    <h3 class="text-center">บทความที่น่าสนใจ</h3>
                </div>
                <br>
                <div class="row">
                    <?php
                    $stm_new = $conn->query("SELECT * FROM news");
                    $stm_new->execute();
                    $news = $stm_new->fetchAll();
                    if (!$news) {
                        echo "ไม่มีข้อมูล";
                    } else {
                        foreach ($news as $news_show) {
                    ?>
                            <!-- เริ่ม Design Card -->
                            <div class="col-12 col-md-4">
                                <div class="card delete_boder" style="width: 24rem;">
                                    <img src="./image/News/<?php echo $news_show['news_img']; ?>" class="center" alt="รูปภาพบทความ" width="300px" height="200px">
                                    <div class="card-body">
                                        <h4 class="card-title text_over_heading p-2"><?php echo $news_show['news_name']; ?></h4>
                                        <p class="card-title text_over p-2"><?php echo $news_show['news_detail']; ?></p>
                                        <div class="d-grid gap-2 m-4">
                                        <a href="/php/manage_news/detail_news.php?news_id=<?php echo $news_show['news_id']; ?>" class="btn btn-success ">อ่านต่อ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    }
                    ?>
                </div>
            </div>
        </div>
        </div>
    </main>
    <footer class=" text-center text-dark">
        <!-- Grid container -->
        <div class="container">
            <hr class="my-2" />
            <!-- Section: Text -->
            <section class="mb">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-12">
                        <p>
                            <b>บริษัท&nbsp;ไฮ&ensp;คอนโทรล จำกัด</b>
                            <br> ก่อตั้งบริษัทเมื่อปี พ.ศ. 2559 ดำเนินธุรกิจจำหน่าย ปั๊มน้ำ สินค้าอุตสาหกรรม และอุปกรณ์ ต่างๆ
                            พร้อมบริการออกแบบ ก่อสร้าง ติดตั้ง และซ่อมบำรุงระบบน้ำ ระบบไฟฟ้าแบบครบวงจร
                            โดยทีมช่างที่ชำนาญและฝ่ายขายมากประสบการณ์
                        </p>
                    </div>
                </div>
            </section>
        </div>
        <!-- Copyright -->
        <div class="text-center p-3 bg_color_nav2">
            © 2020 Copyright:
            <a class="text-white" href="https://airpumphc.com/">airpumphc.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <!-- Selection ในส่วนของ PopUp -->
    <section>
        <div id="myHeader" class="popup header">
            <div>
                <img src="image/Icons/shopee_logo.png" alt="" width="150rem">
                <img src="image/Icons/lazada.png" alt="" width="150rem">
            </div>
            <button id="close">&times;</button>
            <br>
            <h4> พบกับอีก 2 ช่องทางใหม่ Shoopee & Lazada</h4>
            <a class="shopee" href="https://shopee.co.th/highcontrols" aria-label="Shopee" target="_blank" rel="noopener">Shopee</a>
            <a class="lazada" href="https://www.lazada.co.th/shop/high-control" aria-label="Shopee" target="_blank" rel="noopener">Lazada</a>
        </div>
    </section>
</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
</script>
<script src="javascript/popup.js"></script>
<script src="javascript/Slide Down.js"></script>

</html>