<?php
    require 'connection.php';
    $email=$_COOKIE['email'];
      $plt='v';
      $sub=$_POST['t8'];
      $time=$_POST['t4'];
      $c_id='v'.time();
      $cpass=$_POST['t3'];
      $name=$_FILES['file']['name'];
      $temp =$_FILES['file']['tmp'];
      move_uploaded_file($temp,"uploaded/".$name);
      $url="uploaded/$name";
      $query="insert into classdata(platform,sub_topic,time_start,time_end,class_id,class_pass,email,video) values ('$plt','$sub','$time',NULL,'$c_id','$cpass','$email','$url');";
     $res = mysqli_query($con,$query);
     $msg1="Class Created Successfully ";
     if($res==1){
       header("Location:createclass.php?msg=".$msg1."&cid=".$c_id);
           }
           
     
     else{
               $msg1='Unsuccessful';

       header("Location:createclass.php?msg=".$msg1."&cid=".$c_id); 
    }
  ?>