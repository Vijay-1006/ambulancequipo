<?php
ob_start();
date_default_timezone_set("Asia/Kolkata");
try
{
    /*Developer:$con=new PDO("mysql:dbname=ambulancequipo;host=localhost","root","");*/
    $con = new PDO("sqlsrv:server = tcp:ambulancequipo-server.database.windows.net,1433; Database = ambulancequipo", "ambulancequipo-server-admin", "Kuppa#304");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
?>
    <script>
        alert("Connection to Database Failed!");
    </script>
<?php
}
?>
