<?php
session_start();
$user=$_GET['user'];
$pass=$_GET['pass'];
$hash = password_hash($pass,PASSWORD_DEFAULT);
$s="off";
$h=fopen("users.csv","a");
fputcsv($h,compact('user', 'hash','s'));
header("location: add.php?add=true");
?>