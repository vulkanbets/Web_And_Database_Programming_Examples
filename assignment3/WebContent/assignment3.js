

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
    if( reEUI.exec(document.forms["form"]["Device EUI"].value) ) return true;
    else
    {
        alert("Device EUI must be specified as a hyphenated sequence of eight sequence of eight hexadecimal byte values");
        return false;
    }
}

function validateDeviceName(form)
{
    if( form.DeviceName.value == "" ) { alert("Device name must be specified."); return false; }
    else { return true; }
}

function validateForm(form)
{
    if( !validateEUI() ) return false;
    if( !validateDeviceName(form) ) return false;
    if( !validateKey(form.AppKey.value) ) return false;
    if( !validateKey(form.AppSKey.value) ) return false;
    if( !validateKey(form.NwkSKey.value) ) return false;
    return true;
}

