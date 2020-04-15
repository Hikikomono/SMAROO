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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <!-- Our Bootstrap -->
    <link rel="stylesheet" href="style_1.css">
    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>


<!-- Navigation -->

<nav class="navbar navbar-expand-md navbar-dark bg-dark static-top">

    <a class="navbar-brand" href="#">SmaRoo</a>
    <div class="text-">

        <button type="navbar-toggler" id="sidebarCollapse" class="btn btn-info d-none d-md-block"
                onclick="sidebarToggle()">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto d-md-none">
            <li class="nav-item active">
                <a class="nav-link" href="#">Dashboard</a> <!--TODO somehow link to sidebar items -->
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Sensor 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Sensor 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Sensor 3</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Sensor 4</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Sensor 5</a>
            </li>
        </ul>
    </div>

</nav>

<!-- Page Content uses flexboxes from bootstrap & the Gridsystem for responsiveness-->
<div class="wrapper d-flex align-items-stretch">
    <!-- Sidebar as flex item in FlexBox Wrapper-->
    <nav id="sidebar" class="d-none d-md-block">
        <div class="make-me-sticky">
            <div class="sidebar-header">
                <img class="img-fluid rounded-circle" src="img/profile.jfif" alt="profilepic">
                <h4>Faelb's Smartroom</h4>
            </div>

            <ul class="list-unstyled components">
                <!--<p>Dummy Heading</p>-->
                <li class="active">
                    <a href="#">Dashboard</a> <!--TODO Ajax & Jquery hier onclick changes data in cards-->
                </li>
                <li>
                    <a href="#">Sensor 1</a> <!--TODO Ajax & Jquery hier onclick changes data in cards-->
                </li>
                <li>
                    <a href="#">Sensor 2</a> <!--TODO Ajax & Jquery hier onclick changes data in cards-->
                </li>
                <li>
                    <a href="#">Sensor 3</a> <!--TODO Ajax & Jquery hier onclick changes data in cards-->
                </li>
                <li>
                    <a href="#">Sensor 4</a> <!--TODO Ajax & Jquery hier onclick changes data in cards-->
                </li>
                <li>
                    <a href="#">Sensor 5</a> <!--TODO Ajax & Jquery hier onclick changes data in cards-->
                </li>
            </ul>
        </div>
    </nav>

    <!-- Page MAIN Content as flex item in FlexBox Wrapper-->
    <!--TODO this divs need to change with every click in the sidebar via jquery -->
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                <div class="card text-center h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center">Live Daten</h5>
                        <h2 id="aendern" class="card-text"> 12°C </h2>
                        <a href="#" id="testAJAX" class="btn btn-primary">measure</a>
                        <p>last measurement:<br> 5 seconds ago</p> <!--br only when its to small-->
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                <div class="card text-center h-100">
                    <!--added h-100 for 100% size of all cards - even if not enough text-->
                    <div class="card-body">
                        <h5 class="card-title text-center">aktueller Monat</h5>
                        <h2 class="card-text">Ø: 15°C</h2>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                <div class="card text-center h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center">aktuelle Woche</h5>
                        <h2 class="card-text">Ø: 11°C</h2>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                <div class="card text-center h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center">aktueller Tag</h5>
                        <h2 class="card-text">Ø: 10°C</h2>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                <div class="card text-center h-100">
                    <div class="card-body">
                        <h5 class="card-title">01.04 - 01.05</h5>
                        <img class="card-img-top" src="img/Printable-April-2020-Calendar.jpg" alt="a diagram">
                        <a href="#" class="btn btn-primary">export</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                <div class="card text-center h-100">
                    <div class="card-body">
                        <h5 class="card-title">01.04 - 01.05</h5>
                        <img class="card-img-top" src="img/diagram.jpg" alt="a diagram">
                        <a href="#" class="btn btn-primary">export</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>
<script> /*TODO in separates js file auslagern */
    function sidebarToggle() {
        var element = document.getElementById("sidebar");
        element.classList.toggle("active");
    }

</script>

<script class="d-none d-md-block">
    function hideSidebar() {
        var element = document.getElementById("sidebar");
        element.classList.toggle("active");
    }
</script>

<script>
    $("#testAJAX").click(function () {
        $.get("getTemp.php?Zeitpunkt=2020-04-06 19:03:25", function(data) {
            let obj = JSON.parse(data);
            $('#aendern').text(obj["temperatur"]);

        });

    });
</script>

<!--<script>
    $("#testAJAX").click(function(){
        $("#aendern").load("getTemp.php?Zeitpunkt=2020-04-06 19:03:25\n", function(responseTxt, statusTxt, xhr){
            if(statusTxt == "success")
                alert("External content loaded successfully!response:" +xhr);
            if(statusTxt == "error")
                alert("Error: " + xhr.status + ": " + xhr.statusText);
        });
    });
</script>-->


</html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    