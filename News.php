<?php
session_start();
require_once "php/config.php"
?>

<!doctype html>
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
  <link rel="stylesheet" href="css/allpage.css">
  <!-- Titel name & img -->
  <title>airpumphc.com จำหน่าย ปั๊มน้ำ เครื่องเติมอากาศ ถังแรงดัน</title>
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
      <div>
        <div class="row ">
          <div id="padding_img_telephone" class="col-4 ">
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
              <a class="nav-link" href="Portfolio.php">ผลงาน</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="News.php">ข่าวสาร</a>
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
    <!-- ####################################################################################################### -->
    <div class="container px-4 px-lg-5">
      <!-- Heading Row-->
      <div class="row gx-4 gx-lg-5 align-items-center my-3">

        <!-- PHP Start -->
        <?php
        $sql = $conn->query("SELECT * FROM news ORDER BY news_date DESC LIMIT 1");
        $sql->execute();
        $news = $sql->fetchAll();
        if (!$news) {
          echo "ไม่มีข้อมูล";
        } else {
          foreach ($news as $news_show) {
        ?>

            <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="./image/News/<?php echo $news_show['news_img']; ?>" alt="..." /></div>
            <div class="col-lg-5">
              <h2 class="font-weight-light"><?php echo $news_show['news_name'] ?></h2>
              <p class="text_over"><?php echo $news_show['news_detail'] ?></p>
              <a href="/php/manage_news/detail_news.php?news_id=<?php echo $news_show['news_id']; ?>" class="btn btn-success ">อ่านต่อ</a>
            </div>
        <?php }
        }
        ?>
      </div>
      <nav class="navbar navbar-dark bg_color_nav2 mb-4">
        <div class="container-fluid">
          <h4 class="navbar-brand center">บทความเพิ่มเติม</h4>
        </div>
      </nav>
      <div class="row gx-4 gx-lg-5">
        <?php
        $sql = $conn->query("SELECT * FROM news ORDER BY news_date DESC LIMIT 1,3");
        $sql->execute();
        $news = $sql->fetchAll();
        if (!$news) {
          echo "ไม่มีข้อมูล";
        } else {
          foreach ($news as $news_show) {
        ?>
            <div class="col-md-4 mb-5">
              <div class="card h-100">
                <div class="card-body">
                  <h4 class="card-title"><?php echo $news_show['news_name'] ?></h4>
                  <div class="col-lg-10"><img class="img-fluid rounded mb-5 mb-lg-0" src="./image/News/<?php echo $news_show['news_img']; ?>" alt="..." /></div>
                  <br>
                  <p class="card-text text_over"><?php echo $news_show['news_detail'] ?>
                </div>
                <div class="card-footer">
                  <a href="/php/manage_news/detail_news.php?news_id=<?php echo $news_show['news_id']; ?>" class="btn btn-success ">อ่านต่อ</a>
                </div>
              </div>
            </div>
        <?php }
        }
        ?>
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
</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
</script>

</html>