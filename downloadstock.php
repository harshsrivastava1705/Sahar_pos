<?php
session_start();
      header('Content-Disposition: attachment; filename=' . "stocks.csv");  
      readfile("stocks.csv"); 
      exit;
?>