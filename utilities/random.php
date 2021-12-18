<?php
echo "Hi";
ob_start();
date_default_timezone_set("Asia/Kolkata");
try
{
    /*Developer:$con=new PDO("mysql:dbname=ambulancequipo;host=localhost","root","");*/
    $con = new PDO("sqlsrv:server = tcp:ambulancequipo-server.database.windows.net,1433; Database = ambulancequipo", "ambulancequipo-server-admin", "Kuppa#304");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected";
}
catch(PDOException $e)
{
  echo $e;
}
$query = $con->prepare("SELECT * FROM location WHERE liveStatus='active' AND driverID='D001'");
$query->execute();
if($query->rowCount()==0)
{
    $query1 = $con->prepare("INSERT INTO location (driverID, latitude, longitude, patientID, liveStatus, timeBegin) VALUES ('D001', '1.1', '1.2', 1, 'active', CURRENT_TIMESTAMP)");
    $query1->execute();
    echo "executed";
}
echo "Bye";
?>
