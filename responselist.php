<?php
/**
 * Created by PhpStorm.
 * User: Aurimas
 * Date: 10/12/2018
 * Time: 21:27
 */
session_start();

$id=$_GET['objectid'];
include("include/meniu.php"); //įterpiamas meniu pagal vartotojo rolę
$db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

$sql = "SELECT * FROM atsiliepimas where fk_Nuomojamas_objektasid_Nuomojamas_objektas='$id' ";
$result = mysqli_query($db, $sql);


?>
<style>
html, body {
background: linear-gradient(to bottom right, #FF8000, #BFFF00);
color: #636b6f;
font-family: 'Nunito', sans-serif;
font-weight: 200;
margin-left: auto;
margin-right: auto;
height: 100%;
background-attachment: fixed;
}
</style>


<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8">
    <title>Operacija 2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="include/styles.css" rel="stylesheet" type="text/css" >
</head>

<h2>Atsiliepimai</h2>
<table style="border-width: 4px; border-style: solid;border-color: #fa0515; background-color: #fcfa1a  " ><tr ><td>
    <tr><td>


            <div class="container" >
                <?php while($row = mysqli_fetch_array($result))
                { ?>

                <div class="row" style="border-style: solid; border-width: 2px;">
                    <div class="col-sm-2">
                        <?php echo $row['parasymo_data']; ?>

                    </div>

                    <div class="col-sm-4">
                        <div>
                            <?php echo $row['turinys']; ?>


                        </div>

                    </div>
                </div>
                <?php } ?>
            </div>
</table>;


</html>
