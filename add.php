<?php
session_start();
if (isset($_SESSION['login'])) {
    $name=$_SESSION['name'];
    $con=new mysqli('localhost','root','virat@18','alumni');
    echo $name;
  ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>The Perfect Cup - About us</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/mycss.css" rel="stylesheet">
    <!-- script jquery -->
    <script src="js/jquery.js"></script>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Add</strong>Alumni Details
                    </h2>
					
                    <hr>    
                    <div id="add"></div>   
                    <form role="form" method="post" action="add.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Name</label>
                                <input type="text" id="name" name="name" maxlength="25" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Department</label>
                                <select class="form-control" name="department">
                                <option>CE</option><option>PHY</option>
                                <option>CSE</option><option>CHEM</option>
                                <option>ECE</option><option>MATH</option>
                                <option>ME</option><option>EEE</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Batch</label>
                                <input type="number" id="batch" name="batch" maxlength="25" class="form-control" placeholder="eg - 2013">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Company</label>
                                <input type="text" id="company" name="company" maxlength="25" class="form-control">
                            </div>
                          <div class="form-group col-lg-4">
                          <label>Profile Photo</label>
                          <input type="file" class="form-control-file" name="image"  required>
                          </div>
                            <div class="clearfix"></div>
                            
                            <div class="form-group col-lg-12">
                                <button type="submit" name="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </body>
    </html>
  
   <?php
    $con=new mysqli('localhost','root','virat@18','alumni');
if(isset($_POST['submit'])){
    echo "in";
  
  $sname=$_POST['name'];
  $department=$_POST['department'];
  $batch=$_POST['batch'];
  $company=$_POST['company'];
 
  $imagename=$_FILES['image']['name'];
  $tempname=$_FILES['image']['tmp_name'];
  move_uploaded_file($tempname,"dataimg/$imagename");
  $qry="INSERT INTO `member` (`name`,`image`, `department`, `batch`, `company`) VALUES ('$sname','$imagename','$department','$batch','$company')";
  $run=mysqli_query($con,$qry);
  if($run===true){
    ?>
    <script>
    alert("Record Inserted sussfully");
    </script>
    <?php
  }
else{
  echo "$con->error()";
}
}
  ?>
    <?php
  }else{
    header("location:login.php");
}

  ?>