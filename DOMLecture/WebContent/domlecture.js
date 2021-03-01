
var selectedElement;

function start()
{
    document.getElementById("getElementByIdButton").addEventListener("click", getById);
    document.getElementById("getElementByIdButton").addEventListener("mouseover", buttonMouseover);
    document.getElementById("getElementByIdButton").addEventListener("mouseout", buttonMouseout);

    // document.getElementById("addBeforeButton").addEventListener("click", addBefore);
    // document.getElementById("addAfterButton").addEventListener("click", addAfter);
    // document.getElementById("deleteButton").addEventListener("click", deleteElement);

    // document.getElementById('1').addEventListener('click', updateContent, false);
    // document.getElementById('2').addEventListener('click', updateContent, false);
    // document.getElementById('3').addEventListener('click', updateContent, false);


    document.getElementById('1').addEventListener('mouseover', buttonMouseover, false);
    document.getElementById('1').addEventListener('mouseout', buttonMouseout, false);
    document.getElementById('2').addEventListener('mouseover', buttonMouseover, false);
    document.getElementById('2').addEventListener('mouseout', buttonMouseout, false);
    document.getElementById('3').addEventListener('mouseover', buttonMouseover, false);
    document.getElementById('3').addEventListener('mouseout', buttonMouseout, false);



    
    selectedElement = document.getElementById("header1"); 
}

function buttonMouseover(mouseEvent)
{
    var id = mouseEvent.currentTarget.id;       // id of the DOM node of the button moused over

    var currentTarget = mouseEvent.currentTarget;
    var target = mouseEvent.target;

    var elem = document.getElementById(id);
    // elem.setAttribute("class", "");
    // elem.setAttribute("class", "highlight");

    switch(id)
    {
        case 1:
            elem.setAttribute("class", "container highlight");
            break;
        case 2:
            elem.setAttribute("class", "container red");
            break;
        case 3:
            elem.setAttribute("class", "container green");
            break;
    }

    var bkpt = 1; // noop
}

function buttonMouseout(mouseEvent)
{
    var id = mouseEvent.currentTarget.id;       // id of the DOM node of the button moused over

    var elem = document.getElementById(id);
    elem.setAttribute("class", "");
}


// assigning the start() function event handler to the load event
window.addEventListener("load", start);     //  Registering an event handler

function getById()
{
    var id = document.getElementById("getId").value;        // String of what the user entered in the textbox
    var elem = document.getElementById(id);
    if(elem) select(elem);
}

function select(elem)
{
    // Highlight in yellow elem
    selectedElement.setAttribute("class", "");
    selectedElement = elem;
    selectedElement.setAttribute("class", "highlight");
    document.getElementById("getId").value = selectedElement.getAttribute("id");
    document.getElementById("deleteElement").value = selectedElement.getAttribute("id");
}


