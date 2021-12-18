<?php
echo "about to connect";
require_once("config.php");
echo "connected";
$query1 = $con->prepare("SELECT * FROM location WHERE liveStatus='active' AND driverID=:driverID");
$query1->bindParam(":driverID", $_POST["driverID"]);
$query1->execute();
$sqldata1 = $query1->fetchAll(PDO::FETCH_ASSOC);
echo "query1 executed";
if($query1->rowCount()==0)
{
    echo "if started";
    $query2 = $con->prepare("INSERT INTO location (driverID, latitude, longitude, patientID, liveStatus, timeBegin) VALUES (:driverID, :latitude, :longitude, :patientID, 'active', CURRENT_TIMESTAMP)");
    $query2->bindParam(":driverID", $_POST["driverID"]);
    $query2->bindParam(":latitude", $_POST["latitude"]);
    $query2->bindParam(":longitude", $_POST["longitude"]);
    $query2->bindParam(":patientID", $_POST["patientID"]);
    $query2->execute();
    echo "if ended";
}
else
{
    echo "else started";
    $query3 = $con->prepare("UPDATE location SET latitude=:latitude, longitude=:longitude WHERE liveStatus='active' AND driverID=:driverID");
    $query3->bindParam(":driverID", $_POST["driverID"]);
    $query3->bindParam(":latitude", $_POST["latitude"]);
    $query3->bindParam(":longitude", $_POST["longitude"]);
    $query3->execute();
    echo "else ended";
}
?>