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

function showProduct(text,li)
{

//alert(li.product_id);
var pars = 'product_id='+li.id;
//alert(pars);
var url = 'getProduct.php';
new Ajax.Request(url, {
      method: 'POST',
      parameters:pars,
      onSuccess: showResult,
      onFailure:showError 
  });

}

function showError() {
alert("Something Went Wrong");
}

function showResult(ServerResponse) {
var response = ServerResponse.responseText;

//alert(response);
	$('show-product').innerHTML = response;

}