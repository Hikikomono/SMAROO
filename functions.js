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
            break;
        case "humidity":
            $(".unit").text("%");
            break;
        case "air":
            $(".unit").text("%");
            break;
        case "light":
            $(".unit").text("%");
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

