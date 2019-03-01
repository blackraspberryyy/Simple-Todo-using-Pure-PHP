<?php
  // if session is not yet started
  if ( !isset($_SESSION) ) { 
		session_start(); 
  }

  // if inaccess niya ung mga may include ('auth.php') na
  // files, check if logged in ba. If hinde, login muna siya.
  if ( !$_SESSION['LOGGED_IN'] ) {
    header("location: login.php");
    exit();
  }
?>