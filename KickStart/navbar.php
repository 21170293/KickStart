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
<nav class="navbar navbar-light bg-info " style="color:white;" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header ">
        <button type="button " class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">KickStart</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
        <ul class="nav navbar-nav navbar-right">
            <li> <a data-toggle="modal" data-target='<?php echo $data; ?>' href="# " ><?php echo $sign; ?></a></li>
            <li><a href="createclass.php" id="b1"  >Create Class</a></li>
            <li><a href="about.php">About</a></li>
            <?php echo $code;?>
        </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>