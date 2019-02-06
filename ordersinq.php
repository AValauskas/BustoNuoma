<?php
/**
 * Created by PhpStorm.
 * User: Aurimas
 * Date: 10/12/2018
 * Time: 21:27
 */
session_start();

$uid=$_SESSION['userid'];
include("include/meniu.php"); //įterpiamas meniu pagal vartotojo rolę
$db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
mysqli_query($db,"SET NAMES 'utf8'");
$data = date("Y-m-d");
$sql = "SELECT * FROM sutartis where fk_Asmuoid_Asmuo='$uid' and aktyvi='1'" ;
$sql2 = "SELECT * FROM sutartis where fk_Asmuoid_Asmuo='$uid' and aktyvi='2'" ;
$sql3 = "SELECT * FROM sutartis where fk_Asmuoid_Asmuo='$uid' and aktyvi='3'" ;





$result = mysqli_query($db, $sql);
$result2 = mysqli_query($db, $sql2);
$result3 = mysqli_query($db, $sql3);

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


<table style="border-width: 4px; border-style: solid; background-color: #fcfa1a  " ><tr ><td>
    <tr><td>

Laukia patvirtinimo:
            <br>
            <div class="container" >
                <?php while($row2 = mysqli_fetch_array($result2))
                {
                    $idd=$row2['id_Sutartis'];
                    $sql4 = "SELECT * FROM nuomojamas_objektas,sutartis where sutartis.fk_Nuomojamas_objektasid_Nuomojamas_objektas = id_Nuomojamas_objektas and sutartis.id_Sutartis='$idd'";
                    $result4 = mysqli_query($db, $sql4);

                    $row4 = mysqli_fetch_array($result4);

                    $photo =$row4['img'];
                    ?>

                    <div class="row" style="border-style: solid; border-width: 2px;">
                        <div class="col-sm-4">

                            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($photo ).'"/>'; ?>

                        </div>

                        <div class="col-sm-4">
                            <div>
                                Kaina <?php echo $row2['kaina']; ?>
                                <br>Objekto id:
                                <?php echo $row2['fk_Nuomojamas_objektasid_Nuomojamas_objektas']; ?><br>

                               Data Nuo  <?php echo $row2['data_nuo']; ?> Data iki  <?php echo $row2['data_iki']; ?>
                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>
</table>;
            <br>
<table style="border-width: 4px; border-style: solid; background-color: #fcfa1a  " ><tr ><td>
    <tr><td>
            Patvirtinta:
            <br>
            <div class="container" >
                <?php while($row = mysqli_fetch_array($result))
                {
                    $idd=$row['id_Sutartis'];
                    $sql4 = "SELECT * FROM nuomojamas_objektas,sutartis where sutartis.fk_Nuomojamas_objektasid_Nuomojamas_objektas = id_Nuomojamas_objektas and sutartis.id_Sutartis='$idd'";
                    $result4 = mysqli_query($db, $sql4);

                    $row4 = mysqli_fetch_array($result4);

                    $photo =$row4['img'];
                    ?>

                    <div class="row" style="border-style: solid; border-width: 2px;">
                        <div class="col-sm-4">

                            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($photo ).'"/>'; ?>
                        </div>

                        <div class="col-sm-4">
                            <div>
                                Kaina <?php echo $row['kaina']; ?>
                                <br>Objekto id:
                                <?php echo $row['fk_Nuomojamas_objektasid_Nuomojamas_objektas']; ?><br>
                                Data Nuo  <?php echo $row['data_nuo']; ?> Data iki  <?php echo $row['data_iki']; ?>
                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>
</table>;

<table style="border-width: 4px; border-style: solid; background-color: #fcfa1a  " ><tr ><td>
            Atmesta:
            <br>
            <div class="container" >
                <?php while($row3 = mysqli_fetch_array($result3))
                {
                    $idd=$row3['id_Sutartis'];
                    $sql4 = "SELECT * FROM nuomojamas_objektas,sutartis where sutartis.fk_Nuomojamas_objektasid_Nuomojamas_objektas = id_Nuomojamas_objektas and sutartis.id_Sutartis='$idd'";
                    $result4 = mysqli_query($db, $sql4);

                    $row4 = mysqli_fetch_array($result4);

                    $photo =$row4['img'];
                    ?>

                    <div class="row" style="border-style: solid; border-width: 2px;">
                        <div class="col-sm-4">

                            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($photo ).'"/>'; ?>
                        </div>

                        <div class="col-sm-4">
                            <div>
                                Kaina <?php echo $row3['kaina']; ?>
                                <br>Objekto id:
                                <?php echo $row3['fk_Nuomojamas_objektasid_Nuomojamas_objektas']; ?><br>
                                Data Nuo  <?php echo $row3['data_nuo']; ?> Data iki  <?php echo $row3['data_iki']; ?>
                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>
</table>;


</html>
