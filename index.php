<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTH-8">
        <title>POS System</title>
        <link rel="shortcut icon" type="image/jpg" href="logo.jpeg" id="favicon"/>

        <link rel="stylesheet" href="style.css">
        <script> 
 window.onpopstate = function() {
       alert("Login to continue");
    }; history.pushState({}, '');
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
            width: 210px; 
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
                display: none;
                position: unset;
                float:left;
                margin-left: -2%;
                
            }
            
         </style> 
        
    </head>

    <body>
        
        <div id="st-01">
            <h1>
                SAHAR
            </h1>
            <h2>The dawn of the new era.</h2>
        </div>
        <br>
        
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
    <div id="login-form">
    <img src="logo.jpeg" alt="logo" id="logo"/>
    <br>
    <form action="verify.php" method="post" id="login">
    <label for="user">Username</label>
    <input type="email" id="user" name="user">
    <br>
    <label for="pass">Password</label>
    <input type="password" id="pass"name="pass">
    <br>
    <input type="submit" value="Log in" id="submit">
    <?php if(isset($_GET["fail"]))
    echo "<p style=\"color:red; margin-left:4%; margin-top:-15%;\">Incorrect username or password</p>";
    ?>
    </form>
</div>
    </body>
    <div class="footer">
  <p> &copy; Olympus 2021</p>
</div>
</html>