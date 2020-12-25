<script type="text/javascript" src="prototype.js"></script>
<script type="text/javascript" src="Scripts.js"></script>
<script type="text/javascript" src="src/scriptaculous.js"></script>
<script type="text/javascript" src="src/effects.js"></script>

<link rel="stylesheet" href="style.css" >
<head>
<title>Check Username Script</title>
</head>
<body onload="JavaScript:init();">
<form class="login-form">
Username:<input type="text" name="username" id="username" onblur="CheckUsername();"><p>
<div class="yes" id="yes"><p>Username Available</p></div>
<div class="no" id="no"><p>Username NOT Available</p></div>
Password: <input type="text" name="password" id="password"><p>
<input type="submit" name="submit" value="Join" id="password">
</form>
</body>
</html>