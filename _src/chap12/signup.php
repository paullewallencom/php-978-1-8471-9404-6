<?PHP

$uname = "";
$pword = "";
$errorMessage = "";
$num_rows = 0;

require_once 'DBConfig.php';
require_once 'Secure.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$uname = $_POST['username'];
	$pword = $_POST['password'];

	$uname = htmlspecialchars($uname);
	$pword = htmlspecialchars($pword);

	if ($errorMessage == "") {

	$settings = DBConfig::getSettings();
	// Get the main settings from the array we just loaded
	$server = $settings['dbhost'];
	$database = $settings['dbname'];
	$user_name = $settings['dbusername'];
	$pass_word = $settings['dbpassword'];

	$db_handle = mysql_connect($server, $user_name, $pass_word);
	$db_found = mysql_select_db($database, $db_handle);

	if ($db_found) {

		$secure = new Secure();

		$uname = $secure->clean_data($uname, $db_handle);
		$pword = $secure->clean_data($pword, $db_handle);

		$SQL = "INSERT INTO users (userID,Username,password) VALUES (NULL,$uname, md5($pword))";
		$result = mysql_query($SQL);
		mysql_close($db_handle);
		
		if($result)
		{
		// start a session for the new user
		session_start();
		$_SESSION['login'] = "1";
		header ("Location: index.php");
		}
		else
		{
			$errorMessage ="Somethign went wrong";
		}
	}
	else {
		$errorMessage = "Database Not Found";
	}

	}
}
?>
<html>
<head>
<title>New User. Sign Up!!!</title>
<link rel="stylesheet" href="style.css" >
<script type="text/javascript" src="scripts.js"></script>
<script type="text/javascript" src="prototype.js"></script>
</head>
<body>
<h4>New User? Sign-up!!!!</h4>
<FORM NAME ="form1" METHOD ="POST" ACTION ="signup.php" class="signup-form">
<table class="signup-table">
<tr><td>Username: </td><td><INPUT TYPE = 'TEXT' Name ='username' id="username"  value="<?PHP print $uname;?>" maxlength="20"></td></tr>
<tr><td></td><td><a href="JavaScript:CheckUsername();">Check Availability</a><div class="result" name="result" id="result"></div></td></tr>
<tr><td>Password:</td><td> <INPUT TYPE = 'TEXT' Name ='password'  value="<?PHP print $pword;?>" maxlength="16"></td></tr>
</table>
<P>
<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Register">
</FORM>
<P>
<?PHP print $errorMessage;?>
</body>
</html>
