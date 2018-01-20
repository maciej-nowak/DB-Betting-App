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
		</br>HISTORIA ZAKŁADÓW STRZELCÓW</br></p>';
		
		$login = $_SESSION['login'];
		$database = mysqli_connect('localhost', 'root', '', 'zaklady') or die("Could not connect");
		$query = "SELECT DISTINCT * FROM Zaklad_strzelec WHERE id_gracz = '$login' ORDER BY id";
		$data = mysqli_query($database, $query) or die("Query failed");
		
		echo '<table border="1" cellpadding="5">
		<tr>
			<th>Mecz</th>
			<th>Strzelec</th>
			<th>Stawka</th>
			<th>Kurs</th>
			<th>Status zakładu</th>
			<th>Wygrana</th>
		</tr>';
		
		while($row = mysqli_fetch_array($data))
		{

			$id_mecz = $row['id_mecz'];
			$id_pilkarz = $row['id_pilkarz'];
			$query = "SELECT * FROM Pilkarz WHERE id = '$id_pilkarz'";
			$data2 = mysqli_query($database, $query) or die("Query failed");
			$row2 = mysqli_fetch_array($data2);
			$imie = $row2['imie'];
			$nazwisko = $row2['nazwisko'];
			$query = "SELECT * FROM Mecz WHERE id = '$id_mecz'";
			$data3 = mysqli_query($database, $query) or die("Query failed");

			while($row3 = mysqli_fetch_array($data3))
			{
				echo '<tr>';
				echo '<td>' . $row3['gospodarze'] . ' ' . $row3['bramki_gosp'] . ' - ' . $row3['bramki_gosc'] . ' ' . $row3['goscie'] . '</td>';
				echo '<td>' . $imie . ' ' . $nazwisko . '</td>';
				echo '<td>' . $row['stawka']. '</td>';
				echo '<td>' . $row['kurs'] . '</td>';
				if($row['rezultat'] == 0) echo '<td>MECZ NIEROZEGRANY</td>';
				else if($row['rezultat'] == 1) echo '<td>ZAKŁAD WYGRANY</td>';
				else if($row['rezultat'] == 2) echo '<td>ZAKŁAD PRZEGRANY</td>';
				if($row['rezultat'] == 1) echo '<td>' . $row['kurs']*$row['stawka'] . '</td>';
				echo '</tr>';
			}
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
