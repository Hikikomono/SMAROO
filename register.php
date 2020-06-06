<!--
<form action="authentication/register_check.php" method="post">

    <label for="username_input"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username_input" required>

    <label for="email_input"><b>Email</b></label>
    <input type="email" placeholder="Enter email" name="email_input" required>

    <label for="password_input"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password_input" required>

    <label for="password_confirm"><b>Confirm Password</b></label>
    <input type="password" placeholder="Re-Enter Password" name="password_confirm" required>

    <button type="submit">Register</button>
    </div>

</form>
-->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="signin.css">

<body class="text-center">
<form class="form-signin" action="authentication/register_check.php" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Create Smaroo Account </h1>

    <label for="username_input" class="sr-only"><b>Username</b></label>
    <input type="text" class="form-control" placeholder="Username" name="username_input" required="" autofocus="">

    <label for="email_input" class="sr-only">Email address</label>
    <input type="email" name="email_input" class="form-control" placeholder="Email address" required="" >

    <label for="password_input" class="sr-only">Password</label>
    <input type="password" name="password_input" class="form-control" placeholder="Password" required="">

    <label for="password_confirm" class="sr-only">Confirm Password</label>
    <input type="password" class="form-control" placeholder="Re-Enter Password" name="password_confirm" required>

    <a href="login.php">Login to Smaroo</a>

    <button id="confirm_btn" class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
</form>