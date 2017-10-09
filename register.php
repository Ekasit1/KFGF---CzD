<?php
require("sql.php");
$sql = new sql();
if (isset($_POST['uname'])) {
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];
	if(($uname != '') && ($pass != '')) {
		$pass = crypt($pass, "wallahte15");
		$ok = $sql->get("select * FROM users WHERE uname = \"". $uname. "\"");
		if(count($ok) == 0) {
			$ok = $sql->set("INSERT INTO users (uname, pass) VALUES(\"". $uname."\", \"". $pass."\"); ");
			echo"<div class=\"text-center white-text\">Du är nu registrerad</div>";
		} else {
			echo"<div class=\"text-center white-text\">Användarnamnet finns redan</div>";
		}
	} else {
		echo "<div class=\"text-center text-primary white-text\">Du måste fylla i båda rutorna</div>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="mobile-web-app-capable" content="yes">

	<meta charset="UTF-8">
	<title>Registrering</title>
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
				<form action="register.php" method="POST">
					<input type="text" name="uname" placeholder="Användarnamn"><br>
					<input type="password" name="pass" placeholder="Lösenord"><br>
					<input type="submit" value="Registrera"><br>
					<a href="login.php">Redan registrerad?</a>
					<a href="index.php">Tillbaka</a>
				</form>	
			</div>
		</div>
	</div>
</body>
</html>
