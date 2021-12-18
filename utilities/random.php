<?php
require_once("config.php");
echo "connected";
$query1 = $con->prepare("SELECT * FROM location WHERE liveStatus='active' AND driverID=:driverID");
$query1->bindParam(":driverID", "driverID");
$query1->execute();
echo "checked rows";
if($query1->rowCount()==0)
{
    echo "entered if";
    $query2 = $con->prepare("INSERT INTO location (driverID, latitude, longitude, patientID, liveStatus, timeBegin) VALUES (:driverID, :latitude, :longitude, :patientID, 'active', CURRENT_TIMESTAMP)");
    $query2->bindParam(":driverID", "driverID");
    $query2->bindParam(":latitude", "latitude");
    $query2->bindParam(":longitude", "longitude");
    $query2->bindParam(":patientID", 7);
    $query2->execute();
    echo "over if";
}
else
{
    echo "entered else";
    $query3 = $con->prepare("UPDATE location SET latitude=:latitude, longitude=:longitude WHERE liveStatus='active' AND driverID=:driverID");
    $query3->bindParam(":driverID", "driverID");
    $query3->bindParam(":latitude", "latitude");
    $query3->bindParam(":longitude", "longitude");
    $query3->execute();
    echo "over else";
}
echo "over";
?>