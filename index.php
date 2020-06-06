<?php
session_start();
if(!$_SESSION['sid']==session_id())
{
    header("location:/login.php");
}

else{
    $username = $_SESSION['username'];
}
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
    <!--Script for Chart.js-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <!-- Our Scripts -->
    <script src="functions.js"></script>


</head>

<body onload="taggingCardBoards()">


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

    <!-- Logout / (evtl) Profile Button -->

    <button type="submit" class="btn btn-secondary navbar-btn">
        <a href="logout.php">Logout</a>
    </button>


    <!--button for navbar on smaller screens-->
    <button class="navbar-toggler btn-info" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!--navbar for smaller screens-->
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto d-md-none">
            <li class="nav-item active">
                <a class="nav-link" href="#"><img src="https://img.icons8.com/ios/50/000000/phonelink-setup.png"
                    > Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="toggleSensorBoard();getBoard('temperature')"><img
                            src="https://img.icons8.com/ios/50/000000/thermometer.png"> Temperatur</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="toggleSensorBoard();getBoard('humidity')"><img
                            src="https://img.icons8.com/ios/50/000000/hygrometer.png"> Bodenfeuchtigkeit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="toggleSensorBoard();getBoard('air')"><img src="https://img.icons8.com/ios/50/000000/dry.png">
                    Luftfeuchtigkeit</a>
            </li>
            <li class="nav-item" onclick="toggleSensorBoard();getBoard('light')">
                <a class="nav-link" href="#"><img src="https://img.icons8.com/ios/50/000000/light-on.png">
                    Lichtsensor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="toggleSensorMenu()"><img
                            src="https://img.icons8.com/ios/48/000000/electrical-sensor.png"/> Sensorcontrol</a>
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
                <?php
                   echo"<h4> $username 's Smartroom</h4>"
                ?>
            </div>



            <ul id="test" class="list-unstyled components">
                <!--<p>Dummy Heading</p>-->
                <li>
                    <a href="#"><img src="https://img.icons8.com/ios/50/000000/phonelink-setup.png"
                        > Dashboard</a>
                    <!--TODO Ajax & Jquery hier onclick changes data in cards to Dashboard settings of User-->
                </li>
                <li>
                    <a href="#" onclick="toggleSensorBoard();getBoard('temperature')"><img
                                src="https://img.icons8.com/ios/50/000000/thermometer.png"> Temperatur</a>
                    <!--TODO die abstände durch css austauschen-->
                </li>
                <li>
                    <a href="#" onclick="toggleSensorBoard();getBoard('humidity')"><img
                                src="https://img.icons8.com/ios/50/000000/hygrometer.png"> Bodenfeuchtigkeit</a>
                </li>
                <li>
                    <a href="#" onclick="toggleSensorBoard();getBoard('air')"><img src="https://img.icons8.com/ios/50/000000/dry.png"> Luftfeuchtigkeit</a>
                    <!--TODO Ajax & Jquery hier onclick changes data in cards-->
                </li>
                <li>

                    <a href="#" onclick="toggleSensorBoard();getBoard('light')"><img src="https://img.icons8.com/ios/50/000000/light-on.png"> Lichtsensor</a>
                    <!--TODO Ajax & Jquery hier onclick changes data in cards-->
                </li>
                <li>
                    <a href="#" onclick="toggleSensorMenu()"><img
                                src="https://img.icons8.com/ios/48/000000/electrical-sensor.png"/> Sensorcontrol</a>
                    <!--TODO Ajax & Jquery hier onclick changes data in cards-->
                </li>
            </ul>
        </div>
    </nav>





    <!-- Page MAIN Content as flex item in FlexBox Wrapper-->

    <div class="container">

        <div id="statusCards"><!--for Status Cardboard-->
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <h2 class="card-title p-3 mb-2 bg-light text-dark rounded">Sensorstatus</h2>
                            <div style="display: flex; justify-content: space-between">
                                <!--using flexbox here to get the toggle button aligned to the other side-->
                                <h5 class="card-text">Temp</h5>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="toggleTemp" onclick="postSensorState('temperature')">
                                    <label class="custom-control-label" for="toggleTemp"></label>
                                </div>
                            </div>
                            <div style="display: flex; justify-content: space-between">
                                <!--using flexbox here to get the toggle button aligned to the other side-->
                                <h5 class="card-text">Boden</h5>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="toggleBoden" onclick="postSensorState('humidity')">
                                    <label class="custom-control-label" for="toggleBoden"></label>
                                </div>
                            </div>
                            <div style="display: flex; justify-content: space-between">
                                <!--using flexbox here to get the toggle button aligned to the other side-->
                                <h5 class="card-text">Luft</h5>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="toggleLuft" onclick="postSensorState('air')">
                                    <label class="custom-control-label" for="toggleLuft"></label>
                                </div>
                            </div>
                            <div style="display: flex; justify-content: space-between">
                                <!--using flexbox here to get the toggle button aligned to the other side-->
                                <h5 class="card-text">Licht</h5>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="toggleLicht" onclick="postSensorState('light')">
                                    <label class="custom-control-label" for="toggleLicht"></label>
                                </div>
                            </div>
                            <hr/>

                            <p>Schalter schieben um die Sensoren zu aktivieren/deaktivieren</p> <!--br only when its to small-->
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                    <div class="card text-center h-100">
                        <!--added h-100 for 100% size of all cards - even if not enough text-->
                        <div class="card-body">
                            <h2 class="card-title text-center p-3 mb-2 bg-light text-dark rounded">Temperatur</h2>
                            <p class="text-dark" >Joy-it SEN-DHT22 Temperatur-Sensor</p>
                            <p class="text-dark" >Messbereich: -40 bis 80 Grad Celsius</p>
                            <p class="text-dark" >Luftfeuchtigkeit: 0 bis 100 Prozent</p>
                            <hr/>
                            <div>
                                <h5><a href="#" class="text-info">REST</a></h5>
                                <h5><a href="#" class="text-info">Datenblatt</a></h5>
                                <!--<h5 style="display: inline" class="text-muted card-text unit">REST Dokumentation</h5>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                    <div class="card text-center h-100">
                        <!--added h-100 for 100% size of all cards - even if not enough text-->
                        <div class="card-body">
                            <h2 class="card-title text-center p-3 mb-2 bg-light text-dark rounded">Bodenfeuchtigkeit</h2>
                            <p class="text-dark" >MAKERFACTORY MF-4838244 Sensor</p>
                            <hr/>
                            <div>
                                <h5><a href="#" class="text-info">REST</a></h5>
                                <h5><a href="#" class="text-info">Datenblatt</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                    <div class="card text-center h-100">
                        <!--added h-100 for 100% size of all cards - even if not enough text-->
                        <div class="card-body">
                            <h2 class="card-title text-center p-3 mb-2 bg-light text-dark rounded">Luftfeuchtigkeit</h2>
                            <p class="text-dark" >Joy-it SEN-DHT22 Temperatur-Sensor</p>
                            <p class="text-dark" >Messbereich: -40 bis 80 Grad Celsius</p>
                            <p class="text-dark" >Luftfeuchtigkeit: 0 bis 100 Prozent</p>
                            <hr/>
                            <div>
                                <h5><a href="#" class="text-info">REST</a></h5>
                                <h5><a href="#" class="text-info">Datenblatt</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                    <div class="card text-center h-100">
                        <!--added h-100 for 100% size of all cards - even if not enough text-->
                        <div class="card-body">
                            <h2 class="card-title text-center p-3 mb-2 bg-light text-dark rounded">Lichtsensor</h2>
                            <p class="text-dark" >OSRAM Fotodiode DIL 1100 nm 60 °</p>
                            <p class="text-dark" >Wellenlänge min.: 400 nm</p>
                            <p class="text-dark" >Wellenlänge max.: 1100 nm</p>
                            <hr/>
                            <div>
                                <h5><a href="#" class="text-info">REST</a></h5>
                                <h5><a href="#" class="text-info">Datenblatt</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <h5 class="card-title p-3 mb-2 bg-light text-dark rounded">Statistik zu Laufzeit</h5>
                            <img class="card-img-top" src="img/diagram.jpg" alt="a diagram">
                            <button id="liveMeasure" type="button" class="btn btn-outline-dark">export</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>




<!--
Hier startet nun das Card Board für die normalen Sensoren oder das Dahsboard
-->



        <div id="sensorCards"><!--for Sensors/Dashboard Cardboard-->
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <h5 class="card-title text-center p-3 mb-2 bg-light text-dark rounded">Live Daten</h5>
                            <h2 style="display: inline" id="liveMeasureValue" class="card-text">value</h2>
                            <h2 style="display: inline" class="card-text unit">units</h2>
                            <hr/>
                            <button id="liveMeasure" type="button" class="btn btn-outline-dark" onclick="getLiveData()">measure</button>
                            <p>last measurement:<br> 5 seconds ago</p> <!--br only when its to small-->
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                    <div class="card text-center h-100">
                        <!--added h-100 for 100% size of all cards - even if not enough text-->
                        <div class="card-body">
                            <h5 class="card-title text-center p-3 mb-2 bg-light text-dark rounded">aktueller Monat</h5>
                            <h2 style="display: inline">Ø: </h2>
                            <h2 style="display: inline" id="monthValue" class="card-text">value</h2>
                            <h2 style="display: inline" class="card-text unit">units</h2>
                            <hr/>
                            <!-- gibts da ne sauberere Lösung? ohne je 3 elemente-->
                            <div>
                                <h5 style="display: inline" class="text-muted card-text">highest: </h5>
                                <h5 style="display: inline" class="text-muted card-text" id="monthValueMax">value</h5>
                                <h5 style="display: inline" class="text-muted card-text unit">units</h5>
                            </div>
                            <div>
                                <h5 style="display: inline" class="text-muted card-text">lowest: </h5>
                                <h5 style="display: inline" class="text-muted card-text" id="monthValueMin">value</h5>
                                <h5 style="display: inline" class="text-muted card-text unit">units</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <h5 class="card-title text-center p-3 mb-2 bg-light text-dark rounded">aktuelle Woche</h5>
                            <h2 style="display: inline">Ø: </h2>
                            <h2 style="display: inline" id="weekValue" class="card-text">value</h2>
                            <h2 style="display: inline" class="card-text unit">units</h2>
                            <hr/>
                            <!-- gibts da ne sauberere Lösung? ohne je 3 elemente-->
                            <div>
                                <h5 style="display: inline" class="text-muted card-text">highest: </h5>
                                <h5 style="display: inline" class="text-muted card-text" id="weekValueMax">value</h5>
                                <h5 style="display: inline" class="text-muted card-text unit">units</h5>
                            </div>
                            <div>
                                <h5 style="display: inline" class="text-muted card-text">lowest: </h5>
                                <h5 style="display: inline" class="text-muted card-text" id="weekValueMin">value</h5>
                                <h5 style="display: inline" class="text-muted card-text unit">units</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <h5 class="card-title text-center p-3 mb-2 bg-light text-dark rounded">aktueller Tag</h5>
                            <h2 style="display: inline">Ø: </h2>
                            <h2 style="display: inline" id="dayValue" class="card-text">value</h2>
                            <h2 style="display: inline" class="card-text unit">units</h2>
                            <hr/>
                            <!-- gibts da ne sauberere Lösung? ohne je 3 elemente-->
                            <div>
                                <h5 style="display: inline" class="text-muted card-text">highest: </h5>
                                <h5 style="display: inline" class="text-muted card-text" id="dayValueMax">value</h5>
                                <h5 style="display: inline" class="text-muted card-text unit">units</h5>
                            </div>
                            <div>
                                <h5 style="display: inline" class="text-muted card-text">lowest: </h5>
                                <h5 style="display: inline" class="text-muted card-text" id="dayValueMin">value</h5>
                                <h5 style="display: inline" class="text-muted card-text unit">units</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <h5 class="card-title p-3 mb-2 bg-light text-dark rounded">Zeitintervall</h5>

                            <input style="display: inline" type="date" id="calStart" name="calendarStart">


                            <input style="display: inline" type="date" id="calEnd" name="calendarEnd">
                            <hr/>
                            <!--<img class="card-img-top" src="img/Printable-April-2020-Calendar.jpg" alt="a diagram">-->
                            <button type="button" class="btn btn-outline-dark" onclick="getDatePickerDataAndCreateChart()">anzeigen</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 p-0">  <!-- text-center -->
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <h5 class="card-title p-3 mb-2 bg-light text-dark rounded" id="timespan">-noch kein Zeitintervall gewählt-</h5>
                            <canvas id="myChart"></canvas>
                            <button type="button" class="btn btn-outline-dark">export</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    