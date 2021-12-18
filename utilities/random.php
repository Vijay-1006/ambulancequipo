<?php
require_once("config.php");
echo "connected\n";
$driverID = "driverID";
$query1 = $con->prepare("SELECT * FROM location WHERE liveStatus='active' AND driverID=:driverID");
$query1->bindParam(":driverID", $driverID);
$query1->execute();
$sqldata1 = $query1->fetchAll(PDO::FETCH_ASSOC);
echo (string)$sqldata1;
echo "checked rows\n";
echo $query1->rowCount();
echo "over\n";
?>
