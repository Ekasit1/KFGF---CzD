<?php 
session_start();
require("sql.php");
$sql = new sql();

if(isset($_POST['username'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = crypt($password, "wallahte15");
	$user = $sql->get("select * FROM users WHERE uname = \"". $username. "\" and pass = \"". $password. "\""); 
	if (count($user)) {
		$_SESSION['id'] = $user[0]['id'];
		
		if($user[0]['uname'] == 'admin') {
			$_SESSION['admin'] = true;
			header('Location:index.php' . $url, false, 302);
		} elseif($user) {
			$_SESSION['user'] = true;
			header('Location:index.php' . $url, false, 302);
		}
	} else {
		// Ingen användare med det anvnamnet eller fel lösenord.
		echo "<div class=\"text-center white-text\">Fel användarnamn eller lösenord</div>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="mobile-web-app-capable" content="yes">

	<!-- Bootstrap - Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- Bootstrap - Latest compiled and minified Optional theme CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <!-- Font Awesome - Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Glyphicons - Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
	<!-- Styles CSS -->
	<link rel="stylesheet" href="css\styles.css">
</head>
<body background="pictures\bigpiano.jpg">
	<div class="container container-table" id="main">
		<div class="row">
		  	<div class="text-center col-md-4 col-md-offset-4">
				<form action="login.php" method="POST">
					<input type="text" placeholder="Användarnamn" name="username"><br>
					<input type="password" placeholder="Lösenord" name="password"><br>
					<input type="submit" value="Logga in"><br>
					<a href="register.php">Har du inget konto?</a>
					<a href="index.php">Tillbaka</a>
				</form>
			</div>
		</div>
	</div>
</body>
</html>