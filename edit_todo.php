<?php
include('conn.php');
  
// get id by GET data
$id = $_GET['id'];

// get post data
$title = $_POST['title'];
$desc = $_POST['description'];
$time = $_POST['time'];

// execute query
$query = "UPDATE list SET title='$title', description='$desc', time='$time' WHERE id=$id";
mysqli_query($con, $query);

// return to index.php after running the script 
header('location: index.php');

// close connection
mysqli_close($con);
?>