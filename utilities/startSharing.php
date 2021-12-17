<?php
require_once("config.php");
$query1 = $con->prepare("SELECT * FROM location WHERE liveStatus='active' AND driverID=:driverID");
$query1->bindParam(":driverID", 'D001');
$query1->execute();
if($query1->rowCount()==0)
{
    $query2 = $con->prepare("INSERT INTO location (driverID, latitude, longitude, patientID, liveStatus, timeBegin) VALUES (:driverID, :latitude, :longitude, :patientID, 'active', CURRENT_TIMESTAMP)");
    $query2->bindParam(":driverID", 'D001');
    $query2->bindParam(":latitude", '1.1');
    $query2->bindParam(":longitude", '1.2');
    $query2->bindParam(":patientID", '4');
    $query2->execute();
}
else
{
    $query3 = $con->prepare("UPDATE location SET latitude=:latitude, longitude=:longitude WHERE liveStatus='active' AND driverID=:driverID");
    $query3->bindParam(":driverID", 'D001');
    $query3->bindParam(":latitude", '2.1');
    $query3->bindParam(":longitude", '2.2');
    $query3->execute();
}
echo "Location updated";
?>
