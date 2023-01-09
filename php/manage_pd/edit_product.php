<?php

session_start();
require_once "../config.php";



if (isset($_POST['update'])) {
    $product_id = $_POST['product_id'];
    $product_type = $_POST['product_type'];
    $product_brand = $_POST['product_brand'];
    $product_model = $_POST['product_model'];
    $product_category = $_POST['product_category'];
    $product_detail = $_POST['product_detail'];
    $img = $_FILES['img'];

    $img2 = $_POST['img2'];
    $upload = $_FILES['img']['name'];

    if ($upload != '') {
        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $img['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
        $filePath = 'upload/' . $fileNew;

        if (in_array($fileActExt, $allow)) {
            if ($img['size'] > 0 && $img['error'] == 0) {
                move_uploaded_file($img['tmp_name'], $filePath);
            }
        }
    } else {
        $fileNew = $img2;
    }

    $sql = $conn->prepare("UPDATE product SET product_type = :product_type, product_brand = :product_brand, product_model = :product_model, product_category = :product_category, product_detail = :product_detail,  img = :img WHERE product_id = :product_id");
    $sql->bindParam(":product_id", $product_id);
    $sql->bindParam(":product_type", $product_type);
    $sql->bindParam(":product_brand", $product_brand);
    $sql->bindParam(":product_model", $product_model);
    $sql->bindParam(":product_category", $product_category);
    $sql->bindParam(":product_detail", $product_detail);
    $sql->bindParam(":img", $fileNew);
    $sql->execute();

    if ($sql) {
        $_SESSION['success'] = "อัพเดทข้อมูลเรียบร้อยแล้ว";
        header("location: ../Login_system/homepage.php");
    } else {
        $_SESSION['error'] = "อัพเดทข้อมูลล้มเหลว";
        header("location: ../Login_system/homepage.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wproduct_idth=device-wproduct_idth, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Data</h1>
        <hr>
        <form action="../manage_pd/edit_product.php" method="post" enctype="multipart/form-data">
            <?php
            if (isset($_GET['product_id'])) {
                $product_id = $_GET['product_id'];
                $stmt = $conn->query("SELECT * FROM product WHERE product_id = $product_id");
                $stmt->execute();
                $data = $stmt->fetch();
            }
            ?>
            <div class="mb-3">
                <label for="product_id" class="col-form-label">รหัสสินค้า:</label>
                <input type="text" readonly value="<?php echo $data['product_id']; ?>" required class="form-control" name="product_id">
                <input type="hidden" value="<?php echo $data['img']; ?>" required class="form-control" name="img2">
            </div>
            <div class="mb-3">
                <label for="product_type" class="col-form-label">ประเภทสินค้า</label>
                <select require class="form-select form-control" aria-label="Default select example" name="product_type">
                    <option value="<?php echo $data['product_type']; ?>" selected><?php echo $data['product_type']; ?></option>
                    <option value="Roots Blower">Roots Blower (เครื่องเติมอากาศ)</option>
                    <option value="Ring & Turbo Blower">Ring & Turbo Blower (เครื่องเติมอากาศ)</option>
                    <option value="Air Pumps">Air Pumps (เครื่องเติมอากาศ)</option>
                    <option value="Self Priming & Multistage">Self Priming & Multistage (ปั๊มน้ำ)</option>
                    <option value="Chemical & Gear Pumps">Chemical & Gear Pumps (ปั๊มสูบเคมีและน้ำมัน)</option>
                    <option value="Submersible & Areator & Ejector">Submersible & Areator & Ejector (ปั๊มจุ่ม)</option>
                    <option value="Pressure Tank">Pressure Tank (ถังแรงดัน)</option>
                    <option value="Gear Motor">Gear Motor (มอเตอร์เกียร์ & มอเตอร์ไฟฟ้า)</option>
                    <option value="Control Panel">Control Panel (ตู้ควบคุม)</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="product_brand" class="col-form-label">แบรนด์:</label>
                <input type="text" value="<?php echo $data['product_brand']; ?>" required class="form-control" name="product_brand">
            </div>
            <div class="mb-3">
                <label for="product_model" class="col-form-label">รุ่นสินค้า:</label>
                <input type="text" value="<?php echo $data['product_model']; ?>" required class="form-control" name="product_model">
            </div>
            <div class="mb-3">
                <label for="product_category" class="col-form-label">จำแนกหมวดหมู่</label>
                <select require class="form-select form-control" aria-label="Default select example" name="product_category">
                    <option value="<?php echo $data['product_category']; ?>" selected><?php echo $data['product_category']; ?></option>
                    <option value="ทั่วไป">ทั่วไป</option>
                    <option value="รายการโปรดที่ 1">สินค้ารายการโปรดที่ 1</option>
                    <option value="รายการโปรดที่ 2">สินค้ารายการโปรดที่ 2</option>
                    <option value="รายการโปรดที่ 3">สินค้ารายการโปรดที่ 3</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="product_detail" class="col-form-label">รายละเอียด:</label>
                <input type="text" value="<?php echo $data['product_detail']; ?>" required class="form-control" name="product_detail">
            </div>
            <div class="mb-3">
                <label for="img" class="col-form-label">รูปสินค้า:</label>
                <input type="file" class="form-control" id="imgInput" name="img">
                <img width="50%" src="upload/<?php echo $data['img']; ?>" id="previewImg" alt="">
            </div>

            <hr>
            <a href="homepage.php" class="btn btn-danger">ยกเลิก</a>
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