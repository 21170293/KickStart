<?php
require 'connection.php';
session_start();
$email=$_COOKIE['email'];
$topic=array();
$time=array();
$c_id=array();
$c_pass=array();
$link=array();
$plt=array();
$query="select * from classdata where email='$email';";
$res=mysqli_query($con,$query);
while($row=mysqli_fetch_array($res))
{
$topic[]=$row['sub_topic'];
$time[]=$row['time_start'];
$c_id[]=$row['class_id'];
$c_pass[]=$row['class_pass'];
$link[]=$row['video_link'];
$plt[]=$row['platform'];
}
$len=sizeof($topic);
?>
<table class="table table-bordered table-hover table-responsive" style="border-color:black;">
      <thead >
        <tr  >
          <th style="text-align:center;">Topic</th>
          <th style="text-align:center;">Time</th>
          <th style="text-align:center;">Class id</th>
          <th style="text-align:center;">Class Password</th>
          <th style="text-align:center;">video link(only for youtube)</th>
          <th style="text-align:center;" colspan="4">Option</th>
        </tr>
      </thead>

<?php
for($i=0;$i<$len;$i=$i+1)
{ 
echo '<tbody>
<tr>
<td>'.$topic[$i].'</td>
<td>'.$time[$i].'</td>
<td>'.$c_id[$i].'</td>
<td>'.$c_pass[$i].'</td>
<td>'.$link[$i].'</td>
<td><a  class="btn btn-success btn-sm" href="whiteboard.php?v_id='.$link[$i].'&plt='.$plt[$i].'&sub='.$topic[$i].'" target="_blank"  id="'.$c_id[$i].'">Goto class</a></td>
<td><input type="button" value="Edit" class="btn btn-info btn-sm" id="'.$c_id[$i].'"></td>
<td><input type="button" value="Delete" onclick="del(this);" class="btn btn-danger btn-sm" id="'.$c_id[$i].'"></td>
<td><input type="button" value="Share" onclick="(this);" class="btn btn-success btn-sm" id="'.$c_id[$i].'"></td>
</tr>
</tbody>';

}?>
</table>





