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

?>
<!DOCTYPE html>
<html>
<head>
  <title>Club Members</title>
<style>
        a{
            font-size: 20px;
        }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compact Gallery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
    <link rel="stylesheet" href="compact-gallery.css">
</head>
<body style="background:wheat">
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
    <li class="nav-item  px-2">
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
    <section class="gallery-block compact-gallery">
        <div class="container" style="background:#000000;">
            <div class="heading">
                <h1 style="color:wheat;">Cognizant Club Members</h1>
            </div>
             <?php
            $res=mysqli_query($scon,"select * from login");
            ?>
            <div class="row no-gutters">
                <?php
                while($row=mysqli_fetch_array($res))
                {
                    $path=$row['imagepath'];
                    $name=$row['username'];
                    $rno=$row['RollNo'];
                ?>
                <div class="col-md-6 col-lg-4 item zoom-on-hover">
                    <a class="lightbox" href='<?php echo "profile.php?rno=".$rno;?>'>

                   
                    <div class="embed-responsive embed-responsive-1by1">
                    <img class="img-fluid image py-2 px-2 embed-responsive-item" src='<?php echo $path;?>'>
                    </div>
                        <span class="description">
                           <span class="description-heading" style="font-size:30px;"> <?php echo strtoupper($name); ?></span>
                            <span class="description-body">Cognizant Club Member</span>
                        </span>
                    </a>
                </div>
                <?php } ?>
               
               
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.compact-gallery', { animation: 'slideIn'});
    </script>
</body>
</html>
