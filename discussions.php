<?php
require 'dbconnect.php';
session_start();

if(isset($_SESSION['user']))
{
$name=$_SESSION['user'];
}
else
{
  header("Location: index.php");
  exit;
}
if(isset($_POST['send']))
{
    if($_SESSION['disc'] != $_POST['comments'])
    {
    $dis=$_POST['comments'];
        $name=$_SESSION['user'];
    $_SESSION['disc']=$dis;
    $sql="Insert into discussions values('$name','$dis')";
    $res=mysqli_query($scon,$sql);
    }
}
?>
<html>
<head>
<title>Discussions</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.user_name{
    font-size:14px;
    font-weight: bold;
}
.comments-list .media{
    border-bottom: 1px dotted #ccc;
}
      body{
      position: relative; 
  }
  a{
    font-size:20px
  }
</style>
    <link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700" rel="stylesheet">

	<link rel="stylesheet" href="css1/bootstrap.min.css"/>
	<link rel="stylesheet" href="css1/font-awesome.min.css"/>
	<link rel="stylesheet" href="css1/flaticon.css"/>
	<link rel="stylesheet" href="css1/owl.carousel.css"/>
	<link rel="stylesheet" href="css1/magnific-popup.css"/>
	<link rel="stylesheet" href="css1/style.css"/>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

     <header>
      <div class="top">
        
      </div>
      <div class="container-fluid">
          <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
              
  
  <h4 style="color:white;">COGNIZANT CLUB</h4>
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
    
    <body data-spy="scroll" data-target=".navbar" data-offset="50"> 
        <div class="container" id="messageBody" style="height:550px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
            <div class="row">
                <div class="col-md-12">
                  <div class="page-header">
                      <?php 
                      $res=mysqli_query($scon,"select * from discussions");
                      ?>
                    <h1><small class="pull-right"><?php echo mysqli_num_rows($res);?></small> Discussions </h1>
                  </div> 
                   <div class="comments-list">
                       <?php
                       while($row=mysqli_fetch_array($res))
                       {
                           $uname=$row['username'];
                           $co=$row['comments'];
                           $res1=mysqli_query($scon,"select imagepath,username from login where RollNo='$uname'");
                           $row1=mysqli_fetch_array($res1);
                            $path=$row1['imagepath'];
                           $username=$row1['username'];
                          ?>
                       <div class="media">
                            <a class="media-left" href="#">
                              <img src='<?php echo $path;?>' width="50px" height="50px" class="rounded-circle">
                            </a>
                            <div class="media-body px-5">
                               <?php  if($uname == $name)
                                { ?>
                                    <h2 class="media-heading user_name text-right" style="font-size:20px;"><?php echo $username;?></h2>
                              <h3 class="text-right"><?php echo $co; ?></h3>
                                <?php }
                                else
                                { ?>
                              <h2 class="media-heading user_name" style="font-size:20px;"><?php echo $username;?></h2>
                              <h3><?php echo $co; ?></h3>
                              <?php } ?>
                            </div>
                          </div>
                       <?php
                       }
                       
                       
                    ?>
                     
                   </div>
                    
                    
                    
                </div>
            </div>
        </div>
        <script>
var messageBody = document.querySelector('#messageBody');
messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
</script>
</body>
    <div class="container">
    <form action="discussions.php" method="post">
<!--    <input type="text" class="form-control" id="usr" name="username" style="width:900px; margin:0 auto; height:50px;" placeholder="Enter text to send">-->
                    <div class="input-group" style="margin:0 auto;">
                        <input id="btn-input" name="comments" type="text" class="form-control input-lg" placeholder="Write your message here..." />
                        <span class="input-group-btn">
                        <button class="btn btn-primary btn-lg" id="btn-chat" name="send">Send</button>
                        </span>
                    </div>
                </form>
        </div>
    <!--
      <div class="input-group">
                	<textarea id="input-box" class="form-control" rows="1" placeholder="Say something..."></textarea>
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="button">send</button>
                    </span>
               </div>
-->
</html>