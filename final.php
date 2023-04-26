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
         <?php 
         $big=[""];
        $h=fopen("stocks.csv","r");
        while(($data= fgetcsv($h,1000,","))!== FALSE)
        {
            $num=count($data);
            $big[]=$data;
        }
        fclose($h);?>
        
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
                <p class="links"><a href="billing.php" >Billing</a></p>
                <p class="links"><a href="stock.php">Stock analysis</a></p>
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
    <div id="items" style="margin-bottom:3%;">
    <table id="data">
    <?php
    $n=$_POST['name1'];
    $p=$_POST['phone'];
    $e=$_POST['emp'];
    $date = date("d-m-Y");
    $timeh=date("H")+10;
    $timem=date("i")-30;
    if($timem<0)
    {
        $timeh-=1;
        $timem+=60;
    }
    echo "<h2 style=\"color:black; text-shadow:none; margin-left:28%;\">SAHAR STORE</h2><h4 style=\"margin-left:10%;\">{$date} {$timeh}:{$timem}</h4>";
    echo"<h3 style=\"margin-left:10%;\">Name: {$n}</h3><h3 style=\"margin-left:10%;\" >Phone: {$p}</h3><h3 style=\"margin-left:10%;\" >Employee ID: {$e}</h3>";
    echo "<tr> <th>Item</th> <th>Quantity</th><th>Price</th></tr>";
    $f=$_POST['quantity'];
    $cost=0;
    $q=0;
    for($i=0;$i<count($f);$i++)
    {
       if($f[$i]!="")
        {
            $temp=$big[$i+2][2]*$f[$i];
            echo "<tr><td>{$big[$i+2][0]}</td> <td>{$f[$i]}</td><td>{$temp}</td> </tr>";
            $big[$i+2][1]=(string)((int)$big[$i+2][1]-$f[$i]);
            $cost=$cost+$temp;
            $q+=$f[$i];
        }
    } 
    echo "<tr><td>Total</td> <td>{$q}</td><td>{$cost}</td> </tr>";
    $newp=[""];
    /*$fout = fopen("stocks.csv", 'w');
        fputcsv($fout, $newp);
fclose($fout);*/
$handle = fopen("stocks.csv", 'r+');
ftruncate($handle,  0);
rewind($handle);
fclose($handle);
$fout = fopen("stocks.csv","a");
for($i=0;$i<=count($f);$i++)
{
    fputcsv($fout,$big[$i+1]);
}
fclose($fout);
$h=fopen('data.csv','a');
$d=[$n,$p,$e,$cost,$date,strval($timeh).":".strval($timem)];
fputcsv($h,$d);
fclose($h);
    ?>
    </table>
    </div>
</body>
<div class="footer">
  <p> &copy; Olympus 2021</p>
</div>
</html>