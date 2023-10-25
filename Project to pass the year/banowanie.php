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
	
	if(isset($_SESSION['liczb']))
	{
		for($i=1;$i<$_SESSION['liczb'];$i++)
		{
			if(isset($_POST['ban'.$i]))
			{
				$nick = $_SESSION['nick_ban'.$i];
				$query = "UPDATE uzytkownicy SET czy_ban = 1 WHERE nick = '$nick'";
				mysqli_query($dbc,$query) or die ("Bład zapytania");
				break;
			}
		}
	}
	header("Location:acp.php");
?>