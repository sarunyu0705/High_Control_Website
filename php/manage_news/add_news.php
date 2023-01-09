<?php
session_start();
require_once "../config.php";

if (isset($_POST['submit'])) {
    $news_name = $_POST['news_name'];
    $news_detail = $_POST['news_detail'];
    $news_date= $_POST['news_date'];
    $news_img = $_FILES['news_img'];


    $allow = array('jpg', 'jpeg', 'png');
    $extension = explode(".", $news_img['name']);
    $fileActExt = strtolower(end($extension));
    $fileNew = rand() . "." . $fileActExt;
    $filePath = "../../image/News/" . $fileNew;
    if (in_array($fileActExt, $allow)) {
        if ($news_img['size'] > 0 && $news_img['error'] == 0) {
            if (move_uploaded_file($news_img['tmp_name'], $filePath)) {
                $sql = $conn->prepare("INSERT INTO news(news_name, news_date, news_detail, news_img)
                            VALUE( :news_name, :news_date, :news_detail, :news_img) ");
                // $sql->bindParam(":portfolio_id", $portfolio_id);
                $sql->bindParam(":news_name", $news_name);
                $sql->bindParam(":news_date", $news_date);
                $sql->bindParam(":news_detail", $news_detail);
                $sql->bindParam(":news_img", $fileNew);
                $sql->execute();

                if ($sql) {
                    $_SESSION['success'] = "เพิ่มกระทู้ข่าวสารสำเร็จ";
                    header("location: news_table.php");
                } else {
                    $_SESSION['error'] = "เพิ่มกระทู้ข่าวสารสำเร็จ";
                    header("location: news_table.php");
                }
            }
        }
    }
}
