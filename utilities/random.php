<?php
require_once("config.php");
echo "connected";
$query1 = $con->prepare("SELECT * FROM location WHERE liveStatus='active' AND driverID=:driverID");
$query1->bindParam(":driverID", "driverID");
$query1->execute();
echo "checked rows";
echo $query1->rowCount();
if($query1->rowCount()==0)
{
    echo "entered if";
    
    echo "over if";
}
echo "over";
?>
