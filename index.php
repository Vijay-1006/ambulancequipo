<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ambulancequipo - Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="loginPage.css">
    <link type = 'image/icon type' href='assets/ambulance.jpg' rel='icon'>
</head>
<body>
    <div class="container">
        <div class="form-container sign-in-container">
            <form action="utilities/login.php" method="POST" target="DummyFrame" id="loginForm">
                <h1>Sign in</h1>
                <input type="text" placeholder="ID" name="ID" required/>
                <input type="password" placeholder="Password" name="pwd" required/>
                <div class="alert alert-danger" role="alert" style="display:none;">Not a valid login credential!</div>
                <div class="alert alert-success" role="alert" style="display:none;">Signing in!</div>
                <button form = "loginForm" type="submit">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <img alt="rate monitor" title="Ambulancequipo" src="assets/rateMonitor.gif">
                </div>
            </div>
        </div>
    </div>
    <iframe name="DummyFrame" style="display:none;"></iframe>
    <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="loginPage.js"></script>
</body>
</html>