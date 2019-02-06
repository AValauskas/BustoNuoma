<?php
/**
 * Created by PhpStorm.
 * User: Aurimas
 * Date: 15/12/2018
 * Time: 14:52
 */
session_start();
$user=strtolower($_POST['user']);
$_SESSION['name_login']=$user;
$pass=$_POST['pass'];$_SESSION['pass_login']=$pass;
$mail=$_POST['email'];$_SESSION['mail_login']=$mail;
$name=$_POST['name'];$_SESSION['name']=$name;
$phone=$_POST['phone'];$_SESSION['phone']=$phone;
$_SESSION['submit']="need";
$a=$_SESSION['phone'];
header("Location:index.php");
?>


