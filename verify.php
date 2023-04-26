<?php 
$user=$_POST['user'];
$p=$_POST['pass'];
$h=fopen("users.csv","r");
$c=0; 
$q=fopen("ip.csv","w");
fclose($q);
while(($data= fgetcsv($h,1000,","))!== FALSE)
{
    $num=count($data);
    $big[]=$data;
    if($data[0]==$user && password_verify($p, $data[1]))
    {
        session_start();
        $c=1;
        $_SESSION['user']=$user;
        header("Location: home.php");
    }
}
fclose($h);
if($c!=1)
header("location: index.php?fail=true");
else{

    $date = date("d-m-Y");
    $timeh=date("H")+10;
    $timem=date("i")-30;
    if($timem<0)
    {
        $timeh-=1;
        $timem+=60;
    }
    if($timeh>=24)
    {
    $timeh=$timeh-24;
    $date = date('d-m-Y', strtotime($date . ' +1 day'));
    }
    if($timem<10)
    $timem="0".$timem;
    if($timeh<10)
    $timeh="0".$timeh;
    $q=fopen("users.csv","w");

    for($i=0;$i<count($big);$i++)
    {
        if($big[$i][0]!=$user)
        fputcsv($q,$big[$i]);
        else
        {$big[$i][2]="on";
            $big[$i][3]=strval($timeh).":".strval($timem);
            $big[$i][4]=strval($date);
        fputcsv($q,$big[$i]);
        }
    }
    fclose($q);
}
?>