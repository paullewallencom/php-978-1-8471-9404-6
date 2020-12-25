function deleteTutorial(id)
{
var result = confirm("Are you sure you want to delete?");

if(result==true)
	{
	new Effect.Highlight($(id));
	deletechildrow('mytutorials-table',id);
	}
else
	{
		
	}

}

function deletechildrow(tableID,rowID)
{

  var d = document.getElementById(tableID);
  var olddiv = document.getElementById(rowID);
  d.deleteRow(olddiv);
  alert("Tutorial Deleted");

}

function showCommentsForm(){

$('comments-form').style.display="";
$('add-comments').style.display="none";
$('hide-comments').style.display="";
}

function hideCommentsForm(){

$('comments-form').style.display="none";
$('hide-comments').style.display="none";
$('add-comments').style.display="";
}


function addComments() {

var your_comments = 'your_comments='+$F('your_comments');
var tutorialID = 'tutorialID='+$F('tutorialID');
var ownerID = 'ownerID='+$F('ownerID');

var pars = your_comments+'&'+tutorialID+'&'+ownerID;

new Ajax.Request(

'GetItem.php',
	{	
		asynchronous:true,
		parameters:pars,
		onComplete: ShowData	
		
	}
);
$('myform').reset();
return false;
}

function ShowData(originalRequest) {

var xmlDoc = originalRequest.responseXML.documentElement;

var value = xmlDoc.getElementsByTagName("comment_desc")[0].childNodes[0].nodeValue;
var value1 = xmlDoc.getElementsByTagName("commentID")[0].childNodes[0].nodeValue;

var newTR=document.createElement('tr');
newTR.class='show-comments';

var newTD=document.createElement('td');

newTD.appendChild(document.createTextNode(value));

var newTD2=document.createElement('td');

var textNode2=document.createTextNode('Edit')
var editLink=document.createElement("a")
editLink.setAttribute("title",'Delete')
editLink.setAttribute("href",'#')
editLink.appendChild(textNode2);

newTD2.appendChild(editLink);

var newTD3=document.createElement('td');

var textNode=document.createTextNode('Delete')
var delLink=document.createElement("a")
delLink.setAttribute("title",'Delete')
delLink.setAttribute("href",'#')
delLink.appendChild(textNode);

newTD3.appendChild(delLink);

newTR.appendChild(newTD);
newTR.appendChild(newTD2);
newTR.appendChild(newTD3);

$('show-comments').appendChild(newTR);


}
