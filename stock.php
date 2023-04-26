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
        $h=fopen("stocks.csv","r");
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
               $t=0;
                if($_SESSION["user"]=="admin@sahar")
                
                {
                    $t=1;
                    echo"<p class=\"links\"><a href=\"online.php\">Online</a></p>";
                
                    echo "<p class=\"links\"><a href=\"admin.php\">Announce</a></p>";
                }
                    if (filesize('announce.txt') != 0)
                {echo"<p class=\"links\"><a href=\"announcement.php\">Announcement</a></p>";}
                if($t==1)
                echo "<p class=\"links\"><a href=\"add.php\">Add user</a></p>";
                  ?>
                <p class="links"><a href="billing.php">Billing</a></p>
                <p class="links"><a  href="stock.php" id="active">Stock analysis</a></p>
                <p class="links" id="logout"><a href="logout.php" >Log out</a></p>
            </div>
        </div>
        <div id="final">
        <div class = title >Calculator</div> 
      <table id="calc"> 
         <tr> 
            <td colspan="3"><input type="text" id="result"/></td> 
            <!-- clr() function will call clr to clear all value -->
            <td><input type="button" value="c" onclick="clr()"/> </td> 
         </tr> 
         <tr> 
            <!-- create button and assign value to each button -->
            <!-- dis("1") will call function dis to display value -->
            <td><input type="button" value="1" onclick="dis('1')"/> </td> 
            <td><input type="button" value="2" onclick="dis('2')"/> </td> 
            <td><input type="button" value="3" onclick="dis('3')"/> </td> 
            <td><input type="button" value="/" onclick="dis('/')"/> </td> 
         </tr> 
         <tr> 
            <td><input type="button" value="4" onclick="dis('4')"/> </td> 
            <td><input type="button" value="5" onclick="dis('5')"/> </td> 
            <td><input type="button" value="6" onclick="dis('6')"/> </td> 
            <td><input type="button" value="-" onclick="dis('-')"/> </td> 
         </tr> 
         <tr> 
            <td><input type="button" value="7" onclick="dis('7')"/> </td> 
            <td><input type="button" value="8" onclick="dis('8')"/> </td> 
            <td><input type="button" value="9" onclick="dis('9')"/> </td> 
            <td><input type="button" value="+" onclick="dis('+')"/> </td> 
         </tr> 
         <tr> 
            <td><input type="button" value="." onclick="dis('.')"/> </td> 
            <td><input type="button" value="0" onclick="dis('0')"/> </td> 
            <!-- solve function call function solve to evaluate value -->
            <td><input type="button" value="=" onclick="solve()"/> </td> 
            <td><input type="button" value="*" onclick="dis('*')"/> </td> 
         </tr> 
      </table> 
    </div>
    <div id="items" style="position:absolute; border-color:transparent; width:30%; padding-left:2%;  padding-right:0px;">
    <table id="data" style="margin-top:5%;">
    <?php
    echo "<tr> <th> {$big[1][0]}</th> <th>{$big[1][1]}</th></tr>";
    $l=count($big);
    for($i=2;$i<$l;$i++)
       {
           echo "<tr>";
            echo "<td>{$big[$i][0]} </td> <td>";
            echo "{$big[$i][1]}</td>";
            echo "</tr>";
       }
    echo "</pre>"; 
    ?>
    </table>
    <div id="login-form" style="border:none; box-shadow:none; padding-left:30%; position:absolute;">
    <form method="post" id="file" action="replace.php" enctype="multipart/form-data">
    <label for="myfile">Select a file:</label>
    <input type="file" id="myfile" name="myfile">
    <input type="submit" value="upload" id="submit" style="margin-left:20%; margin-top:5%;">
    </form>
    <br>
    <form action="download.php">
        <input type="submit" value="Download customer data" style="margin-left:9%; cursor:pointer;"/>
    </form>
    <br>
    <form action="downloadstock.php">
        <input type="submit" value="Download stock report" style="margin-left:10.4%; cursor:pointer; margin-bottom:12%;"/>
    </form>
    </div>
    </div>
    </body>
    <div class="footer">
  <p> &copy; Olympus 2021</p>
</div>
</html>