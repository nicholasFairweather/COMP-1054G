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
        <div>
            <h3>Don't have an account? Sign up below!</h3>
            <div class="container">
                <div class="registerPersonForm">
                    <form method="post" action="register_user.php">
                        <p><input name="first_name" type="text" placeholder="First Name" required /></p>
                        <p><input name="last_name" type="text" placeholder="Last Name" required /></p>
                        <p><input name="username" type="text" placeholder="Username" required /></p>
                        <p><input name="password" type="password" placeholder="Password" required /></p>
                        <p><input name="confirm" type="password" placeholder="Confirm Password" required /></p>
                        <input type="submit" name="submit" value="Register" />
                    </form>
                </div>
            </div>
        </div>
        <div>
            <form action="index.php" class="loginOld">
                <input type="submit" value="Already have an account?">
            </form>
        </div>
    </body>

    <footer> 
        
    </footer>
</html>