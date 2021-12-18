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
$query1->bindParam(":driverID", $_POST["driverID"]);
$query1->execute();
if($query1->rowCount()==0)
{
    $query2 = $con->prepare("INSERT INTO location (driverID, latitude, longitude, patientID, liveStatus, timeBegin) VALUES (:driverID, :latitude, :longitude, :patientID, 'active', CURRENT_TIMESTAMP)");
    $query2->bindParam(":driverID", $_POST["driverID"]);
    $query2->bindParam(":latitude", $_POST["latitude"]);
    $query2->bindParam(":longitude", $_POST["longitude"]);
    $query2->bindParam(":patientID", $_POST["patientID"]);
    $query2->execute();
}
else
{
    $query3 = $con->prepare("UPDATE location SET latitude=:latitude, longitude=:longitude WHERE liveStatus='active' AND driverID=:driverID");
    $query3->bindParam(":driverID", $_POST["driverID"]);
    $query3->bindParam(":latitude", $_POST["latitude"]);
    $query3->bindParam(":longitude", $_POST["longitude"]);
    $query3->execute();
}
?>
