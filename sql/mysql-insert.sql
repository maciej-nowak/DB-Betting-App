INSERT INTO Trener (imie, nazwisko, data_ur, narodowosc, styl_gry, umiejetnosci)
VALUES ('Massimiliano', 'Allegri', '1967-08-11', 'Wloch', 'gra silowa', 78);
INSERT INTO Trener (imie, nazwisko, data_ur, narodowosc, styl_gry, umiejetnosci)
VALUES ('Antonio', 'Conte', '1969-07-31','Wloch', 'pressing', 81);
INSERT INTO Trener (imie, nazwisko, data_ur, narodowosc, styl_gry, umiejetnosci)
VALUES ('Carlo', 'Ancelotti', '1959-06-10', 'Wloch', 'gra skrzydlami', 92);
INSERT INTO Trener (imie, nazwisko, data_ur, narodowosc, styl_gry, umiejetnosci)
VALUES ('Gerardo', 'Martino', '1962-11-20', 'Argentynczyk', 'kreatywny', 75);
INSERT INTO Trener (imie, nazwisko, data_ur, narodowosc, styl_gry, umiejetnosci)
VALUES ('Jose', 'Mourinho', '1963-01-26', 'Portugalczyk', 'gra silowa', 95);
INSERT INTO Trener (imie, nazwisko, data_ur, narodowosc, styl_gry, umiejetnosci)
VALUES ('David', 'Moyes', '1963-04-25', 'Szkot', 'gra gora', 82);
INSERT INTO Trener (imie, nazwisko, data_ur, narodowosc, styl_gry, umiejetnosci)
VALUES ('Josep', 'Guardiola', '1971-01-18', 'Hiszpan', 'kreatywny', 86);
INSERT INTO Trener (imie, nazwisko, data_ur, narodowosc, styl_gry, umiejetnosci)
VALUES ('Jurgen', 'Klopp', '1967-06-16', 'Niemiec', 'gra z kontry', 85);
INSERT INTO Trener (imie, nazwisko, data_ur, narodowosc, styl_gry, umiejetnosci)
VALUES ('Laurent', 'Blanc', '1965-11-19', 'Wloch', 'gra skrzydlami', 82);
INSERT INTO Trener (imie, nazwisko, data_ur, narodowosc, styl_gry, umiejetnosci)
VALUES ('Paulo', 'Fonseca', '1973-03-05', 'Portugalczyk', 'gra na czas', 77);

INSERT INTO Stadion (nazwa, miasto, pojemnosc)
VALUES ('San Siro', 'Mediolan', 80018);
INSERT INTO Stadion (nazwa, miasto, pojemnosc)
VALUES ('Juventus Stadium', 'Turyn', 41254);
INSERT INTO Stadion (nazwa, miasto, pojemnosc)
VALUES ('Santiago Bernabeu', 'Madryt', 85454);
INSERT INTO Stadion (nazwa, miasto, pojemnosc)
VALUES ('Camp Nou', 'Barcelona', 99354);
INSERT INTO Stadion (nazwa, miasto, pojemnosc)
VALUES ('Stamford Bridge', 'Londyn', 41837);
INSERT INTO Stadion (nazwa, miasto, pojemnosc)
VALUES ('Old Trafford', 'Manchester', 75797);
INSERT INTO Stadion (nazwa, miasto, pojemnosc)
VALUES ('Allianz Arena', 'Monachium', 69901);
INSERT INTO Stadion (nazwa, miasto, pojemnosc)
VALUES ('Signal Iduna Park', 'Dortmund', 80645);
INSERT INTO Stadion (nazwa, miasto, pojemnosc)
VALUES ('Parc des Princes', 'Paryz', 48527);
INSERT INTO Stadion (nazwa, miasto, pojemnosc)
VALUES ('Estadio do Dragao', 'Porto', 50948);

INSERT INTO Druzyna (nazwa, stadion, trener, rok_powstania, barwy, kolektyw)
VALUES ('AC Milan', 'San Siro', 1, 1899, 'czerwono-czarne', 74);
INSERT INTO Druzyna (nazwa, stadion, trener, rok_powstania, barwy, kolektyw)
VALUES ('Juventus Turyn', 'Juventus Stadium', 2, 1897, 'bialo-czarne', 86);
INSERT INTO Druzyna (nazwa, stadion, trener, rok_powstania, barwy, kolektyw)
VALUES ('Real Madryt', 'Santiago Bernabéu', 3, 1902, 'biale', 93);
INSERT INTO Druzyna (nazwa, stadion, trener, rok_powstania, barwy, kolektyw)
VALUES ('FC Barcelona', 'Camp Nou', 4, 1899, 'niebiesko-purpurowe', 95);
INSERT INTO Druzyna (nazwa, stadion, trener, rok_powstania, barwy, kolektyw)
VALUES ('Chelsea FC', 'Stamford Bridge', 5, 1905, 'niebieskie', 80);
INSERT INTO Druzyna (nazwa, stadion, trener, rok_powstania, barwy, kolektyw)
VALUES ('Manchester United', 'Old Trafford', 6, 1878, 'czerwono-biale', 75);
INSERT INTO Druzyna (nazwa, stadion, trener, rok_powstania, barwy, kolektyw)
VALUES ('Bayern Monachium', 'Allianz Arena', 7, 1900, 'czerwone', 92);
INSERT INTO Druzyna (nazwa, stadion, trener, rok_powstania, barwy, kolektyw)
VALUES ('Borussia Dortmund', 'Signal Iduna Park', 8, 1909, 'zolto-czarne', 82);
INSERT INTO Druzyna (nazwa, stadion, trener, rok_powstania, barwy, kolektyw)
VALUES ('Paris Saint Germain', 'Parc des Princes', 9, 1970, 'czerwono-niebieskie', 78);
INSERT INTO Druzyna (nazwa, stadion, trener, rok_powstania, barwy, kolektyw)
VALUES ('FC Porto', 'Estádio do Dragão', 10, 1893, 'bialo-niebieskie', 81);

INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('AC Milan', 'Christian', 'Abbiati', 'bramkarz', 86, '1973-03-05', 'Wloch', 'lewa', 30.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('AC Milan', 'Marco', 'Amelia', 'bramkarz', 72, '1982-04-02', 'Wloch', 'prawa', 30.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('AC Milan', 'Mattia', 'De Sciglio', 'obronca', 81, '1992-10-20', 'Wloch', 'lewa', 7.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('AC Milan', 'Philippe', 'Mexes', 'obronca', 85, '1982-03-30', 'Francuz', 'prawa', 6.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('AC Milan', 'Ignazio', 'Abate', 'obronca', 83, '1986-11-12', 'Wloch', 'prawa', 6.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('AC Milan', 'Cristian', 'Zapata', 'obronca', 78, '1986-09-30', 'Kolumbijczyk', 'prawa', 8.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('AC Milan', 'Daniele', 'Bonera', 'obronca', 75, '1981-05-31', 'Wloch', 'prawa', 9.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('AC Milan', 'Sulley Ali', 'Muntari', 'pomocnik', 81, '1984-08-27', 'Ghanczyk', 'prawa', 4.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('AC Milan', 'Riccardo', 'Montolivo', 'pomocnik', 82, '1985-01-18', 'Wloch', 'prawa', 5.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('AC Milan', 'Antonio', 'Nocerino', 'pomocnik', 79, '1985-04-09', 'Wloch', 'lewa', 5.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('AC Milan', 'Urby', 'Emanuelson', 'pomocnik', 78, '1988-06-16', 'Holender', 'lewa', 4.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('AC Milan', 'Ricardo', 'Kaka', 'pomocnik', 92, '1982-04-22', 'Brazylijczyk', 'prawa', 2.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('AC Milan', 'Giampaolo', 'Pazzini', 'napastnik', 83, '1984-08-02', 'Wloch', 'prawa', 1.8);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('AC Milan', 'Mario', 'Balotelli', 'napastnik', 90, '1990-08-02', 'Wloch', 'prawa', 1.6);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('AC Milan', 'Stephan', 'El Shaarawy', 'napastnik', 87, '1992-10-27', 'Wloch', 'prawa', 1.7);

INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Juventus Turyn', 'Gianluigi', 'Buffon', 'bramkarz', 90, '1978-01-28', 'Wloch', 'lewa', 30.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Juventus Turyn', 'Marco', 'Storari', 'bramkarz', 79, '1977-01-07', 'Wloch', 'prawa', 30.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Juventus Turyn', 'Giorgio', 'Chiellini', 'obronca', 84, '1984-08-14', 'Wloch', 'lewa', 6.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Juventus Turyn', 'Andrea', 'Barzagli', 'obronca', 85, '1981-05-08', 'Wloch', 'prawa', 6.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Juventus Turyn', 'Bonucci', 'Leonardo', 'obronca', 83, '1987-05-01', 'Wloch', 'prawa', 6.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Juventus Turyn', 'Marco', 'Motta', 'obronca', 78, '1986-05-14', 'Wloch', 'prawa', 8.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Juventus Turyn', 'Jose Martin', 'Caceres', 'obronca', 79, '1987-04-07', 'Urugwajczyk', 'prawa', 9.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Juventus Turyn', 'Paul Labile', 'Pogba', 'pomocnik', 81, '1993-03-15', 'Francuz', 'prawa', 4.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Juventus Turyn', 'Andrea', 'Pirlo', 'pomocnik', 88, '1979-05-19', 'Wloch', 'obie', 5.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Juventus Turyn', 'Kwado', 'Asamoah', 'pomocnik', 84, '1988-12-09', 'Ghanczyk', 'lewa', 5.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Juventus Turyn', 'Arturo', 'Vidal', 'pomocnik', 85, '1987-05-02', 'Chilijczyk', 'lewa', 3.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Juventus Turyn', 'Mauricio', 'Isla', 'pomocnik', 83, '1988-06-12', 'Chilijczyk', 'prawa', 4.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Juventus Turyn', 'Mirco', 'Vucinic', 'napastnik', 88, '1984-08-02', 'Czarnogorczyk', 'prawa', 1.7);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Juventus Turyn', 'Carlos', 'Tevez', 'napastnik', 90, '1990-08-02', 'Argentynczyk', 'prawa', 1.6);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Juventus Turyn', 'Giovinco', 'Sebastian', 'napastnik', 87, '1992-10-27', 'Wloch', 'lewa', 1.8);

INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Real Madryt', 'Iker', 'Casillas', 'bramkarz', 86, '1981-05-20', 'Hiszpan', 'lewa', 30.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Real Madryt', 'Diego', 'Lopez', 'bramkarz', 84, '1981-11-03', 'Hiszpan', 'prawa', 35.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Real Madryt', 'Raphael', 'Varane', 'obronca', 80, '1992-04-25', 'Francuz', 'lewa', 15.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Real Madryt', 'Pepe', 'Ferreira', 'obronca', 82, '1983-02-26', 'Brazylijczyk', 'prawa', 10.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Real Madryt', 'Sergio', 'Ramos', 'obronca', 83, '1986-03-30', 'Hiszpan', 'prawa', 4.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Real Madryt', 'Fabio', 'Coentrao', 'obronca', 77, '1988-03-11', 'Portugalczyk', 'prawa', 9.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Real Madryt', 'Alvaro', 'Arbeloa', 'obronca', 78, '1983-01-17', 'Hiszpan', 'prawa', 12.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Real Madryt', 'Sami', 'Khedira', 'pomocnik', 84, '1987-04-04', 'Niemiec', 'prawa', 4.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Real Madryt', 'Gareth', 'Bale', 'pomocnik', 90, '1989-07-16', 'Walijczyk', 'lewa', 1.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Real Madryt', 'Xabi', 'Alonso', 'pomocnik', 86, '1981-11-25', 'Hiszpan', 'lewa', 5.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Real Madryt', 'Luka', 'Modric', 'pomocnik', 85, '1985-09-09', 'Chorwat', 'lewa', 2.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Real Madryt', 'Angel', 'Di Maria', 'pomocnik', 88, '1988-02-14', 'Argentynczyk', 'prawa', 2.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Real Madryt', 'Cristiano', 'Ronaldo', 'napastnik', 94, '1985-02-05', 'Portugalczyk', 'prawa', 1.3);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Real Madryt', 'Karim', 'Benzema', 'napastnik', 87, '1987-12-19', 'Francuz', 'prawa', 1.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Real Madryt', 'Alvaro', 'Morata', 'napastnik', 73, '1992-10-23', 'Hiszpan', 'lewa', 5.0);

INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Barcelona', 'Victor', 'Valdes', 'bramkarz', 82, '1982-01-14', 'Hiszpan', 'lewa', 30.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Barcelona', 'Jose Manuel', 'Pinto', 'bramkarz', 77, '1975-11-15', 'Hiszpan', 'prawa', 35.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Barcelona', 'Martin', 'Montoya', 'obronca', 76, '1991-04-14', 'Hiszpan', 'lewa', 25.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Barcelona', 'Gerard', 'Pique', 'obronca', 83, '1987-02-02', 'Hiszpan', 'prawa', 5.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Barcelona', 'Carles', 'Puyol', 'obronca', 82, '1978-04-13', 'Hiszpan', 'prawa', 5.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Barcelona', 'Jordi', 'Alba', 'obronca', 84, '1989-03-21', 'Hiszpan', 'prawa', 7.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Barcelona', 'Dani', 'Alves', 'obronca', 83, '1983-05-06', 'Brazylijczyk', 'prawa', 8.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Barcelona', 'Cesc', 'Fabregas', 'pomocnik', 86, '1987-05-04', 'Hiszpan', 'prawa', 3.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Barcelona', 'Xavi', 'Hernandez', 'pomocnik', 89, '1980-01-25', 'Hiszpan', 'obie', 2.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Barcelona', 'Andres', 'Iniesta', 'pomocnik', 91, '1984-05-11', 'Hiszpan', 'obie', 2.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Barcelona', 'Javier', 'Mascherano', 'pomocnik', 82, '1984-06-08', 'Argentynczyk', 'lewa', 8.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Barcelona', 'Alexandre', 'Song', 'pomocnik', 81, '1987-09-09', 'Kamerunczyk', 'prawa', 7.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Barcelona', 'Alexis', 'Sanchez', 'napastnik', 85, '1988-12-19', 'Chilijczyk', 'prawa', 2.6);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Barcelona', 'Lionel', 'Messi', 'napastnik', 94, '1987-06-24', 'Argentynczyk', 'lewa', 1.3);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Barcelona', 'Neymar', 'Jr', 'napastnik', 87, '1992-02-05', 'Brazylijczyk', 'lewa', 1.6);

INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Chelsea FC', 'Petr', 'Cech', 'bramkarz', 89, '1982-05-20', 'Czech', 'prawa', 30.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Chelsea FC', 'Henrique', 'Hilario', 'bramkarz', 76, '1975-10-21', 'Portugalczyk', 'prawa', 30.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Chelsea FC', 'Ashley', 'Cole', 'obronca', 81, '1980-12-20', 'Anglik', 'lewa', 7.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Chelsea FC', 'Branislav', 'Ivanovic', 'obronca', 84, '1984-06-20', 'Serb', 'prawa', 6.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Chelsea FC', 'David', 'Luiz', 'obronca', 86, '1987-04-22', 'Brazylijczyk', 'lewa', 5.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Chelsea FC', 'John', 'Terry', 'obronca', 87, '1980-12-07', 'Anglik', 'prawa', 5.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Chelsea FC', 'Gary', 'Cahill', 'obronca', 78, '1985-12-19', 'Anglik', 'lewa', 10.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Chelsea FC', 'Eden', 'Hazard', 'pomocnik', 86, '1991-01-07', 'Belg', 'prawa', 3.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Chelsea FC', 'Frank', 'Lampard', 'pomocnik', 82, '1978-06-29', 'Anglik', 'obie', 5.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Chelsea FC', 'Juan', 'Mata', 'pomocnik', 84, '1988-04-28', 'Hiszpan', 'lewa', 5.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Chelsea FC', 'Michael', 'Essien', 'pomocnik', 83, '1982-12-08', 'Ghanczyk', 'prawa', 6.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Chelsea FC', 'Oscar', 'dos Santos', 'pomocnik', 86, '1988-06-12', 'Brazylijczyk', 'prawa', 3.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Chelsea FC', 'Fernando', 'Torres', 'napastnik', 87, '1984-03-20', 'Hiszpan', 'prawa', 1.7);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Chelsea FC', 'Romelu', 'Lukaku', 'napastnik', 85, '1993-05-13', 'Belg', 'lewa', 1.9);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Chelsea FC', 'Samuel', 'Eto\'o', 'napastnik', 91, '1981-03-10', 'Kamerunczyk', 'prawa', 1.5);

INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Manchester United', 'David', 'de Gea', 'bramkarz', 87, '1990-11-07', 'Hiszpan', 'prawa', 30.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Manchester United', 'Anders', 'Lindegaard', 'bramkarz', 68, '1984-04-13', 'Dunczyk', 'prawa', 30.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Manchester United', 'Rafael', 'De Silva', 'obronca', 78, '1990-07-09', 'Brazylijczyk', 'prawa', 12.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Manchester United', 'Patrice', 'Evra', 'obronca', 83, '1981-05-15', 'Francuz', 'prawa', 7.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Manchester United', 'Phil', 'Jones', 'obronca', 75, '1992-02-21', 'Anglik', 'lewa', 11.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Manchester United', 'Rio', 'Ferdinand', 'obronca', 88, '1978-11-07', 'Anglik', 'prawa', 5.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Manchester United', 'Nemanja', 'Vidic', 'obronca', 86, '1981-10-21', 'Serb', 'prawa', 5.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Manchester United', 'Ryan', 'Giggs', 'pomocnik', 85, '1973-11-29', 'Walijczyk', 'obie', 5.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Manchester United', 'Michael', 'Carrick', 'pomocnik', 81, '1981-07-28', 'Anglik', 'prawa', 6.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Manchester United', 'Luis Carlos', 'Nani', 'pomocnik', 83, '1986-11-17', 'Portugalczyk', 'lewa', 3.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Manchester United', 'Antonio', 'Valencia', 'pomocnik', 86, '1985-08-04', 'Kolumbijczyk', 'prawa', 4.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Manchester United', 'Shinji', 'Kagawa', 'pomocnik', 84, '1989-03-17', 'Japonczyk', 'prawa', 4.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Manchester United', 'Wayne', 'Rooney', 'napastnik', 90, '1985-10-24', 'Anglik', 'prawa', 1.6);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Manchester United', 'Javier', 'Hernandez', 'napastnik', 85, '1988-06-01', 'Meksykanin', 'lewa', 1.8);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Manchester United', 'Robin', 'van Persie', 'napastnik', 91, '1983-08-06', 'Holender', 'prawa', 1.5);

INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Bayern Monachium', 'Manuel', 'Neuer', 'bramkarz', 92, '1986-03-27', 'Niemiec', 'prawa', 30.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Bayern Monachium', 'Tom', 'Starke', 'bramkarz', 75, '1981-03-18', 'Dunczyk', 'lewa', 30.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Bayern Monachium', 'Daniel', 'van Buyten', 'obronca', 83, '1978-02-07', 'Belg', 'prawa', 8.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Bayern Monachium', 'Marcio Rafael', 'Rafinha', 'obronca', 83, '1981-05-15', 'Brazylijczyk', 'prawa', 7.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Bayern Monachium', 'Jerome', 'Boateng', 'obronca', 81, '1988-09-03', 'Niemiec', 'lewa', 6.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Bayern Monachium', 'Philipp', 'Lahm', 'obronca', 90, '1983-11-11', 'Niemiec', 'lewa', 5.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Bayern Monachium', 'David', 'Alaba', 'obronca', 86, '1992-06-24', 'Austriak', 'prawa', 5.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Bayern Monachium', 'Franck', 'Ribery', 'pomocnik', 94, '1983-04-07', 'Francuz', 'prawa', 1.6);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Bayern Monachium', 'Arjen', 'Robben', 'pomocnik', 92, '1984-01-23', 'Holender', 'obie', 1.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Bayern Monachium', 'Xherdan', 'Shaqiri', 'pomocnik', 82, '1991-10-10', 'Szwajcar', 'lewa', 4.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Bayern Monachium', 'Mario', 'Goetze', 'pomocnik', 86, '1992-06-03', 'Niemiec', 'prawa', 3.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Bayern Monachium', 'Bastian', 'Schweinsteiger', 'pomocnik', 89, '1989-03-17', 'Niemiec', 'prawa', 4.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Bayern Monachium', 'Mario', 'Mandzukic', 'napastnik', 90, '1986-05-21', 'Chorwat', 'prawa', 1.7);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Bayern Monachium', 'Claudio', 'Pizarro', 'napastnik', 82, '1978-10-03', 'Peruwianczyk', 'lewa', 2.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Bayern Monachium', 'Thomas', 'Muller', 'napastnik', 84, '1983-08-06', 'Niemiec', 'prawa', 1.7);

INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Borussia Dortmund', 'Roman', 'Weidenfeller', 'bramkarz', 83, '1980-08-06', 'Niemiec', 'lewa', 30.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Borussia Dortmund', 'Mitchell', 'Langerak', 'bramkarz', 74, '1988-08-22', 'Australijczyk', 'prawa', 35.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Borussia Dortmund', 'Neven', 'Subotic', 'obronca', 86, '1988-12-10', 'Serb', 'lewa', 6.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Borussia Dortmund', 'Mats', 'Hummels', 'obronca', 87, '1982-06-17', 'Niemiec', 'prawa', 5.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Borussia Dortmund', 'Lukasz', 'Piszczek', 'obronca', 83, '1985-06-03', 'Polak', 'prawa', 8.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Borussia Dortmund', 'Marcel', 'Schmelzer', 'obronca', 82, '1988-01-22', 'Niemiec', 'prawa', 8.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Borussia Dortmund', 'Marian', 'Sarr', 'obronca', 73, '1995-01-30', 'Niemiec', 'prawa', 12.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Borussia Dortmund', 'Jakub', 'Blaszczykowski', 'pomocnik', 86, '1985-12-14', 'Polak', 'prawa', 3.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Borussia Dortmund', 'Kevin', 'Grosskreutz', 'pomocnik', 82, '1988-07-19', 'Niemiec', 'lewa', 6.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Borussia Dortmund', 'Henrikh', 'Mkhitaryan', 'pomocnik', 83, '1989-01-21', 'Armenczyk', 'lewa', 4.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Borussia Dortmund', 'Nuri', 'Sahin', 'pomocnik', 81, '1988-09-05', 'Argentynczyk', 'lewa', 5.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Borussia Dortmund', 'Sven', 'Bender', 'pomocnik', 81, '1989-04-27', 'Niemiec', 'prawa', 6.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Borussia Dortmund', 'Pierre Emerick', 'Aubameyang', 'napastnik', 83, '1989-05-18', 'Gabonczyk', 'prawa', 3.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Borussia Dortmund', 'Marco', 'Reus', 'napastnik', 87, '1989-05-31', 'Niemiec', 'prawa', 1.8);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Borussia Dortmund', 'Robert', 'Lewandowski', 'napastnik', 90, '1988-08-21', 'Polak', 'lewa', 1.4);

INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Paris Saint Germain', 'Salvatore', 'Sirigu', 'bramkarz', 83, '1987-01-12', 'Wloch', 'lewa', 30.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Paris Saint Germain', 'Nicolas', 'Douchez', 'bramkarz', 75, '1980-04-22', 'Francuz', 'prawa', 35.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Paris Saint Germain', 'Thiago', 'Silva', 'obronca', 91, '1984-09-22', 'Brazylijczyk', 'lewa', 4.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Paris Saint Germain', 'Rodrigo', 'Alex', 'obronca', 80, '1982-06-17', 'Brazylijczyk', 'prawa', 10.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Paris Saint Germain', 'Marcus', 'Marquinhos', 'obronca', 79, '1994-05-14', 'Brazylijczyk', 'prawa', 20.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Paris Saint Germain', 'Cabelino', 'Maxwell', 'obronca', 78, '1981-08-27', 'Brazylijczyk', 'prawa', 12.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Paris Saint Germain', 'Lucas', 'Digne', 'obronca', 78, '1993-07-20', 'Francuz', 'prawa', 18.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Paris Saint Germain', 'Jeremy', 'Menez', 'pomocnik', 81, '1987-05-07', 'Francuz', 'prawa', 6.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Paris Saint Germain', 'Blaise', 'Matuidi', 'pomocnik', 82, '1987-04-09', 'Francuz', 'lewa', 5.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Paris Saint Germain', 'Marco', 'Veratti', 'pomocnik', 80, '1992-11-05', 'Wloch', 'lewa', 7.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Paris Saint Germain', 'Javier', 'Pastore', 'pomocnik', 83, '1989-06-20', 'Argentynczyk', 'lewa', 3.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Paris Saint Germain', 'Moura', 'Lucas', 'pomocnik', 80, '1992-08-13', 'Brazylijczyk', 'prawa', 4.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Paris Saint Germain', 'Edinson', 'Cavani', 'napastnik', 87, '1987-02-14', 'Urugwajczyk', 'prawa', 1.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Paris Saint Germain', 'Ezequiel', 'Lavezzi', 'napastnik', 85, '1985-05-03', 'Argentynczyk', 'prawa', 1.9);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('Paris Saint Germain', 'Zlatan', 'Ibrahimovic', 'napastnik', 93, '1981-10-03', 'Szwed', 'lewa', 1.25);

INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Porto', 'Helton', 'da Silva', 'bramkarz', 80, '1978-05-17', 'Brazylijczyk', 'lewa', 25.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Porto', 'Fabiano', 'Ribeiro', 'bramkarz', 73, '1988-02-29', 'Brazylijczyk', 'lewa', 35.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Porto', 'Danilo', 'Luiz', 'obronca', 82, '1991-07-15', 'Brazylijczyk', 'prawa', 8.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Porto', 'Maicon', 'Pereira', 'obronca', 80, '1988-09-14', 'Brazylijczyk', 'prawa', 13.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Porto', 'Jorge Ciro', 'Fucile', 'obronca', 84, '1984-11-19', 'Argentynczyk', 'lewa', 6.5);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Porto', 'Diego Antonio', 'Reyes', 'obronca', 76, '1992-09-19', 'Meksykanin', 'prawa', 15.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Porto', 'Nicolas', 'Otamendi', 'obronca', 80, '1988-02-12', 'Argentynczyk', 'prawa', 11.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Porto', 'Lucho', 'Gonzalez', 'pomocnik', 84, '1981-01-19', 'Argentynczyk', 'prawa', 6.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Porto', 'Marat', 'Izmaylov', 'pomocnik', 78, '1982-09-21', 'Rosjanin', 'lewa', 7.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Porto', 'Hector', 'Herrera', 'pomocnik', 79, '1990-04-19', 'Meksykanin', 'lewa', 9.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Porto', 'Carlos', 'Eduardo', 'pomocnik', 85, '1989-10-17', 'Brazylijczyk', 'prawa', 5.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Porto', 'Steven', 'Defour', 'pomocnik', 81, '1988-04-15', 'Belg', 'prawa', 6.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Porto', 'Ricardo', 'Quaresma', 'napastnik', 83, '1983-09-26', 'Portugalczyk', 'prawa', 2.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Porto', 'Jackson', 'Martinez', 'napastnik', 79, '1986-10-03', 'Kolumbijczyk', 'lewa', 4.0);
INSERT INTO Pilkarz (nazwa_druzyna, imie, nazwisko, pozycja, umiejetnosci, data_ur, narodowosc, preferowana_noga, kurs_strzelca)
VALUES ('FC Porto', 'Juan', 'Quintero', 'napastnik', 76, '1993-01-18', 'Kolumbijczyk', 'prawa', 4.5);


