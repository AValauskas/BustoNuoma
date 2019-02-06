<?php
// meniu.php  rodomas meniu pagal vartotojo rolę

if (!isset($_SESSION)) { header("Location: logout.php");exit;}
include("include/nustatymai.php");
$user=$_SESSION['user'];
$userlevel=$_SESSION['ulevel'];
$role="";
{foreach($user_roles as $x=>$x_value)
			      {if ($x_value == $userlevel) $role=$x;}
} 

     echo "<table width=100% border=\"0\" cellspacing=\"1\" cellpadding=\"3\" class=\"meniu\">";
        echo "<tr><td>";
        echo "Prisijungęs vartotojas: <b>".$user."</b>     Rolė: <b>".$role."</b> <br>";
        echo "</td></tr><tr><td>";
    echo "[<a href=\"index.php\">Pagrindinis Puslapis</a>] &nbsp;&nbsp;";
        if ($_SESSION['user'] != "guest") echo "[<a href=\"useredit.php\">Redaguoti paskyrą</a>] &nbsp;&nbsp;";

     //Trečia operacija tik rodoma pasirinktu kategoriju vartotojams, pvz.:
        if (($userlevel == $user_roles["Klientas"]) || ($userlevel == $user_roles[ADMIN_LEVEL] )) {
            echo "[<a href=\"operacija3.php\">Vartotojų sąrašas</a>] &nbsp;&nbsp;";
       		}   
        //Administratoriaus sąsaja rodoma tik administratoriui
        if ($userlevel == $user_roles[ADMIN_LEVEL] ) {
            echo "[<a href=\"admin.php\">Administratoriaus sąsaja</a>] &nbsp;&nbsp;";
        }
        if (($userlevel == $user_roles["Nuomotojas"]))
        {
            echo "[<a href=\"orderstopermit.php\">Užsakymai patvirtinimui </a>] &nbsp;&nbsp;";
        }
        if (($userlevel == $user_roles["Klientas"]))
        {
            echo "[<a href=\"ordersinq.php\">Laukiami užsakymai </a>] &nbsp;&nbsp;";
        }
        if (($userlevel == $user_roles["Nuomotojas"]))
        {
            echo "[<a href=\"waiting.php\">Laukiami užsakymai </a>] &nbsp;&nbsp;";
        }
        if (($userlevel == $user_roles["Nuomotojas"]))
        {
            echo "[<a href=\"ownlist.php\">Mano nuomojamų objektų sąrašas </a>] &nbsp;&nbsp;";
        }
        echo "[<a href=\"logout.php\">Atsijungti</a>]";
      echo "</td></tr></table>";
?>       
    
 