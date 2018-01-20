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
		echo '<p>Witaj: ' . $_SESSION['login'] . ' <a href="logout.php">Wyloguj się</a></br></br>';
		$database = mysqli_connect('localhost', 'root', '', 'zaklady') or die("Could not connect");
		$query = "SELECT MIN(kolejka) AS kolejka FROM Mecz WHERE rozegrany = 0";
		$data = mysqli_query($database, $query) or die("Query failed");
		$row = mysqli_fetch_array($data);
		$kolejka = $row['kolejka'];

		$query = "SELECT * FROM Mecz WHERE kolejka = $kolejka AND rozegrany = 0";
		$data = mysqli_query($database, $query) or die("Sezon się skończył!!! Poczekaj na rozpoczęcie nowego.");
		echo 'Mecze kolejki numer: ' . $kolejka . '</br></br></p>';

		while($row = mysqli_fetch_array($data))
		{
			echo '<p><a href="deal_match.php?id=' . $row['id'] . '">' . $row['gospodarze'] . ' - ' . $row['goscie'] . '</a></p>';
			echo '<p><a href="scorer.php?id=' . $row['id'] . '">Strzelcy meczu ' . $row['gospodarze'] . ' - ' . $row['goscie'] . '</a></p>';			
		}


		mysqli_close($database);
		echo '<p><a href="index.php">Powrót</a></p>';
	}

	else
	{
		echo '<p>Aby uzyskac dostep, zaloguj sie<br/><p>
		<p><a href="login.php">Zaloguj się</a></p>';
	}



?>
</body>
</html>