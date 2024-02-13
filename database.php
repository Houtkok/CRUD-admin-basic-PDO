<?php
    $host = "localhost:3360";
    $username = "root";
    $password = "";
    $dbname = "test";
    // $con = mysqli_connect($host, $username, $password, $dbnam);
    try{
        $con = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "fail" ; 
    }?>

