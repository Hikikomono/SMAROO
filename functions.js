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
function taggingCardBoards(){ //used to give initial style display values so toggling the Cards will work
    document.getElementById("sensorCards").style.display = "block";
    document.getElementById("statusCards").style.display = "none";

}

function toggleSensorMenu() {

    let statusCards = document.getElementById("statusCards");
    let sensorCards = document.getElementById("sensorCards");
    if (statusCards.style.display === "none") {
        sensorCards.style.display = "none";
        statusCards.style.display = "block";
        //TODO do the GET request for the status at DB or Raspi
/*        $("#toggleTemp").prop("checked", true);
        $("#toggleBoden").prop("checked", true);
        $("#toggleLuft").prop("checked", false);
        $("#toggleLicht").prop("checked", true);*/

    }


}

function toggleSensorBoard() {

    let statusCards = document.getElementById("statusCards");
    let sensorCards = document.getElementById("sensorCards");

    if (sensorCards.style.display === "none") {
        sensorCards.style.display = "block";
        statusCards.style.display = "none";
    }

}


//function for POSTing new sensor status if toggled on/off

function postSensorState(sensortype) {

    /*TODO POST der schön über die checkbox die geklickt wurde den sensortyp bekommt und dann das korrekte Post macht
       direkt an Raspi der dann die Datenbank mit seinem neuen State aktualisiert
         */


}

