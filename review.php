<?php
// session_start : user login cheak
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};
// get regster form valua 
if (isset($_POST['Review'])) {
    require "include/config.php";
    $name = $_POST['name'];
    $image = null;
    if (isset($_FILES['images'])) {
        $image = uniqid() . ".png";
        move_uploaded_file($_FILES['images']['tmp_name'], "assets/images/" . $image);
    };
    $post = $_POST['post'];

    $insert = "insert into reviews values(null,
    '" . $_POST['name'] . "',
    '" . $image . "',
    '" . $post . "',
    null)";

    $conn->query($insert);
    if ($conn->affected_rows) {
        header("location: index.php");
    };
};
