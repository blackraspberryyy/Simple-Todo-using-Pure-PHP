<?php

  // start session
  session_start();

  // establish connection to the database
  include('conn.php');

  // get POST data from login form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // check the user table if the given credentials are existing
  $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

  // execute dat query
  $result = mysqli_query($con, $query);

  // check if the query is successful
  if ( $result ){
    // check if user is existing in the db
    if ( mysqli_num_rows($result) > 0 ) {
      // save user session
      $_SESSION['LOGGED_IN'] = 1;
      while($row = mysqli_fetch_array($result)){
        $_SESSION['USER_ID'] = $row['id'];
        $_SESSION['USER_NAME'] = $row['name'];
        $_SESSION['USER_USERNAME'] = $row['username'];
        $_SESSION['USER_PASSWORD'] = $row['password'];
      }

      //redirect to index.php
      header("location: index.php");
      exit();
    }else{
      $_SESSION['LOGGED_IN'] = 0;
      // else, credentials have no match
      header('location: login.php');
      exit();
    }
  }else{
    $_SESSION['LOGGED_IN'] = 0;
    //else, there is a problem in query execution
    header("location: error_page.php");
    exit();
  }
?>