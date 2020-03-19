<?php
require 'dbconnect.php';
session_start();
if(isset($_POST['submit']))
{
$rno=$_SESSION['user'];
$name=$_POST['eventname'];
$date=$_POST['datee'];
$time=$_POST['timee'];
$objective=$_POST['obj'];
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            if(file_exists("upload/" . $filename)){
                echo $filename . " is already exists.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $filename);
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
    $up="upload/".$filename;

if(mysqli_query($scon,"update user_info set path='$up',status=1,objective='$objective' where username='$rno' and date='$date' and event='$name' and time='$time' and status=0"))
{
    header("Location:activity.php");
    exit;
}
}
?>
