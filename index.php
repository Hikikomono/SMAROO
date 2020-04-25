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

    <!-- Our Scripts -->
    <script src="functions.js"></script>


</head>

<body>


<!-- Navigation -->

<nav class="navbar navbar-expand-md navbar-dark bg-dark static-top">

    <a class="navbar-brand" href="#">SmaRoo</a>
    <div class="text-">

        <!--button for sidebar on big screens; we first had a hide for smaller screens, but sidebar just dissapears with the button-->
        <button type="button" id="sidebarCollapse" class="navbar-toggler btn-info d-none d-md-block"
                onclick="sidebarToggle()">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>

    <!--button for navbar on smaller screens-->
    <button class="navbar-toggler btn-info" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!--navbar for smaller screens-->
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto d-md-none">
            <li class="nav-item active">
                <a class="nav-link" href="#"><img src="https://img.icons8.com/ios/50/000000/phonelink-setup.png"/
                    style="width:25px; filter: invert(1);"> Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="getBoard('temperatur')"><img
                            src="https://img.icons8.com/ios/50/000000/thermometer.png"/ style="width:25px; filter:
                    invert(1);"> Temperatur</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="getBoard('humidity')"><img
                            src="https://img.icons8.com/ios/50/000000/hygrometer.png"/ style="width:25px; filter:
                    invert(1);"> Bodenfeuchtigkeit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><img src="https://img.icons8.com/ios/50/000000/dry.png"/ style="width:25px;
                    filter: invert(1);"> Luftfeuchtigkeit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><img src="https://img.icons8.com/ios/50/000000/light-on.png"/
                    style="width:25px; filter: invert(1);"> Lichtsensor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Sensor 5</a>
            </li>
        </ul>
    </div>

</nav>

<!-- Page Content uses flexboxes from bootstrap & the Gridsystem for responsiveness-->
<div class="wrapper d-flex align-items-stretch">
    <!-- Sidebar as flex item in FlexBox Wrapper; only visible for > medium-->
    <nav id="sidebar" class="d-none d-md-block">
        <div class="make-me-sticky">
            <div class="sidebar-header">
                <img class="img-fluid rounded-circle" src="img/profile.jfif" alt="profilepic">
                <h4>Faelb's Smartroom</h4>
            </div>

            <ul id="test" class="list-unstyled components">
                <!--<p>Dummy Heading</p>-->
                <li class="active"> <!-- class active needs to be pushed to active sensor-->
                    <a href="#"><img src="https://img.icons8.com/ios/50/000000/phonelink-setup.png"/ style="width:25px;
                        filter: invert(1);"> Dashboard</a>
                    <!--TODO Ajax & Jquery hier onclick changes data in cards to Dashboard settings of User-->
                </li>
                <li>
                    <a href="#" onclick="getBoard('temperatur')"><img
                                src="https://img.icons8.com/ios/50/000000/thermometer.png"/ style="width:25px; filter:
                        invert(1);"> Temperatur</a><!--TODO die abstände durch css austauschen-->
                </li>
                <li>
                    <a href="#" onclick="getBoard('humidity')"><img
                                src="https://img.icons8.com/ios/50/000000/hygrometer.png"/ style="width:25px; filter:
                        invert(1);"> Bodenfeuchtigkeit</a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/ios/50/000000/dry.png"/ style="width:25px; filter:
                        invert(1);"> Luftfeuchtigkeit</a> <!--TODO Ajax & Jquery hier onclick changes data in cards-->
                </li>
                <li>

                    <a href="#"><img src="https://img.icons8.com/ios/50/000000/light-on.png"/ style="width:25px; filter:
                        invert(1);"> Lichtsensor</a> <!--TODO Ajax & Jquery hier onclick changes data in cards-->
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
                        <h5 class="card-title text-center p-3 mb-2 bg-light text-dark rounded">Live Daten</h5>
                        <h2 id="liveMeasureValue" class="card-text">12°C</h2>
                        <hr/>
                        <button id="liveMeasure" type="button" class="btn btn-outline-dark">measure</button>
                        <p>last measurement:<br> 5 seconds ago</p> <!--br only when its to small-->
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                <div class="card text-center h-100">
                    <!--added h-100 for 100% size of all cards - even if not enough text-->
                    <div class="card-body">
                        <h5 class="card-title text-center p-3 mb-2 bg-light text-dark rounded">aktueller Monat</h5>
                        <h2 style="display: inline">Ø:</h2>
                        <h2 style="display: inline" id="monthValue" class="card-text">15°C</h2>
                        <hr/>
                        <h5 class="text-muted card-text" id="monthValueMax">highest: 16°C</h5>
                        <h5 class="text-muted card-text" id="monthValueMin">lowest: 10°C</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                <div class="card text-center h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center p-3 mb-2 bg-light text-dark rounded">aktuelle Woche</h5>
                        <h2 style="display: inline">Ø:</h2>
                        <h2 style="display: inline" id="weekValue" class="card-text">11°C</h2>
                        <hr/>
                        <h5 class="text-muted card-text" id="monthValueMax">highest: 16°C</h5>
                        <h5 class="text-muted card-text" id="monthValueMin">lowest: 10°C</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                <div class="card text-center h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center p-3 mb-2 bg-light text-dark rounded">aktueller Tag</h5>
                        <h2 style="display: inline">Ø:</h2>
                        <h2 style="display: inline" id="dayValue" class="card-text">10°C</h2>
                        <hr/>
                        <h5 class="text-muted card-text" id="monthValueMax">highest: 16°C</h5>
                        <h5 class="text-muted card-text" id="monthValueMin">lowest: 10°C</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                <div class="card text-center h-100">
                    <div class="card-body">
                        <h5 class="card-title p-3 mb-2 bg-light text-dark rounded">01.04 - 01.05</h5>
                        <img class="card-img-top" src="img/Printable-April-2020-Calendar.jpg" alt="a diagram">
                        <button id="liveMeasure" type="button" class="btn btn-outline-dark">apply</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                <div class="card text-center h-100">
                    <div class="card-body">
                        <h5 class="card-title p-3 mb-2 bg-light text-dark rounded">01.04 - 01.05</h5>
                        <img class="card-img-top" src="img/diagram.jpg" alt="a diagram">
                        <button id="liveMeasure" type="button" class="btn btn-outline-dark">export</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>


</html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    