<?php
require 'connection.php';
$email=$_COOKIE['email'];
$iname=$_POST['y1'];
$cpass=$_POST['y2'];
$ylink=$_POST['y3'];
$sub=$_POST['y4'];
$time=$_POST['y5'];
$plt='y';
$c_id='y'.time();
$query="insert into classdata(platform,sub_topic,time_start,time_end,class_id,class_pass,email,video_link) values ('$plt','$sub','$time',NULL,'$c_id','$cpass','$email','$ylink');";
//$query="INSERT INTO classdata(platform,sub_topic,time_start,time_end,class_id,class_pass,video_link) VALUES ('$plt','$sub',NULL,NULL,'$c_id','$cpass','$ylink');";
            //$res=mysqli_query($query);
            $res = mysqli_query($con, $query) or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($con), E_USER_ERROR);
            $msg1="Class Created Successfully ";
			if($res==1){
				header("Location:createclass.php?msg=".$msg1."&cid=".$c_id);
            }
            
			
			else{
                $msg1='Unsuccessful';

				header("Location:createclass.php?msg=".$msg1."&cid=".$c_id);
			
			}
?>