<?php

session_start();
require_once "../config.php";

if (isset($_POST['update'])) {
    $portfolio_id = $_POST['portfolio_id'];
    $portfolio_name = $_POST['portfolio_name'];
    $portfolio_local = $_POST['portfolio_local'];
    $portfolio_type = $_POST['portfolio_type'];
    $portfolio_date = $_POST['portfolio_date'];
    $portfolio_detail = $_POST['portfolio_detail'];
    $portfolio_img_main = $_FILES['portfolio_img_main'];

    $portfolio_img_main2 = $_POST['portfolio_img_main2'];
    $upload = $_FILES['portfolio_img_main']['name'];

    if ($upload != '') {
        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $portfolio_img_main['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
        $filePath = 'upload/' . $fileNew;

        if (in_array($fileActExt, $allow)) {
            if ($portfolio_img_main['size'] > 0 && $portfolio_img_main['error'] == 0) {
                move_uploaded_file($portfolio_img_main['tmp_name'], $filePath);
            }
        }
    } else {
        $fileNew = $portfolio_img_main2;
    }

    $sql = $conn->prepare("UPDATE portfolio SET portfolio_name = :portfolio_name, portfolio_local = :portfolio_local, portfolio_type = :portfolio_type, portfolio_date = :portfolio_date, portfolio_detail = :portfolio_detail,  portfolio_img_main = :portfolio_img_main WHERE portfolio_id = :portfolio_id");
    $sql->bindParam(":portfolio_id", $portfolio_id);
    $sql->bindParam(":portfolio_name", $portfolio_name);
    $sql->bindParam(":portfolio_local", $portfolio_local);
    $sql->bindParam(":portfolio_type", $portfolio_type);
    $sql->bindParam(":portfolio_date", $portfolio_date);
    $sql->bindParam(":portfolio_detail", $portfolio_detail);
    $sql->bindParam(":portfolio_img_main", $fileNew);
    $sql->execute();

    if ($sql) {
        $_SESSION['success'] = "อัพเดทข้อมูลเรียบร้อยแล้ว";
        header("location: portfolio_table.php");
    } else {
        $_SESSION['error'] = "อัพเดทข้อมูลล้มเหลว";
        header("location: portfolio_table.php");
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
        <h1>แก้ไขข้อมูลผลงาน</h1>
        <hr>
        <form action="edit_portfolio.php" method="post" enctype="multipart/form-data">
            <?php
            if (isset($_GET['portfolio_id'])) {
                $portfolio_id = $_GET['portfolio_id'];
                $stmt = $conn->query("SELECT * FROM portfolio WHERE portfolio_id = $portfolio_id");
                $stmt->execute();
                $data = $stmt->fetch();
            }
            ?>
            <div class="mb-3">
                <label for="portfolio_id" class="col-form-label">รหัสสินค้า:</label>
                <input type="text" readonly value="<?php echo $data['portfolio_id']; ?>" required class="form-control" name="portfolio_id">
                <input type="hidden" value="<?php echo $data['portfolio_img_main']; ?>" required class="form-control" name="portfolio_img_main2">
            </div>
            <div class="mb-3">
                <label for="portfolio_name" class="col-form-label">ชื่อผลงาน</label>
                <input type="text" value="<?php echo $data['portfolio_name']; ?>" required class="form-control" name="portfolio_name">
            </div>
            <div class="mb-3">
                <label for="portfolio_local" class="col-form-label">สถานที่</label>
                <input type="text" value="<?php echo $data['portfolio_local']; ?>" class="form-control" name="portfolio_local">
            </div>
            <div class="mb-3">
                <label for="portfolio_type" class="col-form-label">ประเภทของผลงาน:</label>
                <select require class="form-select form-control" aria-label="Default select example" name="portfolio_type">
                    <option value="<?php echo $data['portfolio_type']; ?>" selected><?php echo $data['portfolio_type']; ?></option>
                    <option value="">- กรุณาเลือกประเภทงาน -</option>
                    <option value="งานขายสินค้า">งานขายสินค้า</option>
                    <option value="งานระบบ">งานระบบ</option>
                    <option value="งานโครงสร้าง">งานโครงสร้าง</option>
                    <option value="งานซ่อมบำรุง">งานซ่อมบำรุง</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="portfolio_date" class="col-form-label">วัน/เดือน/ปี</label>
                <input type="text" id="my_date_picker" require value="<?php echo $data['portfolio_date']; ?>" required class="form-control" name="portfolio_date">
                <script>
                    $(function() {
                        $("#my_date_picker").datepicker({
                            dateFormat: 'dd-mm-yy',
                            defaultDate: ""
                        });
                    });
                </script>
                <!--  -->
                <!-- <input type="text" id="my_date_picker" require class="form-control" name="portfolio_date"> -->
                <!--  -->
            </div>
            <div class="mb-3">
                <label for="portfolio_detail" class="col-form-label">รายละเอียด:</label>
                <input type="text" value="<?php echo $data['portfolio_detail']; ?>" class="form-control" name="portfolio_detail">
            </div>
            <div class="mb-3">
                <label for="portfolio_img_main" class="col-form-label">รูปสินค้า:</label>
                <input type="file" class="form-control" id="imgInput" name="img">
                <img width="50%" src="upload/<?php echo $data['portfolio_img_main']; ?>" id="previewImg" alt="">
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