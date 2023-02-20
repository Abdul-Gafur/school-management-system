<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Login Form</title>
</head>

<body class="login_body">
    <center>
        <div class="login">
            <center class="login_title">
                <h2>Login Form</h2>
                <p class="login_error">
                    <?php
                    error_reporting(0);
                    session_start();
                    echo $_SESSION['loginMessage'];
                    session_destroy();
                    ?>
                </p>
            </center>
            <form class="login_form" action="login_check.php" method="POST">
                <div>
                    <label class="login_lbl" for="username">Username:</label>
                    <input type="text" name="username" id="">
                </div>
                <div>
                    <label class="login_lbl" for="password">Password:</label>
                    <input type="password" name="password" id="">
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" name="submit" id="" value="Login">
                </div>
            </form>
        </div>
    </center>
</body>

</html>