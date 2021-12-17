if(sessionStorage.getItem("userID")!=null)
{
    let userID = sessionStorage.getItem("userID");
    if(userID[0] == "M")
    {
        window.location = "management.php";
    }
    else if(userID[0] == "D")
    {
        window.location = "driver.php";
    }
    else if(userID[0] == "A")
    {
        window.location = "admin.php";
    }
}