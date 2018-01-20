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
		</br>ZAKŁAD KRÓL STRZELCÓW</br></p>';
		
		$login = $_SESSION['login'];

		$id_pilkarz = $_GET['id_pilkarz'];
		$id_gracz = $_GET['id_gracz'];
		$kurs = $_GET['kurs'];
		$imie = $_GET['imie'];
		$nazwisko = $_GET['nazwisko'];

		echo "Wybór króla strzelców na: " . $imie . " " . $nazwisko . "<br />";

	}

	else
	{
		echo '<p>Aby uzyskac dostep, zaloguj sie<br/><p>
		<p><a href="login.php">Zaloguj się</a></p>';
	}

?>
		<form method="get" action="deal_king.php">

		<label for="id_pilkarz">ID Pilkarza: </label>
		<select id="id_pilkarz" name="id_pilkarz" >
        	<option value="<?php echo $id_pilkarz ?>"><?php echo $id_pilkarz ?></option>
        <select/>
        <label for="id_gracz">ID Gracza: </label>
        <select id="id_gracz" name="id_gracz" >
        	<option value="<?php echo $id_gracz ?>"><?php echo $id_gracz ?></option>
        <select/>
        <label for="kurs">Kurs: </label>
		<select id="kurs" name="kurs" >
        	<option value="<?php echo $kurs ?>"><?php echo $kurs ?></option>
        <select/><br/><br/>

		<label for="stawka">Stawka: </label>
		<input type="text" id="stawka" name="stawka" />
		<input type="submit" value="POSTAW" name="submitButton" />
	</form>

	<p></br><a href="index.php">Powrót</a></br></p>
</body>
</html>