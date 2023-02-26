<?php
    require_once("../vendor/autoload.php");
    include("connect.php");
    $id_ord = $_GET['id_ord'];
    $sqlSub="SELECT * FROM ordsub WHERE id_ord = '$id_ord'";
    $sqlOrd = "SELECT * FROM ord WHERE id = '$id_ord'";
    $qSub = $conn->query($sqlSub);
    $qOrd = $conn->query($sqlOrd);
    $dataOrd = $qOrd->fetch_object();
    $sqlCus = "SELECT * FROM customer WHERE id = '$dataOrd->id_cus'";
    $qCus = $conn->query($sqlCus);
    $dataCus = $qCus->fetch_object();
    // $link = " 
    // <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css' rel='stylesheet'
    // integrity='sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT' crossorigin='anonymous'>
    // <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js'
    //     integrity='sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3' crossorigin='anonymous'
    // </script>

    // <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js'
    //     integrity='sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz' crossorigin='anonymous'>
    // </script>";
    $style = "
    <style>
        td{
            font-family: 'Garuda';
            height:20px;
        }
        th{
            font-family: 'Garuda';
            height:40px;
            background-color:#ffe0b2;
        }
        div{
            font-family: 'Garuda';
        }
    </style>
    ";
    $head = "<h3 style='text-align:center'>Reservation Order</h3>
                <div>Name : $dataCus->name</div>
                <div>Date : $dataOrd->time</div>";
    $head_body = "<table border='1' style='width:100%; border-collapse: collapse; margin-top:30px'>
                <tr>
                    <th style='width:30px'>#</th>
                    <th style='width:350px'>ชื่อสินค้า</th>
                    <th style='width:160px'>ราคาสินค้า (ต่อหน่วย)</th>
                    <th>จำนวน</th>
                    <th>ราคา</th>
                </tr>
                ";
    $body = "";
    $row=1;
    $total=0;
    while($dataSub = $qSub->fetch_object()){
        $sqlPro = "SELECT * FROM product WHERE id = '$dataSub->id_product'";
        $qPro = $conn->query($sqlPro);
        $dataPro = $qPro->fetch_object();
        $dataTotal = $dataSub->qty*$dataPro->price;
        $body.="
        <tr>
        <th> $row </th>
        <td>  $dataPro->name </td>
        <td>  $dataPro->price</td>
        <td>  $dataSub->qty </td>
        <td>  $dataTotal </td>
        </tr>
        ";
        $row++;
        $sum =  $dataPro->price*$dataSub->qty;
        $total=$total+$sum; 
    }
    $total = "<tr>
                <td colspan='5' style='text-align:right; padding-right:10px'>Total :  $total </td>
            </tr>";
    $end = "
            </table>";

    $mpdf = new Mpdf\Mpdf();
    // $mpdf->WriteHTML($link);
    $mpdf->WriteHTML($style);
    $mpdf->WriteHTML($head);
    $mpdf->WriteHTML($head_body);
    $mpdf->WriteHTML($body);
    $mpdf->WriteHTML($total);
    $mpdf->WriteHTML($end);


    $mpdf->output();
?>