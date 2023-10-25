<?php
session_start();
if(!isset($_SESSION['zalogowany']))
{
	header("Location:index.php");
}
$dbc = mysqli_connect("localhost","root","","demotywatory");
for($i=1;$i<=$_SESSION['buffor'];$i++)
{
	if(isset($_POST['usuwanie'.$i]))
	{
		$id = $_SESSION['id'.$i];
		$query = "DELETE FROM demotywator WHERE id = $id";
		mysqli_query($dbc,$query) or die ("Bład zapytania");
		break;
	}
}
header("Location:zalogowany.php");
?>