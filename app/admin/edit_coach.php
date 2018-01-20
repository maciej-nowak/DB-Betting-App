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
		</br>EDYCJA TRENERA</br></p>';
		
		$database = mysqli_connect('localhost', 'root', '', 'zaklady') or die("Could not connect");
		$query = "SELECT * FROM Trener WHERE id = '" . $_GET['id'] ."'";
		$data = mysqli_query($database, $query) or die("Query failed");
		$row = mysqli_fetch_array($data);

		if($row != NULL)
		{
			$imie = $row['imie'];
			$nazwisko = $row['nazwisko'];
			$data_ur = $row['data_ur'];
			$narodowosc = $row['narodowosc'];
			$styl_gry = $row['styl_gry'];
			$umiejetnosci = $row['umiejetnosci'];
		}

		if (isset($_POST['edit']))  
		{
			$imie = $_POST['imie'];
			$nazwisko = $_POST['nazwisko'];
			$data_ur = $_POST['data_ur'];
			$narodowosc = $_POST['narodowosc'];
			$styl_gry = $_POST['styl_gry'];
			$umiejetnosci = $_POST['umiejetnosci'];
			$query = "UPDATE Trener SET imie = '$imie', nazwisko = '$nazwisko', data_ur = '$data_ur', narodowosc = '$narodowosc', styl_gry = '$styl_gry', umiejetnosci = '$umiejetnosci' WHERE id = '" . $_GET['id'] ."'";
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
	<?php echo 'Trener: ' . $imie . " " . $nazwisko; ?> <br />
      	<label for="imie">Imię:</label>
      	<input type="text" id="imie" name="imie" value="<?php if (!empty($imie)) echo $imie; ?>" /><br />
      	<label for="nazwisko">Nazwisko:</label>
      	<input type="text" id="nazwisko" name="nazwisko" value="<?php if (!empty($nazwisko)) echo $nazwisko; ?>" /><br />
      	<label for="data_ur">Data urodzenia:</label>
      	<input type="text" id="data_ur" name="data_ur" value="<?php if (!empty($data_ur)) echo $data_ur; ?>" /><br />
      	<label for="narodowosc">Narodowość:</label>
      	<input type="text" id="narodowosc" name="narodowosc" value="<?php if (!empty($narodowosc)) echo $narodowosc; ?>" /><br />
	<label for="nazwa">Styl gry:</label>
	<select id="styl_gry" name="styl_gry" >
        	<option value="gra silowa" <?php if (!empty($styl_gry) && $styl_gry == 'gra silowa') echo 'selected = "selected"'; ?>>Gra siłowa</option>
        	<option value="pressing" <?php if (!empty($styl_gry) && $styl_gry == 'pressing') echo 'selected = "selected"'; ?>>Pressing</option>
		<option value="gra skrzydlami" <?php if (!empty($styl_gry) && $styl_gry == 'gra skrzydlami') echo 'selected = "selected"'; ?>>Gra skrzydłami</option>
		<option value="kreatywny" <?php if (!empty($styl_gry) && $styl_gry == 'kreatywny') echo 'selected = "selected"'; ?>>Kreatywny</option>
		<option value="gra gora" <?php if (!empty($styl_gry) && $styl_gry == 'gra gora') echo 'selected = "selected"'; ?>>Gra górą</option>
		<option value="gra z kontry" <?php if (!empty($styl_gry) && $styl_gry == 'gra z kontry') echo 'selected = "selected"'; ?>>Gra z kontry</option>
		<option value="gra na czas" <?php if (!empty($styl_gry) && $styl_gry == 'gra silowa') echo 'selected = "selected"'; ?>>Gra na czas</option>
<option value="elastyczny" <?php if (!empty($styl_gry) && $styl_gry == 'elastyczny') echo 'selected = "selected"'; ?>>Elastyczny</option>
      	</select><br />
	<label for="nazwa">Umiejętności:</label>
	<input type="text" id="umiejetnosci" name="umiejetnosci" value="<?php if (!empty($umiejetnosci)) echo $umiejetnosci; ?>" /><br />
	<input type="submit" value="ZAPISZ ZMIANY" name="edit" />
</form>
</body>
</html>












