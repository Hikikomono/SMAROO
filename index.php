<?php



?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bare - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style_1.css">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>

<body>


<!-- Navigation -->

<nav class="navbar navbar-expand-md navbar-dark bg-dark static-top">
    <div class="container">
        <button type="button" id="sidebarCollapse" class="btn btn-info d-none d-md-block" onclick="sidebarToggle()" on="hideSidebar()" >
            <span>Toggle</span>
        </button>

        <a class="navbar-brand" href="#">SmaRoo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Edit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="wrapper d-flex align-items-stretch">
    <!-- Sidebar -->
    <nav id="sidebar" class="d-none d-md-block">
        <div  class="make-me-sticky">
        <div class="sidebar-header">
            <h3>Bootstrap Sidebar</h3 >
        </div>

        <ul class="list-unstyled components">
            <p>Dummy Heading</p>
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
            </li>
            <li>
                <a href="#">About</a>
            </li>
        </ul>
        </div>
    </nav>

    <!-- Page MAIN Content -->
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                <div class="border d-flex justify-content-center" >
                    <h1> test</h1>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                <div class="border d-flex justify-content-center">
                    <h1> test</h1>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                <div class="border d-flex justify-content-center">
                    <h1> test</h1>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                <div class="border d-flex justify-content-center">
                    <h1> test</h1>
                </div>
            </div>

        </div>
    </div>
</div>



<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script > /*TODO in separates js file auslagern */
    function sidebarToggle() {
        var element = document.getElementById("sidebar");
        element.classList.toggle("active");
    }

</script>

<script class="d-none d-md-block" >
    class="btn btn-info d-none d-md-block"

    function hideSidebar() {
        var element = document.getElementById("sidebar");
        element.classList.toggle("active");
    }
</script>

</body>

</html>