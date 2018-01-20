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
		<p>Co chcesz zrobić?</br></p>
		<p><a href="cash.php">Wpłać/wypłać</a></br>
		<a href="users.php">Wyświetl graczy</a></br>
		<a href="deal.php">Zawrzyj zakład</a></br>
		<a href="archive.php">Archiwum zakładów</a></br>
		<a href="teams.php">Przejrzyj dane zespołów</a></br></p>';
	}
	else
	{
		echo '<p>Zaloguj się, aby uzyskać dostęp. Jeśli nie masz konta, zarejestruj się<br/><p>
		<p><a href="login.php">Zaloguj się</a></p>
		<p><a href="register.php">Zarejestruj się</a></p>
		<p><a href="admin/index.php">Panel administratora</a></p> ';
	}

?>
	
	
	
</body>
</html>

