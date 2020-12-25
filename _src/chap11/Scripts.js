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

