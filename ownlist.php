<?php
session_start();

$uid=$_SESSION['userid'];
include("include/meniu.php"); //įterpiamas meniu pagal vartotojo rolę
$db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$sql = "SELECT * FROM nuomojamas_objektas where nuomojamas_objektas.fk_Asmuoid_Asmuo='$uid'" ;

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

                    $id = $row['id_Nuomojamas_objektas'];
                    $photo =$row['img'];
                    ?>


                    <div class="row" style="border-style: solid; border-width: 2px;">
                        <div class="col-sm-4">
                            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($photo ).'"/>'; ?>

                        </div>


                        <div class="col-sm-4">
                            <div>
                                <?php echo "<a href=operacija2.php?objectid=",urlencode($id),"><input type=button id='$id' value='Peržiūrėti' ></a>" ?><br><br>
                                <?php echo "<a href=objecthistory.php?objectid=",urlencode($id),"><input type=button id='$id' value='Objekto užsakymų istorija' ></a>" ?><br>

                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>
</table>;
</html>