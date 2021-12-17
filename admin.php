<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Admin - Ambulancequipo</title>
  <link rel='stylesheet' type='text/css' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
  <link rel='stylesheet' type='text/css' href='admin.css'>
  <link type = 'image/icon type' href='assets/ambulance.jpg' rel='icon'>
</head>
<body>
    <script>
        if(sessionStorage.getItem('userID')==null)
        {
            window.stop();
        }
        else
        {
            let userID = sessionStorage.getItem('userID');
            if(userID[0] != 'A')
            {
                window.stop();
            }
        }
    </script>
    <div class='wrapper'>
        <div class='main-container'>
            <div class='header'>
                <div class='logo'>
                    <p>Ambulancequipo</p><img src='assets/ambulance.gif' alt='ambulance' />
                </div>
                <div class='user-info'>
                    <a href='#' onclick='signOut();' target='DummyFrame' title='Sign out'><svg viewBox='0 0 512 512' fill='currentColor'><path d='M255.2 468.6H63.8a21.3 21.3 0 01-21.3-21.2V64.6c0-11.7 9.6-21.2 21.3-21.2h191.4a21.2 21.2 0 100-42.5H63.8A63.9 63.9 0 000 64.6v382.8A63.9 63.9 0 0063.8 511H255a21.2 21.2 0 100-42.5z' /><path d='M505.7 240.9L376.4 113.3a21.3 21.3 0 10-29.9 30.3l92.4 91.1H191.4a21.2 21.2 0 100 42.6h247.5l-92.4 91.1a21.3 21.3 0 1029.9 30.3l129.3-127.6a21.3 21.3 0 000-30.2z' /></svg></a>
                </div>
            </div>
            <div id='content'>
                <div id='form-container'>
                    <h4> Add a new Hospital/ Private Ambulance Service</h2>
                    <form id='addManagementForm' action='utilities/addManagement.php' method='POST' target='DummyFrame'>
                        <div id='formDivision'>
                            <div id='formDivision1'>
                                <div class='form-group'>
                                    <label>Organization Name</label>
                                    <div>
                                        <div class='input-group'>
                                            <span class='input-group-addon'><img src='https://img.icons8.com/external-wanicon-lineal-wanicon/64/000000/external-hospital-hospital-wanicon-lineal-wanicon.png' width='16' height='16'/></span>
                                            <input  name='managementName' placeholder='Name' class='form-control' type='text' required>
                                        </div>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label>Phone</label>
                                    <div>
                                        <div class='input-group'>
                                            <span class='input-group-addon'><i class='glyphicon glyphicon-earphone'></i></span>
                                            <input name='managementMobile' placeholder='+91 123456789' class='form-control' type='text' required>
                                        </div>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label>ID</label>
                                    <div>
                                        <div class='input-group'>
                                            <span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
                                            <input name='managementID' placeholder='Management User ID' class='form-control' type='text' required>
                                        </div>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label>Password</label>
                                    <div>
                                        <div class='input-group'>
                                            <span class='input-group-addon'><i class='glyphicon glyphicon-lock'></i></span>
                                            <input name='managementPWD' placeholder='Password' class='form-control' type='password' required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id='formDivision2'>
                                <div class='form-group'>
                                    <label>Address</label>  
                                    <div>
                                        <div class='input-group'>
                                            <span class='input-group-addon'><i class='glyphicon glyphicon-home'></i></span>
                                            <textarea rows='5' cols ='23' name='managementAddress' class='form-control'>Survey No.
Area
City
Zip-Code
State</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label>City/Town</label>
                                    <div>
                                        <div class='input-group'>
                                            <span class='input-group-addon'><img src='https://img.icons8.com/small/16/000000/place-marker.png'/></span>
                                            <input  name='managementCity' placeholder='City' class='form-control' type='text' required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='alert alert-success' role='alert' style='display:none;align-self:center;'>The information about the new Hospital/ Private Hospital Service has been succesfully added</div>
                        <div class='alert alert-danger' role='alert' style='display:none;align-self:center;'>The ID provided already exists. Provide a new one!</div>
                        <button type='submit' style='align-self: center;' class='btn btn-primary'>Submit</button>
                    </form>
                </div>
                <div class='hierarchy-menu'>
                    <h4>The Hierarchy of Paramedic Services</h4>
                    <ul id='hierarchy'>
                    </ul>
                </div>
            </div>
      </div>
    </div>
    <iframe name='DummyFrame' style='display: none;'></iframe>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='admin.js'></script>
</body>
</html>