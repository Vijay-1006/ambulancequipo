<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<?php
require_once("config.php");
$query = $con->prepare("INSERT INTO patient (name, sex, age, patientMobile, address, attendee, emergency, chronicCond, allergies, glucose, oxygen, pulse, pickup, destination) VALUES (:patientName, :patientSex, :patientAge, :patientMobile, :patientAddress, :patientAttendee, :patientEmergency, :patientChronicCond, :patientAllergies, :patientGlucose, :patientOxygen, :patientPulse, :patientPickup, :patientDestination)");
$query->bindParam(":patientName", $_POST["patientName"]);
$query->bindParam(":patientSex", $_POST["patientSex"]);
$query->bindParam(":patientAge", $_POST["patientAge"]);
$query->bindParam(":patientMobile", $_POST["patientMobile"]);
$query->bindParam(":patientAddress", $_POST["patientAddress"]);
$query->bindParam(":patientAttendee", $_POST["patientAttendee"]);
$query->bindParam(":patientEmergency", $_POST["emergencyDetails"]);
$query->bindParam(":patientChronicCond", $_POST["patientChronicCond"]);
$query->bindParam(":patientAllergies", $_POST["patientAllergies"]);
$query->bindParam(":patientGlucose", $_POST["patientGlucose"]);
$query->bindParam(":patientOxygen", $_POST["patientOxygen"]);
$query->bindParam(":patientPulse", $_POST["patientPulse"]);
$query->bindParam(":patientPickup", $_POST["patientPickup"]);
$query->bindParam(":patientDestination", $_POST["patientDestination"]);
$query->execute();
$query1 = $con->prepare("SELECT TOP 1 patientID FROM patient ORDER BY patientID DESC");
$query1->execute();
$sqldata1 = $query1->fetch(PDO::FETCH_ASSOC);
$patientID = $sqldata1["patientID"];
echo "<script>$('#patientIDstore', window.parent.document).html($patientID)</script>";
?>