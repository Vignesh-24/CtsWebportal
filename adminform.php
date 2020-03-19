<?php
require 'dbconnect.php';
session_start();
if(isset($_POST['submit']))
{
    $name=$_POST['best'];
    $justify=$_POST['justification'];
    $plans=$_POST['plans'];
    $feedback=$_POST['feedback'];
    $month=date('F');
    $res=mysqli_query($scon,"insert into performers values('$name','$month','$justify','$plans','$feedback')");
    header("Location: report.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<body style="background-color:#202020;">
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-5" style="color:white;">Fill in the details</h2>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card border-secondary">

                        <div class="card-body">
                            <form class="form" method="post" action="adminform.php" enctype="multipart/form-data">
                                 <div class="form-group">
                                    <label for="inputName">Best Performer</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="Enter Roll No" name="best">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Justification</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="Enter justification" name="justification">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Plans for Next Month Tasks</label>
                                    <input type="plans" class="form-control" id="inputName" name="plans" placeholder=" Enter upcoming plans">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Suggestion or Feedbacks</label>
                                    <input type="text" class="form-control" id="inputName" name="feedback" placeholder="Enter suggestions if any">
                                </div>
                        
                                <div class="form-group">
                                    <button name="submit" type="submit" class="btn btn-success btn-lg float-right">Generate Report</button>
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