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
    var request = "getData.php?Zeitpunkt=" + getDate() + "&Key=" + key + "&Sensortyp=" + sensortyp;
    $.get(request, function (data) { //das hier ist eine anonyme funktion die ein call by reference macht - deshalb hier nochmals in einer function verschachtelt
        var obj = JSON.parse(data);
        //"exception handling" if no data is in the db
        if (obj[0] != null) {
            $(value[key]).text(obj[0]);
        } else {
            $(value[key]).text("-no data-");
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

