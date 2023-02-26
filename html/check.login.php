<?php

session_start();
include("connect.php");
$email = $_POST['email'];
$password = md5($_POST['password']);
 // sql injection

 echo $email.$password;

 $sql = "SELECT * FROM customer where email = '$email' and password = '$password' ";
 $qUser = $conn->query($sql);
 $row = $qUser->num_rows;
   $data = $qUser->fetch_object();
 if($row==1){
   if($data->status == 2){
      $_SESSION['data_admin'] = $data;
      header("Location:admin.product.php");
   }else{
      $_SESSION['data_user'] = $data;
    header("location:index.php");
   }
    
 }else {
    header("location:login.php");
    $_SESSION['msg_login'] = "Login_faile";
 }
?>