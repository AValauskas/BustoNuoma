<?php
// index.php
// jei vartotojas prisijungęs rodomas demonstracinis meniu pagal jo rolę
// jei neprisijungęs - prisijungimo forma per include("login.php");
// toje formoje daugiau galimybių...

session_start();

include("include/functions.php");
include("include/function2.php");

?>

<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Demo projektas</title>
    <link href="include/styles.css" rel="stylesheet" type="text/css" >

</head>
<body style ="background: linear-gradient(to bottom right, #FF8000, #BFFF00)">

<?php

if (!empty($_SESSION['user']))     //Jei vartotojas prisijungęs, valom logino kintamuosius ir rodom meniu
{                                  // Sesijoje nustatyti kintamieji su reiksmemis is DB
    // $_SESSION['user'],$_SESSION['ulevel'],$_SESSION['userid'],$_SESSION['umail']

    inisession("part");   //   pavalom prisijungimo etapo kintamuosius
    $_SESSION['prev']="index";

    include("include/meniu.php"); //įterpiamas meniu pagal vartotojo rolę


    ?>

    <style>
        p.a{
            font-family: Arial;
        }
        button
        {
            background-color: #A1B0AB;
            color: black;
            font-weight: bold;
            font-size: 15px;
            width: 100px;
            border-radius: 12px;
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <div style="text-align: center;color:green">
        <br><br>
        <h1>Nuomojami nameliai</h1>

        <div class="row">
            <div class="col-sm-4">
                <form action="index.php" method="POST">
                    <select name="price" >
                        <option value="no">Pasirinkite rikiavimą</option>
                        <option value="cheapest">Pigiausi viršuje</option>
                        <option value="expensive">Brangiausi viršuje</option>

                    </select>

                    <select  name="group" >
                        <option value="no">Pasirinkite grupę</option>
                        <option value="1">butas</option>
                        <option value="2">namas</option>
                        <option value="3">namelis</option>
                        <option value="4">vila</option>
                    </select>
                    <input type="submit" value="Rodyti">
                </form>

            </div>

        </div>

        <br><br>;
        <?php
        $PR1="cheapest";
        $PR2="expensive";
        $check="no";
        $db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        mysqli_query($db,"SET NAMES 'utf8'");
        if( isset($_POST['price'])&& isset($_POST['group']) ) {

           if ( $_POST['group']==$check) {
               if ($_POST['price'] == $PR1) {
                   $sql = "SELECT * FROM nuomojamas_objektas ORDER BY kaina ASC";
               } elseif ($_POST['price'] == $PR2) {
                   $sql = "SELECT * FROM nuomojamas_objektas ORDER BY kaina DESC";
               }
           }elseif($_POST['price'] == $check){
               $gr=$_POST['group'];
               $sql = "SELECT * FROM nuomojamas_objektas where grupe ='$gr' ";
           }
           else{
               $gr=$_POST['group'];
               if ($_POST['price'] == $PR1) {
                   $sql = "SELECT * FROM nuomojamas_objektas where grupe='$gr' ORDER BY kaina ASC";
               } elseif ($_POST['price'] == $PR2) {
                   $sql = "SELECT * FROM nuomojamas_objektas where grupe='$gr' ORDER BY kaina DESC";
               }
           }
        }
        else{
            $sql = "SELECT * FROM nuomojamas_objektas";
        }

        $result = mysqli_query($db, $sql);

        while($row = mysqli_fetch_assoc($result))
        {

            $summa=$row['aprasymas'];
            $photo =$row['img'];
            $pric=$row['kaina'];
            //var_dump($photo);
            // var_dump($summa);
            $id = $row['id_Nuomojamas_objektas'];
            $check=null;
            //  echo" <img src=\"include/namelis.jpg \" alt=\"Car\" style=\"width:100 % \"></td><td><p id=\"demo\" onclick=\"gethouseid($id)\">Aprašymas.</p> <br><br>";
            //var_dump($check);
            ?>
            <table style="border-width: 4px; border-style: solid;border-color: #fa0515; background-color: #fcfa1a  " ><tr ><td>
                <tr><td>

                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4">
                                   <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($photo ).'"/>'; ?>

                                </div>

                                <div class="col-sm-4">
                                    <div>
                                        <p class="a"><?php echo $summa?></p>

                                      <?php echo "<a href=operacija2.php?objectid=",urlencode($id),"><input type=button id='$id' value='Peržiūrėti' ></a>" ?><br>
                                        Kaina: <p class="a"><?php echo $pric?></p>
                                    </div>

                                </div>
                            </div>
                        </div>
            </table>;
            <?php

        };
        ?>

    </div><br>
    <?php
}
else {

    if (!isset($_SESSION['prev'])) inisession("full");             // nustatom sesijos kintamuju pradines reiksmes
    else {if ($_SESSION['prev'] != "proclogin") inisession("part"); // nustatom pradines reiksmes formoms
    }
    // jei ankstesnis puslapis perdavė $_SESSION['message']
    echo "<div align=\"center\">";echo "<font size=\"4\" color=\"#ff0000\">".$_SESSION['message'] . "<br></font>";

    echo "<table class=\"center\"><tr><td>";
    include("include/login.php");                    // prisijungimo forma
    echo "</td></tr></table></div><br>";

}
?>
<script>
    function gethouseid($houseid){
        $_SESSION['house_id']=$houseid;
        //header("Location:operacija2.php");
        var_dump($houseid);
        die;
    }
</script>
</body>
</html>
