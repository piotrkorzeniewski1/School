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
?>
<!DOCTYPE html>
<html>
<head>
	<title>Demotywatory.pl</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
</head>
<body>

	<?php
		$dbc = mysqli_connect("localhost","root","","demotywatory") or die("Bład zapytania");
		$query = "SELECT nick, email FROM uzytkownicy WHERE acp != 1 && czy_ban = 0";
		$wyslij = mysqli_query($dbc, $query);
		$ile = mysqli_num_rows($wyslij);
		if($ile>0)
		{
			echo "<table><tr><th>Nick</th><th>Email</th></tr>";
			$_SESSION['liczb']=1;
			while($row = mysqli_fetch_assoc($wyslij))
			{
				$banowanie = "ban".$_SESSION['liczb'];
				$_SESSION['nick_ban'.$_SESSION['liczb']] = $row['nick'];
				echo "<tr><td>".$row['nick']."</td><td>".$row['email']."</td><td><form action='banowanie.php' method='post'><input type='submit' value='BAN' name='".$banowanie."'></form></td></tr>";
				$_SESSION['liczb'] = $_SESSION['liczb'] + 1;
			}
			echo "</table>";
		}

		$query = "SELECT nick, email FROM uzytkownicy WHERE acp != 1 && czy_ban = 1";
		$wyslij = mysqli_query($dbc, $query);
		$ile = mysqli_num_rows($wyslij);
		if($ile>0)
		{
			echo "<table><tr><th>Nick</th><th>Email</th></tr>";
			$_SESSION['liczub']=1;
			while($row = mysqli_fetch_assoc($wyslij))
			{
				$unbanowanie = "unban".$_SESSION['liczub'];
				$_SESSION['nick_unban'.$_SESSION['liczub']] = $row['nick'];
				echo "<tr><td>".$row['nick']."</td><td>".$row['email']."</td><td><form action='unban.php' method='post'><input type='submit' value='UNBAN' name='".$unbanowanie."'></form></td></tr>";
				$_SESSION['liczub'] = $_SESSION['liczub'] + 1;
			}
			echo "</table>";
		}
	?>
	<a href="zalogowany.php"><input type="submit" name="" value="GLOWNA"></a>
</body>
</html>