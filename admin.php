
<?php
session_start();
if (isset($_SESSION['login'])) {
    $name=$_SESSION['name'];
    $con=new mysqli('localhost','root','virat@18','alumni');
  ?>
  <?php echo "welcome" .$name; ?>
  <a href="add.php">ADD alumni</a>
  <?php
  }else{
    header("location:login.php");
}

  ?>