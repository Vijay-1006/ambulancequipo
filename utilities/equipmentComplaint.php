<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<?php
require_once("config.php");
$query = $con->prepare("INSERT INTO equipmentcomplaints (driverID, complaint) VALUES (:driverID, :complaint)");
$query->bindParam(":driverID", $_POST["userID"]);
$query->bindParam(":complaint", $_POST["complaint"]);
$query->execute();
?>
<script>
    $('.alert-success', window.parent.document).css("display", "block");
</script>