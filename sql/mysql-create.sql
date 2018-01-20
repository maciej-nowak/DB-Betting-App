CREATE database zaklady;
USE zaklady;

create table Stadion
(
	nazwa varchar(30) primary key,
	miasto varchar(30) not null,
	pojemnosc int not null
);

create table Trener
(
	id int primary key auto_increment,
	imie varchar(30) not null,
	nazwisko varchar(30) not null,
	data_ur date not null,
	narodowosc varchar(30) not null,
	styl_gry varchar(30),
	umiejetnosci int not null DEFAULT 50,
	CHECK (styl_gry in ('gra z kontry', 'gra na czas', 'gra skrzydlami', 'pressing', 'gra gora', 'gra silowa', 'elastyczny', 'kreatywny')),
	CHECK (umiejetnosci <= 100) 
);

create table Druzyna
(
	nazwa varchar(30) primary key,
	stadion varchar(30) not null,
	trener int not null,
	rok_powstania int not null,
	barwy varchar(30) not null,
	kolektyw int not null,
	liczba_pktow int DEFAULT 0,
	strzelone int DEFAULT 0,
	stracone int DEFAULT 0,
	zwyciestwa int DEFAULT 0,
	remisy int DEFAULT 0,
	porazki int DEFAULT 0,
	foreign key (stadion) references Stadion(nazwa), 
	foreign key (trener) references Trener(id), 
	CHECK (kolektyw <= 100),
	CHECK (liczba_pktow <= 100),
	CHECK (zwyciestwa <= 18), 
	CHECK (remisy <= 18), 
	CHECK (porazki <= 18) 
);

create table Pilkarz
(
	id int primary key auto_increment,
	nazwa_druzyna varchar(30),
	imie varchar(30) not null,
	nazwisko varchar(30) not null,
	pozycja varchar(30) not null,
	umiejetnosci int DEFAULT 50,
	data_ur date not null,
	narodowosc varchar(30) not null,
	preferowana_noga varchar(30) ,
	kurs_strzelca real not null,
	bramki int DEFAULT 0,
	zolte int DEFAULT 0,
	czerwone int DEFAULT 0,
	zawieszenie int DEFAULT 0,
	foreign key (nazwa_druzyna) references Druzyna(nazwa), 
	CHECK (pozycja in('bramkarz','obronca','pomocnik','napastnik')),
	CHECK (umiejetnosci <= 100), 
	CHECK (preferowana_noga in('prawa','lewa','obie')),
	CHECK (zolte <= 18), 
	CHECK (czerwone <= 9)
);


create table Mecz
(
	id int primary key auto_increment,
	gospodarze varchar(30),
	goscie varchar(30),
	bramki_gosp int,
	bramki_gosc int,
	kolejka int,
	rozegrany bit DEFAULT 0,
	foreign key (gospodarze) references Druzyna(nazwa),
	foreign key (goscie) references Druzyna(nazwa)
);

create table Bramka
(
	id int primary key auto_increment,
	id_pilkarz int,
	id_mecz int,
	minuta int not null,
	foreign key (id_pilkarz) references Pilkarz(id),
	foreign key (id_mecz) references Mecz(id)
);

create table Kartka
(
	id int primary key auto_increment,
	id_pilkarz int,
	id_mecz int,
	kolor varchar(30),
	minuta int not null,
	foreign key (id_pilkarz) references Pilkarz(id),
	foreign key (id_mecz) references Mecz(id),
	CHECK (kolor in ('czerwona', 'zolta'))
);

create table Gracz
(
	nick varchar(30) primary key not null,
	haslo varchar(30) not null,
	imie varchar(30) not null,
	nazwisko varchar(30) not null,
	stan_konta real DEFAULT 0
);

create table Zaklad_wynik
(
	id int primary key auto_increment,
	id_gracz varchar(30),
	id_mecz int,
	typ_wyniku int,
	stawka real not null,
	kurs real not null,
	rezultat int DEFAULT 0,
	foreign key (id_gracz) references Gracz(nick),
	foreign key (id_mecz) references Mecz(id),
	CHECK(typ_wyniku in('0','1','2'))
);

create table Zaklad_mistrz
(
	id int primary key auto_increment,
	id_gracz varchar(30),
	id_druzyna varchar(30),
	stawka real not null,
	kurs real not null,
	rezultat int DEFAULT 0,
	foreign key (id_gracz) references Gracz(nick),
	foreign key (id_druzyna) references Druzyna(nazwa)
);

create table Zaklad_krol
(
	id int primary key auto_increment,
	id_gracz varchar(30),
	id_pilkarz int,
	stawka real not null,
	kurs real not null,
	rezultat int DEFAULT 0,
	foreign key (id_gracz) references Gracz(nick),
	foreign key (id_pilkarz) references Pilkarz(id)
);

create table Zaklad_strzelec
(
	id int primary key auto_increment,
	id_gracz varchar(30),
	id_pilkarz int,
	id_mecz int,
	stawka real not null,
	kurs real not null,
	rezultat int DEFAULT 0,
	foreign key (id_gracz) references Gracz(nick),
	foreign key (id_pilkarz) references Pilkarz(id),
	foreign key (id_mecz) references Mecz(id)
);


create procedure `Stworz_mecz` (IN `gosp` varchar(30), IN `gosc` varchar(30), IN `kol` int) 
INSERT INTO Mecz(gospodarze, goscie, kolejka) VALUES(gosp, gosc, kol);

DELIMITER //
create procedure `Symuluj_kartke` (IN `id_m` int, IN `id_p` int, IN `minut` int, IN `typ` varchar(30)) 
BEGIN	
	DECLARE zol int; DECLARE czer int;
	SET zol = (SELECT zolte FROM Pilkarz WHERE id = id_p);
	SET czer = (SELECT czerwone FROM Pilkarz WHERE id = id_p);
	
	if(typ = 'zolta') then
		SET zol = zol + 1;
		UPDATE Pilkarz SET zolte = zol, czerwone = czer WHERE id = id_p;
	end if;

	if(typ = 'czerwona') then
		SET czer = czer + 1;
		UPDATE Pilkarz SET zolte = zol, czerwone = czer, zawieszenie = 1 WHERE id = id_p;
	end if;

	INSERT INTO Kartka(id_mecz, id_pilkarz, minuta, kolor) VALUES(id_m, id_p, minut, typ); 
END;//
DELIMITER ;


DELIMITER //
create procedure `Symuluj_bramke` (IN `id_m` int, IN `id_p` int, IN `minut` int) 
BEGIN	

	DECLARE br int;
	SET br = (SELECT bramki FROM Pilkarz WHERE id = id_p);
	SET br = br + 1;

	UPDATE Pilkarz SET bramki = br WHERE id = id_p;
	INSERT INTO Bramka(id_mecz, id_pilkarz, minuta) VALUES(id_m, id_p, minut); 
END;//
DELIMITER ;


DELIMITER //
create procedure `Usun_gracza` (IN `login` varchar(30)) 
BEGIN	

	DELETE FROM Zaklad_wynik WHERE id_gracz = login;
	DELETE FROM Zaklad_krol WHERE id_gracz = login;
	DELETE FROM Zaklad_mistrz WHERE id_gracz = login;
	DELETE FROM Zaklad_strzelec WHERE id_gracz = login;
	DELETE FROM Gracz WHERE nick = login;
END;//
DELIMITER ;



DELIMITER //
create procedure `Symuluj_wynik` (IN `id_mec` int, IN `gospBr` int, IN `goscBr` int) 
BEGIN 

	DECLARE pktA int; DECLARE pktB int; DECLARE gospN VARCHAR(30); DECLARE goscN VARCHAR(30); 
	DECLARE gospR int; DECLARE goscR int; DECLARE gospZ int; DECLARE goscZ int; DECLARE gospP int; DECLARE goscP int;
	DECLARE gospSt int; DECLARE goscSt int; DECLARE gospStr int; DECLARE goscStr int;

	UPDATE Mecz SET bramki_gosp = gospBr, bramki_gosc = goscBr, rozegrany = 1 WHERE id = id_mec;
	SET gospN = (SELECT gospodarze FROM Mecz WHERE id = id_mec);
	SET goscN = (SELECT goscie FROM Mecz WHERE id = id_mec);
	SET gospR = (SELECT remisy FROM Druzyna WHERE nazwa = gospN);
	SET goscR = (SELECT remisy FROM Druzyna WHERE nazwa = goscN);
	SET gospZ = (SELECT zwyciestwa FROM Druzyna WHERE nazwa = gospN);
	SET goscZ = (SELECT zwyciestwa FROM Druzyna WHERE nazwa = goscN);
	SET gospP = (SELECT porazki FROM Druzyna WHERE nazwa = gospN);
	SET goscP = (SELECT porazki FROM Druzyna WHERE nazwa = goscN);
	SET pktA = (SELECT liczba_pktow FROM Druzyna WHERE nazwa = gospN);
	SET pktB = (SELECT liczba_pktow FROM Druzyna WHERE nazwa = goscN);
	SET gospSt = (SELECT strzelone FROM Druzyna WHERE nazwa = gospN);
	SET goscSt = (SELECT strzelone FROM Druzyna WHERE nazwa = goscN);
	SET gospStr = (SELECT stracone FROM Druzyna WHERE nazwa = gospN);
	SET goscStr = (SELECT stracone FROM Druzyna WHERE nazwa = goscN);

	if (gospBr = goscBr) then
		SET pktA = pktA + 1; SET pktB = pktB + 1;
		SET gospR = gospR + 1; SET goscR = goscR + 1;

	end if;

	if (gospBr > goscBr) then
		SET pktA = pktA + 3;
		SET gospZ = gospZ + 1; SET goscP = goscP + 1;
		
	end if;

	if (gospBr < goscBr) then
		SET pktB = pktB + 3;
		SET gospP = gospP + 1; SET goscZ = goscZ + 1;
	end if;

	SET gospSt = gospSt + gospBr; SET goscSt = goscSt + goscBr;
	SET gospStr = gospStr - goscBr; SET goscStr = goscStr - gospBr;

	UPDATE Druzyna SET liczba_pktow = pktA, strzelone = gospSt, stracone = gospStr, zwyciestwa = gospZ, remisy = gospR, porazki = gospP WHERE nazwa = gospN;
	UPDATE Druzyna SET liczba_pktow = pktB, strzelone = goscSt, stracone = goscStr, zwyciestwa = goscZ, remisy = goscR, porazki = goscP WHERE nazwa = goscN;
END;//
DELIMITER ;


DELIMITER //
create function `Sila_druzyny` (`druz` VARCHAR(30)) RETURNS INT 
BEGIN 
	DECLARE zm INT;
	SET zm = (SELECT SUM(umiejetnosci) FROM Pilkarz WHERE nazwa_druzyna = druz) + (SELECT kolektyw FROM Druzyna WHERE nazwa = druz)*2 + ( SELECT umiejetnosci FROM Trener INNER JOIN Druzyna
			ON Trener.id = Druzyna.trener WHERE Druzyna.nazwa = druz)*3;
	RETURN zm;
END;//
DELIMITER ;


DELIMITER //
create trigger Stan_konta BEFORE UPDATE ON Gracz
FOR EACH ROW
BEGIN
	if NEW.stan_konta < OLD.stan_konta AND (OLD.stan_konta - NEW.stan_konta) < 10 then
		SET NEW.stan_konta = OLD.stan_konta - 10;
	end if;
END;//
DELIMITER ;

DELIMITER //
create trigger Zaklad_mecz BEFORE INSERT ON Zaklad_wynik
FOR EACH ROW
BEGIN 
	if NEW.stawka < 10.0 then
	SET NEW.stawka = 10;
	end if;
END;//
DELIMITER ;


DELIMITER //
create trigger Zaklad_krol BEFORE INSERT ON Zaklad_krol
FOR EACH ROW
BEGIN 
	if NEW.stawka < 10.0 then
	SET NEW.stawka = 10;
	end if;
END;//
DELIMITER ;


DELIMITER //
create trigger Zaklad_bramka BEFORE INSERT ON Zaklad_strzelec
FOR EACH ROW
BEGIN 
	if NEW.stawka < 10.0 then
	SET NEW.stawka = 10;
	end if;
END;//
DELIMITER ;


DELIMITER //
create trigger Zaklad_mistrz BEFORE INSERT ON Zaklad_mistrz
FOR EACH ROW
BEGIN 
	if NEW.stawka < 10.0 then
	SET NEW.stawka = 10;
	end if;
END;//
DELIMITER ;






