<?php
/**
 * Created by PhpStorm.
 * User: Aurimas
 * Date: 11/12/2018
 * Time: 16:27
 */
session_start();
include("include/nustatymai.php");
$fk=$_GET['contractid'];
$k=3;
$db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

$sql = "UPDATE sutartis SET aktyvi='$k'where id_Sutartis='$fk'";
if(mysqli_query($db, $sql))
{
    $_SESSION['permition']="deny";
    header("Location:orderstopermit.php");
    exit;
}
?>