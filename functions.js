
// create date
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

function avoidAnonymCallback(key,value){
    var request = "getTemp.php?Zeitpunkt=" + getDate() + "&Key=" + key;
    //alert(myObject[key]);
    $.get(request, function (data) { //das hier ist eine anonyme funktion die ein call by reference macht - deshalb hier nochmals in einer function
        var obj = JSON.parse(data);
        $(value[key]).text(obj[0]);
    });
}