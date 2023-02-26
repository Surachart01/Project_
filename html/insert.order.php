<?php  
    session_start();
    include("connect.php");
    $date = date("'d-m-Y'");
    $user = $_SESSION['data_user']->id;
    $sql = "INSERT INTO ord(id_cus,time) VALUE($user,$date)";
    $qord= $conn->query($sql);
    $row = mysqli_insert_id($conn);
    // $sql2 = "SELECT MAX(id)FROM ord WHERE id_cus = '$user'";
    // $qOrd = $conn->query($sql2);
    // $row = $qOrd->fetch_array();
    // $row2 = (int)$row;
    $sql1 ="SELECT * FROM cart";
    $qCart = $conn->query($sql1);
    

    while($datasub = $qCart->fetch_object()){
        
        $id_pro = (int)$datasub->id_pro;
        $qty = (int)$datasub->qty;
        $id_cus = (int)$user;

        $sql3 = "INSERT INTO ordsub (id_ord,id_product,qty,id_cus) VALUES('$row','$id_pro','$qty','$id_cus')";
        $qq = $conn->query($sql3);
    }

    $sqlClear = "DELETE FROM cart";
    $qClear = $conn->query($sqlClear);
    header("Location:output.pdf.php?id_ord=$row");

    

    


?>