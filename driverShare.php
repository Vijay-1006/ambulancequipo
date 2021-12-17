<?php
require_once("config.php");
$userID = $_POST["userID"];
$query = $con->prepare("SELECT * FROM location WHERE driverID=:driverID and liveStatus='active'");
$query->bindParam(":driverID", $userID);
$query->execute();
if($query->rowCount()==0)
{
    $query1 = $con->prepare("INSERT INTO location (driverID, latitude, longitude, patientID, liveStatus, timeBegin) VALUES (:driverID, :lat, :lng, :patientID, 'active', CURRENT_TIMESTAMP)");
    $query1->bindParam(":driverID", $userID);
    $query1->bindParam(":lat", $_POST["latitude"]);
    $query1->bindParam(":lng", $_POST["longitude"]);
    $query1->bindParam(":patientID", $_POST["patientID"]);
    $query1->execute();
}
else
{
    $query2 = $con->prepare("UPDATE location SET latitude=:lat, longitude=:lng WHERE driverID=:driverID AND liveStatus='active'");
    $query2->bindParam(":driverID", $userID);
    $query2->bindParam(":lat", $_POST["latitude"]);
    $query2->bindParam(":lng", $_POST["longitude"]);
    $query2->execute();
}
?>