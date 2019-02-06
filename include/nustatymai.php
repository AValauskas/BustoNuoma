<?php
//nustatymai.php

define("DB_SERVER", "localhost");
define("DB_USER", "aurval10");
define("DB_PASS", "Ruetinu4Chah2oot");
define("DB_NAME", "aurval10");
define("TBL_USERS", "asmuo");

/*define("DB_SERVER", "localhost:3306");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "nuoma4");
define("TBL_USERS", "asmuo");*/

$user_roles=array(      // vartotojų rolių vardai lentelėse ir  atitinkamos userlevel reikšmės
	"Administratorius"=>"9",
	"Klientas"=>"4",
	"Nuomotojas"=>"5",);   // galioja ir vartotojas "guest", kuris neturi userlevel
define("DEFAULT_LEVEL","Klientas");  // kokia rolė priskiriama kai registruojasi
define("ADMIN_LEVEL","Administratorius");  // kas turi vartotojų valdymo teisę
define("UZBLOKUOTAS","255");      // vartotojas negali prisijungti kol administratorius nepakeis rolės

$uregister="both";  // kaip registruojami vartotojai
// self - pats registruojasi, admin - tik ADMIN_LEVEL, both - abu atvejai

// * Email Constants - 
define("EMAIL_FROM_NAME", "Demo");
define("EMAIL_FROM_ADDR", "demo@ktu.lt");
define("EMAIL_WELCOME", false);

?>
