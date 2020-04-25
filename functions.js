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
    switch(sensortyp) {
        case "temperatur":
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
            $(value[key]+"Max").text(parseFloat(obj[1]).toFixed(2));
            $(value[key]+"Min").text(parseFloat(obj[2]).toFixed(2));
        } else {
            $(value[key]).text("-");
            $(value[key]+"Max").text("-");
            $(value[key]+"Min").text("-");
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

