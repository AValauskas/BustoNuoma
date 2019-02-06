<?php
/**
 * Created by PhpStorm.
 * User: Aurimas
 * Date: 10/12/2018
 * Time: 14:33
 */
session_start();


include("include/nustatymai.php");


$atsiliepimas =$_POST['atsiliepimas'];
$data = date("Y-m-d");

$id = $_POST['fk'];
$db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

$sql = "INSERT INTO atsiliepimas(turinys,fk_Nuomojamas_objektasid_Nuomojamas_objektas,parasymo_data) VALUES('$atsiliepimas','$id','$data') ";
 if(mysqli_query($db, $sql))
 {
     $_SESSION['atsiliepimas']="added";
   //  return redirect('/operacija2.php');
     header("Location:operacija2.php?objectid=".$id);
     exit;
 }
//<?php echo "<a href=operacija2.php?objectid=",urlencode($id),">

?>