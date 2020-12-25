function init() {
$('no').style.display='none';
$('yes').style.display='none';
}

function CheckUsername() {

var pars = 'username='+$F('username');
var url = 'checkusername.php';
new Ajax.Request(url, {
      method: 'get',
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
if(response=="available"){
$('no').style.display='none';
$('yes').style.display='';
}
else {
$('no').style.display='';
$('yes').style.display='none';
}


}