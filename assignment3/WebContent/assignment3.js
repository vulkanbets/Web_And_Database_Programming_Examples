
// // Specify a function to execute when the DOM is fully loaded.
// $(document).ready(ready);

// function ready()
// {
//     // Load data from the server using HTTP GET request
//     $.get("select.php", callback);
// }

// function callback(data)
// {
//     document.getElementById("textbox").defaultValue = data;
// }


// --------- This code is just to verify Form Valiadation -----------
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
// --------- Above code is just to verify Form Valiadation -----------
