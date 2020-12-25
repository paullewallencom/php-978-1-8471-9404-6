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