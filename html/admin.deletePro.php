<?php
    include("connect.php");
    $id = $_GET['id'];
    $sql = "DELETE FROM product where id = '$id'";
    $qDel = $conn->query($sql);

    header("Location:admin.product.php");
?>