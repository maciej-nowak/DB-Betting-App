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
		</br>DANE DRUŻYNY</br></p>';
		
		$database = mysqli_connect('localhost', 'root', '', 'zaklady') or die("Could not connect");
		$query = "SELECT * FROM Druzyna WHERE nazwa = '" . $_GET['nazwa'] ."'";
		$data = mysqli_query($database, $query) or die("Query failed");
		
		while($row = mysqli_fetch_array($data))
		{	
			$trener = $row['trener'];
			$query2 = "SELECT * FROM Trener WHERE id = '$trener'";
			$data2 = mysqli_query($database, $query2) or die("Query failed");
			$row2 = mysqli_fetch_array($data2);
			echo '<p><b>Nazwa drużyny:</b> ' . $row['nazwa'] . ' </p>';
			echo '<p><b>Stadion: </b><a href="stadium.php?nazwa=' . $row['stadion'] . '">' . $row['stadion'] . '</a></p>';
			echo '<p><b>Trener: </b><a href="coach.php?id=' . $row['trener'] . '">' . $row2['imie'] . ' ' . $row2['nazwisko'] . '</a></p>';
			echo '<p><b>Rok powstania: </b>' . $row['rok_powstania'] . ' </p>';
			echo '<p><b>Barwy: </b>' . $row['barwy'] . ' </p>';
			echo '<p><b>Kolektyw </b>' . $row['kolektyw'] . ' </p>';
			echo '<p><a href="players.php?nazwa=' . $row['nazwa'] . '">' . 'Pełna lista piłkarzy klubu' . '</a></p>';
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

