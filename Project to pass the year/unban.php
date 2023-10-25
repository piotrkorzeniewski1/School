<?php
	session_start();
	if(!isset($_SESSION['zalogowany']))
	{
		header("Location:index.php");
	}

	if($_SESSION['acp'] == 0)
	{
		header("Location:zalogowany.php");
	}

	$dbc = mysqli_connect("localhost","root","","demotywatory")or die("blad polaczenia");

	if(isset($_SESSION['liczub']))
	{
		for($i=1;$i<$_SESSION['liczub'];$i++)
		{
			if(isset($_POST['unban'.$i]))
			{
				$nick = $_SESSION['nick_unban'.$i];
				$query = "UPDATE uzytkownicy SET czy_ban = 0 WHERE nick = '$nick'";
				mysqli_query($dbc,$query) or die ("Bład zapytania");
				break;
			}
		}
	}
	header("Location:acp.php");
?>