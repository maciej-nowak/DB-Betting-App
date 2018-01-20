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
		TABELA LIGOWA</br></br></p>';
		
		$database = mysqli_connect('localhost', 'root', '', 'zaklady') or die("Could not connect");
		$query = "SELECT * FROM Druzyna";
		$data = mysqli_query($database, $query) or die("Query failed");
		$login = $_SESSION['login'];
		
		while($row = mysqli_fetch_array($data))
		{
			$nazwa = $row['nazwa'];
			$query = "SELECT Sila_druzyny('$nazwa') AS sila";
			$data2 = mysqli_query($database, $query) or die("Query failed");
			$row2 = mysqli_fetch_array($data2);
			$kurs = 30 - ($row2['sila']/100); 
			echo '<p><a href="champion.php?id_druzyna=' . $row['nazwa'] .  '&amp;id_gracz=' . $login . '&amp;kurs=' . $kurs . '">' . $row['nazwa'] . '</a></p>';
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
