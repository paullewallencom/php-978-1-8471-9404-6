<script type="text/javascript" src="prototype.js"></script>
<script type="text/javascript" src="Scripts_old.js"></script>
<script type="text/javascript" src="src/scriptaculous.js"></script>
<script type="text/javascript" src="src/effects.js"></script>

<link rel="stylesheet" href="style.css" >
<head>
<title>Adding New Items</title>
</head>
<?php
echo '<div id="ShowAddItem" class="ShowAddItem"><form id="myform" action="additem.php" method="post" onsubmit="return false;">';
echo '<br>Enter a New Item to this List<br><br>';
echo '<input type="text" name="myinput" id="myinput"  size="25"/><br><br>';
echo '<input type="button" value="Submit!" onclick="Javascript:AddItem()">Or <a href="Javascript: CancelList()">Cancel</a>';
echo '</form></div>';
echo '<p><br>';
echo '<div id="ItemTree" class="ItemTree">';
?>