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
		echo '<p>Witaj: ' . $_SESSION['login'] . ' <a href="logout.php">Wyloguj się</a></br></br>';

		
		$login = $_SESSION['login'];
		$database = mysqli_connect('localhost', 'root', '', 'zaklady') or die("Could not connect");
		$query = "SELECT * FROM Mecz WHERE id = '" . $_GET['id'] ."'";
		$data = mysqli_query($database, $query) or die("Query failed");
		
		$row = mysqli_fetch_array($data);
			
			//POBIERANIE NAZW DRUZYN ORAZ ID MECZU----------------------------------------------------------------------------------------------
			$druzynaA = $row['gospodarze'];
			$druzynaB = $row['goscie'];
			$id_meczu = $_GET['id'];
			$kolejka = $row['kolejka'];
			$id_gracz = $login;


			//POBIERANIE SILY ZESPOLU----------------------------------------------------------------------------------------------------------------
			$query = "SELECT Sila_druzyny('$druzynaA') AS sila";
			$data2 = mysqli_query($database, $query) or die("Query failed");
			$row2 = mysqli_fetch_array($data2);
			$query = "SELECT Sila_druzyny('$druzynaB') AS sila";
			$data3 = mysqli_query($database, $query) or die("Query failed");
			$row3 = mysqli_fetch_array($data3);
			$silaA = $row2['sila'];
			$silaB = $row3['sila'];
			$kurs = $silaA - $silaB;

			if($kurs < -100)
			{$kursA = 5.00; $kursR = 3.60; $kursB = 1.40;}
			else if($kurs < -50 && $kurs >= -100)
			{$kursA = 3.40; $kursR = 3.20; $kursB = 1.80;}
			else if($kurs < 0 && $kurs >= -50)
			{$kursA = 2.60; $kursR = 2.50; $kursB = 2.40;}
			else if($kurs < 50 && $kurs >= 0)
			{$kursA = 2.40; $kursR = 2.50; $kursB = 2.60;}
			else if($kurs < 100 && $kurs >= 50)
			{$kursA = 1.80; $kursR = 3.20; $kursB = 3.40;}
			else if($kurs >= 100)
			{$kursA = 1.40; $kursR = 3.60; $kursB = 5.00;}

			if (isset($_POST['submitButton']))
			{
				$stawka = $_POST['stawka'];
				$typ = $_POST['typ'];
				if($typ == 0) $kurs = $kursR;
				else if($typ == 1) $kurs = $kursA;
				else if($typ == 2) $kurs = $kursB;
				$id_meczu = $_POST['id_meczu'];


				$query = "SELECT stan_konta FROM Gracz WHERE nick='$id_gracz'";
				$data = mysqli_query($database, $query) or die("Query failed");
				$row = mysqli_fetch_array($data);
				if($row['stan_konta'] < 0) echo 'Masz debet do spłacenia, nie możesz zawrzeć zakładu';
				else
				{
					$query = "INSERT INTO Zaklad_wynik(id_gracz, id_mecz, typ_wyniku, stawka, kurs) VALUES('$login', $id_meczu, $typ, $stawka, $kurs)";
					mysqli_query($database, $query) or die("Query failed");
					$query = "UPDATE Gracz SET stan_konta = stan_konta - $stawka WHERE nick = '$id_gracz'";
					mysqli_query($database, $query) or die("Query failed");
					if($stawka < 10) echo "Zakład został zawarty poprawnie jednak z MINIMALNA stawka = 10";
					else echo "Zakład został zawarty poprawnie";
				}

			}

			echo '</br>ZAKŁAD WYNIK MECZU</br></p>';


			echo '<p>Kolejka numer: ' . $kolejka . ' </p>';
			echo '<p>Mecz: ' . $druzynaA . ' - ' . $druzynaB . '</p> '; 
			echo '<p>Zwycięstwo gospodarzy: ' . $kursA . '</p>';
			echo '<p>Remis: ' . $kursR . '</p>';
			echo '<p>Zwycięstwo gosci: ' . $kursB . '</p>';



			mysqli_close($database);
		
	}

	else
	{
		echo '<p>Aby uzyskac dostep, zaloguj sie<br/><p>
		<p><a href="login.php">Zaloguj się</a></p>';
	}

?>
			
	<form method="post">
	<label for="id_meczu">ID MECZU: </label>
	<select id="id_meczu" name="id_meczu" >
        <option value="<?php echo $id_meczu ?>"><?php echo $id_meczu ?></option>
    <select/></br></br>
		<label for="stawka">Stawka: </label>
		<input type="text" id="stawka" name="stawka" />
		<select id="typ" name="typ" >
        	<option value="1">Zwycięstwo gospodarza</option>
        	<option value="0">Remis</option>
			<option value="2">Zwycięstwo gościa</option>
      	</select>
		<input type="submit" value="POSTAW" name="submitButton" />
	</form>

	<p></br><a href="index.php">Powrót</a></br></p>
</body>
</html>