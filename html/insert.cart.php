<?php
include("connect.php");
session_start();
    $id_cus=$_SESSION['data_user']->id;
    $idPro = $_POST['id_pro'];
    $qty = $_POST['qty'];
    $name = $_POST['name_pro'];
    $price = $_POST['price_pro'];
    $img = $_POST['img_pro'];
    $sql1 = "SELECT * FROM cart WHERE id_pro='$idPro'";
    $qCheckCart = $conn->query($sql1);
    $data = $qCheckCart->fetch_object();
    $num_row = $qCheckCart->num_rows;
    if($num_row == 1){
        $total = $data->qty+$qty;
        $sql3 = "UPDATE cart SET qty = '$total' WHERE id_pro= '$idPro';";
        $qQty = $conn->query($sql3);

    }else if($num_row == 0){
        $sql2 = "INSERT INTO cart(name,price,img,id_pro,qty,id_cus) VALUE('$name','$price','$img','$idPro','$qty','$id_cus')";
        $qCart = $conn->query($sql2);
    }else{
        $_SESSION['msg_InsertCart']= "ไม่สามารถเพิ่มสินค้าได้";
    }
    header("Location:index.php");
?>