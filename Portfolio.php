<?php
session_start();
require_once "php/config.php";
?>

<?php
$record_per_page = 6; //อยากให้มี recode กี่อันใน 1 หน้า //
$page = '';
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}

$start_from = ($page - 1) * $record_per_page;

$query = "SELECT * FROM portfolio order by portfolio_date DESC LIMIT $start_from, $record_per_page";
$result = mysqli_query($mysqli, $query);
?>

<!-- Pagination -->
<?php
$query = mysqli_query($mysqli, "SELECT COUNT(portfolio_id) FROM `portfolio`");
$row = mysqli_fetch_row($query);

$rows = $row[0]; // เริ่มนับหน้าที่ 1 คือ value 0 

$page_rows = 6;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 

$last = ceil($rows / $page_rows);

if ($last < 1) {
    $last = 1;
}

$Page_Num = 1;

if (isset($_GET['Page_Num'])) {
    $Page_Num = preg_replace('#[^0-9]#', '', $_GET['Page_Num']);
}

if ($Page_Num < 1) {
    $Page_Num = 1;
} else if ($Page_Num > $last) {
    $Page_Num = $last;
}

$limit = 'LIMIT ' . ($Page_Num - 1) * $page_rows . ',' . $page_rows;

$nquery = mysqli_query($mysqli, "SELECT * from  portfolio ORDER BY portfolio_date DESC $limit");

$paginationCtrls = '';

if ($last != 1) {

    if ($Page_Num > 1) {
        $previous = $Page_Num - 1;
        $paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?Page_Num=' . $previous . '" class="btn btn-danger">ย้อนกลับ</a> &nbsp; &nbsp; ';

        for ($i = $Page_Num - 4; $i < $Page_Num; $i++) {
            if ($i > 0) {
                $paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?Page_Num=' . $i . '" class="btn btn-primary">' . $i . '</a> &nbsp; ';
            }
        }
    }

    $paginationCtrls .= '' . $Page_Num . ' &nbsp; ';

    for ($i = $Page_Num + 1; $i <= $last; $i++) {
        $paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?Page_Num=' . $i . '" class="btn btn-primary">' . $i . '</a> &nbsp; ';
        if ($i >= $Page_Num + 4) {
            break;
        }
    }

    if ($Page_Num != $last) {
        $next = $Page_Num + 1;
        $paginationCtrls .= ' &nbsp; &nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?Page_Num=' . $next . '" class="btn btn-success">ถัดไป</a> ';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="M6-aqLkOMxt5hnrqoDWb_hQIPAY1Jb61RF05WQRHVNA" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Link CSS File -->
    <link rel="stylesheet" href="css/vertical_navbar.css">
    <link rel="stylesheet" href="css/vartical_nav_list.css">
    <link rel="stylesheet" href="css/colors.css">
    <link rel="stylesheet" href="css/responesive.css">
    <link rel="stylesheet" href="css/text_overflow.css">
    <link rel="stylesheet" href="css/aligment_&_padding.css">
    <link rel="stylesheet" href="css/overlay_&_hover.css">
    <link rel="stylesheet" href="css/allpage.css">
    <!-- Titel name & img -->
    <title>airpumphc.com จำหน่าย ปั๊มน้ำ เครื่องเติมอากาศ ถังแรงดัน</title>
    <link rel="icon" type="image/x-icon" href="/image/Logo.png">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400&display=swap" rel="stylesheet">
    <!-- font -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- Image Popup JS -->
    <script src="javascript/Modal_img.js"></script>
    <script src="javascript/test_ov.js"></script>
</head>
<style>
    .axy {
        padding: 8px 16px;
        border: 1px solid #ccc;
        color: #333;
        font-weight: bold;
    }
</style>

<body>
<header>
        <!-- NavBar Bard HIGH CONTROL -->
        <nav class="navbar bg_color_nav1 padding">
            <a href="index.php" class="navbar-brand row">
                <div class="column container text-color">
                    <h1>
                        <img src="image/Logo.png" width="80" height="80" alt="Logo Header">
                        บริษัท&nbsp;ไฮ&ensp;คอนโทรล&nbsp;จำกัด
                    </h1>
                </div>
            </a>
            <!-- NavBar Contact -->
            <div id="">
                <div class="row">
                    <div id="padding_img_telephone" class="col-4">
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
                            <a class="nav-link" aria-current="page" href="index.php">หน้าหลัก</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Service.php">บริการ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="Portfolio.php">ผลงาน</a>
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
        <br>
    <main>
        <div id="imageGallery" class="container mt-3">
            <h2>ผลงานของบริษัท HIGH CONTROL</h2>
            <div class="row mt-4">
                <?php
                while ($crow = mysqli_fetch_array($nquery)) {
                ?>
                    <!-- เริ่ม Design Card -->
                    <div class="col-12 col-md-6 col-lg-4 pointer">
                        <div class="card m-2 img_hover" style="max-width: 23rem;">
                            <a><img alt="<?php echo $crow['portfolio_detail']; ?>" src="./image/Portfolio/<?php echo $crow['portfolio_img_main']; ?>" class=" card-img-top p-5" width="100%" height="300px" style="max-width: 400px;"></a>
                            <div class="card-body">
                                <p class="card-text text_over_heading"><?php echo $crow['portfolio_name'] . '<br><br>' . $crow['portfolio_local']; ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- จบ Design Card -->
                <?php
                }
                ?>
            </div>
            <!-- PHP Start -->
            <div class="row">
                <?php
                $stmt = $conn->query("SELECT * FROM portfolio ORDER BY portfolio_date DESC LIMIT $start_from, $record_per_page");
                $stmt->execute();
                $works = $stmt->fetchAll();
                if (!$works) {
                    echo "ไม่มีข้อมูล";
                } else {
                    foreach ($works as $portfolio_show) {
                    }
                }
                ?>
            </div>
            <!-- Pagination -->
    </main>
    <!-- /***************************************************************************************** */ -->
    <footer class=" text-center text-dark">
        <div id="pagination_controls" class="text_center mt-4"><?php echo $paginationCtrls; ?></div>
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
    </div>
    <script>
        function myFunction(x) { // Mobile Respone
            if (x.matches) {
                // If media query matches
                // document.body.style.backgroundColor = "pink";
                $(document).ready(function() {
                    $("#imageGallery").imagePopup({
                        overlay: "rgba(0, 0, 0, 0.5)",

                        closeButton: {
                            src: "image/cancel_btn.png",
                            width: "40px",
                            height: "40px"
                        },
                        borderRadius: "6px",
                        imageWidth: "300px",
                        imageHeight: "300px",
                        imageCaption: {
                            exist: true,
                            color: "#ffffff",
                            fontSize: "18px",
                            Border: "solid",
                            BorderColor: "red",
                            wtd: "20em",
                        },
                        open: function() {
                            console.log("opened");
                        },
                        close: function() {
                            console.log("closed");
                        }
                    });

                });
            } else if (y.matches) { // Ipad Repone
                // If media query matches
                // document.body.style.backgroundColor = "yellow";
                $(document).ready(function() {
                    $("#imageGallery").imagePopup({
                        overlay: "rgba(0, 0, 0, 0.5)",

                        closeButton: {
                            src: "image/cancel_btn.png",
                            width: "40px",
                            height: "40px"
                        },
                        borderRadius: "6px",
                        imageWidth: "500px",
                        imageHeight: "400px",
                        imageCaption: {
                            exist: true,
                            color: "#ffffff",
                            fontSize: "18px",
                            Border: "solid",
                            BorderColor: "red",
                            wtd: "20em",
                        },
                        open: function() {
                            console.log("opened");
                        },
                        close: function() {
                            console.log("closed");
                        }
                    });

                });
            } else {
                // document.body.style.backgroundColor = "pink";
                $(document).ready(function() {
                    $("#imageGallery").imagePopup({
                        overlay: "rgba(0, 0, 0, 0.5)",

                        closeButton: {
                            src: "image/cancel_btn.png",
                            width: "40px",
                            height: "40px"
                        },
                        borderRadius: "6px",
                        imageWidth: "700px",
                        imageHeight: "500px",
                        imageCaption: {
                            exist: true,
                            color: "#ffffff",
                            fontSize: "18px",
                            Border: "solid",
                            BorderColor: "red",
                            wtd: "50em",
                        },
                        open: function() {
                            console.log("opened");
                        },
                        close: function() {
                            console.log("closed");
                        }
                    });

                });
            }
        }

        var x = window.matchMedia("(max-width: 400px)") // Mobile Respone
        var y = window.matchMedia("(max-width: 769px) and (min-width: 501px)") // Ipad Repone
        myFunction(x) // Call listener function at run time
        x.addListener(myFunction) // Attach listener function on state changes
    </script>

</body>

</html>