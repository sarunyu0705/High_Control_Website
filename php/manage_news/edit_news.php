<?php

session_start();
require_once "../config.php";

if (isset($_POST['update'])) {
    $news_id = $_POST['news_id'];
    $news_name = $_POST['news_name'];
    $news_date = $_POST['news_date'];
    $news_detail = $_POST['news_detail'];
    $news_img = $_FILES['news_img'];

    $news_img2 = $_POST['news_img2'];
    $upload = $_FILES['news_img']['name'];

    if ($upload != '') {
        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $news_img['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
        $filePath = "../../image/News/" . $fileNew;

        if (in_array($fileActExt, $allow)) {
            if ($news_img['size'] > 0 && $news_img['error'] == 0) {
                move_uploaded_file($news_img['tmp_name'], $filePath);
            }
        }
    } else {
        $fileNew = $news_img2;
    }

    $sql = $conn->prepare("UPDATE news SET news_name = :news_name, news_date = :news_date, news_detail = :news_detail,  news_img = :news_img WHERE news_id = :news_id");
    $sql->bindParam(":news_id", $news_id);
    $sql->bindParam(":news_name", $news_name);
    $sql->bindParam(":news_date", $news_date);
    $sql->bindParam(":news_detail", $news_detail);
    $sql->bindParam(":news_img", $fileNew);
    $sql->execute();

    if ($sql) {
        $_SESSION['success'] = "อัพเดทข้อมูลเรียบร้อยแล้ว";
        header("location: news_table.php");
    } else {
        $_SESSION['error'] = "อัพเดทข้อมูลล้มเหลว";
        header("location: news_table.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wproduct_idth=device-wproduct_idth, initial-scale=1.0">
    <title>แก้ไขข้อมูลผลงาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Jquery -->
    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/
ui-lightness/jquery-ui.css' rel='stylesheet'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js">
    </script>
</head>

<body>
    <div class="container mt-5">
        <h1>แก้ไขข้อมูลกระทู้ข่าวสาร</h1>
        <hr>
        <form action="edit_news.php" method="post" enctype="multipart/form-data">
            <?php
            if (isset($_GET['news_id'])) {
                $news_id = $_GET['news_id'];
                $stmt = $conn->query("SELECT * FROM news WHERE news_id = $news_id");
                $stmt->execute();
                $data = $stmt->fetch();
            }
            ?>
            <div class="mb-3">
                <label for="news_id" class="col-form-label">ลำดับ:</label>
                <input type="text" readonly value="<?php echo $data['news_id']; ?>" required class="form-control" name="news_id">
                <input type="hidden" value="<?php echo $data['news_img']; ?>" required class="form-control" name="news_img2">
            </div>
            <div class="mb-3">
                <label for="news_name" class="col-form-label">หัวข้อกระทู้</label>
                <input type="text" value="<?php echo $data['news_name']; ?>" required class="form-control" name="news_name">
            </div>
            <div class="mb-3">
                <label for="news_date" class="col-form-label">วัน/เดือน/ปี</label>
                <input type="text" id="my_date_picker" require value="<?php echo $data['news_date']; ?>" required class="form-control" name="news_date">
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
                <label for="news_detail" class="col-form-label">รายละเอียด:</label>
                <input type="text" value="<?php echo $data['news_detail']; ?>" required class="form-control" name="news_detail">
            </div>
            <div class="mb-3">
                <label for="news_img" class="col-form-label">รูปสินค้า:</label>
                <input type="file" class="form-control" id="imgInput" name="img">
                <img width="50%" src="upload/<?php echo $data['news_img']; ?>" id="previewImg" alt="">
            </div>

            <hr>
            <a href="portfolio_table.php" class="btn btn-danger">ยกเลิก</a>
            <button type="submit" name="update" class="btn btn-primary">อัพเดท</button>
        </form>
    </div>

    <script>
        let imgInput = document.getElementById('imgInput');
        let previewImg = document.getElementById('previewImg');

        imgInput.onchange = evt => {
            const [file] = imgInput.files;
            if (file) {
                previewImg.src = URL.createObjectURL(file)
            }
        }
    </script>


</body>

</html>