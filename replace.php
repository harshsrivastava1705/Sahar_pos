<?php
session_start();
$file_name=$_FILES['myfile']["tmp_name"];
$storagename="stocks.csv";
$file_name = $_FILES['myfile']['name'];
move_uploaded_file($_FILES["myfile"]["tmp_name"],$storagename);
header("location:stock.php");
?>