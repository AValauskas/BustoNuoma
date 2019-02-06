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
$data = date("Y-m-d");
$sql = "SELECT * FROM sutartis inner join nuomojamas_objektas where nuomojamas_objektas.fk_Asmuoid_Asmuo='$uid' and  sutartis.data_iki >= '$data' and sutartis.aktyvi='1' group by sutartis.id_Sutartis" ;

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


<table style="border-width: 4px; border-style: solid;border-color: #fa0515; background-color: #fcfa1a  " ><tr ><td>
    <tr><td>


            <div class="container" >
                <?php while($row = mysqli_fetch_array($result))
                {
                    $idd=$row['id_Sutartis'];
                    $sql4 = "SELECT * FROM nuomojamas_objektas,sutartis where sutartis.fk_Nuomojamas_objektasid_Nuomojamas_objektas = id_Nuomojamas_objektas and sutartis.id_Sutartis='$idd'";
                    $sql2 = "SELECT * FROM asmuo,sutartis where sutartis.fk_Asmuoid_Asmuo = id_Asmuo and sutartis.id_Sutartis='$idd'";
                    $result2 = mysqli_query($db, $sql2);
                    $row2 = mysqli_fetch_array($result2);

                    $result4 = mysqli_query($db, $sql4);

                    $row4 = mysqli_fetch_array($result4);

                    $photo =$row4['img'];
                    ?>


                    <div class="row" style="border-style: solid; border-width: 2px;">
                        <div class="col-sm-4">
                            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($photo ).'"/>'; ?>

                        </div>
                        <div class="col-sm-4">
                            Data nuo <?php echo $row['data_nuo']; ?><br>
                            Data iki <?php echo $row['data_iki']; ?>

                        </div>

                        <div class="col-sm-4">
                            <div>
                                užsisakęs asmuo:
                                <?php echo $row2['name']; ?><br>
                                Telefono Numeris:
                                <?php echo $row2['phone']; ?><br>
                                El.Paštas:
                                <?php echo $row2['email']; ?>


                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>
</table>;


</html>
