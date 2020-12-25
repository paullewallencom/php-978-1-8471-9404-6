<?PHP
	session_start();
	session_destroy();
?>

	<html>
	<head>
	<title>Logout</title>
	</head>
	<body>
Okay, destroyed the sessions of the user. Now try hitting the back button. You should be able to see the login page :)
<p>

	User Logged Out

<p>

Want to Login again? <a href="login.php">Login Here</a>
	</body>
	</html>
