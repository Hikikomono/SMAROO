//this var is needed so the LiveData query knows in which cardBoard we are in right now (temp, hum, light...)
var actualcards = null;
var failSafer = 0;

// create date that is applicable with sql
function getDate() {
    var d = new Date(),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return [year, month, day].join('-');
}

//the get anonym function is called by a function to avoid a reference call of the for loop it is used in
function avoidAnonymCallback(key, value, sensortyp) {
    //change unit based on measuretype
    switch (sensortyp) {
        case "temperature":
            $(".unit").text("°C");
            actualcards = "temperature";
            break;
        case "humidity":
            $(".unit").text("%");
            actualcards = "humidity";
            break;
        case "air":
            $(".unit").text("%");
            actualcards = "air";
            break;
        case "light":
            $(".unit").text("%");
            actualcards = "light";
            break;
        default:
            $(".unit").text("");
    }

    var request = "getData.php?Zeitpunkt=" + getDate() + "&Key=" + key + "&Sensortyp=" + sensortyp;
    $.get(request, function (data) { //das hier ist eine anonyme funktion die ein call by reference macht - deshalb hier nochmals in einer function verschachtelt
        var obj = JSON.parse(data);
        //"exception handling" if no data is in the db
        if (obj[0] != null) {
            var parsedNum = parseFloat(obj[0]).toFixed(2);
            $(value[key]).text(parsedNum);
            //Min und Max Werte zuordnen
            $(value[key] + "Max").text(parseFloat(obj[1]).toFixed(2));
            $(value[key] + "Min").text(parseFloat(obj[2]).toFixed(2));
        } else {
            $(value[key]).text("-");
            $(value[key] + "Max").text("-");
            $(value[key] + "Min").text("-");
        }


    });
}

//toggles the sidebars margin in the active class and therefore if its shown or not
function sidebarToggle() {
    var element = document.getElementById("sidebar");
    element.classList.toggle("active");
}

function getBoard(sensortyp) {
    $('#liveMeasureValue').text("-");
    //next the Get Requests
    let myObject = {MONTH: '#monthValue', WEEK: '#weekValue', DAY: '#dayValue'};
    for (let key in myObject) {
        avoidAnonymCallback(key, myObject, sensortyp);
    }
}


//next three functions work together
function taggingCardBoards() { //used to give initial style display values so toggling the Cards will work
    document.getElementById("sensorCards").style.display = "block";
    document.getElementById("statusCards").style.display = "none";

}

function toggleSensorMenu() {

    let statusCards = document.getElementById("statusCards");
    let sensorCards = document.getElementById("sensorCards");
    if (statusCards.style.display === "none") {
        sensorCards.style.display = "none";
        statusCards.style.display = "block";
    }
//hier werden die aktuellen States aus der Datenbank abgefragt und je nachdem die toggler geshifted
    var request = "getStates.php";
    $.get(request, function (data) {
        var states = JSON.parse(data);

        if (states[0] == 1) {
            $("#toggleTemp").prop("checked", true);
        } else {
            $("#toggleTemp").prop("checked", false);
        }
        if (states[1] == 1) {
            $("#toggleBoden").prop("checked", true);
        } else {
            $("#toggleBoden").prop("checked", false);
        }
        if (states[2] == 1) {
            $("#toggleLuft").prop("checked", true);
        } else {
            $("#toggleLuft").prop("checked", false);
        }
        if (states[3] == 1) {
            $("#toggleLicht").prop("checked", true);
        } else {
            $("#toggleLicht").prop("checked", false);
        }
    });


}

//hier werden alle states die on sind auf off geschalten
function allStatesOff(){
//    https://stackoverflow.com/questions/23911602/get-current-state-of-check-box-jquery
    $("#toggleTemp").prop("checked", false);
    $("#toggleBoden").prop("checked", false);
    $("#toggleLuft").prop("checked", false);
    $("#toggleLicht").prop("checked", false);
}


function toggleSensorBoard() {

    let statusCards = document.getElementById("statusCards");
    let sensorCards = document.getElementById("sensorCards");

    if (sensorCards.style.display === "none") {
        sensorCards.style.display = "block";
        statusCards.style.display = "none";
    }

}


//function toggled den State der Sensoren über direkte Anfrage am Gerät
//CRITICAL: Die Datenbank bevor diese Funktion aufgerufen wird mit den Korrekten States befüllt sein
//sonst gibt es ein durcheinander und die states sind inkorrekt

function postSensorState(sensortype) {

    var request = "http://213.47.71.242:50000/ch/" + sensortype +"/toggle";
    $.get(request);

}

//getting the LiveData with a request from the Hardware Rest Interface directly; verwendet actualcards var to get the data
function getLiveData(){

    var request = "http://213.47.71.242:50000/rq/" + actualcards + "/live";

    $.get(request).done(function (data) { //das hier ist eine anonyme funktion die ein call by reference macht - deshalb hier nochmals in einer function verschachtelt

        var obj = data.data;

        //"exception handling" if no connection (null) or a hardware failure (returns 666)
        if (obj == 666 && failSafer <= 10){
            failSafer++;
            $("#liveMeasureValue").text("fail - trying again...");
            getLiveData();


        } else if (obj != null) {
            var parsedNum = parseFloat(obj).toFixed(2);
            $("#liveMeasureValue").text(parsedNum);
            failSafer = 0;

        }else {
            $("#liveMeasureValue").text("failure - no connection");

        }



    });

   /* $.get(request, function (data) { //das hier ist eine anonyme funktion die ein call by reference macht - deshalb hier nochmals in einer function verschachtelt
        if(actualcards=="temperature" || actualcards=="air"){

        }
        var obj = data.data;
        //"exception handling" if no data is in the db
        if (obj != null) {
            var parsedNum = parseFloat(obj).toFixed(2);
            $("#liveMeasureValue").text(parsedNum);

        } else {
            $("#liveMeasureValue").text("-failure-");
        }


    });*/

    //setting a timestamp so we know when the last measurement was
    var dt = new Date();
    var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
    $("#liveTimeStamp").text(time);


}


//get data from the Datepicker put it to database and create a chart with chart.js
function getDatePickerDataAndCreateChart() {
        var dateStart = new Date($('#calStart').val());
        var dateEnd = new Date($('#calEnd').val());
        var diff = (dateEnd-dateStart)/(1000*60*60*24); //berechnet Tage für die Chart erstellung - dargestellte Labels; die Subtraktion ergibt millisekunden

//exceptionhandling; error killt die restliche Ausführung : )
        if (dateStart >= dateEnd){
            alert("Start Größer oder Gleich Ende sein! Bitte Eingabe anpassen.")
            throw new Error("Start kann nicht vor Ende sein!");

        };

        //der zusätzlihce code ist weil javascript die leading 0 cancelled die fürs GET wichtig ist
        startDay = ("0" + dateStart.getDate()).slice(-2)
        startMonth = ("0" + (dateStart.getMonth() + 1)).slice(-2)
        startYear = dateStart.getFullYear();

        endDay = ("0" + dateEnd.getDate()).slice(-2)
        endMonth = ("0" + (dateEnd.getMonth() + 1)).slice(-2)
        endYear = dateEnd.getFullYear();

        var fromDate = [startYear, startMonth, startDay].join('-');
        var toDate = [endYear, endMonth, endDay].join('-');




        //tausche den Titel der Karte mit dem Chart zu den gewähltem intervall
$('#timespan').text(fromDate +" to " +toDate);

        //TODO nun holen wir die Daten von der Datenbank und bringen sie in ein array, welches an das Chart übergeben wird


    //erst erstellen wir ein labels array mit der anzahl an Tagen die gewählt wurden die dann als Datenpunkte im chart dienen
    var dataPoints = new Array();

    for (i = 1; i <= diff; i++){
        dataPoints.push("d"+i);
    }

    //sonst doppelte canvas weil sie immer wieder drüber neu erstellt werden
    $('#myChart').remove();
    $('#divOverChart').append('<canvas id="myChart"></canvas>')


//TODO endDay muss +1 gerechnet werden, weil das sql between aus irgend einem grund nicht inclusive ist
    var request = "getTimeSpan.php?From=" + fromDate + "&To=" + toDate +"&Sensortyp=" +actualcards;
   $.get(request, function (data) { //das hier ist eine anonyme funktion die ein call by reference macht - deshalb hier nochmals in einer function verschachtelt
       var obj = JSON.parse(data);



//now the part for the actual chart creation, inside the request to get the obj
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: dataPoints,
            datasets: [{
                label: actualcards,
                backgroundColor: 'rgb(112,179,232)',
                borderColor: 'rgb(42,48,73)',
                data: obj
            }]
        },

        // Configuration options go here
        options: {}
    });

   }); //ende request

}
