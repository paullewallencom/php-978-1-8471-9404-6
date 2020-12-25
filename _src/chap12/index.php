<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: login.php");
}

else {

require_once 'includes/DBConnector.php';
require_once 'includes/users.php';
require_once 'includes/tutorials.php';

?>

<html>
<head>
<link rel="stylesheet" href="style.css">

<script type="text/javascript" src="src/lib/prototype.js"></script>
<script type="text/javascript" src="src/src/scriptaculous.js"></script>
<script type="text/javascript" src="src/src/effects.js"></script>
<script type="text/javascript" src="src/src/controls.js"></script>
<script type="text/javascript" src="scripts.js"></script>

<title>Home Page</title>
</head>
<body>
<img src="images/logo.png">
<p>
<div class="header-links">
<a href="index.php"><?php echo $_SESSION['username']."'s";?>&nbsp;Home</a>
<a href="buyProducts.php">Buy Products</a><a href="searchProducts.php">Search Products</a><a href="tagCloud.php">Search Using Tags</a><a  href="logout.php">Logout</a></div>


<?php
}// else for SESSION ends here
?>
<body>
</html>
