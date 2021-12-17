<?php
require_once("config.php");
$userID = $_POST["userID"];
$query = $con->prepare("UPDATE location SET liveStatus='inactive', timeEnd=CURRENT_TIMESTAMP WHERE driverID=:driverID and liveStatus='active'");
$query->bindParam(":driverID", $userID);
$query->execute();
?>