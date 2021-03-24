
// Specify a function to execute when the DOM is fully loaded.
$(document).ready(ready);

function ready()
{
    // Load data from the server using HTTP GET request
    $.get("select.php", callback);
}

function callback(data)
{
    var res_split = data.split("::");
    var res_left = res_split[0];
    var optgroup = document.getElementById("frequencyband");
    var res = res_left.split(",");

    for(i = 0; i < res.length; i++)
    {
        var option = document.createElement("option");
        var nameValue = res[i].split(":");
        option.setAttribute("value", nameValue[0]);
        option.setAttribute("id", nameValue[0]);
        option.innerHTML = nameValue[1];
        optgroup.appendChild(option);
    }

    var res = res_split[1].split(",");
    document.getElementById("devicename").defaultValue = res[0];
    document.getElementById("eui").defaultValue = res[1];
    document.getElementById("appkey").defaultValue = res[2];
    document.getElementById("appskey").defaultValue = res[3];
    document.getElementById("nwkskey").defaultValue = res[4];
    var temp = res[5];
    var mySelect = document.getElementById('class');
    for(var i, j = 0; i = mySelect.options[j]; j++) { if(i.value == temp) { mySelect.selectedIndex = j; break; } }
    var temp = res[6];
    var mySelect = document.getElementById('frequency');
    for(var i, j = 0; i = mySelect.options[j]; j++) { if(i.value == temp) { mySelect.selectedIndex = j; break; } }
    document.getElementById("subband").defaultValue = res[8];
    var temp = res[9];
    var mySelect = document.getElementById('datarate');
    for(var i, j = 0; i = mySelect.options[j]; j++) { if(i.value == temp) { mySelect.selectedIndex = j; break; } }
    var temp = res[12];
    var mySelect = document.getElementById('codingrate');
    for(var i, j = 0; i = mySelect.options[j]; j++) { if(i.value == temp) { mySelect.selectedIndex = j; break; } }
    document.getElementById("txpower").value = res[14];
}


// --------- This code is just to verify the form input valiadation -----------
function verify(form)
{
    // 00-0a-35-09-e3-51-e3-5f

    // Regular Expressions
    // 
    var reEUI = /[0-9A-Fa-f]{2}-[0-9A-Fa-f]{2}-[0-9A-Fa-f]{2}-[0-9A-Fa-f]{2}-[0-9A-Fa-f]{2}-[0-9A-Fa-f]{2}-[0-9A-Fa-f]{2}-[0-9A-Fa-f]{2}/;
    var reKey = /[0-9A-Fa-f]{32}/;

    function validateKey(value)
    {
        if( reKey.exec(value) ) return true;
        else
        {
            alert("Keys must be a spequence of 16 hexadecimal byte values.");
            return false;
        }
    }

    function validateEUI()
    {
        if( reEUI.exec(document.forms["form"]["eui"].value) ) return true;
        else
        {
            alert("Device EUI must be specified as a hyphenated sequence of eight sequence of eight hexadecimal byte values");
            return false;
        }
    }

    function validateDeviceName(form)
    {
        if( form.devicename.value == "" ) { alert("Device name must be specified."); return false; }
        else { return true; }
    }

    if( !validateEUI() ) return false;
    if( !validateDeviceName(form) ) return false;
    if( !validateKey(form.appkey.value) ) return false;
    if( !validateKey(form.appskey.value) ) return false;
    if( !validateKey(form.nwkskey.value) ) return false;
    return true;
}
// --------- Above code is just to verify the form input valiadation -----------
