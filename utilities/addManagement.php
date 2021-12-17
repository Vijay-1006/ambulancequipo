<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<?php
require_once("config.php");
$query1 = $con->prepare("SELECT * FROM users WHERE userID=:userID");
$query1->bindParam(":userID", $_POST["managementID"]);
$query1->execute();
if($query1->rowCount()==0)
{
    $query2 = $con->prepare("INSERT INTO users (userID, pwd) VALUES (:userID, :pwd)");
    $query2->bindParam(":userID", $_POST["managementID"]);
    $query2->bindParam(":pwd", $_POST["managementPWD"]);
    $query2->execute();
    $query3 = $con->prepare("INSERT INTO management (managementID, managementMobile, name, address, city) VALUES (:userID, :managementMobile, :managementName, :managementAddress, :managementCity)");
    $query3->bindParam(":userID", $_POST["managementID"]);
    $query3->bindParam(":managementMobile", $_POST["managementMobile"]);
    $query3->bindParam(":managementName", $_POST["managementName"]);
    $query3->bindParam(":managementAddress", $_POST["managementAddress"]);
    $query3->bindParam(":managementCity", $_POST["managementCity"]);
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