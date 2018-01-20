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
		echo '<p>Witaj: ' . $_SESSION['login'] . ' <a href="logout.php">Wyloguj się</a></br></br>
		Tu mozesz wplacic badz wyplacic pieniadze.</br></br></p>';
		
		$login = $_SESSION['login'];
		$id_gracz = $login;
		$database = mysqli_connect('localhost', 'root', '', 'zaklady') or die("Could not connect");
		$query = "SELECT stan_konta FROM Gracz WHERE nick = '$login'";
		$data = mysqli_query($database, $query) or die("Query failed");	
		$row = mysqli_fetch_array($data);
		echo '<p>Twoj stan konta wynosi: ' . $row['stan_konta'] . '</p>';
		$stan_konta = $row['stan_konta'];
		
		if (isset($_POST['wplacB']))
		{	
			$wplac = $_POST['wplac'];
			$query2 = "UPDATE Gracz SET stan_konta = '$stan_konta' + '$wplac' WHERE nick = '$login'";
			mysqli_query($database, $query2) or die("Query failed");
			echo '<meta http-equiv="REFRESH" content="0; url=cash.php" />';
		}
		
		if (isset($_POST['wyplacB']))
		{
			$query = "SELECT stan_konta FROM Gracz WHERE nick='$id_gracz'";
			$data = mysqli_query($database, $query) or die("Query failed");
			$row = mysqli_fetch_array($data);
			if($row['stan_konta'] < 0) echo 'Masz debet do spłacenia, nie możesz wypłacić';
			else
			{
				$wyplac = $_POST['wyplac'];
				$query2 = "UPDATE Gracz SET stan_konta = '$stan_konta' - '$wyplac' WHERE nick = '$login'";
				mysqli_query($database, $query2) or die("Query failed");
				echo '<meta http-equiv="REFRESH" content="0; url=cash.php" />';
			}
		}
		mysqli_close($database);
	}
	else
	{
		echo '<p>Aby uzyskac dostep do panelu administracyjnego, zaloguj sie<br/><p>
		<p><a href="login.php">Zaloguj się</a></p>';
	}

?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="text" id="wplac" name="wplac" />
		<input type="submit" value="wplac" name="wplacB" /><br/><br/>
</form>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="text" id="wyplac" name="wyplac" />
		<input type="submit" value="wyplac" name="wyplacB" /><br/><br/>
</form>
<p></br><a href="index.php">Powrót</a></br></p>
</body>
</html>
