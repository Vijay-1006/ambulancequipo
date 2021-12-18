<?php
ob_start();
date_default_timezone_set("Asia/Kolkata");
try
{
    /*Developer:$con=new PDO("mysql:dbname=ambulancequipo;host=localhost","root","");*/
    $con = new PDO("sqlsrv:server = tcp:ambulancequipo-server.database.windows.net,1433; Database = ambulancequipo", "ambulancequipo-server-admin", "Kuppa#304");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo $e;
}
$query1 = $con->prepare("SELECT * FROM location WHERE liveStatus='active' AND driverID=:driverID");
$query1->bindParam(":driverID", 'D001');
$query1->execute();
if($query1->rowCount()==0)
{
    echo "Hi1"
}
else
{
    echo "Hi2";
}
echo "Location updated";
?>
