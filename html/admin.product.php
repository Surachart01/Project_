<!-- <?php
    include("connect.php");
    session_start();
    $name = $_SESSION['data_user'];

    $sql="SELECT * FROM customer WHERE name = '$name->name'";
    $qUser = $conn->query($sql);
    $data = $qUser->fetch_object();
?> -->
<!doctype html>
<html lang="en">

<head>
  <title>Admin.Product</title>
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
        <a href="#" class="nav-link active ">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          สินค้า
        </a>
      </li>
      <hr>
      <li>
        <a href="admin.order.php" class="nav-link link-dark ">
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
<?php
  include("connect.php");
  $sql="SELECT * FROM product";
  $qPro = $conn->query($sql);

?>
<div class="col-10  border-1  border-dark mt-3" > 
  <h3 style="text-align: center;">สินค้า</h3>
  <hr>
    <!-- insert -->
    <div class="dropdown">
                                    <p class="btn btn-secondary w-100 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        เพิ่มข้อมูล
                                    </p>
                                      <ul class="dropdown-menu w-100 " style="background-color: #F5FAF0;"  aria-labelledby="dropdownMenuLink">
                                        <li>
                                          
                                        <!-- form edit -->
                                        <form action="admin.insert.php" method="post"  enctype="multipart/form-data">
                                            <h3 style="text-align:center">เพิ่มข้อมูล</h3>
                                            <hr>
                                        <div class="input-group mb-3">
                                          <span class="input-group-text" id="inputGroup-sizing-default" style="width:90px">Name</span>
                                          <input type="text" class="form-control" name="name" style="background-color: #E9EDE4;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                        </div>

                                        <div class="input-group mb-3 " >
                                          <span class="input-group-text" id="inputGroup-sizing-default" style="width:90px">Price</span>
                                          <input type="text" class="form-control" name="price" style="background-color: #E9EDE4;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                        </div>

                                        <div class="input-group mb-3" >
                                          <label class="input-group-text" for="inputGroupFile01">รูปภาพ</label>
                                          <input type="file" class="form-control" name="img" style="background-color: #E9EDE4;" accept="image/*">
                                        </div>
                                        /
                                          <button class="btn btn-success w-100">ยืนยัน</button>
                                        </form>
                                        <!-- end form edit -->
                                      </li>
                                      </ul>
                                    </div>
    <!-- end insert -->
  <hr>
                          <div class="row">
                           <!-- card -->
                        <?php
                        $sql = "SELECT * FROM product";
                        $qPro = $conn->query($sql);
                        while($row = $qPro->fetch_object()){
                        ?>
                           <div class="col-lg-3 col-sm-3 border border-1">
                              <div class="box_main" style="height:400px">
                                 <h5 class="shirt_text" style="height:50px"><?php echo $row->name ?></h5>
                                 <p class="price_text">Price  <span style="color: #262626;"><?php echo $row->price ?></span></p>
                                 <div style="max-height: 400px;"><img src="img_product/<?php echo $row->img ?>" style="height: 200px;"></div>
                                 <div class="container bd-highlight ">
                                 <div class="d-flex justify-content-between ">
                                    <div class="btn btn-danger " style="height:40px"><a href="admin.deletePro.php?id=<?php echo $row->id ?>" style="color: white; text-decoration:none">
                                      ลบ
                                    </a></div>

                                    <div class="dropdown">
                                    <p class="btn btn-secondary w-100 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        แก้ไข
                                    </p>
                                      <ul class="dropdown-menu "  aria-labelledby="dropdownMenuLink">
                                        <li>
                                          
                                        <!-- form edit -->
                                        <form action="admin.edit.php" method="post" style="width:500px" enctype="multipart/form-data">
                                            <h3 style="text-align:center">แก้ไขข้อมูล</h3>
                                            <hr>
                                        <div class="input-group mb-3" style="width:400px">
                                          <span class="input-group-text" id="inputGroup-sizing-default" style="width:90px">Name</span>
                                          <input type="text" class="form-control" name="name" value="<?php echo $row->name ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                        </div>

                                        <div class="input-group mb-3 " style="width:400px">
                                          <span class="input-group-text" id="inputGroup-sizing-default" style="width:90px">Price</span>
                                          <input type="text" class="form-control" name="price" value="<?php echo $row->price ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                        </div>

                                        <div class="input-group mb-3" style="width:400px">
                                          <label class="input-group-text" for="inputGroupFile01">รูปภาพ</label>
                                          <input type="file" class="form-control" name="img"  accept="image/*">
                                        </div>
                                        <input type="hidden" value="<?php echo $row->id ?>" name="id">
                                          <button class="btn btn-success">ยืนยัน</button>
                                        </form>
                                        <!-- end form edit -->
                                      </li>
                                      </ul>
                                    </div>
                                    </a>
                                </div> 
                                 </div>
                              </div>
                           </div>
                           <?php } ?>
                           <!-- end card -->
                        </div>
                     </div>
</div>
<?php 
session_start();
  if(isset($_SESSION['edit'])){?>
      <script> alert(<?php echo $_SESSION['edit'] ?>)</script>
<?php
  }
?>



  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>