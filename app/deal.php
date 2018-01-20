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
		echo '<p>Wybierz typ zakładu: <br /><p>';
		echo '<p><a href="round.php">Wynik meczu i strzelec</a></br>';

		$database = mysqli_connect('localhost', 'root', '', 'zaklady') or die("Could not connect");
		$query = "SELECT COUNT(id) AS ile FROM Mecz WHERE kolejka=1 AND rozegrany = 0";
		$data = mysqli_query($database, $query) or die("Query failed");
		$row = mysqli_fetch_array($data);
		if($row['ile'] == 0) echo '</br>Zakład mistrza ligi i króla strzelców można zawierać tylko na początku sezonu!!!';
		else
		{
			echo '<p><a href="champions.php">Mistrz sezonu</a></br>';
			echo '<p><a href="kings.php">Król strzelców</a></br></br>';
		}
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