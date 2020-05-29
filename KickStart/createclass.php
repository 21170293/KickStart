<?php
error_reporting(1);
session_start();
if($_SESSION['instructor']==""){
    $data='#LOG';
    $sign='SignIn';
    header("Location: index.php");
}
else{
    $data='';
    $name=$_SESSION['instructor'];
    $code="<li><a href='logout.php'>Logout</a></li>";
    $sign='Welcome, '.$name;
}

$msg=$_REQUEST['msg'];
$c_id=$_REQUEST['cid'];
?>
<!DOCTYPE html>
<html>
    <head>
    <script>
     function del(button){
        var ajax=new XMLHttpRequest();//Call Ajax
        var method="GET";
        var url="del.php?c_id="+button.id;
        var asynchronous=true;
        ajax.open(method,url,asynchronous);
        //Sending request
        ajax.send();
        //receiving response
        ajax.onreadystatechange=function()
        {
        if(ajax.readyState==4&&ajax.status==200)
        {
            window.location.reload();
        }
        }
     }
    </script>
        <?php require 'header-links.php' ?>
    </head>
    <body>
        <?php require 'navbar.php' ?>
        <div class="container">
            <div class="row">
                <div class="panel panel-danger">
                    <div class="panel-heading ">
                        <h3 class="panel-title text-center">Create Classes</h3>
                    </div>
            <!-- Nav tabs -->
                <ul class="nav nav-tabs text-center">
                <li class="active"><a href="#O" data-toggle="tab">Online Class</a></li>
                <li><a href="#Y" data-toggle="tab"> YouTube Class</a></li>
                <li><a href="#L" data-toggle="tab">Live Class</a></li>
                <li><a href="#cl" data-toggle="tab">Class Details</a></li>
                <li><a href="#cc" data-toggle="tab">Class Control</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                <div class="tab-pane " id="cl">
                    <div class="container-fluid">
                        <div class="row">
                            
                            <div class="col-sm-12 decor">
                            <?php require 'classes.php'; ?>
                            </div>
                       
                        </div>
                    </div>
                </div>
                <div class="tab-pane " id="cc">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10 decor">
                                <h2 class="text-center heading bg-info">This page is under construction :)</h2>
                            </div>
                            <div class="col-sm-1"></div>    
                        </div>
                    </div>
                </div>
                <div class="tab-pane active" id="O">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6 decor">
                            <?php require 'classform.php'; ?>
                            </div>
                            <div class="col-sm-3"></div>    
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="Y">
                <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6 decor">
                            <?php require 'youtubeclass.php'; ?>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="L">
                <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6 decor">
                            <?php require 'liveclass.php'; ?>
                            </div>
                            <div class="col-sm-3"></div>    
                        </div>
                    </div>
                </div>

                </div><!--Tab content close-->
                </div><!--Panel close--> 
            </div><!-- row close-->
        </div><!-- CONTAINER CLOSE-->
    </body>
</html>

