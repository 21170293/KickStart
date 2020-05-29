<?php
//error_reporting(1);
session_destroy();
session_start();
require 'connection.php';
    $_SESSION['user']=$_POST['m0'];
    $class_id=$_POST['m1'];
    $pass=$_POST['m2'];
    $query="Select * from classdata where class_id='$class_id' and class_pass='$pass';";
    $res=mysqli_query($con,$query);
    if($row=mysqli_fetch_array($res,MYSQLI_BOTH))
    {       
        if($row[0]=='y'){
            $sub=$row[1];
            $ts=$row[2];
            $te=$row[3];
            $vlink=$row[7];
            $type='y';
            header("Location:classroom.php?type=$type&sub=$sub&&vlink=$vlink&&ts=$ts&&te=$te");
        }
        if($row[0]=='v'){
            $type='v';
            header("Location:classroom.php");

        }
        if($row[0]=='l'){
            $type='l';
            header("Location:classroom.php");

        }
    }
    else{
    header("Location:index.php");
    }
?>