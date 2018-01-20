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
		</br>LOSOWANIE TERMINARZA</br></p>';

		//ZEROWANIE WYNIKOW NA NOWY SEZON-----------------------------------------------------------------------------------
		$database = mysqli_connect('localhost', 'root', '', 'zaklady') or die("Could not connect");
		$query = "UPDATE Pilkarz SET bramki = 0, czerwone = 0, zolte = 0, zawieszenie = 0";
		mysqli_query($database, $query) or die("Query failed.");
		$query = "UPDATE Druzyna SET liczba_pktow = 0, strzelone = 0, stracone = 0, zwyciestwa = 0, remisy = 0, porazki = 0";
		mysqli_query($database, $query) or die("Query failed.");


		//SPRAWDZANIE WARUNKU CZY SEZON NADAL TRWA----------------------------------------------------------------------------
		$query = "SELECT COUNT(id) AS id FROM Mecz WHERE rozegrany = 0";
		$data = mysqli_query($database, $query) or die("Query failed.");
		$row = mysqli_fetch_array($data);
		if($row['id'] == 0)
		{
		
			//LOSOWANIE ZESPOLOW---------------------------------------------------------------------------------------
			$tablica = array("AC Milan", "Juventus Turyn", "Chelsea FC", "Manchester United", "FC Barcelona", 
			"Real Madryt", "Bayern Monachium", "Borussia Dortmund", "FC Porto", "Paris Saint Germain");		
			
			for($i=1;$i<=10;$i++)
			{
				$los = array_rand($tablica);
				$zespoly[$i] = $tablica[$los];
				unset($tablica[$los]);
			}
			
			
			$ile = 10;
			$pary = array(($ile-1), ($ile/2));
	 
			for($i=1; $i<$ile; $i++) 
			{
				if($i <= $ile/2) 
				{
					$para[2*$i-2][0][0] = $i;
					$para[2*$i-2][0][1] = $ile;
					$w = 2*$i-2;
				} 
				else 
				{
					$para[2*$i-1-$ile][0][1] = $i;
					$para[2*$i-1-$ile][0][0] = $ile;
					$w = 2*$i-1-$ile;
				}
				$j = $i+1;
				
				for($k=1; $k<=$ile-2; $k++) 
				{
					if($j >= $ile) 
					{$j = 1;}
				
					if($k <= ($ile-2)/2) 
					{$para[$w][$k][0] = $j;} 
				
					else 
					{$para[$w][$ile-1-$k][1] = $j;}
	         
					$j++;
				}
			}
	 

			for($i=1; $i<$ile; $i++) 
			{
				echo '<b>kolejka '.$i.'</b><br />';
				for($j=0; $j<$ile/2; $j++) 
				{
					$gospodarz = $zespoly[$para[$i-1][$j][0]];
					$gosc = $zespoly[$para[$i-1][$j][1]];
					echo $gospodarz . "-" . $gosc . "</br />";
					$query = "CALL Stworz_mecz('$gospodarz', '$gosc', '$i')";
					$data = mysqli_query($database, $query) or die("Query failed");
				}
				echo "<br />";

			}
		
			$k=10;
			for($i=1; $i<$ile; $i++) 
			{
			
				echo '<b>kolejka ' . $k . '</b><br />';
				for($j=0; $j<$ile/2; $j++) 
				{
					$gospodarz = $zespoly[$para[$i-1][$j][1]];
					$gosc = $zespoly[$para[$i-1][$j][0]];
					echo $gospodarz . "-" . $gosc . "</br />";
					$query = "CALL Stworz_mecz('$gospodarz', '$gosc', '$k')";
					$data = mysqli_query($database, $query) or die("Query failed2");
				}
				echo "<br />";
				$k++;
			}
			mysqli_close($database);
			echo '<br /><br /> Losowanie terminarza zakończono pomyślnie. Pamiętaj, że następne losowanie dopiero po skończeniu sezonu. <br />';
			echo '<p></br><a href="index.php">Powrót</a></br></p>'; 		
		}
		else
		{
			echo '<br /><br />Sezon się jeszcze nie skończył. Będziesz mógł wylosować nowy terminarz dopiero na nowy sezon. <br />';
			echo '<p></br><a href="index.php">Powrót</a></br></p>'; 
		}
	}
	else
	{
		echo '<p>Aby uzyskac dostep do panelu administracyjnego, zaloguj sie<br/><p>
		<p><a href="login.php">Zaloguj się</a></p>';
	}

?>
</body>
</html>
