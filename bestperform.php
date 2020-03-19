<?php
require 'dbconnect.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="thumbnail-gallery.css">

</head>
<body>

<div class="container gallery-container">

    <h1>Best Perfomer of the Month</h1>

    
    <div class="tz-gallery">

        <div class="row">
            <?php
            $res=mysqli_query($scon,"select RollNo,month from performers");
            while($row=mysqli_fetch_array($res))
            {
                $rno=$row['RollNo'];
                $month=$row['month'];
                $res1=mysqli_query($scon,"select username,imagepath from login where RollNo='$rno'");
                $row1=mysqli_fetch_array($res1);
                $name=$row1['username'];
                $path=$row1['imagepath'];   
            ?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <a class="lightbox" href="../images/park.jpg">
                        <img src='<?php echo $path;?>' alt="" width="300px" style="height:300px;">
                    </a>
                    <div class="caption">
                        <h2><?php echo strtoupper($name); ?></h2>
                        <h3><?php echo strtoupper($month); ?></h3>
<!--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>-->
                    </div>
                </div>
            </div>
         <?php } ?>
        </div>

    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
</body>
</html>