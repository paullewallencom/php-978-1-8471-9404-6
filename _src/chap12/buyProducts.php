<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: login.php");
}

else {

require_once 'includes/DBConnector.php';
require_once 'includes/users.php';
require_once 'includes/tutorials.php';
require_once 'includes/products.php';

?>

<html>
<head>

<title>Advanced Drag and Drop Tutorial</title>
<script type="text/javascript"
        src="src/prototype.js"></script>
<script type="text/javascript"
        src="src/scriptaculous.js"></script>

<link rel="stylesheet" href="style.css">

<script type="text/javascript" src="src/lib/prototype.js"></script>
<script type="text/javascript" src="src/src/scriptaculous.js"></script>
<script type="text/javascript" src="src/src/effects.js"></script>
<script type="text/javascript" src="src/src/controls.js"></script>
<script type="text/javascript" src="scripts.js"></script>


<script type="text/javascript">

window.onload = function() {
     new Draggable('myProduct1',{revert:true});
     new Draggable('myProduct2',{revert:true});
     new Draggable('myProduct3',{revert:true});

      	    Droppables.add(
	      'myDiv',
	      {
	         onDrop: addItem
	      }
  );

  Droppables.add(
  	      'container',
  	      {
  	         onDrop: removeItem
  	      }
  );
}

function addItem(draggable) {
myDiv.appendChild(draggable);
$('note').innerHTML="Added"+draggable.innerHTML;
new Effect.Highlight($('note'));
}

function removeItem(draggable, droppable) {
container.appendChild(draggable);
$('note').innerHTML="Removed"+draggable.innerHTML;
new Effect.Highlight($('note'));
}

</script>

<style>
#note {
width:200px;
height:20px;
}
#container {
color:#30679B;
background-color:#BCE6D6;
border:1px solid lightyellow;
width:400px;
}

#myDiv {
color:#30679B;
background-color:#E2F1B1;
border:1px solid lightyellow;
width:400px;

}
#myProduct1 {
color:#30679B;
background-color:lightyellow;
border:1px solid  #A9B86F;
width:100px;

}

#myProduct2 {
color:#30679B;
background-color:lightyellow;
border:1px solid  #A9B86F;
width:100px;

}

#myProduct3 {
color:#30679B;
background-color:lightyellow;
border:1px solid  #A9B86F;
width:100px;

}

body {
font: 0.9em "Trebuchet MS", Arial, sans-serif;
color:#C2814F;
}
</style>

</head>
<body>
<img src="images/logo.png">
<p>
<div class="header-links">
<a href="index.php"><?php echo $_SESSION['username']."'s";?>&nbsp;Home</a>
<a href="buyProducts.php">Buy Products</a><a href="searchProducts.php">Search Products</a><a href="tagCloud.php">Search Using Tags</a><a  href="logout.php">Logout</a></div>
<p>
<div id="container">
Select products and just drag them!!!
<table>
<tr>
<td>
<div id="myProduct1" align="center">

iPhone <p>
</div>
</td>
<td>
<div id="myProduct2" align="center">

Ipod Nano<p>

</div>
</td>
<td>
<div id="myProduct3" align="center">
MacPro Airbook <p>
</div>
</td>
</tr>
</table>
<p>
</div>
<p>
<div id="myDiv">

Drag Some products to my menu<p>

</div>
<p>

<div id="note">

</div>


</body>

<?php
}// else for session ends here
?>
