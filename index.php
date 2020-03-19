<?php
session_start();
require "dbconnect.php";
if(isset($_POST['login']))
{ 

    $name=$_POST['name'];
    $pass=$_POST['pass'];
     $res=mysqli_query($scon,"SELECT * FROM login WHERE RollNo='$name'");
    $row=mysqli_fetch_array($res);
    
    if($row['password']==$pass)
    {   
        $_SESSION['user']=$row['RollNo'];
        $_SESSION['disc']="a";
         header("Location: index1.php");
    }
    else
        $errMSG="Invalid data <br>";
}
if(isset($_POST['signup']))
{
    header("Location: registration.php");
}
if(isset($_POST['guest']))
{
        $_SESSION['user']='17CS225';
        $_SESSION['disc']="a";
         header("Location: index1.php");
         exit;
}

?>

<!DOCTYPE html>
<html lang="en">
    
<head>
   
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login Page</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/yourcode.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
  <section id="hero">

      <?php if(isset($_SESSION['register'])){ unset($_SESSION['register']); ?>
      <div class="alert alert-success text-center">
          <strong>Welldone!!</strong>Login Now to access CTS Club.
      </div><?php } ?>
    <div class="hero-container">
      <h1>Cognizant Student Club</h1><br><br>
      <form action="index.php" method="post" role="form" class="php-email-form">
        <div class="row no-gutters">
          <div class="col-md-6 form-group pr-md-1">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your RollNo"/>
          </div>
          <div class="col-md-6 form-group pl-md-1">
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Your Password"/>
          </div>
        </div>
          <br>
       
          <div class="mb-1">
          <div class="loading">Loading</div>
          <div class="error-message"></div>
          <div class="sent-message">Your notification request was sent. Thank you!</div>
        </div>
        <div class="text-center"><button type="submit" name="login">LOGIN</button> <?php if(isset($errMSG)) echo '<script type="text/javascript">alert("Invalid Username or password");</script>'; ?>
          <button type="submit" name="signup">SIGN UP</button>
          <button type="submit" name="guest">GUEST LOGIN</button>
          </div>
      </form>
    </div>
  </section>
</body>

</html>