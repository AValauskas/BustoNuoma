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
$uid=$_SESSION['userid'];

$k=1;
$db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$sql = "UPDATE sutartis SET aktyvi='$k'where id_Sutartis='$fk'";
$sql2 ="SELECT * from sutartis where id_Sutartis='$fk'";
$result =mysqli_query($db, $sql2);
$row = mysqli_fetch_assoc($result);
//$money=$row['eurai'];
$nuo=$row['data_nuo'];
$iki = $row['data_iki'];
$uid = $row['fk_Asmuoid_Asmuo'];
$price = $row['kaina'];
$datetime1 = strtotime($nuo);
$datetime2 = strtotime($iki);
$secs = $datetime2 - $datetime1;// == <seconds between the two times>
$days = $secs / 86400;
$datenow=date("Y-m-d");
$sql3 ="SELECT * from saskaita where fk_Asmuoid_Asmuo='$uid'";
$result2 =mysqli_query($db, $sql3);
$row2 = mysqli_fetch_assoc($result2);
$money=$row2['eurai'];
$budget= $money-$price*$days;

$sql4 = "UPDATE saskaita SET eurai='$budget', data ='$datenow'where fk_Asmuoid_Asmuo='$uid'";
mysqli_query($db, $sql4);
if(mysqli_query($db, $sql))
{
    $_SESSION['permition']="patvirtinta";
    header("Location:orderstopermit.php");
    exit;
}
?>