<?php
session_start();
if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == true)
{
	header("Location:zalogowany.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Demotywatory.pl</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
</head>
<body>
	<div id="opcje"><ul><li><a href="wyloguj.php">GŁÓWNA</a></li><li><a href="zaloguj.php" id="glowna">ZALOGUJ</a></li><li></div>
	<div id="zawartosc">
	<form action="zaloguj.php" method="post">
		<p><label>LOGIN: <input type="text" name="login"></label></p>
		<p><label>HASŁO: <input type="password" name="haslo"></label></p>
		<p><input type="submit" name="zatwierdz" value="ZALOGUJ"></p>
	</form>
	</div>
<?php
	if(isset($_SESSION['alert']))
	{
		echo $_SESSION['alert'];
	}
?>
</body>
</html>