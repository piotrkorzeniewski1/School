<?php
session_start();
if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == true)
{
	header("Location:zalogowany.php");
}
$dbc = mysqli_connect("localhost","root","","demotywatory") or die("BŁAD POLACZENIA");

$nick = $_POST['login'];
$haslo = $_POST['haslo'];
$email = $_POST['email'];
if(!empty($nick)&&!empty($haslo)&&!empty($email))
{
	$query = "SELECT nick FROM uzytkownicy WHERE nick = '$nick'";
	$wyslij = mysqli_query($dbc,$query);
	$ile = mysqli_num_rows($wyslij);
	if($ile > 0)
	{
		$_SESSION['alert1'] = "<div id='blad1'>Nazwa użytkownika jest już zajęta! Wpisz inną!</div>";
		header("Location:rejestracja.php");
	}
	else
	{
		$query = "INSERT INTO uzytkownicy values(0,'$nick','$haslo','$email',0,0)";
		mysqli_query($dbc,$query) or die("Bład zapytania do bazy");
		$_SESSION['nick'] = $nick;
		$_SESSION['email'] = $email;
		$_SESSION['acp'] = 0;
		$_SESSION['zalogowany'] = true;
		header("Location:zalogowany.php");
	}
}
else
{
		$_SESSION['alert1'] = "<div id='blad1'>Wypelnij wszystkie pola</div>";
		header("Location:rejestracja.php");
}
?>
