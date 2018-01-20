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
		</br>TABELA LIGOWA</br></p>';
		
		$database = mysqli_connect('localhost', 'root', '', 'zaklady') or die("Could not connect");
		$query = "SELECT * FROM Druzyna ORDER BY liczba_pktow DESC, (strzelone - stracone) DESC;";
		$data = mysqli_query($database, $query) or die("Query failed");
		
		echo '<table border="1" cellpadding="5">
		<tr>
			<th>Drużyna</th>
			<th>Punkty</th>
			<th>Zwycięstwa</th>
			<th>Remisy</th>
			<th>Porażki</th>
			<th>Strzelone</th>
			<th>Stracone</th>
		</tr>';
		while($row = mysqli_fetch_array($data))
		{
			echo '<tr>';
			echo '<td><a href="team.php?nazwa=' . $row['nazwa'] . '">' . $row['nazwa'] . '</a></td>'; 
			echo '<td>' . $row['liczba_pktow'] . '</td>'; 
			echo '<td>' . $row['zwyciestwa'] . '</td>'; 
			echo '<td>' . $row['remisy'] . '</td>'; 
			echo '<td>' . $row['porazki'] . '</td>'; 
			echo '<td>' . $row['strzelone'] . '</td>'; 
			echo '<td>' . $row['stracone'] . '</td>';
			echo '</tr>';
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
