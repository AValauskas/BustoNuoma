<?php 
// login.php - tai prisijungimo forma, index.php puslapio dalis 
// formos reikšmes tikrins proclogin.php. Esant klaidų pakartotinai rodant formą rodomos klaidos
// formos laukų reikšmės ir klaidų pranešimai grįžta per sesijos kintamuosius
// taip pat iš čia išeina priminti slaptažodžio.
// perėjimas į registraciją rodomas jei nustatyta $uregister kad galima pačiam registruotis

if (!isset($_SESSION)) { header("Location: logout.php");exit;}
$_SESSION['prev'] = "login";
include("include/nustatymai.php");

?>
<style>
    html, body {
        background: linear-gradient(to bottom right, #FF8000, #BFFF00);

    }



</style>
<html>
<h2> Trumpalaikės gyvenamosios nuomos portalas</h2><br>
<h2> Aurimas Valauskas IFF-6/2</h2><br>
</html>
<html>
<body>
<div align="center">
<table> <tr><td>
		<form action="proclogin.php" method="POST" class="login">
        <center style="font-size:18pt;"><b>Prisijungimas</b></center>
        <p style="text-align:left;">Vartotojo vardas:<br>
            <input class ="s1" name="user" type="text" value="<?php echo $_SESSION['name_login'];  ?>"/><br>
            <?php echo $_SESSION['name_error']; 
			?>
        </p>
        <p style="text-align:left;">Slaptažodis:<br>
            <input class ="s1" name="pass" type="password" value="<?php echo $_SESSION['pass_login']; ?>"/><br>
            <?php echo $_SESSION['pass_error']; 
			?>
        </p>  
        <p style="text-align:left;">
            <input type="submit" name="login" value="Prisijungti"/>   
            <input type="submit" name="problem" value="Pamiršote slaptažodį?"/>   
        </p>
        <p>
 <?php
			if ($uregister != "admin") { echo "<a href=\"register.php\">Registracija</a>";}
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"guest.php\">Svečias</a>";
?>
        </p>
    </form>
    </table>
</body>
        </html>


