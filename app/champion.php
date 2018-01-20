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
		</br>ZAKŁAD MISTRZ LIGI</br></p>';
		
		$login = $_SESSION['login'];

		$id_druzyna = $_GET['id_druzyna'];
		$id_gracz = $_GET['id_gracz'];
		$kurs = $_GET['kurs'];

	}

	else
	{
		echo '<p>Aby uzyskac dostep, zaloguj sie<br/><p>
		<p><a href="login.php">Zaloguj się</a></p>';
	}

?>
		<form method="get" action="deal_champion.php">
		<label for="id_druzyna">ID Druzyny: </label>
		<select id="id_druzyna" name="id_druzyna" >
        	<option value="<?php echo $id_druzyna ?>"><?php echo $id_druzyna ?></option>
        <select/>
        <label for="id_gracz">ID Gracza: </label>
        <select id="id_gracz" name="id_gracz" >
        	<option value="<?php echo $id_gracz ?>"><?php echo $id_gracz ?></option>
        <select/>
        <label for="kurs">Kurs: </label>
		<select id="kurs" name="kurs" >
        	<option value="<?php echo $kurs ?>"><?php echo $kurs ?></option>
        <select/></br></br>

		<label for="stawka">Stawka: </label>
		<input type="text" id="stawka" name="stawka" />
		<input type="submit" value="POSTAW" name="submitButton" />
	</form>

	<p></br><a href="index.php">Powrót</a></br></p>
</body>
</html>