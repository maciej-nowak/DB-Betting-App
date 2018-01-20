<?php
	ini_set('session.gc_maxlifetime',60); 
	session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>Bazy danych: Zakłady bukmacherskie</title>
</head>
<body>
	<h2><font color="blue">Bazy danych: Zakłady bukmacherskie</font></h2>
	<h4>Autorzy: Maciej Nowak</h4>
	
<?php
	
	if (isset($_SESSION['login']))
	{
		echo '<p>Witaj: ' . $_SESSION['login'] . ' <a href="logout.php">Wyloguj się</a></br></p>
		<p>Wybierz typ zakładów aby wyświetlić historie</br></p>
		<p><a href="archive_match.php">Historia zakładów meczów</a></br>
		<a href="archive_score.php">Historia zakładów strzelców</a></br>
		<a href="archive_champion.php">Historia zakładów mistrzów</a></br>
		<a href="archive_king.php">Historia zakładów królów strzelców</a></br>';

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

