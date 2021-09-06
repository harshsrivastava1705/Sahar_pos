<?php
session_start();
if(!isset($_SESSION['user']))
    header("Location: index.php");    
if($_SESSION['user']!="admin@sahar")
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
                <span id="click" onclick="disp()">NAVIGATE</span>
                <p class="links"><a href="online.php">Online</a></p>
                <p class="links"><a id="active">Announce</a></p>
                 <?php if (filesize('announce.txt') != 0)
                {echo"<p class=\"links\"><a href=\"announcement.php\">Announcement</a></p>";}
                ?>
                <p class="links"><a href="add.php">Add user</a></p>
                <p class="links"><a href="billing.php">Billing</a></p>
                <p class="links"><a  href="stock.php">Stock analysis</a></p>
                <p class="links" id="logout"><a href="logout.php" >Log out</a></p>
            </div>
        </div>
        

        <?php 
       if(isset($_POST['submit2']))
        {
                $myfile = fopen("announce.txt", 'w');
               @ $val=$_POST['announce'];
                fwrite($myfile,$val);
                fclose($myfile);
                header("Refresh:0");
        }
        ?>

    <div id="announcement" style="width:50%;
    display:block;
    margin-left:auto 0;
    margin-top:-150px;
    align-items: center;">
        <form action= "" id="login-form" style="margin-left:60%; height: 217px;"  method="post">
            <label for="announce" style="display:block;">Announce here:</label>
            <?php
            echo "<textarea rows=\"10\" cols=\"60\" id=\"announce\" name=\"announce\" style=\"resize:none;\">".file_get_contents("announce.txt")."</textarea>";
            ?>
            <input type="submit" id="submit2"name="submit2" style="float:right;">
    </form>
    </div>
    </body>
   <div class="footer">
  <p> &copy; Olympus 2021</p>
</div>
</html>