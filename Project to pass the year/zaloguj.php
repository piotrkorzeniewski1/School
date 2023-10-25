<?php
	session_start();
	$dbc = mysqli_connect("localhost","root","","demotywatory")or die ("Błąd polaczenia z baza danych");

	$login = $_POST['login'];
	$haslo = $_POST['haslo'];
	$query = "SELECT * FROM uzytkownicy WHERE nick = '$login' AND password = '$haslo' AND czy_ban != 1";

	$wyslij = mysqli_query($dbc, $query) or die ("błąd zapytania");

	$ile = mysqli_num_rows($wyslij);

	if($ile == 1)
	{
		$_SESSION['zalogowany'] = true;
		while ($row = mysqli_fetch_array($wyslij))
		{
			$_SESSION['nick'] = $row['nick'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['acp'] = $row['acp'];
			unset($_SESSION['alert']);
			header("Location:zalogowany.php");
		}
	}
	else
	{
		$query = "SELECT * FROM uzytkownicy WHERE nick = '$login' AND password = '$haslo' AND czy_ban != 0";
		$wyslij = mysqli_query($dbc, $query) or die ("błąd zapytania");
		$ile = mysqli_num_rows($wyslij);
		if($ile == 1)
		{
			$_SESSION['alert'] = "<div id='blad'>JESTES ZBANOWANY</div>";
		}
		else
		{
			$_SESSION['alert'] = "<div id='blad'>Nieprawidłowy login lub hasło</div>";
		}
		header("Location:logowanie.php");
	}
	mysqli_close($dbc);

?>