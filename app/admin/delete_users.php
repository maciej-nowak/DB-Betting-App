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
		echo '<p>Witaj: ' . $_SESSION['login'] . ' <a href="logout.php">Wyloguj się</a></br></br></br></p>
		</br>LISTA GRACZY</br></p>';
		
		$login = $_SESSION['login'];
		$database = mysqli_connect('localhost', 'root', '', 'zaklady') or die("Could not connect");
		$query = "SELECT * FROM Gracz ORDER BY stan_konta DESC";
		$data = mysqli_query($database, $query) or die("Query failed");	

		echo '<table border="1" cellpadding="5">
		<tr>
			<th>Imię</th>
			<th>Nazwisko</th>
			<th>Nick</th>
			<th>Stan konta</th>
			<th>Usuń</th>
		</tr>';

		while($row = mysqli_fetch_array($data))
		{
			echo '<tr>';
			echo '<td>' . $row['imie'] . '</td>'; 
			echo '<td>' . $row['nazwisko'] . '</td>'; 
			echo '<td>' . $row['nick'] . '</td>'; 
			echo '<td>' . $row['stan_konta'] . '</td>';
			echo '<td><a href="delete_user.php?nick=' . $row['nick'] . '">USUŃ</a></p>';
			echo '</tr>';
		}
		mysqli_close($database);
	}
	else
	{
		echo '<p>Aby uzyskac dostep do panelu administracyjnego, zaloguj sie<br/><p>
		<p><a href="login.php">Zaloguj się</a></p>';
	}

?>

<p></br><a href="index.php">Powrót</a></br></p>
</body>
</html>
