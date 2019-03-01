<?php
  if ( !isset($_SESSION) ) { 
		session_start(); 
  }
  // destroy the sessions
  session_destroy();
  
  //go back to login
  header("location: login.php");
  exit();
?>