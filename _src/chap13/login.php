<?PHP

$uname = "";
$pword = "";
$errorMessage = "";

require_once 'DBConfig.php';
require_once 'Secure.php';

// Check if the user has submittied with POST on the form
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$uname = $_POST['username'];
	$pword = $_POST['password'];

	$uname = htmlspecialchars($uname);
	$pword = htmlspecialchars($pword);

//Can also use a DBclass instead of the code below.

$settings = DBConfig::getSettings();

// Get the main settings from the array we just loaded
$server = $settings['dbhost'];
$database = $settings['dbname'];
$user_name = $settings['dbusername'];
$pass_word = $settings['dbpassword'];

$db_handle = mysql_connect($server, $user_name, $pass_word);
$db_found = mysql_select_db($database, $db_handle);

	if ($db_found) {

		// initiates the objects for dbclass & secure classes
		$secure = new Secure();

		$uname = $secure->clean_data($uname, $db_handle);
		$pword = $secure->clean_data($pword, $db_handle);

		$SQL = "SELECT * FROM users WHERE username =$uname AND password= md5($pword)";

//		$result= $dbclass->query($query);
		
		$result = mysql_query($SQL);
		$row =	mysql_fetch_row($result);
		$num_rows = mysql_num_rows($result);

		if ($result) {
			if ($num_rows > 0) {
				session_start();
				$_SESSION['login'] = "1";
				$_SESSION['username']=$row[1];
				$_SESSION['uid']=$row[0];
				header ("Location: index.php");
			}
			else {
				session_start();
				$_SESSION['login'] = "";
				header ("Location: signup.php");
			}
		}
		else {
			$errorMessage = "Error logging on";
		}

	mysql_close($db_handle);

	}

	else {
		$errorMessage = "Error logging on";
	}

}


?>

<html>
<head>
<title>New User Signup</title>
<link rel="stylesheet" href="style.css" >
</head>
<body>
<h4>Already Registered? Sign-in!!!</h4>
<FORM NAME ="form1" METHOD ="POST" ACTION ="login.php" class="login-form">
<table class="login-table">
<tr><td>Username: </td><td><INPUT TYPE = 'TEXT' Name ='username'  value="<?PHP print $uname;?>" maxlength="20"></td></tr>
<tr><td>Password: </td><td><INPUT TYPE = 'password' Name ='password'  value="<?PHP print $pword;?>" maxlength="16"></td></tr>
</table>
<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Login">
</P>

</FORM>

<a href="signup.php">New User? Sign-up</a>


<P>
<?PHP print $errorMessage;?>

</body>
</html>