<?php
session_start();
if (!$_SESSION['sid'] == session_id()) {
    header("location: login.php");
}

$username = $_SESSION['username'];
$email = $_SESSION['email'];
$image_src = $_SESSION['image_src'];
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Our Bootstrap -->
    <link rel="stylesheet" href="style_1.css">
    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--Script for Chart.js-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <link rel="stylesheet" href="profile.css">
    <!-- Our Scripts -->
    <script src="functions.js"></script>

</head>
<body>


<!-- Navigation -->

<nav class="navbar navbar-expand-md navbar-dark bg-dark static-top">

    <a class="navbar-brand" href="index.php">SmaRoo</a>

    <!-- Logout / (evtl) Profile Button  TODO button rechtsbündig machen-->
    <button type="submit" class="btn btn-secondary navbar-btn">
        <a href="profile.php">Profile</a>
    </button>

    <button type="submit" class="btn btn-secondary navbar-btn">
        <a href="logout.php">Logout</a>
    </button>


</nav>


<!-- Profile Content-->
<div class="container center-content">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 p-0">



            <form class="form-horizontal" action="authentication/profileChanges_check.php" method="post" enctype="multipart/form-data" >
                <!-- User Image -->
                <img class="img-fluid rounded-circle" id="profile_image"
                    <?php echo "src=$image_src" ?> src= alt="profile image">
                <input type="file" id="image_upload" name="image" >

                <!-- User info -->
                <div class="jumbotron">
                    <h3> User info</h3>
                    <div class="panel panel-default panel-body">
                        <div class="form-group ">
                            <label for="username">Username</label>
                            <?php
                            echo "<input type='text' class='form-control' name='username' placeholder='$username'>"
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <?php
                            echo "<input type='email' class='form-control' name='email' placeholder='$email'>"
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Security -->
                <div class="jumbotron">
                    <h3> Security </h3>
                    <div class="form-group">
                        <label for="password_old">Current Password</label>
                        <input type="password" class="form-control" name="password_old">
                    </div>
                    <div class="form-group">
                        <label for="password_new">New Password</label>
                        <input type="password" class="form-control" name="password_new">
                    </div>

                    <button class="btn btn-lg btn-primary btn-block" type="submit" id="confirm_btn">Confirm Changes
                    </button>
            </form>

        </div>
    </div>
</div>

</body>
</html>

<!-- TODO evlt auslagern ins script file -->
<script>
    <!-- TODO entfernen https://stackoverflow.com/questions/41406509/add-a-profile-picture-in-form-in-html-and-css -->
    $("#profile_image").click(function (e) {
        $("#image_upload").click();
    });
</script>
