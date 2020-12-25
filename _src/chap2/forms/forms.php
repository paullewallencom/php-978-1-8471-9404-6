<script type="text/javascript" src="prototype.js"></script>
<script type="text/javascript" src="Scripts_old.js"></script>
<script type="text/javascript" src="src/scriptaculous.js"></script>
<script type="text/javascript" src="src/effects.js"></script>

<link rel="stylesheet" href="style.css" >
<head>
<title>Playing With Forms</title>
</head>
<body>
<h3 class="heading"> Playing with Forms is Fun!!!!</h3>

<form name="addForm" class="addForm" id="addForm">
<table class="FormTable">
<tr><td>First Name</td><td><input type="text" name="first_name" id="first_name" size="35"></td></tr>
<tr><td>Last Name</td><td><input type="text" name="last_name" id="last_name" size="35"></td></tr>
<tr><td>Gender</td><td><select id="gender" name="gender">
<option>Male</option>
<option>Female</option>
<option>Not Sure</option>
</select></td></tr>
<tr><td></td><td><input type="submit" value="Test Submit"><td></tr>
</table>
</form>

<div class="links">
<a href="javascript:disableForm();">Disable The Form</a><p>
<a href="javascript:enableForm();">Enable The Form</a><p>
<a href="javascript:findFirstElement();">Find The First Element of Form</a><p>
<a href="javascript:readAllElements();">Read All Elements</a><p>
<a href="javascript:readInputElements();">Read Only Input Elements Value</a><p>
<a href="javascript:serializeForm();">Seralize The Form</a><p>
<a href="javascript:FocusOnFirstElement();">Focus On The First Element of Form</a><p>
<a href="javascript:resetForm();">Reset The Form</a><p>
</div>
</body>
</html>