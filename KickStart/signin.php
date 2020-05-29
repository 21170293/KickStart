<?php
session_start();
require 'connection.php';
    $email=$_POST['t4'];
    setcookie('email',$email);
    $pass=$_POST['t5'];
    $query="Select * from instructor where email='$email' and pass='$pass';";
    echo $query;
    $res=mysqli_query($con,$query);
    $row=mysqli_fetch_array($res,MYSQLI_BOTH);
    if($row)
    {
        $_SESSION['instructor']=$row[0];
        header("Location:index.php?msg=You are logged in as ,".$row[0]);
    }
    else{
    header("Location:index.php?msg=error");
    }
    
?>