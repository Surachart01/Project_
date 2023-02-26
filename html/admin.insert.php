<?php
session_start();
include("connect.php");
    $name=$_POST['name'];
    $price=$_POST['price'];
    $img=$_FILES['img'];

    if($img['error']==0){
        $rename = time();
        $file_exp=strtolower(pathinfo($img['name'],PATHINFO_EXTENSION));
        $upload_filename = "img_product/$rename.$file_exp";
        $sql_name = "$rename.$file_exp";
        move_uploaded_file($img['tmp_name'],$upload_filename);
        $sql = "INSERT INTO product(name,price,img) VALUE('$name','$price','$sql_name')"; 
        $qEdit = $conn->query($sql);
        $_SESSION['insert'] = "เพิ่มสินค้าสำเร็จ";
    }else{
        $_SESSION['insert'] = "เพิ่มไม่สำเร็จ";
    }

    header("Location:admin.product.php");



?>