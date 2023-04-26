<?php
session_start();
if(!isset($_SESSION['user']))
{
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTH-8">
        <title>POS System</title>
        <link rel="shortcut icon" type="image/jpg" href="logo.jpeg"/>
        <link rel="stylesheet" href="style.css">
    </head>

    <body style="background-image:url(favicon.jpeg); background-repeat:no-repeat; background-size:100%; background-opacity:0.2;">
        <div id="st-01">
            <h1>
                SAHAR
            </h1>
            <h2>The dawn of the new era.</h2>
        </div>
        <br>
        <div style="background:rgba(255,255,255,0.8); margin-top:11%; padding-top:0.4%; padding-bottom:2%; border-radius:7%; ">
        <h2 style="color:rgba(200,62,67,0.8); text-shadow:none; margin-left:44.7%;"  id="home">Project SAHAR</h2>
        <div style="">
        <p style=" width: 60%;  text-align:center; margin:0 auto;">We strive to provide a near Perfect POS Software with minimal or complete removal of existing issues in order to produce a perfect product, one that is built to Run Faster, 
            Last Longer, and Produce Change for the Better!!
            The Journey to a Successful Future begins with a Single Touch !!
            Try out our Product Today!</p>
        </div>
        <a href="billing.php" style="float:right; margin-top:5%;">
        <button>Proceed</button>
    </a>
    </div>
    </body>
    <div class="footer">
        <p> &copy; Olympus 2021</p>
      </div>
</html>