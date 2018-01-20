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
		Dane piłkarza</br></br></p>';
		
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

		echo '<br /><br />';
			$query = "SELECT * FROM Pilkarz WHERE zawieszenie = 0 AND nazwa_druzyna = '" . $druzynaA ."'";
			$data2 = mysqli_query($database, $query) or die("Query failed2");
			
			echo '<table border="1" cellpadding="5">
			<tr>
				<th>Strzelec gosp.</th>
				<th>Kurs strzelca</th>
				<th>Wybór</th>
			</tr>';
			while($row2 = mysqli_fetch_array($data2))
			{	
				echo '<tr>';
				echo '<td>' . $row2['imie'] . ' ' . $row2['nazwisko'] . '</td>';
				echo '<td>' . $row2['kurs_strzelca'] . '</td>'; 
				echo '<td><a href="score.php?id_pilkarz=' . $row2['id'] .  '&amp;imie=' . $row2['imie'] . '&amp;nazwisko=' .$row2['nazwisko'] . '&amp;kurs_strzelca=' . $row2['kurs_strzelca'] . 
				'&amp;id_gracz=' . $login . '&amp;gosp=' . $druzynaA . '&amp;gosc=' . $druzynaB . '&amp;id_mecz=' . $id_meczu . '">Wybierz</a></td>';
				echo '</tr>';
			}
			echo '</tr>
			</table>';


			echo '<br /><br />';
			$query = "SELECT * FROM Pilkarz WHERE zawieszenie = 0 AND nazwa_druzyna = '" . $druzynaB ."'";
			$data2 = mysqli_query($database, $query) or die("Query failed2");
			
			echo '<table border="1" cellpadding="5">
			<tr>
				<th>Strzelec gosci.</th>
				<th>Kurs strzelca</th>
				<th>Wybór</th>
			</tr>';
			while($row2 = mysqli_fetch_array($data2))
			{	
				echo '<tr>';
				echo '<td>' . $row2['imie'] . ' ' . $row2['nazwisko'] . '</td>';
				echo '<td>' . $row2['kurs_strzelca'] . '</td>'; 
				echo '<td><a href="score.php?id_pilkarz=' . $row2['id'] .  '&amp;imie=' . $row2['imie'] . '&amp;nazwisko=' .$row2['nazwisko'] . '&amp;kurs_strzelca=' . $row2['kurs_strzelca'] . 
				'&amp;id_gracz=' . $login . '&amp;gosp=' . $druzynaA . '&amp;gosc=' . $druzynaB . '&amp;id_mecz=' . $id_meczu . '">Wybierz</a></td>';
				echo '</tr>';
			}
			echo '</tr>
			</table>';
mysqli_close($database);
		
	}

	else
	{
		echo '<p>Aby uzyskac dostep, zaloguj sie<br/><p>
		<p><a href="login.php">Zaloguj się</a></p>';
	}

?>