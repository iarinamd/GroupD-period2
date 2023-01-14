<?php session_start();
var_dump($_SESSION)?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
</head>
<body>
<?php include_once "header.php"?>
<form action="login.php" method="POST">
    <div class = "container">
        <div class = "loginBox">
            <div class = "usernameBox">
                <label class = "username" for="userInput">Username</label><br>
                <input class = "usernameInput" type="text" name="userInput" id="userInput" required="" />
            </div>
            <div class = "passwordBox">
                <label class = "password" for="passwordInput">Password</label><br>
                <input class = "passwordInput" type="text" name="passwordInput" id="passwordInput" required="" />
            </div>
            <div class = "loginButton">
                <input class="submitButton" type="submit" name="submit" id="submit" value="Login"/>
            </div>
        </div>
    </div>
</form>
<?php include_once "footer.php"?>
</body>
</html>

