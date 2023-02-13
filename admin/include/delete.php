<?php
// check admin
require "cheak-admin.php";
if(isset($_GET['id'])){
    require "../../include/config.php";
    $id = $_GET['id'];
    $q = "delete from products where id='{$id}' limit 1";
    $conn->query($q);
    if($conn->affected_rows){
        header("location: viewproduct.php");
    }     
}