<?php
session_start();
require_once "../config.php";

if (isset($_POST['submit'])) {
    $portfolio_name = $_POST['portfolio_name'];
    $portfolio_local = $_POST['portfolio_local'];
    $portfolio_type = $_POST['portfolio_type'];
    $portfolio_date= $_POST['portfolio_date'];
    $portfolio_detail= $_POST['portfolio_detail'];
    $portfolio_img_main = $_FILES['portfolio_img_main'];


    $allow = array('jpg', 'jpeg', 'png');
    $extension = explode(".", $portfolio_img_main['name']);
    $fileActExt = strtolower(end($extension));
    $fileNew = rand() . "." . $fileActExt;
    $filePath = "../../image/Portfolio/" . $fileNew;
    if (in_array($fileActExt, $allow)) {
        if ($portfolio_img_main['size'] > 0 && $portfolio_img_main['error'] == 0) {
            if (move_uploaded_file($portfolio_img_main['tmp_name'], $filePath)) {
                $sql = $conn->prepare("INSERT INTO portfolio(portfolio_name, portfolio_local, portfolio_type, portfolio_date, portfolio_detail, portfolio_img_main)
                            VALUE( :portfolio_name, :portfolio_local, :portfolio_type, :portfolio_date,:portfolio_detail, :portfolio_img_main) ");
                // $sql->bindParam(":portfolio_id", $portfolio_id);
                $sql->bindParam(":portfolio_name", $portfolio_name);
                $sql->bindParam(":portfolio_local", $portfolio_local);
                $sql->bindParam(":portfolio_type", $portfolio_type);
                $sql->bindParam(":portfolio_date", $portfolio_date);
                $sql->bindParam(":portfolio_detail", $portfolio_detail);
                $sql->bindParam(":portfolio_img_main", $fileNew);
                $sql->execute();

                if ($sql) {
                    $_SESSION['success'] = "เพิ่มผลงานบริษัทสำเร็จ";
                    header("location: portfolio_table.php");
                } else {
                    $_SESSION['error'] = "เกิดข้อผิดพลาด";
                    header("location: portfolio_table.php");
                }
            }
        }
    }
}
