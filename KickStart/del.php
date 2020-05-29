<?php
require 'connection.php';
$cid=$_REQUEST['c_id'];
$res=mysqli_query($con,"delete from classdata where class_id='$cid';");
?>