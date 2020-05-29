<?php
echo 'YES';
require 'connection.php';
$name=$_POST['t1'];
$email=$_POST['t2'];
$pass=$_POST['t3'];
$sql="insert into instructor(name,email,pass) values('$name','$email','$pass');";
$res=mysqli_query($con,$sql);
$mgs='Account Created Successfully :)';
if($res>0)
{
    header('Location:index.php?msg='.$mgs); 
}
else
{  $mgs='Proble in Account Creation :(';
   header('Location:index.php?msg='.$mgs);
}
echo $msg;
?>