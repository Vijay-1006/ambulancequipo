<?php
require_once("config.php");
$query = $con->prepare("SELECT * FROM location WHERE driverID='D001' and liveStatus='active'");
$query->execute();
echo $query->rowCount();
?>