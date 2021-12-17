<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<?php
require_once("config.php");
$userID = $_POST["ID"];
$password = $_POST["pwd"];
$query = $con->prepare("SELECT * FROM users WHERE userID=:userID AND pwd=:pwd");
$query->bindParam(":userID", $userID);
$query->bindParam(":pwd", $password);
$query->execute();
if($query->rowCount()==0)
{
    echo "
    <script>
        $('.alert-success', window.parent.document).hide();
        $('.alert-danger', window.parent.document).show();
    </script>
    ";
}
else if($userID[0] == "M")
{
    echo "
    <script>
        $('.alert-danger', window.parent.document).hide();
        $('.alert-success', window.parent.document).show();
        sessionStorage.setItem('userID','$userID');
        window.parent.location = 'https://ambulancequipo.azurewebsites.net/management.php';
    </script>";
}
else if($userID[0] == "D")
{
    echo "
    <script>
        $('.alert-danger', window.parent.document).hide();
        $('.alert-success', window.parent.document).show();
        sessionStorage.setItem('userID','$userID');
        window.parent.location = 'https://ambulancequipo.azurewebsites.net/driver.php';
    </script>";
}
else if($userID[0] == "A")
{
    echo "
    <script>
        $('.alert-danger', window.parent.document).hide();
        $('.alert-success', window.parent.document).show();
        sessionStorage.setItem('userID','$userID');
        window.parent.location = 'https://ambulancequipo.azurewebsites.net/admin.php';
    </script>";
}
?>
