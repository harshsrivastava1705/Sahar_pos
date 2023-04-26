<?php
session_start();
if(!isset($_SESSION['user']))
{
    header("location: index.php");
    exit; 
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTH-8">
        <title>POS System</title>
        <link rel="shortcut icon" type="image/jpg" href="logo.jpeg"/>
        <link rel="stylesheet" href="style.css">
        <script> 
            //function that display value 
            function dis(val) 
            { 
                document.getElementById("result").value+=val 
            } 
              
            //function that evaluates the digit and return result 
            function solve() 
            { 
                let x = document.getElementById("result").value 
                let y = eval(x) 
                document.getElementById("result").value = y 
            } 
              
            //function that clear the display 
            function clr() 
            { 
                document.getElementById("result").value = "" 
            } 
         </script> 
          <style> 
            .title{ 
            margin-bottom: 10px; 
            text-align:center; 
            width: 200px; 
            color:green; 
            border: solid black 2px; 
            } 
     
            input[type="button"] 
            { 
            background-color:green; 
            color: black; 
            border: solid black 2px; 
            width:100% 
            } 
     
            input[type="text"] 
            { 
            background-color:white; 
            border: solid black 2px; 
            width:100% 
            } 
            #calc
            {
                display:inline-block;
                border: 2px;
                border-style: groove;
            }
            #final
            {
                display: inline-block;
                position: unset;
                float:left;
                margin-left: -2%;
                
            }
            
         </style> 
        <?php $big=[""];
        $h=fopen("users.csv","r");
        while(($data= fgetcsv($h,1000,","))!== FALSE)
        {
            $num=count($data);
            $big[]=$data;
        }
        fclose($h);
        ?>
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
                <?php 
                $v="announce.txt";
               echo "<p class=\"links\"><a href=\"online.php\" id=\"active\">Online</a></p>";
                
                echo "<p class=\"links\"><a href=\"admin.php\">Announce</a></p>";
                 if(filesize($v)!=0)
                {
                    echo "<p class=\"links\"><a href=\"announcement.php\">Announcement</a></p>";
                }
                echo "<p class=\"links\"><a href=\"add.php\">Add user</a></p>";
                
                 ?>
                <p class="links"><a href="billing.php">Billing</a></p>
                <?php 
                $v="announce.txt";?>
                <p class="links"><a  href="stock.php">Stock analysis</a></p>
                <p class="links" id="logout"><a href="logout.php" >Log out</a></p>
            </div>
        </div>
    <div id="items" style="position:absolute; border-color:transparent; width:30%; padding-left:2%;  padding-right:0px;">
    <table id="data" style="margin-top:5%;">
    <?php
    echo "<tr> <th> Username </th> <th> Login time </th></tr>";
    $l=count($big);
    for($i=1;$i<$l;$i++)
       {
           if($big[$i][2]=="on")
           {
           echo "<tr>";
            echo "<td>{$big[$i][0]} </td> <td>";
            echo "{$big[$i][3]}</td>";
            echo "</tr>";
           }
       }
    echo "</pre>"; 
    ?>
    </table>
    </div>
    </body>
    <div class="footer">
  <p> &copy; Olympus 2021</p>
</div>
</html>