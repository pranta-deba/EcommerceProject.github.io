<?php
require "../../include/config.php";
$select = "select id,name from subcategories where category_id= '".$_GET['valuepass']."'";
$allsubcat = $conn->query($select);
$rows = [];
while($row = $allsubcat->fetch_assoc()){
    $rows[] = $row;
}
echo json_encode($rows);

?>