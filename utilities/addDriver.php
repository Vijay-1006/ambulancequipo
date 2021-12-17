<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<?php
require_once("config.php");
$query1 = $con->prepare("SELECT * FROM users WHERE userID=:userID");
$query1->bindParam(":userID", $_POST["driverID"]);
$query1->execute();
if($query1->rowCount()==0)
{
    $query2 = $con->prepare("INSERT INTO users (userID, pwd) VALUES (:userID, :pwd)");
    $query2->bindParam(":userID", $_POST["driverID"]);
    $query2->bindParam(":pwd", $_POST["driverPWD"]);
    $query2->execute();
    $query3 = $con->prepare("INSERT INTO driver (driverID, managementID, ambulanceNo, name, driverMobile) VALUES (:driverID, :managementID, :ambulanceNo, :driverName, :driverMobile)");
    $query3->bindParam(":driverID", $_POST["driverID"]);
    $query3->bindParam(":managementID", $_POST["managementID"]);
    $query3->bindParam(":ambulanceNo", $_POST["ambulanceNo"]);
    $query3->bindParam(":driverName", $_POST["driverName"]);
    $query3->bindParam(":driverMobile", $_POST["driverMobile"]);
    $query3->execute();
?>
    <script>
        $('.alert-danger', window.parent.document).hide();
        $('.alert-success', window.parent.document).show();
        window.parent.location.reload();
    </script>
<?php
}
else
{
?>
    <script>
        $('.alert-success', window.parent.document).hide();
        $('.alert-danger', window.parent.document).show();
    </script>
<?php
}
?>