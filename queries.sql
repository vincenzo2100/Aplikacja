delimiter //
CREATE TRIGGER trener_update AFTER INSERT ON Użytkownik
FOR EACH ROW 
BEGIN
INSERT IGNORE INTO Trener
SELECT Id_użytkownika,Imię_użytkownika,Nazwisko_użytkownika FROM Użytkownik WHERE Typ_użytkownika='Trener';
END //
delimiter ;


delimiter //
CREATE TRIGGER zawodnik_update AFTER INSERT ON Użytkownik
FOR EACH ROW 
BEGIN
INSERT IGNORE INTO Zawodnik(Id_zawodnika,Imie,Nazwisko)
SELECT Id_użytkownika,Imię_użytkownika,Nazwisko_użytkownika FROM Użytkownik WHERE Typ_użytkownika='Zawodnik';
END //
delimiter ;


INSERT INTO Użytkownik (Login,Mail,Hasło,Typ_użytkownika,Imię_użytkownika,Nazwisko_użytkownika) 
VALUES ('Piotr','as@gmail.com','XD','Prezes','Piotr','Mata');

INSERT INTO Użytkownik (Login,Mail,Hasło,Typ_użytkownika,Imię_użytkownika,Nazwisko_użytkownika) 
VALUES ('hubert','hubert@gmail.com','Hubercik','Trener','Hubert','Mata');

INSERT INTO Użytkownik (Login,Mail,Hasło,Typ_użytkownika,Imię_użytkownika,Nazwisko_użytkownika) 
VALUES ('michal','michal@gmail.com','Michal','Trener','Michał','XYZ');

INSERT INTO Użytkownik (Login,Mail,Hasło,Typ_użytkownika,Imię_użytkownika,Nazwisko_użytkownika) 
VALUES ('Kacper','kacper@gmail.com','Kacper','Trener','Kacper','XYZ');

INSERT INTO Użytkownik (Login,Mail,Hasło,Typ_użytkownika,Imię_użytkownika,Nazwisko_użytkownika) 
VALUES ('Paweł','paweł@gmail.com','Paweł','Trener','Paweł','XYZ');

INSERT INTO Użytkownik (Login,Mail,Hasło,Typ_użytkownika,Imię_użytkownika,Nazwisko_użytkownika) 
VALUES ('Elpapi','elpapi@gmail.com','Elpapi','Prezes','Miguel','Gallardo');

INSERT INTO Użytkownik (Login,Mail,Hasło,Typ_użytkownika,Imię_użytkownika,Nazwisko_użytkownika) 
VALUES ('as','as@gmail.com','as','Zawodnik','Miguel','Gallardo');
INSERT INTO Użytkownik (Login,Mail,Hasło,Typ_użytkownika,Imię_użytkownika,Nazwisko_użytkownika) 
VALUES ('xd','xdd@gmail.com','xd','Zawodnik','Miguel','Gallardo');
INSERT INTO Użytkownik (Login,Mail,Hasło,Typ_użytkownika,Imię_użytkownika,Nazwisko_użytkownika) 
VALUES ('fsd','fsd@gmail.com','fsd','Zawodnik','Miguel','Gallardo');

UPDATE Zawodnik SET Nr_licencji=1234567,Nr_polisy=321313,Nr_telefoniczny=1234566789,Ostatnia_kategoria_wagowa='73kg',Stopień_zaawansowania='DAN',Uprawnienia_sędziowskie=0,Kategoria_wiekowa='Senior',Czy_opłacono_licencję=1 WHERE Id_zawodnika=6;

UPDATE Zawodnik SET Id_grupy=1 WHERE Id_zawodnika=6;
UPDATE Zawodnik SET Id_grupy=2 WHERE Id_zawodnika=7;
UPDATE Zawodnik SET Id_grupy=1 WHERE Id_zawodnika=8;




