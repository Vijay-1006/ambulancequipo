<?php
require_once("config.php");
echo "connected";
$query1 = $con->prepare("SELECT * FROM location WHERE liveStatus='active' AND driverID=:driverID");
$query1->bindParam(":driverID", "driverID");
$query1->execute();
echo "checked rows";
echo "over";
?>
