<?php
require_once("config.php");
$driverID = $_POST["userID"];
$query = $con->prepare("SELECT * FROM location WHERE driverID=:driverID AND liveStatus='active'");
$query->bindParam(":driverID", $driverID);
$query->execute();
if($query->rowCount()!=0)
{
    $sqldata = $query->fetch(PDO::FETCH_ASSOC);
    $latitude = $sqldata["latitude"];
    $longitude = $sqldata["longitude"];
    $liveStatus = $sqldata["liveStatus"];
    echo '{"lat":"'.$latitude.'", "lng":"'.$longitude.'", "liveStatus":"'.$liveStatus.'"}';
}
else
{
    echo '{"lat":"", "lng":"", "liveStatus":"inactive"}';
}
?>