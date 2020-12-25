<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: login.php");
}

?>
<html>
<head>
<link rel="stylesheet" href="style.css" >

<script type="text/javascript" src="src/prototype.js"></script>
<script type="text/javascript" src="src/scriptaculous.js"></script>
<script type="text/javascript" src="src/effects.js"></script>
<script type="text/javascript" src="src/controls.js"></script>
<script type="text/javascript" src="scripts.js"></script>

<script type="text/javascript">
      window.onload = function() {
      new Ajax.Autocompleter(
         'title',
         'myDiv',
         'fetchChoices.php',
	{afterUpdateElement:showProduct}
    );
}

</script>

<style>
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
<title>Home Page</title>

</head>
<body>

	<img src="images/logo.png">
<p>


<div class="header-links">
<a href="index.php"><?php echo $_SESSION['username']."'s";?>&nbsp;Home</a>
<a href="buyProducts.php">Buy Products</a><a href="searchProducts.php">Search Products</a><a href="tagCloud.php">Search Using Tags</a><a  href="logout.php">Logout</a></div>

<div class="product-search">
      <label>Enter Your Search Terms</label>
      <input type="text" id="title" name="title"/>
      <div id="myDiv"></div>
<p>
   <div id="result" name="result"></div>
</div>

<div class="show-product" id="show-product"> </div>




</body>
</html>
