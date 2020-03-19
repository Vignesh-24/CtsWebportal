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
<html lang="en">

<head>
    
  <title>Cognizant Club</title>

  <meta charset="utf-8">
    <meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Your page description here" />
  <meta name="author" content="" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
   img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
        display: none;
    }
.card-hover .reveal {
    visibility: hidden;
    opacity: 0;
    height: 0;
    padding: 0;
}

.card-hover:hover .reveal {
    height: auto;
    visibility: visible;
    opacity: 10;
    transition: opacity 1s ease;
}
.card:hover{
  transform:scale(1.2);
  box-shadow:5px 5px 5px 5px #000;
  z-index: 2;

}
.card{
  background-image:linear-gradient(#141e30 ,#243b55);
}
  </style>
  <!-- css -->
  <link href="css/bootstrap.css" rel="stylesheet" />
  <link href="css/bootstrap-responsive.css" rel="stylesheet" />
  <link href="css/prettyPhoto.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  <link id="t-colors" href="color/default.css" rel="stylesheet" />

  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png" />
  <link rel="shortcut icon" href="ico/favicon.png" />
	<link rel="stylesheet" href="css2/bootstrap.min.css"/>
	<link rel="stylesheet" href="css2/font-awesome.min.css"/>
	<link rel="stylesheet" href="css2/flaticon.css"/>
	<link rel="stylesheet" href="css2/slicknav.min.css"/>
	<link rel="stylesheet" href="css2/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css2/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css2/animate.css"/>
  <link rel="stylesheet" href="css2/style.css"/>


</head>
<body>
    
    <div class="top">
    </div>  
   <div class="container-fluid bg-dark">
          <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
              
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#"><h4 style="color:white;">COGNIZANT CLUB</h4></a>
              <div class="mr-auto"></div>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item active px-2">
      <a class="nav-link" href="index1.html">Home</a>
    </li>
    <li class="nav-item px-2">
      <a class="nav-link" href="profile.php">Profile</a>
    </li>
    <li class="nav-item px-2">
      <a class="nav-link" href="activity.php">My Activites</a>
    </li>
    <?php
    if($uname=='17CS225')
    {
    ?>
    <li class="nav-item px-2">
      <a class="nav-link" href="report.php">Generate Report</a>
    </li>
    <?php
    }
    ?>
      <li class="nav-item px-2">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
  </ul>
</nav>

      </div>

    <section id="intro">
      <div class="intro-content">
        <h2>Welcome to Cognizant Student Club</h2>
        <h3>Knowing is not enough, we must apply...</h3>
        <div>
          <a href="#content" class="btn-get-started scrollto">Get Started</a>
        </div>
      </div>
    </section>


 
    <section id="content">
   <div class="container-fluid ">
 
<div class="row justify-content-center">
<div class="col-lg-3 col-md-3 col-sm px-4 py-2">
<!-- Card -->
<div class="card card-cascade wider reverse  card-hover ">

  <!-- Card image -->
  <div class="view view-cascade overlay">
  
    <a href="#!">
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body card-body-cascade text-center">
  <div class="embed-responsive embed-responsive-16by9">
     <img alt="Card image cap" class="card-img-top embed-responsive-item" src="best.jpg" />
  </div>
    <!-- Title -->
    <h4 class="card-title text-light pt-5"><strong>Best Performers</strong></h4>
    <!-- Subtitle -->
    <h6 class="font-weight-bold indigo-text py-2">  <i class="ico icon-magic icon-5x text-light"></i></h6>
    <!-- Text -->
    <div class="reveal py-2">
    <p class="card-text text-info pt-2">

Keep an eye on the best ones!
</p>
    <a href="bestperform.php" class="text-dark btn btn-success">Know the best one</a>
                    </div>

  </div>

</div>
<!-- Card -->
</div>
<div class="col-lg-3 col-sm col-md-3 px-4 py-2">
<!-- Card -->
<div class="card card-cascade wider reverse card-hover ">

  <!-- Card image -->
  <div class="view view-cascade overlay">
     
    <a href="#!">
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body card-body-cascade text-center">
  <div class="embed-responsive embed-responsive-16by9">
     <img alt="Card image cap" class="card-img-top embed-responsive-item" src="members.jpg" />
  </div>

    <!-- Title -->
    <h4 class="card-title text-light pt-5"><strong>Club Members</strong></h4>
    <!-- Subtitle -->
    <h6 class="font-weight-bold indigo-text py-2">  <i class="ico icon-group icon-5x text-light"></i></h6>
    <!-- Text -->
    
    <div class="reveal  py-2">
    <p class="card-text text-info pt-2">
    Get to know your club members
    </p>
    <a href="compact-gallery.php" class="text-dark btn btn-success">Go to Gallery</a>
                    </div>

  </div>

</div>
<!-- Card -->
</div>


<div class="col-lg-3 col-sm col-md-3 px-4 py-2">
<!-- Card -->
<div class="card card-cascade wider reverse card-hover">

  <!-- Card image -->
  <div class="view view-cascade overlay">
      
    <a href="#">
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body card-body-cascade text-center">
  <div class="embed-responsive embed-responsive-16by9">
     <img alt="Card image cap" class="card-img-top embed-responsive-item" src="discussion.jpg" />
  </div>
    <!-- Title -->
    <h4 class="card-title text-white pt-5"><strong>Discussions</strong></h4>
    <!-- Subtitle -->
    <h6 class="font-weight-bold indigo-text py-2"> <i class="ico icon-rocket icon-5x text-light"></i></h6>
    <!-- Text -->
    
    <div class="reveal py-2">
    <p class="card-text text-info pt-2">
    To discuss among club members
    </p>
    <a href="discussions.php" class="text-dark btn btn-success">Start Discussion</a>
        </div>

  </div>

</div>
<!-- Card -->
</div>


<div class="col-lg-3 col-sm col-md-3 px-4 py-2">
<!-- Card -->
<div class="card card-cascade wider reverse card-hover ">

  <!-- Card image -->
  <div class="view view-cascade overlay">
 
    <a href="#!">
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body card-body-cascade text-center">
  <div class="embed-responsive embed-responsive-16by9">
     <img alt="Card image cap" class="card-img-top embed-responsive-item" src="finish.jpg" />
  </div>

    <!-- Title -->
    <h4 class="card-title pt-5 text-white"><strong>Over and Done</strong></h4>
    <!-- Subtitle -->
    <h6 class="font-weight-bold indigo-text py-2">  <i class="ico icon-dropbox icon-5x text-light"></i></h6>
    <!-- Text -->
 
    <div class="reveal py-2">
    <p class="card-text text-info pt-2">
    To see the completed events
    </p>
    <a href="clubevent.php" class="text-dark btn btn-success">Take a Look</a>
                    </div>

  </div>

</div>
<!-- Card -->
</div>
</div>
</div>
</section>
   
    <?php
            $res=mysqli_query($scon,"select * from user_info where status=0");?>
     <div id="preloder">
		<div class="loader"></div>
	</div>
    

	  <section id="works">
          <h2 style="font-size:40px;" class="px-5 py-3">UPCOMING EVENTS</h2>
		<div class="hero-slider owl-carousel">
            <?php
            while($row=mysqli_fetch_array($res))
            {
                $event=$row['event'];
                $des=$row['description'];
                $path=$row['path'];
                $time=$row['time'];
                $date=$row['date'];
                $name=$row['username'];
                $partner1=$row['patner1'];
                $partner2=$row['patner2'];
                $res1=mysqli_query($scon,"select username from login where RollNo='$partner1' or RollNo='$partner2' or RollNo='$name'");
            ?>
			<div class="hs-item set-bg" data-setbg="<?php echo $path ?>">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
							<h2 style="color:white;"><?php echo $event; ?></h2>
              <p style="color:white;"><?php echo $des; ?> </p><br>
              <h3 style="color:white;">Conducted By </h3>
              <?php while($row1=mysqli_fetch_array($res1)){ ?>
              <h5 style="color:white;"><?php echo strtoupper($row1['username']); ?> </h5>
            <?php } ?>
            <br>
            <h4 style="color:white;">Date : <?php echo $date; ?> </h4>
            <h4 style="color:white;">Time : <?php echo $time; ?></h4><br>
						</div>
					</div>
				</div>
			</div>
            <?php } ?>
            
		</div>
	</section>

    <footer>
      <div class="container">
        <div class="row">
          <div class="span4 pl-3">
            <div class="widget">
              <div class="footer_logo">
                <h3><a href="index1.php"><i class="icon-tint"></i> Cognizant Club</a></h3>
              </div>
              <address><strong>St. Joseph's College Of Engineering,</strong>
							  
                 <br>OMR<br>Chennai - 119
                  <br>
  						</address>
            </div>
          </div>

         <div class="span2"></div>
          <div class="span3 pl-3">
            <div class="widget">
              <div class="footer_logo">
                <h3>Developers</h3>
              </div>
              <address>
                <strong><a class="h5" href="profile.php?rno=17CS237">VIGNESH  K G </a></strong><br>
                <strong><a class="h5" href="profile.php?rno=17CS225">SAIPRASAAD K </a></strong><br>
                <strong><a class="h5" href="profile.php?rno=17CS134">RANJITH M S </a></strong><br>
                  <br>
  						</address>
            </div>
          </div>


         
        </div>
      </div>
      <div id="sub-footer">
        <div class="container">
          <div class="row">
            <div class="span6">
              <div class="copyright">
                <p><span>&copy; All right reserved By St.Joseph's College of Engineering</span></p>
              </div>

            </div>

            
          </div>
        </div>
      </div>
    </footer>
  <a href="#" class="scrollup"><i class="icon-angle-up icon-rounded icon-bglight icon-2x"></i></a>

  <!-- javascript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/modernizr.custom.js"></script>
  <script src="js/toucheffects.js"></script>
  <script src="js/google-code-prettify/prettify.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/portfolio/jquery.quicksand.js"></script>
  <script src="js/portfolio/setting.js"></script>
  <script src="js/animate.js"></script>

  <!-- Template Custom JavaScript File -->
  <script src="js/custom.js"></script>
    	<script src="js2/jquery-3.2.1.min.js"></script>
	<script src="js2/bootstrap.min.js"></script>
	<script src="js2/jquery.slicknav.min.js"></script>
	<script src="js2/owl.carousel.min.js"></script>
	<script src="js2/jquery.nicescroll.min.js"></script>
	<script src="js2/jquery.zoom.min.js"></script>
	<script src="js2/jquery-ui.min.js"></script>
	<script src="js2/main.js"></script>

</body>

</html>
