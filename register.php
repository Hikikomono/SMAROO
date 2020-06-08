<?php
session_start();
if (isset($_SESSION['sid'])) {
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

    <title>smaroo - Register</title>
    <link rel="icon" href="img/title_icon.png" type="image/icon type">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="signin.css">
</head>


<body class="text-center">
<form class="form-signin" action="authentication/register_check.php"
      oninput='password_confirm.setCustomValidity(password_confirm.value != password_input.value ? "Passwords do not match." : "" )'
      method="post">
    <h1 class="h3 mb-3 font-weight-normal">Create Smaroo Account </h1>

    <label for="username_input" class="sr-only"><b>Username</b></label>
    <input type="text" class="form-control" placeholder="Username" name="username_input" minlength="3" required=""
           autofocus="" autocomplete="off">

    <label for="email_input" class="sr-only">Email address</label>
    <input type="email" name="email_input" class="form-control" placeholder="Email address" autocomplete="off" required="">

    <label for="password_input" class="sr-only">Password</label>
    <input type="password" name="password_input" class="form-control" minlength="5" placeholder="Password" required="">

    <label for="password_confirm" class="sr-only">Confirm Password</label>
    <input type="password" class="form-control" placeholder="Re-Enter Password" minlength="5" name="password_confirm"
           required>

    <a href="login.php">Login to Smaroo</a>

    <button id="confirm_btn" class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
</form>
</body>
</html>