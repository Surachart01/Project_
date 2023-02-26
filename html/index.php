<?php
   session_start();
   include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Shop</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesoeet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!-- banner bg main start -->
      <div class="banner_bg_main">
        
         
         <!-- header section start -->
         <div class="header_section">
            <div class="container">
               <div class="containt_main pl-4 pt-2 pb-2  border border-0 rounded" style="background-color: #3D382F; margin: bottom 20px;">
                  <div id="mySidenav" class="sidenav " >
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <a href="index.html">หน้าหลัก</a>
                     <!-- <a href="history.php">ประวัติการจอง</a> -->
                     <a href="logout.php">ล็อคเอ้า</a>
                  </div> 
                  <span class="toggle_icon" onclick="openNav()"><img src="images/toggle-icon.png"></span>
                  <div class="header_box" style="margin-left: 800px;">
                     <div class="login_menu">
                        <ul >
                           <li ><a href="cart.php">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                              <span class="padding_10">Cart</span></a>
                           </li>
                           <li><a href="#">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <span class="padding_10" style="padding-left:10px"><?php if(isset($_SESSION['data_user'])){
                                 echo $_SESSION['data_user']->name;
                                 } else{?>
                                  <a href="login.php">Login</a></a>
                                 <?php } ?>
</span></a>
                           </li>
                        </ul>
                     </div>
                  </div>
              </div>
            
         </div>
        </div>
         <!-- header section end -->
         <!-- banner section start -->
         
         
               </div>

         <!-- banner section end -->
      </div>
      <!-- banner bg main end -->
      <!-- fashion section start -->
      <div class="fashion_section">
         <div id="main_slider" class="carousel slide" data-ride="carousel">
                   <h1 class="fashion_taital" >ไส้กรอกจอมป่วน</h1>
                   <div class="container">
    <!-- product -->
                     <div class="fashion_section_2">
                        <div class="row">
                           <!-- card -->
                        <?php
                        $sql = "SELECT * FROM product";
                        $qPro = $conn->query($sql);
                        while($row = $qPro->fetch_object()){
                        ?>
                           <div class="col-lg-3 col-sm-3">
                              <div class="box_main" style="height:500px">
                              <?php
                                 if(isset($_SESSION['msg_InsertCart'])){?>
                                    <p><?php echo $_SESSION['msg_InsertCart']?></p>
                                 <?php } ?>
                              
                                 <h5 class="shirt_text" style="height:50px"><?php echo $row->name ?></h5>
                                 <p class="price_text">Price  <span style="color: #262626;"><?php echo $row->price ?></span></p>
                                 <div style="max-height: 400px;"><img src="img_product/<?php echo $row->img ?>" style="height: 200px;"></div>
                                 <div class="container d-flex align-items-baseline bd-highlight h-100">
                                    <div class="buy_bt ">
                                       <form action="insert.cart.php" method="post" style="margin-top: 20px;">
                                          <input type="number" name="qty" value=1 class="form-control">
                                          <input type="hidden" value=<?php echo $row->name ?>  name="name_pro">
                                          <input type="hidden" value=<?php echo $row->price ?>  name="price_pro">
                                          <input type="hidden" value=<?php echo $row->id ?>  name="id_pro">
                                          <input type="hidden" value=<?php echo $row->img ?>  name="img_pro">
                                          <button class="btn btn-secondary mt-1">add to cart</button>
                                       </div>
                                       </form>
                                 </div>
                              </div>
                           </div>
                           <?php } ?>
                           <!-- end card -->
                        </div>
                     </div>
   <!-- end product -->
                  </div>
               </div>
               
      </div>
      <!-- fashion section end -->
      
      <!-- footer section start -->
         
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">© 2023 Surachart Limrattanaphun and Ittisak sasirot</p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script>
   </body>
</html>