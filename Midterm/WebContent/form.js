



// Specify a function to execute when the DOM is fully loaded.
$(document).ready(ready);

function ready()
{
    // Load data from the server using HTTP GET request
    $.get("select.php", callback);
}

function callback(data)
{
    document.getElementById("textbox").defaultValue = data;
}

function verify()
{
    var re = /^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/;

    var address = document.getElementById("textbox").value;
    var status = document.getElementById("status");
    status.className = '';      // clear existing class assignment

    if(address == "")
    {
        status.innerHTML = "No address entered";
        status.classList.add('invalid');
        return false;
    }
    else if(re.exec(address))
    {
        status.innerHTML = "Address is valid";
        status.classList.add('valid');
        return true;
    }
    else
    {
        status.innerHTML = "Address is <strong>not</strong> valid";
        status.classList.add('invalid');
        return false;
    }
}
