<?php
    session_start();
    if (isset($_SESSION['sid'])){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>smaroo - Login</title>
    <link rel="icon" href="img/title_icon.png" type="image/icon type">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="signin.css">
</head>


<body class="text-center">
<form class="form-signin" form action="authentication/login_check.php" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Sign-in to smaroo</h1>

    <label for="email_input" class="sr-only" >Email address</label>
    <input type="email" name="email_input" class="form-control" placeholder="Email address" required="" autofocus="" autocomplete="off">
    <label for="password_input" class="sr-only">Password</label>
    <input type="password" name="password_input" class="form-control" placeholder="Password" required="">

    <a href="register.php">Register new Account</a>
    <button class="btn btn-lg btn-primary btn-block" type="submit" id="confirm_btn">Sign in</button>
</form>
</body>
</html>



