<?php
require_once("config.php");
$userID = $_POST["userID"];
if($userID[0]=='D')
{
    $query = $con->prepare("UPDATE location SET liveStatus='inactive', timeEnd=CURRENT_TIMESTAMP WHERE driverID=:driverID AND liveStatus='active'");
    $query->bindParam(":driverID", $userID);
    $query->execute();
}
?>