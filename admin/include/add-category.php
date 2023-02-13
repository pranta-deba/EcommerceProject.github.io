<?php
if (isset($_POST['AddCategory'])) {
    require "../../include/config.php";
    $image = null;
    if (isset($_FILES['images'])) {
        $image = uniqid() . ".png";
        move_uploaded_file($_FILES['images']['tmp_name'], "../../assets/category/" . $image);
    }
    $insert = "insert into categories values(null,
                    '" . $_POST['name'] . "',
                    '" . $_POST['description'] . "',
                    '" . $image . "',
                    null)";

    $conn->query($insert);
    if ($conn->affected_rows) {
        header("location: viewcategory.php");
    };
};
