<html>
<head>
<title>Auto Completion Using Remote Sources</title>

<script type="text/javascript" src="src/lib/prototype.js"></script>
<script type="text/javascript" src="src/src/scriptaculous.js"></script>
<script type="text/javascript" src="src/src/effects.js"></script>
<script type="text/javascript" src="src/src/controls.js"></script>

<script type="text/javascript">
      window.onload = function() {
      new Ajax.Autocompleter(
         'city',
         'myDiv',
         'fetchChoices.php'
    );
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
   </style>

</head>
<body>
<h3>Auto Completion Using Remote Sources</h3>
<p>
<span class="intro">Start Typing the name of the city, And you should see the drop down menu</span><p>
   <div>
      <label>City</label>
      <input type="text" id="city" name="city"/>
      <div id="myDiv"></div>
   </div>
<p>
   <div id="result" name="result"></div>
</body>
</html>

