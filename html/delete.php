<?php
    include("connect.php");
    $id = $_GET['id'];
    if($id=="all"){
        $sql="DELETE FROM cart";
        $qCart=$conn->query($sql);
    }else{
        $sql2="DELETE FROM cart  WHERE id_pro='$id'";
        $qCart2=$conn->query($sql2);
    }
    header("Location:cart.php");

?>