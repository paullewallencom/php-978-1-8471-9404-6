<html>
<head>
<title>Advanced Auto Completion Using Remote Sources</title>

<script type="text/javascript" src="src/lib/prototype.js"></script>
<script type="text/javascript" src="src/src/scriptaculous.js"></script>
<script type="text/javascript" src="src/src/effects.js"></script>
<script type="text/javascript" src="src/src/controls.js"></script>

<script type="text/javascript">
      window.onload = function() {
      new Ajax.Autocompleter(
         'city',
         'myDiv',
         'fetchChoices.php',
         {afterUpdateElement:PostValue}
    );
}

function PostValue(text){
var pars = 'cityName='+text.value;
var url = 'getValues.php';

new Ajax.Request(url, {
      method: 'post',
      parameters:pars,
      onSuccess: showResult,
      onFailure:showError
  });
}

function showResult(ServerResponse)
{
$('result').value=ServerResponse.responseText;
}

function showError() {
alert("Something Went Wrong");
}
</script>

<style>
   body {
   color:black;
   }
   #myDiv {
	background-color:#BCE6D6;

	}
   .options li {

	list-style-type: none;
	text-align:left;
	font: 14px verdana black;
   }

.intro {

color:#996633;
}

.cityForm {
	background-color:#CCCC99;
	font: 14px verdana 999999;


}
   </style>

</head>
<body>
<h3>Advanced Auto Completion Using Remote Sources</h3>
<p>
<span class="intro">Start Typing the name of the city, And you should see the drop down menu</span><p>
   <div>
<table class="cityForm" cellpadding="5" cellspacing="5">
      <tr><td>City  </td><td><input type="text" id="city" name="city"/></td></tr>
      <tr><td></td><td><div id="myDiv"></div></td></tr>
      <tr><td>State </td><td><input type="text" id="result" name="result" disabled="true"></td></tr>
      </table>
   </div>
</body>
</html>

