<?php
require_once("config.php");
$query1 = $con->prepare("SELECT * FROM location WHERE liveStatus='active' AND driverID=:driverID");
$query1->bindParam(":driverID", 'D001');
$query1->execute();
if($query1->rowCount()==0)
{
    echo "Hi1"
}
else
{
    echo "Hi2";
}
echo "Location updated";
?>
