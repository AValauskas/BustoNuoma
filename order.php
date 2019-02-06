<?php
session_start();


include("include/nustatymai.php");


$datafrom =$_POST['data_from'];
$datato =$_POST['data_to'];
$price=$_POST['price'];
$uid=$_SESSION['userid'];
$vyg=2;
$oid = $_POST['fk'];
$db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

$sql = "INSERT INTO sutartis(data_nuo,data_iki,kaina,aktyvi,fk_Asmuoid_Asmuo,fk_Nuomojamas_objektasid_Nuomojamas_objektas) VALUES('$datafrom','$datato','$price','$vyg','$uid','$oid') ";
//echo $sql;
//die();
if(mysqli_query($db, $sql))
{

    $_SESSION['progress']='laukiama';
    $_SESSION['orderc'] ="gautas";
    //  return redirect('/operacija2.php');
    header("Location:operacija2.php?objectid=".$oid);
    exit;
}



?>