<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="TrendHive Social Media Page">
        <meta name="robots" content="noindex, nofollow">

        <title>Login</title>
        <link rel="icon" href="img/sfiller.jpg" type="image/x-icon">
        <link rel="stylesheet" href="./css/login.css">
    </head>

    <body>
        <h1>Welcome to <span class="loginTitle">TrendHive</h1>

        <div class="container">
            <div class="loginForm">
                <form method="post" action="./php/validate.php">
                    <input name="username" type="text" placeholder="Username" required />
                    <input name="password" type="password" placeholder="Password" required />
                    <input type="submit" value="Login"/>
                </form>
            </div>

            <div class="registerForm">
                <form action="register.php">
                    <input type="submit" value="Create new account">
                </form>
            </div>
        </div>
    </body>
    
    <footer></footer>
</html>
