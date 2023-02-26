<!doctype html>
<html lang="en">

<head>
  <title>Cart</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>

<section class="h-100 h-custom" style="background-color: #d2c9ff;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <?php
                  include("connect.php");
                     $sql = "SELECT * FROM cart ";
                     $qCart = $conn->query($sql);
                     $num_row = $qCart->num_rows;
                  ?>
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black"> Cart</h1>
                    <h6 class="mb-0 text-muted"><?php echo $num_row ?> &nbsp;items</h6>
                  </div>
                  <hr class="my-4">
                  <?php 
                    $total = 0;
                  ?>
                  <!-- start -->
                  <?php 
                    while($row = $qCart->fetch_object()){
                  ?>
                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img
                        src="img_product/<?php echo $row->img ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <h6 class="text-muted"><?php echo $row->name ?></h6>
                      <h6 class="text-muted">ราคาต่อหน่วย ฿ <?php echo $row->price ?> </h6>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">

                      <input  min="0"  value="<?php echo $row->qty ?>" disabled type="number"
                        class="form-control form-control-sm" >
                        <input type="hidden" value="">
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <div class="d-flex justify-content-center">
                      <h6 class="mt-2">฿ <?php 
                      $totalPrice= $row->qty*$row->price; 
                      echo $totalPrice ;?></h6>
                      <div class="btn btn-danger " style="margin-left: 10px;" ><a href="delete.php?id=<?php echo $row->id_pro?>" style="color: #d2c9ff;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash " viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></a>
                      </div></div>
                    </div>
                    
                  </div>
                  <hr class="my-4">
                  <?php 
                    $total = $total+$totalPrice;
                  ?>
                  <?php } ?>
                  <!-- end -->
                  <div class="pt-5 d-flex justify-content-between">
                    <h6 class="mb-0"><a href="index.php" class="text-body">Back to shop</a></h6>
                    <h6 class="mb-0"><a href="delete.php?id=all" class="text-body"> Clear </a></h6>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 bg-grey">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase"><?php echo $num_row ?> items </h5>
                  </div>

                 
              
                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Total price</h5>
                    <h5>฿ <?php echo $total ?></h5>
                  </div>

                  <button  class="btn btn-dark btn-block btn-lg"
                    data-mdb-ripple-color="dark"><a href="insert.order.php" style="text-decoration:none;" class="text-light">Submit</a> </button>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>