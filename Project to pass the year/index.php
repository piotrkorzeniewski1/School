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
	<div id="opcje"><ul><li><a href="index.php" id="glowna">GŁÓWNA</a></li><li><a href="logowanie.php">ZALOGUJ</a></li><li><a href="rejestracja.php">ZAJERESTRUJ</a></li>
	<li>

	<form action="" method="post">
	<select name="kategoria">

		<?php
			$dbc = mysqli_connect("localhost","root","","demotywatory")or die("bład polaczenie z baza danych");
			$query = "SELECT * FROM kategorie";
			$wyslij = mysqli_query($dbc,$query) or die ("blad zapytania do bazy danych");
			echo "<option value='0'>wszystkie</option>";
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
		<div id='naglowek'>DEMOTYWATORY</div>

		<div id='zawartosc'>
			<?php
				echo $_COOKIE['imie'];
				if(isset($_POST['zatwierdz']))
				{
					$idkat = $_POST['kategoria'];
					if($idkat == 0)
					{
						$query = "SELECT * FROM demotywator INNER JOIN kategorie ON demotywator.id_kategori = kategorie.id JOIN uzytkownicy ON demotywator.id_uzytkownika = uzytkownicy.id";
					}
					else
					{
						$query = "SELECT * FROM demotywator INNER JOIN kategorie ON demotywator.id_kategori = kategorie.id JOIN uzytkownicy ON demotywator.id_uzytkownika = uzytkownicy.id WHERE kategorie.id = $idkat";
					}
				}

				else
				{
					$query = "SELECT * FROM demotywator INNER JOIN kategorie ON demotywator.id_kategori = kategorie.id JOIN uzytkownicy ON demotywator.id_uzytkownika = uzytkownicy.id";
				}

				$wyslij = mysqli_query($dbc, $query) or die("bład zapytania");
				$ile = mysqli_num_rows($wyslij);

				if($ile == 0)
				{
					echo "<div id='alert'>BRAK DEMOTYWATORÓW W DANEJ KATEGORI!</div>";
				}

				else
				{
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
						echo "</div><div id='przerwa'></div>";
					}
				}
				mysqli_close($dbc);
			?>
	</div>
</body>
</html>