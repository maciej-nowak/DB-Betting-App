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
		Edycja piłkarza</br></br></p>';
		
		$database = mysqli_connect('localhost', 'root', '', 'zaklady') or die("Could not connect");
		$query = "SELECT * FROM Pilkarz WHERE id = '" . $_GET['id'] ."'";
		$data = mysqli_query($database, $query) or die("Query failed");
		$row = mysqli_fetch_array($data);

		if($row != NULL)
		{	
			$nazwa_druzyna = $row['nazwa_druzyna']; 
			$imie = $row['imie'];
			$nazwisko = $row['nazwisko'];
			$pozycja = $row['pozycja'];
			$umiejetnosci = $row['umiejetnosci'];
			$data_ur = $row['data_ur'];
			$narodowosc = $row['narodowosc'];
			$preferowana_noga = $row['preferowana_noga'];
			$kurs_strzelca = $row['kurs_strzelca'];
		}

		if (isset($_POST['edit']))  
		{
			$imie = $_POST['imie'];
			$nazwisko = $_POST['nazwisko'];
			$pozycja = $_POST['pozycja'];
			$umiejetnosci = $_POST['umiejetnosci'];
			$data_ur = $_POST['data_ur'];
			$narodowosc = $_POST['narodowosc'];
			$preferowana_noga = $_POST['preferowana_noga'];
			$kurs_strzelca = $_POST['kurs_strzelca'];
			$query = "UPDATE Pilkarz SET imie = '$imie', nazwisko = '$nazwisko', pozycja = '$pozycja', umiejetnosci = '$umiejetnosci', data_ur = '$data_ur', narodowosc = '$narodowosc', preferowana_noga = '$preferowana_noga', kurs_strzelca = '$kurs_strzelca'  WHERE id = '" . $_GET['id'] ."'";
			mysqli_query($database, $query) or die("Query failed");
			echo "Zmiany zostaly wprowadzone do bazy";
		}
		mysqli_close($database);

	}
	else
	{
		echo '<p>Aby uzyskac dostep do panelu administracyjnego, zaloguj sie<br/><p>
		<p><a href="login.php">Zaloguj się</a></p>';
	}

?>

<form method="post" >
	<?php echo $imie . " " . $nazwisko . " grający w drużynie: " . $nazwa_druzyna; ?> <br />
      	<label for="imie">Imię:</label>
      	<input type="text" id="imie" name="imie" value="<?php if (!empty($imie)) echo $imie; ?>" /><br />
      	<label for="nazwisko">Nazwisko:</label>
      	<input type="text" id="nazwisko" name="nazwisko" value="<?php if (!empty($nazwisko)) echo $nazwisko; ?>" /><br />
	<label for="pozycja">Pozycja:</label>
	<select id="pozycja" name="pozycja" >
        	<option value="bramkarz" <?php if (!empty($pozycja) && $pozycja == 'bramkarz') echo 'selected = "selected"'; ?>>Bramkarz</option>
        	<option value="obronca" <?php if (!empty($pozycja) && $pozycja == 'obronca') echo 'selected = "selected"'; ?>>Obrońca</option>
		<option value="obronca" <?php if (!empty($pozycja) && $pozycja == 'pomocnik') echo 'selected = "selected"'; ?>>Pomocnik</option>
        	<option value="napastnik" <?php if (!empty($pozycja) && $pozycja == 'napastnik') echo 'selected = "selected"'; ?>>Napastnik</option>
      	</select><br />
	<label for="nazwa">Umiejętności:</label>
	<input type="text" id="umiejetnosci" name="umiejetnosci" value="<?php if (!empty($umiejetnosci)) echo $umiejetnosci; ?>" /><br />
      	<label for="data_ur">Data urodzenia:</label>
      	<input type="text" id="data_ur" name="data_ur" value="<?php if (!empty($data_ur)) echo $data_ur; ?>" /><br />
      	<label for="narodowosc">Narodowość:</label>
      	<input type="text" id="narodowosc" name="narodowosc" value="<?php if (!empty($narodowosc)) echo $narodowosc; ?>" /><br />
	<label for="nazwa">Preferowana noga:</label>
	<select id="preferowana_noga" name="preferowana_noga" >
        	<option value="lewa" <?php if (!empty($preferowana_noga) && $preferowana_noga == 'lewa') echo 'selected = "selected"'; ?>>Lewa</option>
        	<option value="prawa" <?php if (!empty($preferowana_noga) && $preferowana_noga == 'prawa') echo 'selected = "selected"'; ?>>Prawa</option>
		<option value="obie" <?php if (!empty($preferowana_noga) && $preferowana_noga == 'obie') echo 'selected = "selected"'; ?>>Obie</option>
      	</select><br />
	<label for="kurs_strzelca">Kurs strzelca:</label>
	<input type="text" id="kurs_strzelca" name="kurs_strzelca" value="<?php if (!empty($kurs_strzelca)) echo $kurs_strzelca; ?>" /><br />
	<input type="submit" value="ZAPISZ ZMIANY" name="edit" />
</form>
</body>
</html>












