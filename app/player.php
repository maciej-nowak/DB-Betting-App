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
	<h2><font color="blue">Bazy danych: Zakłady bukmacherskie</font></h2>
	<h4>Autorzy: Maciej Nowak</h4>

<?php
				
	if (isset($_SESSION['login']))
	{
		echo '<p>Witaj: ' . $_SESSION['login'] . ' <a href="logout.php">Wyloguj się</a></br></br>
		</br>DANE PIŁKARZA</br></p>';
		
		$database = mysqli_connect('localhost', 'root', '', 'zaklady') or die("Could not connect");
		$query = "SELECT * FROM Pilkarz WHERE id = '" . $_GET['id'] ."'";
		$data = mysqli_query($database, $query) or die("Query failed");
		
		while($row = mysqli_fetch_array($data))
		{	
			echo '<p><b>Imię i nazwisko: </b> ' . $row['imie'] . ' ' . $row['nazwisko'] . '</p>';
			echo '<p><b>Pozycja: </b> ' . $row['pozycja'] . ' </p>';
			echo '<p><b>Umiejętności: </b> ' . $row['umiejetnosci'] . ' </p>';
			echo '<p><b>Data urodzenia:: </b> ' . $row['data_ur'] . ' </p>';
			echo '<p><b>Narodowość: </b> ' . $row['narodowosc'] . ' </p>';
			echo '<p><b>Preferowana noga: </b>' . $row['preferowana_noga'] . ' </p>';
			echo '<p><br />STATYSTYKI PIŁKARZA: </p>';
			echo '<p><b>Kurs strzelca: </b>  ' . $row['kurs_strzelca'] . ' </p>';
			echo '<p><b>Bramki: </b>  ' . $row['bramki'] . ' </p>';
			echo '<p><b>Żółte kartki: </b>  ' . $row['zolte'] . ' </p>';
			echo '<p><b>Czerwone kartki: </b>  ' . $row['czerwone'] . ' </p>';
			if($row['zawieszenie'] == 0) echo '<p><b>Zawieszony: </b>NIE</p>';
			else echo '<p><b>Zawieszony: </b>TAK</p>';
		}
		mysqli_close($database);
		echo '<p></br><a href="index.php">Powrót</a></br></p>';
	}
	else
	{
		echo '<p>Zaloguj się, aby uzyskać dostęp. Jeśli nie masz konta, zarejestruj się<br/><p>
		<p><a href="login.php">Zaloguj się</a></p>
		<p><a href="register.php">Zarejestruj się</a></p> ';
	}

?>

</body>
</html>

