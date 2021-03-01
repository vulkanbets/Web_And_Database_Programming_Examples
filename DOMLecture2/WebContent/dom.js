/**
 * 
 */

var selectedElement;
var counter = 0;

function start()
{
	document.getElementById("getElementByIdButton").addEventListener("click", getById);
	
	document.getElementById("getElementByIdButton").addEventListener("mouseover", buttonMouseover);
	document.getElementById("getElementByIdButton").addEventListener("mouseout", buttonMouseout);
	
	
	document.getElementById("addBeforeButton").addEventListener("click", addBefore);
	document.getElementById("addAfterButton").addEventListener("click", addAfter);
	document.getElementById("deleteButton").addEventListener("click", deleteElement);

	// bubbling
  document.getElementById('1').addEventListener('click', updateContent, false);
  document.getElementById('2').addEventListener('click', updateContent, false);
  document.getElementById('3').addEventListener('click', updateContent, false);

	// capturing
  document.getElementById('1').addEventListener('click', updateContent, true);
  document.getElementById('2').addEventListener('click', updateContent, true);
  document.getElementById('3').addEventListener('click', updateContent, true);

	document.getElementById('1').addEventListener('mouseover', buttonMouseover, false);
	document.getElementById('1').addEventListener('mouseout', buttonMouseout, false);
	document.getElementById('2').addEventListener('mouseover', buttonMouseover, false);
	document.getElementById('2').addEventListener('mouseout', buttonMouseout, false);
	document.getElementById('3').addEventListener('mouseover', buttonMouseover, false);
	document.getElementById('3').addEventListener('mouseout', buttonMouseout, false);

	selectedElement = document.getElementById("header1");
}

function updateContent(mouseEvent)
{	
	// Browser compatibility
	//
//	if(mouseEvent.stopPropagation)
//		mouseEvent.stopPropagation(); // Chrome, Firefox
//	else if(mouseEvent.cancelBubble != null)
//		mouseEvent.cancelBubble = true;	// IE
		
	var statusDiv = document.getElementById('status');
	statusDiv.innerHTML += ('target = ' + 
		mouseEvent.target.id + 
		', currentTarget = ' + 
		mouseEvent.currentTarget.id + "<br>");
}

function buttonMouseover(mouseEvent)
{
	var id = mouseEvent.currentTarget.id; // id of the DOM node of the button moused over
	
	var currentTarget = mouseEvent.currentTarget;
	var target = mouseEvent.target;
	
	var elem = document.getElementById(id);
	
	switch(id)
	{
		case "1":
		elem.setAttribute("class","container highlight");		
		break;
		case "2":
		elem.setAttribute("class","container red");		
		break;
		case "3":
		elem.setAttribute("class","container green");		
		break;
	}	
}

function buttonMouseout(mouseEvent)
{
	var id = mouseEvent.currentTarget.id; // id of the DOM node of the button moused over
	var elem = document.getElementById(id);
	if(elem.classList.contains("container"))
		elem.setAttribute("class","container");
	else	
		elem.setAttribute("class","");
		
	var statusDiv = document.getElementById('status');
	statusDiv.innerHTML = ("");
}

window.addEventListener("load", start);

function getById()
{
	var id = document.getElementById("getId").value; // string of what user entered in the text box
	var elem = document.getElementById( id );
	if( elem ) select( elem );
}

function select( elem )
{
	selectedElement.setAttribute("class","");
	selectedElement = elem;
	selectedElement.setAttribute("class","highlight");
	document.getElementById("getId").value = selectedElement.getAttribute("id");
	document.getElementById("deleteElement").value = selectedElement.getAttribute("id");
}

function addBefore()
{
	var newElement = makeNewElement(document.getElementById("addBeforeElement").value);
	selectedElement.parentNode.insertBefore(newElement,selectedElement);
	select(newElement);
}

function addAfter()
{
	var newElement = makeNewElement(document.getElementById("addAfterElement").value);
	selectedElement.appendChild(newElement);
	select(newElement);
}

function makeNewElement( content )
{
	var newElement = document.createElement( "p" );
	elementId = "element" + counter;
	counter++;
	newElement.setAttribute("id",elementId);
	content = elementId + "_" + content;
	newElement.appendChild( document.createTextNode(content));
	return newElement;
}

function deleteElement()
{
	if(selectedElement.parentNode == document.body)
		alert("Can't delete this element.");
	else
	{
		var tmp = selectedElement;
		select(tmp.parentNode);
		selectedElement.removeChild(tmp);
	}	
}