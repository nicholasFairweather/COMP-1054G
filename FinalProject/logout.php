<?php
  //Access existing session
  session_start();


  //Remove session variables
  session_unset();

  //Kill the session
  session_destroy();

  //Redirect to login
  Header('location:index.php');
?>
