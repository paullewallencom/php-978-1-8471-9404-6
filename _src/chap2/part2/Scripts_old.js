function showResponse (originalRequest) {
	var newData = originalRequest.responseText;
	
	$('item-result').innerHTML = newData;
	new Effect.Highlight($('item-result'));
	
	}
	
function AddItem() {

var input = 'myinput='+$F('myinput');
var pars = input;

new Ajax.Request(
'additem.php',
	{	
		asynchronous:true,
		parameters:pars,
		onComplete: ShowData	
	}
);
$('myform').reset();
$('myinput').activate();
return false;

}

function ShowData(originalRequest) {
	
var xmlDoc = originalRequest.responseXML.documentElement;

var value = xmlDoc.getElementsByTagName("ItemName")[0].childNodes[0].nodeValue;
var value1 = xmlDoc.getElementsByTagName("ItemID")[0].childNodes[0].nodeValue;

divID = 'DIV'+value1;

var div = document.createElement('div');
div.className ='ItemRow';
div.id = divID;

var val = '"'+value+'"';

var i = document.createElement('input');
i.type='checkbox';
i.id=value1;
i.value=value;

var t = document.createTextNode(value);

div.appendChild(i);
div.appendChild(t);

$('ItemTree').appendChild(div);

}

function CancelAddItem(){
$('AddItemLink').style.display='';	
$('ShowAddItem').style.display='none';	

}

