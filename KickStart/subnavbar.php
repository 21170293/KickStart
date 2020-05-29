<?php require 'connection.php' ;
error_reporting(0);
session_start();

if($_SESSION['instructor']==""){
    $data="#LOG";
    $sign='SignIn';
}
else{
    $data='';
    $name=$_SESSION['instructor'];
    $code="<li><a href='logout.php'>Logout</a></li>";
    $sign='Welcome, '.$name;
}

?>
<div class="container text-center">
<nav class="navbar navbar-light bg-info " style="color:white;" role="navigation">
    <div class="container text-center"style="padding:20px;">
        <!-- Brand and toggle get grouped for better mobile display -->
        <input type="button"style="margin-right:20px;" value="Start" onclick="callstart();" class="btn btn-success btn-sm" >
        <input type="button"style="margin-right:20px;" value="Pause" onclick="stop();" class="btn btn-success btn-warning btn-sm" >
        <input type="button" style="margin-right:20px;" value="End " class="btn btn-danger btn-sm" >
        <input type="button" style="margin-right:20px;" value="Ask question" onclick="ask();" class="btn btn-info btn-sm" >
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
</div>