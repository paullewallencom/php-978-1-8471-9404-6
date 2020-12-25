<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: login.php");
}

?>

	<html>
	<head>
	<title>Home Page</title>
	</head>
	<body>
	<p>
Thank God.You logged In, system admin was rude...with me!!!!
<p>
This is where all the protected contents come into picture
<P>
<A HREF = logout.php>Log out</A>

	</body>
	</html>
