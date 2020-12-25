function CheckUsername() {

var pars = 'username='+$F('username');
var url = 'checkusername.php';
new Ajax.Updater('result','checkusername.php', {
      method: 'get',
      parameters:pars
      
  });

}

function showError() {
alert("Something Went Wrong");
}

