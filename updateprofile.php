<?php
require 'dbconnect.php';
session_start();
if(isset($_SESSION['user']))
{
$rno=$_SESSION['user'];
}
else
{
  header("Location: index.php");
  exit;
}
if(isset($_POST['submit']))
{
    $name=$_POST['fullname'];
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $bio=$_POST['bio'];
    $phone=$_POST['phn'];
        if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $filename)){
                echo $filename . " is already exists.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $filename); 
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        //echo "Error: " . $_FILES["photo"]["error"];
        $filename="";
    }
    if($filename==""){
    $sql="update login set username='$name',password='$password',phone='$phone',email='$email',bio='$bio' where RollNo='$rno'";
    }
    else
    {$up="upload/".$filename;
    $sql="update login set username='$name',password='$password',phone='$phone',email='$email',imagepath='$up',bio='$bio' where RollNo='$rno'";
    }
    if(mysqli_query($scon,$sql))
        {
        header("Location: profile.php");
        exit;
    }
}
?>
