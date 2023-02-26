 <?php
    include("connect.php");
    session_start();

?>
<!doctype html>
<html lang="en">

<head>
  <title>Admin.Order</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
<div class="row ">
<div class="col-2  border-1 border-end border-dark bg-light mt-3">
<div class="d-flex flex-column bg-light p-4 " style="width: 100%; height:1050px">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">Admin<?php echo "  ".$_SESSION['data_admin']->name ?></span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li>
        <a href="admin.product.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          สินค้า
        </a>
      </li>
      <hr>
      <li>
        <a href="#" class="nav-link active">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          คำสั่งจอง
        </a>
      </li>
      <hr>
      <li>
        <a href="logout.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Logout
        </a>
      </li>
      <hr>
    </ul>  
</div>
</div>
<div class="col-10  border-1 border-end border-dark mt-3" > 
  
  <h2 style="text-align: center;">ออร์เดอร์สินค้า</h2>
  <hr class="w-100">
  <div class="container">

  <?php  
    $sql="SELECT * FROM ord";
    $qOrd = $conn->query($sql);
    

   ?>
   <?php while($dataOrd = $qOrd->fetch_object()){ 
    $sql2 = "SELECT * FROM customer WHERE id = '$dataOrd->id_cus'";
    $qUser = $conn->query($sql2);
    $dataU = $qUser->fetch_object();
    ?>
  <div class="dropdown mb-1" >
  <div class="btn btn-secondary dropdown-toggle w-100" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    <div class="d-flex justify-content-start">
    เลขที่ออเดอร์ :<?php echo $dataOrd->id ?> &nbsp;&nbsp;&nbsp;ชื่อผู้สั่ง : <?php echo $dataU->name ?> &nbsp;&nbsp;&nbsp;วันที่ : <?php echo $dataOrd->time?>
  </div>
  </div>
  <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="#">
      <!-- start_table -->
      <?php
        $sql3 = "SELECT * FROM ordsub WHERE id_ord = '$dataOrd->id'";
        $qSub = $conn->query($sql3);
      ?>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ชื่อสินค้า</th>
      <th scope="col">ราคา (ต่อหน่วย)</th>
      <th scope="col">จำนวน</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $row = 1;
      while($dataSub = $qSub->fetch_object()){
        $sqlPro = "SELECT * FROM product WHERE id = '$dataSub->id_product'";
        $qPro = $conn->query($sqlPro);
        $dataPro = $qPro->fetch_object();
    ?>
    <tr>
      <th scope="row"><?php echo $row ?></th>
      <td><?php echo $dataPro->name ?></td>
      <td><?php echo $dataPro->price ?></td>
      <td><?php echo $dataSub->qty ?></td>

    </tr>
        
    <?php 
    $row++;
    $total=0;
    $sum =  $dataPro->price*$dataSub->qty;
    $total=$total+$sum; 
      }
    ?>
    <tr>
      <td colspan="4" style="text-align: end;">ราคารวม : <?php echo $total  ?></td>
    </tr>
  </tbody>
</table>


<!-- end_table -->
<button class="btn btn-dark " style="margin-left:20px; width:200px"><a href="output.pdf.php?id_ord=<?php echo $dataOrd->id; ?>" class="text-light" style="text-decoration:none; ">PDF</a></button>

    </a></li>
  </ul>
  
</div>

<?php } ?>
  </div>
</div>
</div>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>