<?php 
    session_start();
    require_once "../config.php";


        if (isset($_POST['submit'])) {
            $product_id = $_POST['product_id'];
            $product_type = $_POST['product_type'];
            $product_brand = $_POST['product_brand'];
            $product_model = $_POST['product_model'];
            $product_category = $_POST['product_category'];
            $product_detail = $_POST['product_detail'];
            $img = $_FILES['img'];

            $allow = array('jpg','jpeg','png');
            $extension = explode("." , $img['name']);
            $fileActExt = strtolower(end($extension));
            $fileNew = rand() .".". $fileActExt;
            $filePath = "../upload/".$fileNew;

            if (in_array($fileActExt, $allow)) {
                if ($img['size'] > 0 && $img['error']== 0) {
                    if (move_uploaded_file($img['tmp_name'], $filePath)) {
                        $sql = $conn-> prepare("INSERT INTO product(product_id, product_type, product_brand, product_model, product_detail,product_category, img)
                            VALUE(:product_id, :product_type, :product_brand, :product_model, :product_detail, :product_category, :img) ");
                        $sql->bindParam(":product_id", $product_id);
                        $sql->bindParam(":product_type", $product_type);
                        $sql->bindParam(":product_brand", $product_brand);
                        $sql->bindParam(":product_model", $product_model);
                        $sql->bindParam(":product_category", $product_category);
                        $sql->bindParam(":product_detail", $product_detail);
                        $sql->bindParam(":img", $fileNew);
                        $sql->execute();
                        
                        if ($sql) {
                            $_SESSION['success'] = "เพิ่มข้อมูลสินค้าสำเร็จ";
                            header("location: ../Login_system/homepage.php");
                        }
                        else {
                            $_SESSION['error'] = "เพิ่มข้อมูลสินค้าล้มเหลว";
                            header("location: ../Login_system/homepage.php");
                        }

                    }
                }
            }
        }
?>