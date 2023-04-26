<?php
session_start();
if(!isset($_SESSION["user"]))
header("Location: index.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTH-8">
        <title>Announcement</title>
        <link rel="shortcut icon" type="image/jpg" href="logo.jpeg"/>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div id="st-01">
            <h1>
                SAHAR
            </h1>
            <h2>The dawn of the new era.</h2>
        </div>
        <br>
        <div id="nav-p">
            <div id="nav">
                <span id="click">NAVIGATE</span>
               
                 <?php
                 $temp=0;
                if($_SESSION["user"]=="admin@sahar")
                {$temp=1;
                    
                    echo"<p class=\"links\"><a href=\"online.php\">Online</a></p>";
                
                    echo "<p class=\"links\"><a href=\"admin.php\">Announce</a></p>";
                }

                echo"<p class=\"links\"><a id=\"active\">Announcement</a></p>";
                if($temp==1)
                echo "<p class=\"links\"><a href=\"add.php\">Add user</a></p>";
                
                 ?>
                <p class="links"><a href="billing.php">Billing</a></p>
                <p class="links"><a  href="stock.php">Stock analysis</a></p>
                <p class="links" id="logout"><a href="logout.php" >Log out</a></p>
            </div>
        </div>
        <div >
    <div id="login-form" style="margin-top:-8%;">
    <?php $myfile="announce.txt";
        $read=file_get_contents($myfile);
        echo "<div>$read</div>";
        ?>
    </div>
</div>
    </body>
   <div class="footer">
  <p> &copy; Olympus 2021</p>
</div>
</html>