<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: login.php");
}

?>
<html>
<head>
<link rel="stylesheet" href="style.css" >

<script type="text/javascript" src="src/lib/prototype.js"></script>
<script type="text/javascript" src="src/src/scriptaculous.js"></script>
<script type="text/javascript" src="src/src/effects.js"></script>
<script type="text/javascript" src="src/src/controls.js"></script>

<script type="text/javascript">
      window.onload = function() {
      new Ajax.Autocompleter(
         'title',
         'myDiv',
         'fetchChoices.php'
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
<a href="submitTutorial.php">Submit New Tutorial</a><a href="searchTutorials.php">Search Tutorials</a><a href="tagCloud.php">Tag Cloud Search</a><a  href="logout.php">Logout</a></div>

<div class="tutorial-search">
      <label>Enter Your Search Terms</label>
      <input type="text" id="title" name="title"/>
      <div id="myDiv"></div>
<p>
   <div id="result" name="result"></div>
</div>


</body>
</html>
