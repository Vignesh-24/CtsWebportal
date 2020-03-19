<?php
require 'dbconnect.php';
session_start();
if(isset($_SESSION['user']))
{
$uname=$_SESSION['user'];
}
else
{
  header("Location: index.php");
  exit;
}
if(isset($_GET['rno']))
{
$rno=$_GET['rno'];
}
else{
$rno=$_SESSION['user'];}
$res=mysqli_query($scon,"select * from login where RollNo='$rno'");
$row=mysqli_fetch_array($res);
$name=$row['username'];
$email=$row['email'];
$pass=$row['password'];
$no=$row['phone'];
$path=$row['imagepath'];
$bio=$row['bio'];
?>
<!DOCTYPE html>
<html lang="en">
    <style>
        a{
            font-size: 20px;
        }
    </style>
           
<head>
	<title>Profile</title>
	<meta charset="UTF-8">
	<meta name="description" content="Civic - CV Resume">
	<meta name="keywords" content="resume, civic, onepage, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700" rel="stylesheet">

	<link rel="stylesheet" href="css1/bootstrap.min.css"/>
	<link rel="stylesheet" href="css1/font-awesome.min.css"/>
	<link rel="stylesheet" href="css1/flaticon.css"/>
	<link rel="stylesheet" href="css1/owl.carousel.css"/>
	<link rel="stylesheet" href="css1/magnific-popup.css"/>
	<link rel="stylesheet" href="css1/style.css"/>
  
    
</head>
<body>
    
	
	<div id="preloder">
		<div class="loader"></div>
	</div>
    <div id="wrapper">
    <header>
      <div class="top"> 
      </div>
      <div class="container-fluid">
          <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#"><h4 style="color:white;">COGNIZANT CLUB</h4></a>
              <div class="mr-auto"></div>

  <ul class="navbar-nav">
    <li class="nav-item px-2">
      <a class="nav-link" href="index1.php">Home</a>
    </li>
    <li class="nav-item active px-2">
      <a class="nav-link" href="profile.php">Profile</a>
    </li>
    <li class="nav-item px-2">
      <a class="nav-link" href="activity.php">My Activites</a>
    </li>
      <li class="nav-item px-2">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
  </ul>
</nav>

      </div>
    </header>
    </div>
	
		<section class="hero-section spad">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-10 offset-xl-1">
					<div class="row">
						<div class="col-lg-8">
							<div class="hero-text">
								<h2 style="font-size:70px;"><?php echo strtoupper($name);?></h2>
								<p><?php echo $bio;?></p>
							</div>
							<div class="hero-info">
								<h2>General Info</h2>
								<ul>
									<li><span>User ID</span><?php echo $rno;?></li>
									<li><span>E-mail</span><?php echo $email;?></li>
                  <li><span>Phone </span><?php echo $no;?></li>
                  <?php if(!isset($_GET['rno'])){ ?>
									<li class="py-2"></li>
									<li><a href="" class="btn btn-large btn-success " data-toggle="modal" data-target="#modalcontact">Edit Profile</a></li>
                  <?php } ?></ul>
							</div>
						</div>
						<div class="col-lg-4">
							<figure class="hero-image">
								<img src="<?php echo $path; ?>" alt="5">
							</figure>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<form action="updateprofile.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="modalcontact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Update Profile</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
         <label data-error="wrong" data-success="right" for="form34">Full Name</label>
          <input type="text" id="form34" name="fullname"  value="<?php echo $name;?>" class="form-control validate" placeholder="Enter Your Name">
          
        </div>

        <div class="md-form mb-5">
           
          
          <label data-error="wrong" data-success="right" for="form29">Email</label>
            <input type="email" id="form29" name="email"  value="<?php echo $email;?>" class="form-control validate" placeholder="abc@mail.com">
        </div>

        <div class="md-form mb-5">
            <label data-error="wrong" data-success="right" for="form32">Phone</label>
          <input type="number" id="form32" name="phn"  value="<?php echo $no;?>" class="form-control validate" placeholder="Enter phn number">
          
		</div>
		
		<div class="md-form mb-5">
            <label data-error="wrong" data-success="right" for="form32">New Password</label>
          <input type="password" id="form32" name="pass"  value="<?php echo $pass;?>" class="form-control validate" placeholder="Enter phn number">
          
        </div>
          
        <div class="md-form mb-5">
            <label data-error="wrong" data-success="right" for="form32">Upload Photo</label>
          <input type="file" id="form32" name="photo"  value="<?php echo $path;?>" class="form-control validate">
        </div>

        <div class="md-form">
          
          <label data-error="wrong" data-success="right" for="form8">Bio</label>
            <input type="text" id="form8" name="bio"  value="<?php echo $bio;?>" class="form-control validate">
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-success" name="submit">SUBMIT</button>
      </div>
    </div>
  </div>
</div>
</form>



    <script src="js1/jquery-2.1.4.min.js"></script>
	<script src="js1/bootstrap.min.js"></script>
	<script src="js1/owl.carousel.min.js"></script>
	<script src="js1/magnific-popup.min.js"></script>
	<script src="js1/circle-progress.min.js"></script>
	<script src="js1/main.js"></script>
	
</body>
</html>