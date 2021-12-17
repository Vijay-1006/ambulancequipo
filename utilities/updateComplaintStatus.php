<?php
require_once("config.php");
$query = $con->prepare("UPDATE equipmentComplaints SET complaintStatus=:complaintStatus WHERE id=:id");
$query->bindParam(":complaintStatus", $_POST["status"]);
$query->bindParam(":id", $_POST["id"]);
$query->execute();
?>