<?php

session_start();
$username = $_POST['username'];
$password = $_POST['password'];

//Open a new connection to the MySQL server
$mysqli = new mysqli('localhost', 'root', 'virat@18', 'alumni');


//Output any connection error
if($mysqli==false){
    die('connection error');
    }

$query = "SELECT * FROM admi WHERE username='$username'";
$result = mysqli_query($mysqli, $query);
$num_row = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

if ($num_row >= 1) {

    if (password_verify($password, $row['password'])) {

        $_SESSION['login'] = $row['id'];
        $_SESSION['name'] = $row['username'];
        echo 'true';
    }
    else {
        echo 'false';
    }

} else {
    echo 'false';
}

?>