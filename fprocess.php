<?php
// $batch=implode("' , '",$_POST['batch']);
// $company=implode("' , '",$_POST['company']);
// $department=implode("' , '",$_POST['department']);


$connect=new mysqli('localhost','root','virat@18','alumni');

  // code...


// if(isset($_POST["status"]))
// {
 $query = "
  SELECT * FROM member WHERE status = '1'
 ";

 
//  if(isset($_POST["brand"]))
//  {
//   $department = implode("','", $_POST["department"]);
//   $query = "
//   SELECT * FROM product WHERE department IN('".$department."')
//   ";
//  }

 if(isset($_POST["batch"]))
 {
     echo "batch";
  $batch = implode("','", $_POST["batch"]);
  echo $batch;
  $query .= "
   AND batch IN('".$batch."')
  ";
 }
 if(empty($_POST["company"]))
 {
    echo "company";
  $company = implode("','",(array) $_POST["company"]);
  $query .= "
   AND company IN('".$company."')
  ";
 }

 if(isset($_POST["department"]))
  {
    echo "department";
  $department = implode("','", $_POST["department"]);
  $query .= "
   AND department IN('".$department."')
  ";
 }



// $query="SELECT *FROM member WHERE batch='$batch' AND department='$department' AND company='$company'";
 $run=mysqli_query($connect,$query);
 $row_num=mysqli_num_rows($run);
 $row=array();
 $output = '';
 if($row_num > 0)
 {
   
    while($row=mysqli_fetch_assoc($run))
      {
          echo "im ";
   $output .= '
   <div class="col-sm-4 col-lg-3 col-md-3">
    <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
     <img src="bt2.jpg" alt="" class="img-responsive" >
     <p align="center"><strong><a href="#">'. $row['name'] .'</a></strong></p>
     <h4 style="text-align:center;" class="text-danger" >'. $row['batch'] .'</h4>
     <p>Camera : '. $row['department'].' MP<br />
    
    </div>

   </div>
   ';
  }
 }
 else
 {
  $output = '<h3>No Data Found</h3>';
 
 echo $output;
}

?>