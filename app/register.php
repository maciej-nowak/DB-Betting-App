<?php

	if (!$_SERVER['HTTPS']) 
	{
		header('Location: https://localhost/bazy/register.php');
	}
		
	if (isset($_POST['registerButton']))
	{
		$nick = $_POST['nickBox'];
		$password = $_POST['passwordBox'];
		$firstname = $_POST['firstNameBox'];
		$lastname = $_POST['lastNameBox'];
		$temp = false;
			
		if (!empty($nick) && !empty($password))
		{
			$database = mysqli_connect('localhost', 'root', '', 'zaklady');
			$check = "SELECT * FROM Gracz WHERE nick = '$nick'";
			$data = mysqli_query($database, $check);
			if (mysqli_num_rows($data) == 0)
			{
				$query = "INSERT INTO Gracz(nick, haslo, imie, nazwisko) VALUES('$nick', '$password', '$firstname', '$lastname')";
				mysqli_query($database, $query);
			
				echo '<p>Zostałes poprawnie zarejestrowany</p>';
				echo '<p>Aby się zalogować, użyj swojego konta</p>';
				echo '<br/><p><a href="index.php">Powrót do strony głównej</a></p>';
			
				$nick = "";
				$password = "";
				$firstname = "";
				$lastname = "";
				mysqli_close($database);
				$temp = false;
				//exit();
			}
			else
			{
				echo '<p>Dana nazwa jest juz zajeta</p>';
				$nick = "";
			}
		}
		else
		{
			$temp = true;
			echo '<p>Pole login oraz password nie mogą być puste. Wpisz poprawnie informacje</p>';
			mysqli_close($database);
		}
	}
	else
	{
		$temp = true;
	}

	if ($temp)
	{
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

	<p>Aby się zarejestrować, wpisz dane poniżej i potwierdź je przyciskiem ZAREJESTRUJ.</p><br/><br/>
			
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="nickLabel">Nick: </label>
		<input type="text" id="nickBox" name="nickBox" /><br/><br/>
		<label for="passwordLabel">Hasło: </label>
		<input type="text" id="passwordBox" name="passwordBox" /><br/><br/>
		<label for="firstNameLabel">Imię: </label>
		<input type="text" id="firstNameBox" name="firstNameBox" /><br/><br/>
		<label for="lastNameLabel">Nazwisko: </label>
		<input type="text" id="lastNameBox" name="lastNameBox" /><br/><br/>
		<input type="submit" value="ZAREJESTRUJ" name="registerButton" />
	</form>
<?php
	}
?>
</body>
</html>


