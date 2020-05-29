<?php
session_start();
$v_id=$_REQUEST['v_id'];
$video_id = explode("?v=", $v_id);
$plt=$_REQUEST['plt'];
$sub=$_REQUEST['sub'];
if(isset($_POST['button'])){
    echo '<script type="text/JavaScript"> 
    player.playVideo(); 
    </script>';
  }
  echo '<script type="text/JavaScript"> 
  stopVideo(); 
  </script>';
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require 'header-links.php'; ?>
        <script>
        function ask(){
            var que=prompt('Write question here to ask  !');
        }
        function play(){
            
        }
        function stop(){
            
            stopVideo();
        }
        function callstart(){
            $.ajax({
                type :"POST",
                url : "whiteboard.php",
                data : {button : "start"},
                success :function(){
                },
                datatype: "json"
            });
        }
        </script>
    </head>
    <body>
    <?php require 'navbar.php'; ?>
    <?php require 'subnavbar.php'; ?>
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-2"></div>
          <div class="col-sm-10">
          <?php
          if($plt=='y'){
              require 'youtubeplayer.php';

        }
        if($plt=='v'){
        
        }
        if($plt=='l'){
        
        }
                  ?>
          </div>
        </div>
    </div>
    </body>
</html>