<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="profile.css">
</head>

<body>
<div class="container center-content">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 p-0">
            <!-- User Image -->
            <div class="profile-image">
                <img class="img-fluid rounded-circle " src="https://www.vhv.rs/dpng/d/256-2569650_men-profile-icon-png-image-free-download-searchpng.png"
                 alt="profile image">
            </div>

            <form class="form-horizontal">
                <!-- User info -->
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>

                <!-- Security -->
                <div class="form-group">
                    <label for="password_old">Old Password</label>
                    <input type="password" class="form-control" name="password_old">
                </div>
                <div class="form-group">
                    <label for="password_new">New Password</label>
                    <input type="password" class="form-control" name="password_new">
                </div>

                <button class="btn btn-lg btn-primary btn-block" type="submit" id="confirm_btn">Confirm Changes</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>