<?php
require 'dbconnect.php';
session_start();
if(isset($_POST['submit']))
{
$rno=$_SESSION['user'];
$name=$_POST['eventname'];
$date=$_POST['datee'];
$time=$_POST['timee'];
$des=$_POST['des'];
$ty=$_POST['type'];
$one=$_POST['patner1'];
$two=$_POST['patner2'];
  $up="upload/".$ty.".jpg";
if(mysqli_query($scon,"insert into user_info values('$rno','$date','$time','$up','$des','$name',0,'$one','$two','$ty',NULL,'a','$up')"))
{
    header("Location:activity.php");
    exit;
}
}
?>
