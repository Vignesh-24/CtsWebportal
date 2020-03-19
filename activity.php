<?php 
require 'dbconnect.php';
session_start();
if(isset($_SESSION['user']))
{
$uname=$_SESSION['user'];
$user=$_SESSION['user'];
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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Activity</title>
    <link rel="stylesheet" href="css1/bootstrap.min.css"/>
	<link rel="stylesheet" href="css1/font-awesome.min.css"/>
	<link rel="stylesheet" href="css1/flaticon.css"/>
	<link rel="stylesheet" href="css1/owl.carousel.css"/>
	<link rel="stylesheet" href="css1/magnific-popup.css"/>
    <link rel="stylesheet" href="css1/style.css"/>
        
        
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/yourcode.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        
    <style>
        body{
        background-image:linear-gradient(to right,#0f0c29,#302b63,#24243e);
        }
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
              
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#"><h4 style="color:white;">COGNIZANT CLUB</h4></a>
              <div class="mr-auto"></div>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item px-2">
      <a class="nav-link" href="index1.php">Home</a>
    </li>
    <li class="nav-item  px-2">
      <a class="nav-link" href="profile.php">Profile</a>
    </li>
    <li class="nav-item px-2 active">
      <a class="nav-link" href="#">My Activites</a>
    </li>
      <li class="nav-item px-2">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
      
      
  </ul>
</nav>

      </div>
    </header>
    </div>
    <main>
      <div class='container py-5'>
          <div class="text-right pb-5">
              <a href="" class="btn btn-success" data-toggle="modal" data-target="#modalContactForm">
          Add New Activity</a>
          </div>
      <?php
      $res=mysqli_query($scon,"select * from user_info where (username='$uname' or patner1='$uname' or patner2='$uname') order by status");
      $i=1;$j=1;
      while($row=mysqli_fetch_array($res))
      {
        $event=$row['event'];
        $date=$row['date'];
        $partner1=$row['patner1'];
        $partner2=$row['patner2'];
        $n=$row['username'];
        $res1=mysqli_query($scon,"select username,RollNo from login where RollNo='$partner1' or RollNo='$partner2' or RollNo='$n'");
        $time=$row['time'];
        $decription=$row['description'];
        $path=$row['path'];
        $status=$row['status'];
      ?>
      <div class="jumbotron bg-light">
            <div class="row py-4">
              <div class="col-lg-5 col-md-5 px-3 py-3">
              <p class='h2 text-success'><?php if($status==0){ echo "Poster for event"; }else {echo "Snap taken from Event ".$j; $j++;} ?></p><p class="py-2"></p>Status
      <p class='h2 text-success pb-2'><?php if($status==0){ echo "Upcoming"; }else {echo "Completed";} ?></p>
              <div class="embed-responsive embed-responsive-16by9">
                <img src='<?php echo $path; ?>' alt='image' class='embed-responsive-item'></div>
                </div>
                <div class="col-lg-7 col-md-7 px-5 py-3">
                <div class="card">
                    <div class="card-header bg-dark text-info h5">Event  :  
                       <?php echo $event; ?>
                    </div>
                    <div class="card-body">
                          <p class="card-text"><?php echo $decription; ?></p>
                          <p class='h6 text-primary'>Conducted Along with : </p>
                          <ul class="list-group list-group-flush">
                          <?php
                        
                          while($row1=mysqli_fetch_array($res1))
                          {
                              $name=$row1['RollNo'];
                          if($name!=$uname)
                          {
                            ?>
                            <li class="list-group-item bg-info"><?php echo $row1['username']; ?></li>
                     

                         <?php 
                          }
                          }
                         ?></ul>
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item">Date : <?php echo $date; ?></li>
                            <li class="list-group-item">Time : <?php echo $time; ?></li>
                          </ul>
                     </div>
                  </div>
                </div>
            </div>
            <?php if($status==0){ ?>
            <form action="finishevent.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="<?php echo 'modalform'.$i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Finish Event</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
         <label data-error="wrong" data-success="right" for="form34">Event Name</label>
          <input type="text" id="form34" name="eventname" readonly value="<?php echo $event; ?>" class="form-control validate">
          
        </div>
           <div class="md-form mb-5">
           
          <label data-error="wrong" data-success="right" for="form29">Objective</label>
            <input type="text" id="form29" name="obj" class="form-control validate" placeholder="Objective">
        </div>
        <div class="md-form mb-5">
           
          <label data-error="wrong" d   ata-success="right" for="form29">Date</label>
            <input type="text" id="form29" name="datee" readonly value="<?php echo $date; ?>" class="form-control validate" placeholder="dd/mm/yyyy">
        </div>

        <div class="md-form mb-5">
            <label data-error="wrong" data-success="right" for="form32">Time</label>
          <input type="text" id="form32" name="timee" value="<?php echo $time; ?>" readonly class="form-control validate" placeholder="hh:mm-hh:mm">
          
        </div>
          
        <div class="md-form mb-5">
            <label data-error="wrong" data-success="right" for="form32">Upload Snap Taken From the Event</label>
          <input type="file" id="form32" name="photo" class="form-control validate">
          
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-success" name="submit">SUBMIT</button>
      </div>
    </div>
  </div>
</div>
</form>  
            <div class="text-right py-2 px-5">
              <a href="" class="btn btn-large btn-success " data-toggle="modal" data-target="<?php echo '#modalform'.$i;?>">
          Finish Now</a>
            </div> <?php }?>
      </div>
      <?php $i++; } ?>
        </div>
    </main>
<form action="newevent.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Create a Event</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
         <label data-error="wrong" data-success="right" for="form34">Event Name</label>
          <input type="text" id="form34" name="eventname" class="form-control validate" placeholder="Enter Your Event">
          
        </div>
           <?php
               $res=mysqli_query($scon,"select * from login where RollNo!='$user'"); ?>
          <div class="md-form mb-5">
         <label data-error="wrong" data-success="right" for="form34">Patner 1</label>
               
           <select class="form-control" id="exampleFormControlSelect1" name="patner1">
              <?php
               while($row=mysqli_fetch_array($res))
               {
                   $name=$row['username'];
                   $rno=$row['RollNo'];
               ?>
 <option value="<?php echo $rno?>"><?php echo $name; ?></option>
               <?php 
               }
               ?>
    </select>
          
        </div>
          <?php
               $res1=mysqli_query($scon,"select * from login where RollNo!='$user'"); ?>
          <div class="md-form mb-5">
         <label data-error="wrong" data-success="right" for="form34">Patner2</label>
          <select class="form-control" id="exampleFormControlSelect1" name="patner2">
              <?php
               while($row1=mysqli_fetch_array($res1))
               {
                   $name=$row1['username'];
                   $rno=$row1['RollNo'];
               ?>
 <option value="<?php echo $rno?>"><?php echo $name; ?></option>
               <?php 
               }
               ?>
    </select>
        </div>
          <div class="md-form mb-5">
         <label data-error="wrong" data-success="right" for="form34">Event Type</label>
           <select class="form-control" id="exampleFormControlSelect1" name="type">
 <option value="coding">Coding</option>
        <option value="hackathon">Hackathon</option>
        <option value="mcq">MCQ</option>
             <option value="presentation">Presentation</option>
             <option value="workshop">Workshop</option>
             <option value="debate">Technical Debate</option>
             <option value="workshop">Workshop</option>
               <option value="others">Others</option>
    </select>
          </div>
        <div class="md-form mb-5">
           
          
          <label data-error="wrong" data-success="right" for="form29">Date</label>
            <input type="text" id="form29" name="datee" class="form-control validate" placeholder="dd/mm/yyyy">
        </div>

        <div class="md-form mb-5">
            <label data-error="wrong" data-success="right" for="form32">Time</label>
          <input type="text" id="form32" name="timee" class="form-control validate" placeholder="hh:mm-hh:mm">
          
        </div>
          
        <div class="md-form">
          
          <label data-error="wrong" data-success="right" for="form8">Description</label>
            <input type="text" id="form8" name="des" class="form-control validate">
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-success" name="submit">SUBMIT</button>
      </div>
    </div>
  </div>
</div>
</form>



    </body>

</html>