<?php
/**
 * Created by PhpStorm.
 * User: Aurimas
 * Date: 11/12/2018
 * Time: 16:12
 */

session_start();

include("include/meniu.php"); //įterpiamas meniu pagal vartotojo rolę
$db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$active=2;
$uid=$_SESSION['userid'];
$sql = "SELECT * FROM nuomojamas_objektas,sutartis where sutartis.fk_Nuomojamas_objektasid_Nuomojamas_objektas = id_Nuomojamas_objektas and sutartis.aktyvi='$active' and nuomojamas_objektas.fk_Asmuoid_Asmuo='$uid'";
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

            <?php
            if ( isset( $_SESSION['permition']))
            {
                if ($_SESSION['permition']=="patvirtinta")
                {
                    echo"Patvirtinta!";
                }
                else echo"Atmesta";
                $_SESSION['permition']=null;
            }
            ?>
            <div class="container" >
                <?php while($row = mysqli_fetch_array($result))
                {
                    //$uid=$_SESSION['userid'];
                  //  $idd=$row['id_Sutartis'];
                    //$sql4 = "SELECT * FROM nuomojamas_objektas,sutartis where sutartis.fk_Nuomojamas_objektasid_Nuomojamas_objektas = id_Nuomojamas_objektas and sutartis.id_Sutartis='$idd' and nuomojamas_objektas.fk_Asmuoid_Asmuo='$uid'";

                    //$result4 = mysqli_query($db, $sql4);

                  //  $row4 = mysqli_fetch_array($result4);

                    $photo =$row['img'];?>

                    <div class="row" style="border-style: solid; border-width: 2px;">
                        <div class="col-sm-4">
                            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($photo ).'"/>'; ?>

                        </div>

                        <div class="col-sm-4">
                            Nuo:<?php echo $row['data_nuo']; ?> iki
                            <?php echo $row['data_iki']; ?><br>
                            Objekto id: <?php echo $row['fk_Nuomojamas_objektasid_Nuomojamas_objektas']; ?><br>
                            Kaina: <?php echo $row['kaina']; ?>

                        </div>

                        <div class="col-sm-4">
                            <div>
                                <?php echo "<a href=permit.php?contractid=",urlencode($row['id_Sutartis']),"><input type=button value='Patvirtinti' ></a>" ?><br>
                                <?php echo "<a href=deny.php?contractid=",urlencode($row['id_Sutartis']),"><input type=button value='Atmesti' ></a>" ?><br>

                            </div>

                        </div>

                    </div>
                <?php } ?>
            </div>
</table>;


</html>

