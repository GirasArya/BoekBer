<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="editan.css">
    <script src="https://kit.fontawesome.com/44003bbbd7.js" crossorigin="anonymous"></script>
    <title>BibitQ Login</title>
</head>
<body>
    <div class="background">
        <div class="background-login">
            <h3>WELCOME</h3>
            <form action="proseslogin.php" method="post">
                <i class="fa-solid fa-user">
                    <input id ="username" name="username" type="text" placeholder="Username">
                </i>
                <i class="fa-solid fa-lock">
                    <input id="password" name="password" type="password" placeholder="Password">
                </i>
                <div class="background-button">
                    <button name="button-login" type="submit">Sign in</button>
                </div>
            </form>
            <p>Don't have an account yet?
                <a href="./../Register/Register.php">
                    <strong>Sign Up<strong>
                </a> 
            </p >
        </div>
    </div>
</body>
</html>