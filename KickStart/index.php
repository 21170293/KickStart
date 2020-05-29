<?php require 'connection.php' ;
error_reporting(0);
session_start();

if($_SESSION['instructor']==""){
    $data='#LOG';
    $sign='SignIn';
}
else{
    $data='';
    $name=$_SESSION['instructor'];
    $code="<li><a href='logout.php'>Logout</a></li>";
    $sign='Welcome, '.$name;
}
$msg=$_REQUEST['msg'];
if ($msg){
echo "<script type='text/JavaScript'>  
      alert('$msg'); </script>";
    }   
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require 'header-links.php' ?>
    </head>
    <body>
        <?php require 'navbar.php' ?>
        <!-- Nav BAR -->
        <div class="container">
            <div class="row">
                 <!-- JOIN MEETING FORM -->
                <!-- <div class="col-md-3"></div>-->
                <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading ">
                        <h3 class="panel-title text-center">Join Meeting</h3>
                    </div>
                    <div class="panel-body">
                    <?php require 'joinform.php' ?>
                    </div>
                </div>
                </div>
                <!---->
                <div class="col-md-6">
                <iframe id="fr"  style="border:none;" src="https://web-chat.global.assistant.watson.cloud.ibm.com/preview.html?region=eu-gb&integrationID=5e0e28bc-4407-4a6f-9031-edcaac00a861&serviceInstanceID=e4a1b26b-41cd-470a-976d-704d445da9c5" scrolling="no" height="650" width="530"></iframe>
                </div>
            </div>    
        </div>
        <?php require 'Logging.php' ?>
    </body>
    <script type = "text/javascript">
         <!--
            function Redirect() {
               window.location = "classroom.php";
            }
         //-->
      </script>
</html>