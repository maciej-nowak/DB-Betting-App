<?php
	ini_set('session.gc_maxlifetime',60); 
	session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>Bazy danych: Zakłady bukmacherskie - Panel administracyjny</title>
</head>
<body>
	<h2><font color="blue">Bazy danych: Zakłady bukmacherskie - Panel administracyjny</font></h2>
	<h4>Autorzy: Maciej Nowak</h4>

<?php
					
	if (isset($_SESSION['login']))
	{
		echo '<p>Witaj: ' . $_SESSION['login'] . ' <a href="logout.php">Wyloguj się</a></br></br>
		</br>ZAKŁAD MISTRZ LIGI</br></p>';
		
		$login = $_SESSION['login'];
		$database = mysqli_connect('localhost', 'root', '', 'zaklady') or die("Could not connect");

		$id_druzyna = $_GET['id_druzyna'];
		$id_gracz = $_GET['id_gracz'];
		$kurs = $_GET['kurs'];
		$stawka = $_GET['stawka'];

		$query = "SELECT stan_konta FROM Gracz WHERE nick='$id_gracz'";
		$data = mysqli_query($database, $query) or die("Query failed");
		$row = mysqli_fetch_array($data);
		if($row['stan_konta'] < 0) echo 'Masz debet do spłacenia, nie możesz zawrzeć zakładu';
		else
		{
			$query = "INSERT INTO Zaklad_mistrz(id_druzyna, id_gracz, kurs, stawka) VALUES('$id_druzyna', '$id_gracz', $kurs, $stawka)";
			mysqli_query($database, $query) or die("Query failed");
			$query = "UPDATE Gracz SET stan_konta = stan_konta - $stawka WHERE nick = '$id_gracz'";
			mysqli_query($database, $query) or die("Query failed");
			if($stawka < 10) echo "Zakład został zawarty poprawnie jednak z MINIMALNA stawka = 10";
			else echo "Zakład został zawarty poprawnie";
		}
	
		echo '<p></br><a href="index.php">Powrót</a></br></p>';

	}

	else
	{
		echo '<p>Aby uzyskac dostep, zaloguj sie<br/><p>
		<p><a href="login.php">Zaloguj się</a></p>';
	}

?>