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
		echo '<p>Witaj: ' . $_SESSION['login'] . ' <a href="logout.php">Wyloguj się</a></br></p>
		<p><a href="random_schedule.php">Losuj terminarz</a></br>
		<a href="simulate_round.php">Symuluj kolejkę</a></br>
		<a href="edit_data.php">Edytuje dane</a></br>
		<a href="delete_users.php">Usuń gracza</a></br></p>';
	}
	else
	{
		echo '<p>Aby uzyskac dostep do panelu administracyjnego, zaloguj sie<br/><p>
		<p><a href="login.php">Zaloguj się</a></p>
		<p><a href="../index.php">Strona główna</a></p> ';
	}

?>
	
	
	
</body>
</html>

