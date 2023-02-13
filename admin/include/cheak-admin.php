<?php 
// session_start : user login cheak
if(session_status() === PHP_SESSION_NONE){
    session_start();
  };

//   cheak : admin login cheak
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] && $_SESSION['role'] == "2"){

  }else{
    // header("HTTP/1.1 401 Unauthorized");
    header("location: ../login.php");
    exit;
  };
?>
