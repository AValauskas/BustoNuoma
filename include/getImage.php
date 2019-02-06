<?php
$id = $_GET['id'];
// do some validation here to ensure id is safe
$db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

$sql = "SELECT img FROM nuomojamas_objektas";
$result = mysqli_query($db, $sql);

$row = mysqli_fetch_assoc($result);
header("Content-type: image/jpeg");
echo $row['img'];
?>