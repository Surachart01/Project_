<?php
    include("connect.php");
    session_start();
    $name = $_SESSION['data_user'];

    $sql="SELECT * FROM customer WHERE name = '$name->name'";
    $qUser = $conn->query($sql);
    $data = $qUser->fetch_object();
?>
<!doctype html>
<html lang="en">

<head>
  <title>Profile</title>
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
      <span class="fs-4">Profile</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li>
        <a href="#" class="nav-link active ">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          ข้อมูลส่วนตัว
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
<div class="col-3  border-1 border-end border-dark mt-3" > 
    <div class="container" style="margin-top: 50px;">
        <?php if(isset($data->img)){
                        $img = $data->img; 
                     }else{ 
                        $img = "profile-pic.jpeg";
                     } ?>
                <img src="img_profile/<?php echo $img ?>" height="400px">
                <br>
                <label for="formFileDisabled" class="form-label mt-5"> เปลี่ยนรูปภาพ</label>
                <input class="form-control" type="file" id="formFileDisabled" style="width:400px">
        
    </div>
</div>
<div class="col mt-3">
    <div class="container mt-5">
        <h2 style="text-align: center;" class="mb-5">ข้อมูลส่วนตัว</h2>
        <div class="input-group mb-3" style="width:100%;">
            <span class="input-group-text " id="basic-addon1" style="margin-left: 200px; width:100px">Name</span>
            <input type="text" class="form-control" value="<?php echo $data->name ?>"  style="margin-right: 100px;" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3" style="width: 100%;">
            <span class="input-group-text " id="basic-addon1" style="margin-left: 200px; width:100px">Email</span>
            <input type="email" class="form-control" value="<?php echo $data->email ?>" style="margin-right: 100px;"  aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3" style="width:100%">
            <span class="input-group-text " id="basic-addon1" style="margin-left: 200px; width:100px">tel</span>
            <input type="email" class="form-control" value="<?php echo $data->tel ?>" style="margin-right: 100px;"  aria-label="Username" aria-describedby="basic-addon1">
        </div>
        
            <button class="form-control btn btn-danger mt-2" style="width:100px; margin-left: 200px;">ยืนยัน</button>
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