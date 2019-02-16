<?php
  include('conn.php');
  
  // get post data
  $title = $_POST['title'];
  $desc = $_POST['description'];
  $time = $_POST['time'];

  // execute query
  $query = "INSERT INTO list (title, description, time) VALUES ('$title', '$desc', '$time')";
  mysqli_query($con, $query);
  
  // return to index.php after running the script 
  header('location: index.php');

  // close connection
  mysqli_close($con);
?>