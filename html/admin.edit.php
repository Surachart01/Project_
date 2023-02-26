<?php
include("connect.php");
unset($_SESSION['edit']);
session_start();
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    if(!isset($_FILES['img'])){
        $img =$_FILES['img'];
        $rename = time();
        $file_exp=strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $upload_filename = "img_product/$rename.$file_exp";
        $sql_name = $rename.$file_exp;
        move_uploaded_file($file['tmp_name'],$upload_filename);
        $sql = "UPDATE product
        SET name = '$name', price= '$price',img = '$sql_name'
        WHERE id = '$id'"; 
        $qEdit = $conn->query($sql);
        $_SESSION['edit'] = "แก้ไขสำเร็จ";
    }else{
        $sql = "UPDATE product
        SET name = '$name', price= '$price' WHERE id = '$id'"; 
        $qEdit = $conn->query($sql);
        $_SESSION['edit'] = "แก้ไขสำเร็จ";
    }
    

        
        
        

       
        
    header("Location:admin.product.php");
?>