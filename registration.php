<?php
require 'dbconnect.php';
session_start();
if(isset($_POST['submit']))
{
    $name=$_POST['uname'];
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $rollno=$_POST['rollno'];
    $bio=$_POST['bio'];
    $phone=$_POST['phone'];
    $degree=$_POST['deg'];
    $branch=$_POST['branch'];
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
        echo "Error: " . $_FILES["photo"]["error"];
    }
    $up="upload/".$filename;
    $sql="Insert into login values('$name','$password','$email','$phone','$up','$rollno','$bio','$branch','$degree')";
    if(mysqli_query($scon,$sql))
        {
            $_SESSION['register']=1;
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<body style="background-color:#202020;">
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-5" style="color:white;">Cognizant Club</h2>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card border-secondary">
                        <div class="card-header">
                            <h3 class="mb-0 my-2">Sign Up</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" method="post" action="registration.php" enctype="multipart/form-data">
                                 <div class="form-group">
                                    <label for="inputName">Roll No</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="Enter Roll No" name="rollno">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Name</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="full name" name="uname">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Degree</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="Degree" name="deg">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Branch</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="branch" name="branch">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3">Email</label>
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="email@gmail.com" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3">Password</label>
                                    <input type="password" class="form-control" id="inputPassword3" placeholder="password" title="At least 6 characters with letters and numbers" name="pass">
                                </div>
                                <div class="form-group">
                                    <label for="phoneno">Phone No</label>
                                    <input type="tel" class="form-control" id="inputPassword3" placeholder="phoneno." name="phone">
                                </div>
                                 <div class="form-group">
                                    <label for="inputName">Bio</label>
                                     <input type="text" class="form-control" id="inputBio3" placeholder="Your description" name="bio">
                                </div>
                                <div class="form-group">
                                    <label for="inputVerify3">Upload image</label>
                                   <input type="file" name="photo" id="fileSelect">
                                </div>
                                <div class="form-group">
                                    <button name="submit" type="submit" class="btn btn-success btn-lg float-right">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    <!--/row-->
</div>
    </body>
<!--/container-->
    </html>