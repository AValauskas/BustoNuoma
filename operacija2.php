<?php
// operacija2.php
// tiesiog rodomas  tekstas ir nuoroda atgal

session_start();

if (!isset($_SESSION['prev']) || ($_SESSION['prev'] != "index"))
{ header("Location: logout.php");exit;}

$id=$_GET['objectid'];

include("include/meniu.php"); //įterpiamas meniu pagal vartotojo rolę
$db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
mysqli_query($db,"SET NAMES 'utf8'");
$sql = "SELECT * FROM nuomojamas_objektas where id_Nuomojamas_objektas=$id ";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$photo =$row['img'];
$price =$row['kaina'];
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
    table[name="lentele"]{

        margin-left: 400;
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
    <body>

        <table name="lentele" ><tr><td>  </td></tr><tr><td>

      <table aligned ='center'; style="border-width: 2px; border-style: dotted;"><tr><td>
         Atgal į [<a href="index.php">Pradžia</a>]
      </td></tr></table><br>
                    <center>
		<div style="text-align: center;color:green"> <br><br>
           <h1>Nuoma</h1>

            <center> <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($photo ).'"  />'; ?> </center>
            <center>  <?php echo  $row['aprasymas']; ?></center>
            <br>
            Adresas: <?php echo  $row['adresas']; ?><br>
            Paros Kaina: <?php echo  $row['kaina']; ?>Eu

            <br> <br>

            <?php if($_SESSION['ulevel']==4)
                { ?>
			Rašyti atsiliepimą:
            <form action="atsiliepimas.php" method="POST" c>
                <input type="text" maxlength="255" name="atsiliepimas" >
                <input type="hidden" name="fk" value="<?php echo $id; ?>">
                <button type=submit name="button">Patvirtinti</button>
            </form>
            <?php }
            if(isset($_SESSION['atsiliepimas']))
            {
                echo "Atsiliepimas įrašytas";
                $_SESSION['atsiliepimas']= null;
            }?>


            <br><br>
            <?php echo "<a href=responselist.php?objectid=",urlencode($id),"><input type=button id='$id' value='Peržiūrėti atsiliepimus' ></a>" ?>
        </div><br>

                    <br><br>
                   <?php if (($userlevel == $user_roles["Klientas"]))
                    { ?>
Pasirinkite datą kada norite užsisakyti:

                    <form action="order.php" method="POST">
                        <input type="date" name="data_from" value="" required>

                        <input type="date" name="data_to" value="" required><br>
                        <input type="submit" value="Pateikti užsakymą">
                        <input type="hidden" name="fk" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">
                    </form>
                    </center>

<?php }

if(isset($_SESSION['orderc']))
{
    echo "Užsakymas pateiktas";
    $_SESSION['orderc']= null;
}?>


                </td>
            </tr>
        </table>

    </body>
</html>