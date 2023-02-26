<?php
   include("connect.php"); 
   $name = $_POST['name'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $pass = md5($password);
   $sql = "INSERT INTO customer (name,email,password) VALUE('$name','$email','$pass')";
   $qCus = $conn->query($sql);
   if(isset($qCus)){
        header("Location:login.php");
   }
?>

//success