<?php
session_start();
      header('Content-Disposition: attachment; filename=' . "data.csv");  
      readfile("data.csv"); 
      exit;
?>