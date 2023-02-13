<?php
// session_start : user login cheak
if (session_status() === PHP_SESSION_NONE) {
   session_start();
};
  // get login form valua 
  if(isset($_POST['login'])){
    require "include/config.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    // value match to database
    $query = "SELECT * FROM users WHERE email='$email' limit 1";
    $record = $conn->query($query);
    if($record->num_rows > 0){
        $result = $record->fetch_assoc();
        if(password_verify($password,$result['password'])){
            // session value
            $_SESSION['userid'] = $result['id'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['loggedin'] = true;
            $_SESSION['role'] = $result['role'];
            // admin cheak and go dashbord
            if($result['role'] == "1"){
                header("location:index.php");
            };
            if($result['role'] == "2"){
                header("location:admin/index.php");
            };
        }
    }else{
        header("location:register.php?m=Please Register Now!");
    };

};

?>