<?php
session_start();
$h=fopen("users.csv","r");
$c=0;     
while(($data= fgetcsv($h,1000,","))!== FALSE)
{
    $num=count($data);
    $big[]=$data;
}
fclose($h);
    $q=fopen("users.csv","w");

    for($i=0;$i<count($big);$i++)
    {
        if($big[$i][0]!=$_SESSION['user'])
        fputcsv($q,$big[$i]);
        else
        {$big[$i][2]="off";
        fputcsv($q,$big[$i]);
        }
    }
    fclose($q);


       
session_unset();
session_destroy();
header("location: index.php");
?>