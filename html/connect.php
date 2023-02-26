<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shop_project";

    $conn = new mysqli($host,$username,$password,$dbname);
    if(!$conn){
        die("Connection failed ".$conn->connect_error);
    }
        // else{
    //     echo "Success";
    // }
?>