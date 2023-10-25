<?php
session_start();
if(!isset($_SESSION['zalogowany']))
{
	header("Location:index.php");
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
	<div id="opcje"><ul><li><a href="index.php" id="glowna">GŁÓWNA</a></li><li><a href="add.php">DODAJ DEMOTYWA</a></li>
		<li><a><?php echo "Zalogowano: ". $_SESSION['nick'] ?></a></li>
		<li><a href="wyloguj.php">WYLOGUJ</a></li
		><li>

	<form action="" method="post">
	<select name="kategoria">

		<?php
			$dbc = mysqli_connect("localhost","root","","demotywatory")or die("bład polaczenie z baza danych");
			$query = "SELECT * FROM kategorie";
			$wyslij = mysqli_query($dbc,$query) or die ("blad zapytania do bazy danych");
			echo "<option value='0'>wszystkie</option>";
			echo "<option value='1'>moje posty</option>";
			while ($row = mysqli_fetch_assoc($wyslij))
			{
				echo "<option value='".$row['id']."'>".$row['nazwa_kategori']."</option>";
			}
		?>

		</select>
		<input type='submit' name='zatwierdz' id="g1" value='Szukaj po kategorii'>
		</form>
		</li>
		</ul></div>
		<div id="acp"><?php if($_SESSION['acp']==1){echo "<a href='acp.php'>ACP</a>";} ?></div>
		<div id='naglowek'>DEMOTYWATORY</div>

		<div id='zawartosc'>
			<?php

				if(isset($_POST['zatwierdz']))
				{
					$idkat = $_POST['kategoria'];
					if($idkat == 0)
					{
						$query = "SELECT *, demotywator.id as 'id_demotywatora' FROM demotywator INNER JOIN kategorie ON demotywator.id_kategori = kategorie.id JOIN uzytkownicy ON demotywator.id_uzytkownika = uzytkownicy.id";
					}
					else if($idkat == 1)
					{
						$nick = $_SESSION['nick']; 
						$query = "SELECT *, demotywator.id as 'id_demotywatora' FROM demotywator INNER JOIN uzytkownicy ON demotywator.id_uzytkownika = uzytkownicy.id  JOIN kategorie ON demotywator.id_kategori = kategorie.id WHERE '$nick' = nazwa_autora";
					}
					else
					{
						$query = "SELECT *, demotywator.id as 'id_demotywatora' FROM demotywator INNER JOIN kategorie ON demotywator.id_kategori = kategorie.id JOIN uzytkownicy ON demotywator.id_uzytkownika = uzytkownicy.id WHERE kategorie.id = $idkat";
					}
				}

				else
				{
					$query = "SELECT *, demotywator.id as 'id_demotywatora' FROM demotywator INNER JOIN kategorie ON demotywator.id_kategori = kategorie.id JOIN uzytkownicy ON demotywator.id_uzytkownika = uzytkownicy.id";
				}

				$wyslij = mysqli_query($dbc, $query) or die("bład zapytania");
				$ile = mysqli_num_rows($wyslij);

				if($ile == 0)
				{
					if($idkat == 1)
					{
						echo "<div id='alert'>NIE MASZ ŻADNYCH POSTÓW!</div>";
					}
					else
					{
						echo "<div id='alert'>BRAK DEMOTYWATORÓW W DANEJ KATEGORI!</div>";
					}
				}

				else
				{
					$_SESSION['licznik']=1;
					while($row = mysqli_fetch_assoc($wyslij))
					{
						echo "<div id='ramka'>";
						echo "<div id='opisik'>".$row['opis']."</div>";
						echo "<div id='obrazek'><img src='".$row['zdjecie']."'></div>";

						if($row['czy_ban']==0)
						{
							echo "<div id='info'><div id='data'>Data dodania ".$row['data_dodania']." dodano przez "."</div><div id='nazwa_a'>&nbsp".$row['nazwa_autora']."</div></div>";
						}

						else
						{
							echo "<div id='info'><div id='data'>Data dodania ".$row['data_dodania']." dodano przez "."</div><div id='nazwa_aban'><s>&nbsp".$row['nazwa_autora']."</s></div></div>";
						}

						echo "<div id='kategoriaa'>Kategoria: #".$row['nazwa_kategori']."</div>";

						if($row['nazwa_autora']==$_SESSION['nick']||$_SESSION['acp']==1)
						{
							$_SESSION['buffor'] = $_SESSION['licznik'];
							$_SESSION['id'.$_SESSION['buffor']] = $row['id_demotywatora'];
							$usuwanie = "usuwanie". $_SESSION['buffor'];
							echo "<form action='usuwanie.php' method='post'><input type='submit' id='usuwanie' value='USUŃ' name='".$usuwanie."'></form>";
							$_SESSION['licznik'] = $_SESSION['licznik'] + 1;
						}
						echo "</div><div id='przerwa'></div>";
					}
				}

				mysqli_close($dbc);
			?>
	</div>

</body>
</html>