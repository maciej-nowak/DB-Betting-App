<?php

	ini_set('session.gc_maxlifetime',60); 
	session_start();
	
	if (!$_SERVER['HTTPS']) 
	{
		header('Location: https://localhost/bazy/login.php');
	}
	if (!isset($_SESSION['login']))
	{
		if (isset($_POST['loginButton']))
		{
			$database = mysqli_connect('localhost', 'root', '', 'zaklady');
	
			//pobieranie danych logowania
			$nick = $_POST['nickBox'];
			$password = $_POST['passwordBox'];
			
			if (!empty($nick) && !empty($password))
			{
				//wyszukiwanie loginu i hasla w bazie
				$query = "SELECT nick FROM Gracz WHERE nick = '$nick' AND haslo = '$password'";
				$data = mysqli_query($database, $query);
	
				if (mysqli_num_rows($data) == 1)
				{
					$row = mysqli_fetch_array($data);
					$_SESSION['login'] = $row['nick'];
					header('Location: index.php'); 
				}	
				else
				{
					echo '<p>Podaj poprawny login i haslo</p>';
				}
			}
			else
			{
				echo '<p>Wprowadz login i hasło, aby uzyskać dostęp</p>';
			}
		}
	}
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
	if (empty($_SESSION['login']))
	{
		echo '<p>Wpisz ponizej dane logowania</p>';
?>

	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
		<label for="nickLabel">Nick: </label>
		<input type="text" id="nickBox" name="nickBox" /><br/><br/>
		<label for="passwordLabel">Hasło: </label>
		<input type="text" id="passwordBox" name="passwordBox" /><br/><br/>
		<input type="submit" value="ZALOGUJ" name="loginButton" />
	</form>
	
<?php
	}
	else
	{
		echo '<p>Zalogowany użytkownik: ' . $_SESSION['login'] . '.</p>';
	}
?>
		
	
</body>
</html>

