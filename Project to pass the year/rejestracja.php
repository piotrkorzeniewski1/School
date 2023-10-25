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
	<div id="opcje"><ul><li><a href="wyloguj.php">GŁÓWNA</a></li><li><a href="rejestracja.php" id="glowna">REJESTRACJA</a></li><li></div>
	<div id="zawartosc">
	<form action="rejestruj.php" method="post">
		<p><label>Podaj nazwe uzytkownika: <input type="text" name="login"></label></p>
		<p><label>Podaj swoje haslo: <input type="password" name="haslo"></label></p>
		<p><label>Podaj swój email: <input type="text" name="email"></label></p>
		<p><input type="submit" name="zatwierdz"></p>
	</form>
	</div>
	<?php
		if(isset($_SESSION['alert1']))
		{
			echo $_SESSION['alert1'];
		}
	?>
</body>
</html>