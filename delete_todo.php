<?php
  include('conn.php');

  $id = $_GET['id'];

  // execute query
  $query = "DELETE FROM list WHERE id=$id";
  mysqli_query($con, $query);

  // return to index.php after running the script 
  header('location: index.php');

  // close connection
  mysqli_close($con);
?>