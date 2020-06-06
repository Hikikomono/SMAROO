<!--
<form action="authentication/login_check.php" method="post">

        <label for="email_input"><b>Email</b></label>
        <input type="email" placeholder="Enter email" name="email_input" required>

        <label for="password_input"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password_input" required>

        <button type="submit">Login</button>
    </div>

</form>
-->

<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="signin.css">

<body class="text-center">
<form class="form-signin" form action="authentication/login_check.php" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Sign-in to smaroo</h1>

    <label for="email_input" class="sr-only">Email address</label>
    <input type="email" name="email_input" class="form-control" placeholder="Email address" required="" autofocus="">
    <label for="password_input" class="sr-only">Password</label>
    <input type="password" name="password_input" class="form-control" placeholder="Password" required="">

    <a href="register.php">Register new Account</a>
    <button class="btn btn-lg btn-primary btn-block" type="submit" id="confirm_btn">Sign in</button>
</form>


