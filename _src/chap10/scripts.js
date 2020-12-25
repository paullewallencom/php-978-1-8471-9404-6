function CheckUsername(){

var user = $('username');
var name = "username='"+user.value+"'";

var pars = name;
new Ajax.Request(

'CheckUser.php',
	{	
		method:'post',
		parameters:pars,
		asynchronous:true,
		onComplete: ShowUsernameStatus	
		
	}
);

}

function ShowUsernameStatus(originalRequest) {

var newData = originalRequest.responseText;

$('result').innerHTML=newData;

}

function ShowAddItem(){
$('AddItemLink').style.display='none';	
$('ShowAddItem').style.display='';	

}

function CancelAddItem(){
$('AddItemLink').style.display='';	
$('ShowAddItem').style.display='none';	

}


function AddItem() {

var input = 'myinput='+$F('myinput');
var list = 'ListID='+$F('ListID');
var user = 'userID='+$F('userID');

var pars = input+'&'+user+'&'+list;

alert(pars);
new Ajax.Request(

'GetItem.php',
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

var value1 = xmlDoc.getElementsByTagName("ItemID")[0].childNodes[0].nodeValue;
var value = xmlDoc.getElementsByTagName("ItemValue")[0].childNodes[0].nodeValue;

divID = 'DIV'+value1;

var div = document.createElement('div');
div.className ='ItemRow';
div.id = divID;

var val = '"'+value+'"';

var i = document.createElement('input');
i.type='checkbox';
i.id=value1;
i.value=value;
i["onclick"] = new Function("MarkDone(this.id)");

var t = document.createTextNode(value);

div.appendChild(i);
div.appendChild(t);

$('ItemTree').appendChild(div);

new Effect.Highlight($(div));
//UpdateStatus();

}

function MarkDone(valueID){

var itemValue = $(valueID).value;


AddtoCompleted(valueID, itemValue);


}

function AddtoCompleted(valueID, itemValue) {

 var str = "DIV"+valueID;
 
 var divDelete = $(str);
 
 DeletefromItemTree(divDelete);
 
 ChangeStatus(valueID);
  
 var div1 = document.createElement('div');
 div1.className ='ItemComplete';
 div1.id = str;
 
 var i = document.createElement('input');
 i.setAttribute("type","checkbox");
 i.id=valueID;
 i.defaultChecked="true";
 i.value=itemValue;
 i.className="ItemList";
  i["onclick"] = new Function("MarkUnDone(this.id)");
 
 var t = document.createTextNode(itemValue);
 
 div1.appendChild(i);
 
 div1.appendChild(t);
 $('Completed').appendChild(div1); 
 
 new Effect.Highlight($(div1));
 
  
 }
function DeletefromItemTree(divDelete)
{

$('ItemTree').removeChild(divDelete);

}

function ChangeStatus(valueID) {
	
var list = 'ListID='+$F('ListID');
var user = 'userID='+$F('userID');
var itemID = 'itemID='+valueID;

var pars = itemID+'&'+user+'&'+list;

new Ajax.Request(

'ChangeStatus.php',
	{	
		asynchronous:true,
		parameters:pars,
		onComplete: ShowStatus	
		
	}
);

}

function ShowStatus(originalRequest) {

var newData = originalRequest.responseText;
$('status').innerHTML = newData;

new Effect.Highlight($('status'));
}


function MarkUnDone(valueID){

var itemValue = document.getElementById(valueID).value;

AddtoItemTree(valueID, itemValue);

}
function AddtoItemTree(valueID, itemValue) {

var str = "DIV"+valueID;
var divDelete = $(str);

DeletefromCompleted(divDelete);

ResetStatus(valueID);

 var div = document.createElement('div');
 div.className ='ItemRow';
 div.id = str;
  
 var i = document.createElement('input');
i.type='checkbox';
i.id=valueID;
 i.value=itemValue;
 i["onclick"] = new Function("MarkDone(this.id)");

 var t = document.createTextNode(itemValue);

var br = document.createElement('br');

 div.appendChild(i);
 div.appendChild(t);
 div.appendChild(br);
  
 $('ItemTree').appendChild(div); 
 new Effect.Highlight($(div));
  
}

function DeletefromCompleted(divDelete)
{

$('Completed').removeChild(divDelete);

}

function ResetStatus(valueID) {
	
var list = 'ListID='+$F('ListID');
var user = 'userID='+$F('userID');
var itemID = 'itemID='+valueID;

var pars = itemID+'&'+user+'&'+list;

new Ajax.Request(

'ResetStatus.php',
	{	
		asynchronous:true,
		parameters:pars,
		onComplete: ShowStatus	
		
	}
);

}

function DeleteList(ListId) {

var ListID = 'ListID='+ListId;

var pars = ListID;

new Ajax.Request(

'DeleteList.php',
	{	
		asynchronous:true,
		parameters:pars,
		onComplete: ShowDeleteStatus	
		
	}
);

}

function ShowDeleteStatus(){

alert("List Deleted Successfully");
}
