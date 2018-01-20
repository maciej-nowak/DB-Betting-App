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
		//POBIERANIE NUMERU KOLEJKI DO SYMULACJI----------------------------------------------------------------------------------------------
		$database = mysqli_connect('localhost', 'root', '', 'zaklady') or die("Could not connect");
		$query = "SELECT MIN(kolejka) AS kolejka FROM Mecz WHERE rozegrany = 0";
		$data = mysqli_query($database, $query) or die("Query failed");
		$row = mysqli_fetch_array($data);
		$kolejka = $row['kolejka'];
		echo '<p>Witaj: ' . $_SESSION['login'] . ' <a href="logout.php">Wyloguj się</a></br></br>';

		
		//POBIERANIE MECZY DANEJ KOLEJKI DO SYMULACJI----------------------------------------------------------------------------------------------
		$query = "SELECT * FROM Mecz WHERE kolejka = $kolejka AND rozegrany = 0";
		$data = mysqli_query($database, $query) or die("Sezon się skończył!!! Stwórz nowy terminarz w panelu administracyjnym.");
		echo 'Symulacja kolejki numer: ' . $kolejka . '</br></br></p>';

		while($row = mysqli_fetch_array($data))
		{
			//POBIERANIE NAZW DRUZYN ORAZ ID MECZU----------------------------------------------------------------------------------------------
			$druzynaA = $row['gospodarze'];
			$druzynaB = $row['goscie'];
			$id_meczu = $row['id'];


			//POBIERANIE SILY ZESPOLU----------------------------------------------------------------------------------------------------------------
			$query = "SELECT Sila_druzyny('$druzynaA') AS sila";
			$data2 = mysqli_query($database, $query) or die("Query failed");
			$row2 = mysqli_fetch_array($data2);
			$query = "SELECT Sila_druzyny('$druzynaB') AS sila";
			$data3 = mysqli_query($database, $query) or die("Query failed");
			$row3 = mysqli_fetch_array($data3);
			$silaA = $row2['sila'];
			$silaB = $row3['sila'];


			//LOSOWANIE I USTALANIE KONCOWEJ SILY ZESPOLU - WYBOR TYPU WYNIKU-------------------------------------------------------------------------
			$szczescieA = rand(0, 200);
			$szczescieB = rand(0, 200);
			$poziomA = $silaA + $szczescieA; 
			$poziomB = $silaB + $szczescieB; 
			$jaki_typ = abs($poziomA - $poziomB);
			$wynikA = 0;
			$wynikB = 0;


			//USTALENIE TYPU WYNIKU DANEGO MECZU------------------------------------------------------------------------------------------------------
			if($jaki_typ <= 50) 
			{$wynikA = rand(0, 3); $wynikB = $wynikA;}

			else if($jaki_typ > 50 && $jaki_typ <= 100) 
			{
				if($poziomA > $poziomB)
				{$wynikB = rand(0, 3); $wynikA = $wynikB + 1;}
				else
				{$wynikA = rand(0, 3); $wynikB = $wynikA + 1;}
			}
			else if($jaki_typ > 100 && $jaki_typ <= 150)
			{
				if($poziomA > $poziomB)
				{$wynikB = rand(0, 2); $wynikA = $wynikB + 2;}
				else
				{$wynikA = rand(0, 2); $wynikB = $wynikA + 2;}
			}
			else if($jaki_typ > 150 && $jaki_typ <= 200)
			{
				if($poziomA > $poziomB)
				{$wynikB = rand(0, 2); $wynikA = $wynikB + 3;}
				else
				{$wynikA = rand(0, 2); $wynikB = $wynikA + 3;}
			}
					
			else if($jaki_typ > 200 && $jaki_typ <= 250) 
			{
				if($poziomA > $poziomB)
				{$wynikB = rand(0, 1); $wynikA = $wynikB + 4;}
				else
				{$wynikA = rand(0, 1); $wynikB = $wynikA + 4;}
			}

			else if($jaki_typ > 200 && $jaki_typ <= 300) 
			{
				if($poziomA > $poziomB)
				{$wynikB = rand(0, 1); $wynikA = $wynikB + 5;}
				else
				{$wynikA = rand(0, 1); $wynikB = $wynikA + 5;}
			}
			else if($jaki_typ > 300) 
			{
				if($poziomA > $poziomB)
				{$wynikB = rand(0, 1); $wynikA = $wynikB + 6;}
				else
				{$wynikA = rand(0, 1); $wynikB = $wynikA + 6;}
			}


			//UPDATE MECZU ORAZ WYNIKOW DRUZYN--------------------------------------------------------------------------------------------------------
			echo $druzynaA . "  " . $wynikA . " - " . $wynikB . "  " . $druzynaB . "<br />";
			$query = "CALL Symuluj_wynik('$id_meczu', '$wynikA', '$wynikB')";
			mysqli_query($database, $query) or die("Query failed");


			//UPDATE STANU ZAKŁADÓW TYPU: WYNIK MECZU ORAZ STANÓW KONT GRACZY--------------------------------------------------------------------------
			if($wynikA == $wynikB) $typ_zakladu = 0;
			else if($wynikA > $wynikB) $typ_zakladu = 1;
			else if($wynikA < $wynikB) $typ_zakladu = 2;
			$query = "SELECT * FROM Zaklad_wynik WHERE id_mecz='$id_meczu'";
			$data2 = mysqli_query($database, $query) or die("Query failed");
			while($row2 = mysqli_fetch_array($data2))
			{
				$id_zakladu = $row2['id'];
				$gracz = $row2['id_gracz'];
				$typ_meczu = $row2['typ_wyniku'];
				$stawka = $row2['stawka'];
				$kurs = $row2['kurs'];
				$wygrana = $stawka*$kurs;
				if($typ_zakladu == $typ_meczu)
				{
					$query2 = "UPDATE Zaklad_wynik SET rezultat = 1 WHERE id=$id_zakladu ";
					mysqli_query($database, $query2) or die("Query failed1");
					$query2 = "UPDATE Gracz SET stan_konta = stan_konta + $wygrana WHERE nick='$gracz'";
					mysqli_query($database, $query2) or die("Query failed2");
				}	
				else
				{
					$query2 = "UPDATE Zaklad_wynik SET rezultat = 2 WHERE id=$id_zakladu ";
					mysqli_query($database, $query2) or die("Query failed3");
				}
			}


			//UPDATE STANU ZAWIESZEŃ------------------------------------------------------------------------------------------------------------------
			$query = "UPDATE Pilkarz SET zawieszenie = 0 WHERE (nazwa_druzyna = '$druzynaA' OR nazwa_druzyna = '$druzynaB') AND (zawieszenie = 2)";
			mysqli_query($database, $query) or die("Query failed");
			$query2 = "UPDATE Pilkarz SET zawieszenie = 2 WHERE (nazwa_druzyna = '$druzynaA' OR nazwa_druzyna = '$druzynaB') AND (zawieszenie = 1)";
			mysqli_query($database, $query2) or die("Query failed");


			//POBIERANIE LISTY PILKARZY MECZU----------------------------------------------------------------------------------------------------------
			$query = "SELECT * FROM Pilkarz WHERE (nazwa_druzyna = '$druzynaA' OR nazwa_druzyna = '$druzynaB') AND (zawieszenie = 0)";
			$data2 = mysqli_query($database, $query) or die("Nie moge pobrac listy pilkarzy");
			while($row2 = mysqli_fetch_array($data2))
			{
				$tablica[] = $row2['id'];	
			}
			

			//LOSOWANIE ORAZ PRZYPISANIE DO PILKARZY ZOLTYCH KARTEK W MECZU---------------------------------------------------------------------------------
			if($tablica != NULL)
			{
				$zolte = rand(0, 4);
				for($i=0;$i<$zolte;$i++)
				{
					$los = array_rand($tablica); 
					$id_pilkarza = $tablica[$los];
					$minuta = rand(1, 90);
					unset($tablica[$los]);
					$query = "CALL Symuluj_kartke('$id_meczu', '$id_pilkarza', '$minuta', 'zolta')";
					mysqli_query($database, $query) or die("Query failed");
				}
			}


			//LOSOWANIE ORAZ PRZYPISANIE DO PILKARZY CZERWONYCH KARTEK W MECZU---------------------------------------------------------------------------------
			if($tablica != NULL)
			{
				$czerwone = rand(0, 2);
				for($i=0;$i<$czerwone;$i++)
				{
					$los = array_rand($tablica);
					$id_pilkarza = $tablica[$los];
					$minuta = rand(1, 90);
					unset($tablica[$los]);
					$query = "CALL Symuluj_kartke('$id_meczu', '$id_pilkarza', '$minuta', 'czerwona')";
					mysqli_query($database, $query) or die("Query failed");
				}
			}
			unset($tablica);


			//POBIERANIE 3 NAJLEPSZYCH STRZELCOW GOSPODARZY------------------------------------------------------------------------------------------------------------
			$query = "SELECT DISTINCT * FROM Pilkarz WHERE nazwa_druzyna = '$druzynaA' AND zawieszenie = 0 ORDER BY kurs_strzelca LIMIT 3";
			$data2 = mysqli_query($database, $query) or die("Nie moge pobrac listy pilkarzy");
			while($row2 = mysqli_fetch_array($data2))
			{
				$tablica[] = $row2['id'];
			}


			//LOSOWANIE 2 STRZELCOW GOSPODARZY-------------------------------------------------------------------------------------------------------------------------
			$query = "SELECT * FROM Pilkarz WHERE nazwa_druzyna = '$druzynaA' AND zawieszenie = 0 AND id != '$tablica[0]' AND id != '$tablica[1]' AND id != '$tablica[2]' ";
			$data2 = mysqli_query($database, $query) or die("Nie moge pobrac listy pilkarzy");
			while($row2 = mysqli_fetch_array($data2))
			{
				$tablica2[] = $row2['id'];
			}
			$los = array_rand($tablica2);
			$tablica[] = $tablica2[$los];
			unset($tablica2[$los]);
			$los = array_rand($tablica2);
			$tablica[] = $tablica2[$los];
			unset($tablica2[$los]);


			//LOSOWANIE ZDOBYWCOW BRAMEK GOSPODARZY--------------------------------------------------------------------------------------------------------------------------------
			for($i=0;$i<$wynikA;$i++)
			{
				$minuta = rand(1, 90);
				$los = array_rand($tablica);
				$id_pilkarza = $tablica[$los];
				$query = "CALL Symuluj_bramke('$id_meczu', '$id_pilkarza', '$minuta')";
				mysqli_query($database, $query) or die("Query failed");

				//UPDATE STANU ZAKŁADÓW TYPU: WYNIK MECZU ORAZ STANÓW KONT GRACZY--------------------------------------------------------------------------------------------------
				$query = "SELECT * FROM Zaklad_strzelec WHERE id_mecz='$id_meczu' AND id_pilkarz = '$id_pilkarza'";
				$data2 = mysqli_query($database, $query) or die("Query failed");
				while($row2 = mysqli_fetch_array($data2))
				{
					$id_zakladu = $row2['id'];
					$gracz = $row2['id_gracz'];
					$stawka = $row2['stawka'];
					$kurs = $row2['kurs'];
					$wygrana = $stawka*$kurs;

					$query2 = "UPDATE Zaklad_strzelec SET rezultat = 1 WHERE id=$id_zakladu ";
					mysqli_query($database, $query2) or die("Query failed1");
					$query2 = "UPDATE Gracz SET stan_konta = stan_konta + $wygrana WHERE nick='$gracz'";
					mysqli_query($database, $query2) or die("Query failed2");
				}	
			}

			unset($tablica);
			unset($tablica2);


			//POBIERANIE 3 NAJLEPSZYCH STRZELCOW GOSCI---------------------------------------------------------------------------------------------------------------------------
			$query = "SELECT DISTINCT * FROM Pilkarz WHERE nazwa_druzyna = '$druzynaB' AND zawieszenie = 0 ORDER BY kurs_strzelca LIMIT 3";
			$data2 = mysqli_query($database, $query) or die("Nie moge pobrac listy pilkarzy");
			while($row2 = mysqli_fetch_array($data2))
			{
				$tablica[] = $row2['id'];
			}


			//LOSOWANIE 2 STRZELCOW GOSCI------------------------------------------------------------------------------------------------------------------------------------------
			$query = "SELECT * FROM Pilkarz WHERE nazwa_druzyna = '$druzynaB' AND zawieszenie = 0 AND id != '$tablica[0]' AND id != '$tablica[1]' AND id != '$tablica[2]' ";
			$data2 = mysqli_query($database, $query) or die("Nie moge pobrac listy pilkarzy");
			while($row2 = mysqli_fetch_array($data2))
			{
				$tablica2[] = $row2['id'];
			}
			$los = array_rand($tablica2);
			$tablica[] = $tablica2[$los];
			unset($tablica2[$los]);
			$los = array_rand($tablica2);
			$tablica[] = $tablica2[$los];
			unset($tablica2[$los]);
			

			//LOSOWANIE ZDOBYWCOW BRAMEK GOSCI---------------------------------------------------------------------------------------------------------------------------------------
			for($i=0;$i<$wynikB;$i++)
			{
				$minuta = rand(1, 90);
				$los = array_rand($tablica);
				$id_pilkarza = $tablica[$los];
				$query = "CALL Symuluj_bramke('$id_meczu', '$id_pilkarza', '$minuta')";
				mysqli_query($database, $query) or die("Query failed");

				//UPDATE STANU ZAKŁADÓW TYPU: WYNIK MECZU ORAZ STANÓW KONT GRACZY-----------------------------------------------------------------------------------------------------
				$query = "SELECT * FROM Zaklad_strzelec WHERE id_mecz='$id_meczu' AND id_pilkarz = '$id_pilkarza'";
				$data2 = mysqli_query($database, $query) or die("Query failed");
				while($row2 = mysqli_fetch_array($data2))
				{
					$id_zakladu = $row2['id'];
					$gracz = $row2['id_gracz'];
					$stawka = $row2['stawka'];
					$kurs = $row2['kurs'];
					$wygrana = $stawka*$kurs;

					$query2 = "UPDATE Zaklad_strzelec SET rezultat = 1 WHERE id=$id_zakladu ";
					mysqli_query($database, $query2) or die("Query failed1");
					$query2 = "UPDATE Gracz SET stan_konta = stan_konta + $wygrana WHERE nick='$gracz'";
					mysqli_query($database, $query2) or die("Query failed2");
				}
			}

			//UPDATE STANU PRZEGRANYCH ZAKŁADÓW ----------------------------------------------------------------------------------------------------------------------------------------
			$query = "SELECT * FROM Zaklad_strzelec WHERE id_mecz='$id_meczu' AND rezultat = 0";
			$data2 = mysqli_query($database, $query) or die("Query failed");
			while($row2 = mysqli_fetch_array($data2))
			{
				$id_zakladu = $row2['id'];
				$query2 = "UPDATE Zaklad_strzelec SET rezultat = 2 WHERE id=$id_zakladu ";
				mysqli_query($database, $query2) or die("Query failed1");
			}

			unset($tablica);
			unset($tablica2);
			unset($pilkarze);

			
		}

		
		if($kolejka == 18)
		{
			//UPDATE ZAKLADOW KROLA STRZELCOW  -----------------------------------------------------------------------------------------------------------------------------------
			$query = "SELECT * FROM Pilkarz WHERE bramki IN (SELECT MAX(bramki) FROM Pilkarz)";
			$data2 = mysqli_query($database, $query) or die("Query failed");
			while($row2 = mysqli_fetch_array($data2))
			{
				$id_krola = $row2['id'];
				$imie = $row2['imie'];
				$nazwisko = $row2['nazwisko'];
				$query = "SELECT * FROM Zaklad_krol WHERE id_pilkarz=$id_krola AND rezultat = 0";
				$data3 = mysqli_query($database, $query) or die("Query failed");
				while($row3 = mysqli_fetch_array($data3))
				{
					$id_zakladu = $row3['id'];
					$gracz = $row3['id_gracz'];
					$stawka = $row3['stawka'];
					$kurs = $row3['kurs'];
					$wygrana = $stawka*$kurs;
					$query2 = "UPDATE Zaklad_krol SET rezultat = 1 WHERE id = $id_zakladu";
					mysqli_query($database, $query2) or die("Query failed1");
					$query2 = "UPDATE Gracz SET stan_konta = stan_konta + $wygrana WHERE nick='$gracz'";
					mysqli_query($database, $query2) or die("Query failed2");
				}
			}
			$query = "UPDATE Zaklad_krol SET rezultat = 2 WHERE rezultat = 0";
			mysqli_query($database, $query) or die("Query failed");


			//UPDATE ZAKLADOW MISTRZA LIGI  -----------------------------------------------------------------------------------------------------------------------------------
			$query = "SELECT * FROM Druzyna ORDER BY liczba_pktow DESC, (strzelone - stracone) DESC LIMIT 1;";
			$data2 = mysqli_query($database, $query) or die("Query failed1");
			$row2 = mysqli_fetch_array($data2);
			$id_druzyny = $row2['nazwa'];

			$query = "SELECT * FROM Zaklad_mistrz WHERE id_druzyna='$id_druzyny' AND rezultat = 0";
			$data3 = mysqli_query($database, $query) or die("Query failed2");
			while($row3 = mysqli_fetch_array($data3))
			{
				$id_zakladu = $row3['id'];
				$gracz = $row3['id_gracz'];
				$stawka = $row3['stawka'];
				$kurs = $row3['kurs'];
				$wygrana = $stawka*$kurs;
				$query2 = "UPDATE Zaklad_mistrz SET rezultat = 1 WHERE id = $id_zakladu";
				mysqli_query($database, $query2) or die("Query failed1");
				$query2 = "UPDATE Gracz SET stan_konta = stan_konta + $wygrana WHERE nick='$gracz'";
				mysqli_query($database, $query2) or die("Query failed2");
			}
			$query = "UPDATE Zaklad_mistrz SET rezultat = 2 WHERE rezultat = 0";
			mysqli_query($database, $query) or die("Query failed3");


		}

		mysqli_close($database);
		echo '<br /><br /> Symulacja kolejki zakończona pomyślnie. Aby zasymulować następną kolejkę wróć do panelu głównego. Pamiętaj, aby upewnić się że wszystkie gracze zawarli zakłady. <br />';
		echo '<p><a href="index.php">Powrót</a></p>';
	}

	else
	{
		echo '<p>Aby uzyskac dostep do panelu administracyjnego, zaloguj sie<br/><p>
		<p><a href="login.php">Zaloguj się</a></p>';
	}



?>
</body>
</html>