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
		</br>EDYCJA DRUŻYNY</br></p>';
		
		$database = mysqli_connect('localhost', 'root', '', 'zaklady') or die("Could not connect");
		$query = "SELECT * FROM Druzyna WHERE nazwa = '" . $_GET['nazwa'] ."'";
		$data = mysqli_query($database, $query) or die("Query failed");
		$row = mysqli_fetch_array($data);

		if($row != NULL)
		{
			$nazwa = $row['nazwa'];
			$rok_powstania = $row['rok_powstania'];
			$barwy = $row['barwy'];
			$kolektyw = $row['kolektyw'];
		}

		if (isset($_POST['edit']))  
		{
			$rok_powstania = $_POST['rok_powstania'];
			$barwy = $_POST['barwy'];
			$kolektyw = $_POST['kolektyw'];
			$query = "UPDATE Druzyna SET rok_powstania = '$rok_powstania', barwy = '$barwy', kolektyw = '$kolektyw' WHERE nazwa = '$nazwa'";
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
	<?php echo 'Drużyna: ' . $nazwa; ?> <br />
      	<label for="rok_powstania">Rok powstania:</label>
      	<input type="text" id="rok_powstania" name="rok_powstania" value="<?php if (!empty($rok_powstania)) echo $rok_powstania; ?>" /><br />
      	<label for="barwy">Barwy:</label>
      	<input type="text" id="barwy" name="barwy" value="<?php if (!empty($barwy)) echo $barwy; ?>" /><br />
      	<label for="kolektyw">Kolektyw:</label>
      	<input type="text" id="kolektyw" name="kolektyw" value="<?php if (!empty($kolektyw)) echo $kolektyw; ?>" /><br />
	<input type="submit" value="ZAPISZ ZMIANY" name="edit" />
</form>

<?php
	
	$database = mysqli_connect('localhost', 'root', '', 'zaklady') or die("Could not connect");
	$query = "SELECT * FROM Druzyna WHERE nazwa = '" . $_GET['nazwa'] ."'";
	$data = mysqli_query($database, $query) or die("Query failed");
		
	while($row = mysqli_fetch_array($data))
	{
		$trener = $row['trener'];
		$query2 = "SELECT * FROM Trener WHERE id = '$trener'";
		$data2 = mysqli_query($database, $query2) or die("Query failed");
		$row2 = mysqli_fetch_array($data2);
		echo '<p><b>Stadion: </b><a href="edit_stadium.php?nazwa=' . $row['stadion'] . '">' . $row['stadion'] . '</a></p>';
		echo '<p><b>Trener: </b><a href="edit_coach.php?id=' . $row['trener'] . '">' . $row2['imie'] . ' ' . $row2['nazwisko'] . '</a></p>';
		echo '<p><a href="edit_players.php?nazwa=' . $row['nazwa'] . '">' . 'Pełna lista piłkarzy klubu' . '</a></p>';
	}

?>
</body>
</html>












