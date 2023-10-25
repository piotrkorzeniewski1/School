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
	<title>Demotywatory</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
</head>
<body>
	<div id="opcje"><ul><li><a href="index.php">GŁÓWNA</a></li><li><a href="add.php" id="glowna">DODAJ DEMOTYWA</a></li></ul></div>

	<div id="zawartosc">

		<form action="" method="post">

			<p><label>Opis demotywatora: <input type="text" name="opis"></label></p>
			<p><label>Daj link do demotywa(zdj): <input type="text" name="adres"></label></p>

			<select name="kategoria">
				<?php
					$dbc = mysqli_connect("localhost","root","","demotywatory")or die("blad polaczenia z baza danych");
					$query = "SELECT * FROM kategorie";
					$wyslij = mysqli_query($dbc,$query) or die ("blad zapytania do bazy danych");

					while ($row = mysqli_fetch_assoc($wyslij))
					{
						echo "<option value='".$row['id']."'>".$row['nazwa_kategori']."</option>";
					}

				?>
			</select>
			<br><input type="submit" value="DODAJ" name="zatwierdz">

			<?php
				if(isset($_POST['zatwierdz']))
				{
					$nick = $_SESSION['nick'];
					$query = "SELECT id FROM uzytkownicy WHERE nick = '$nick'";
					$wynik = mysqli_query($dbc,$query) or die("Bład zapytania");
					while($row = mysqli_fetch_assoc($wynik))
					{
						$id = $row['id'];
					}
					$opis = $_POST['opis'];
					$adres = $_POST['adres'];
					$kategoria = $_POST['kategoria'];

					if(!empty($nick) && !empty($opis) && !empty($adres))
					{
						$query = "INSERT INTO demotywator values(0,$id,'$nick',now(),'$opis','$adres',$kategoria)";
						mysqli_query($dbc,$query) or die("blad zapytania do bazy danych");
						echo "<div id='alert'>Dziekuje za dodanie demotywatora :)</div>";
					}
					else
					{
						echo "<div id='alert'>Wypelnij wszystkie pola!!!</div>";
					}
				}

				mysqli_close($dbc);
			?>

		</form>
	</div>

</body>
</html>