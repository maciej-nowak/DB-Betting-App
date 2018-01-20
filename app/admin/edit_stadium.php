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
		</br>EDYCJA STADIONU</br></p>';
		
		$database = mysqli_connect('localhost', 'root', '', 'zaklady') or die("Could not connect");
		$query = "SELECT * FROM Stadion WHERE nazwa = '" . $_GET['nazwa'] ."'";
		$data = mysqli_query($database, $query) or die("Query failed");
		$row = mysqli_fetch_array($data);

		if($row != NULL)
		{
			$nazwa = $row['nazwa'];
			$miasto = $row['miasto'];
			$pojemnosc = $row['pojemnosc'];
		}

		if (isset($_POST['edit']))  
		{
			$miasto = $_POST['miasto'];
			$pojemnosc = $_POST['pojemnosc'];
			$query = "UPDATE Stadion SET miasto = '$miasto', pojemnosc = '$pojemnosc' WHERE nazwa = '$nazwa'";
			mysqli_query($database, $query) or die("Query failed2");
			echo "Zmiany zostaly wprowadzone do bazy";
		}
		mysqli_close($database);
		echo '<p></br><a href="index.php">Powrót</a></br></p>';

	}
	else
	{
		echo '<p>Aby uzyskac dostep do panelu administracyjnego, zaloguj sie<br/><p>
		<p><a href="login.php">Zaloguj się</a></p>';
	}

?>

<form method="post" >
	<?php echo 'Nazwa: ' . $nazwa; ?> <br />
      	<label for="miasto">Miasto:</label>
      	<input type="text" id="miasto" name="miasto" value="<?php if (!empty($miasto)) echo $miasto; ?>" /><br />
      	<label for="pojemnosc">Pojemność:</label>
	<input type="text" id="pojemnosc" name="pojemnosc" value="<?php if (!empty($pojemnosc)) echo $pojemnosc; ?>" /><br />
	<input type="submit" value="ZAPISZ ZMIANY" name="edit" />
</form>
</body>
</html>












