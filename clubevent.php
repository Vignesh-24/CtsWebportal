<?php
require 'dbconnect.php';
session_start();
if(isset($_SESSION['user']))
{
$user=$_SESSION['user'];
}
else
{
  header("Location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Events</title>
    <link rel="stylesheet" href="css1/bootstrap.min.css"/>
	<link rel="stylesheet" href="css1/font-awesome.min.css"/>
	<link rel="stylesheet" href="css1/flaticon.css"/>
	<link rel="stylesheet" href="css1/owl.carousel.css"/>
	<link rel="stylesheet" href="css1/magnific-popup.css"/>
    <link rel="stylesheet" href="css1/style.css"/>
    <style>
        a{
            font-size: 20px;
        }

        </style>
</head>
<body>
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
    <li class="nav-item px-2 ">
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
    <div class="container-fluid ">
    <div class="row py-3">
    <?php
    $res=mysqli_query($scon,"select * from user_info where username!='$user' and patner1!='$user' and patner2!='$user' and status=1");
    while($row=mysqli_fetch_array($res))
    {
    
        $user=$row['username'];
        $partner1=$row['patner1'];
        $partner2=$row['patner2'];
          
        $res1=mysqli_query($scon,"select username from login where RollNo='$user' || RollNo='$partner1' || RollNo='$partner2'");
        $event=$row['event'];
        $date=$row['date'];
        $time=$row['time'];
        $description=$row['description'];
        $path=$row['path'];
    ?>
    
            <div class="col-lg-6 col-md-12 py-4">
            <div class="card h-100 border-success">
            <div class="embed-responsive embed-responsive-16by9">
     <img alt="Card image cap" class="card-img-top embed-responsive-item" src="<?php echo $path; ?>" />
  </div>
               <div class="card-body bg-dark">
                 <h4 class="card-title text-info"><?php echo strtoupper($event); ?> </h4>
                <p class="card-text text-white pb-2"><?php echo $description; ?></p>
                <h6 class="card-subtitle mb-2 pb-2 text-success">DATE : <?php echo $date; ?></h6>
                <h6 class="card-subtitle mb-2 pb-2 text-success">TIME : <?php echo $time; ?></h6>
                <p class='my-4 hr'></p>
                <h6 class="card-subtitle mb-2 text-info ">CONDUCTED BY :</h6>
                <p class='my-4 hr'></p>
                <ul class="list-group list-group-flush">
                <?php while($row1=mysqli_fetch_array($res1)){ ?>
                            <li class="list-group-item text-white bg-dark"><?php echo strtoupper($row1['username']); ?></li> <?php } ?>
                          </ul>
              </div>
            </div>
            </div>
       
    <?php }
    ?>
  
    </div>
    <p class="h2 text-center text-success" >No Events to Show.....! </p>
    </div>
    
</body>
</html>