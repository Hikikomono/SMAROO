
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

function avoidAnonymCallback(key,value,sensortyp){
    var request = "getData.php?Zeitpunkt=" + getDate() + "&Key=" + key +"&Sensortyp=" +sensortyp;
    $.get(request, function (data) { //das hier ist eine anonyme funktion die ein call by reference macht - deshalb hier nochmals in einer function
    var obj = JSON.parse(data);
    $(value[key]).text(obj[0]);

/*    if (typeof obj[0] == 'undefined') {
        alert("null");
        $(value[key]).text(obj[0]);
    }else{
        $(value[key]).text("-no data-");
    }*/
     });
}