<?php
session_start();
if (!$_SESSION['sid'] == session_id()) {
    header("location: login.php");
}

$username = $_SESSION['username'];
$email = $_SESSION['email'];
$image = $_SESSION['image'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>smaroo - Profile Settings</title>
    <link rel="icon" href="img/title_icon.png" type="image/icon type">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Our Bootstrap -->
    <link rel="stylesheet" href="style_1.css">

    <link rel="stylesheet" href="profile.css">

</head>
<body>


<!-- Navigation -->

<nav class="navbar navbar-expand-md navbar-dark bg-dark static-top">
    <a class="navbar-brand" href="index.php">SmaRoo</a>
</nav>


<!-- Profile Content-->
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <form class="form-horizontal" action="authentication/profileChanges_check.php" method="post" enctype="multipart/form-data">

                <!-- User Image -->
                <div class="text-center">
                <img class="rounded-circle" id="profile_image"
                    <?php echo "src=$image" ?> alt="profile image" style="max-width: 300px; max-height: 300px; padding: 20px;">
                </div>
                <input type="file" id="image_upload" name="image" >

                <!-- User info -->
                <div class="jumbotron">
                    <h3> User info</h3>
                    <div class="panel panel-default panel-body">
                        <div class="form-group ">
                            <label for="username">Username</label>
                            <?php
                            echo "<input type='text' class='form-control' name='username' minlength='3' placeholder='$username'
                                    autocomplete='off'>"
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <?php
                            echo "<input type='email' class='form-control' name='email' autocomplete='off' placeholder='$email'>"
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Security -->
                <div class="jumbotron">
                    <h3> Security </h3>
                    <div class="form-group">
                        <label for="password_old">Current Password</label>
                        <input type="password" class="form-control"name="password_old">
                    </div>
                    <div class="form-group">
                        <label for="password_new">New Password</label>
                        <input type="password" class="form-control" minlength='5' name="password_new">
                    </div>

                    <button class="btn btn-lg btn-primary btn-block" type="submit" id="confirm_btn">Confirm Changes
                    </button>
            </form>

        </div>
    </div>
</div>

</body>
</html>

<script>
    $("#profile_image").click(function (e) {
        $("#image_upload").click();
    });
</script>
