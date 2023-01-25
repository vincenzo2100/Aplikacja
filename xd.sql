
CREATE TABLE `Grupa`
(
	`Id_grupy` INT NOT NULL AUTO_INCREMENT,
	`Liczba_członków` INT NULL,
	`Id_trenera` INT NOT NULL,
	`Imie_trenera` varchar(255) NOT NULL,
	`Nazwisko_trenera` varchar(255) NOT NULL,
	CONSTRAINT `PK_Grupa` PRIMARY KEY (`Id_grupy` ASC)
)

;

CREATE TABLE `HistoriaZawodów`
(
	`Id_zawodnika` INT NOT NULL,
	`Id_zawodów` INT NOT NULL
)

;

CREATE TABLE `Powołanie`
(
	`Id_zawodów` INT NULL,
	`Id_zawodnika` INT NULL,
	`Data_powołania` DATE NULL
)

;

CREATE TABLE `Trener`
(
	`Id_trenera` INT NOT NULL AUTO_INCREMENT,
	`Imie` varchar(255) NOT NULL,
	`Nazwisko` varchar(255) NOT NULL,
	CONSTRAINT `PK_Trener` PRIMARY KEY (`Id_trenera` ASC)
)

;

CREATE TABLE `Użytkownik`
(
	`Id_użytkownika` INT NOT NULL AUTO_INCREMENT,
	`Login` varchar(255) NOT NULL,
	`Mail` varchar(255) NOT NULL,
	`Hasło` varchar(255) NOT NULL,
	`Typ_użytkownika` varchar(255) NOT NULL,
	`Imię_użytkownika` VARCHAR(255) NULL,
	`Nazwisko_użytkownika` VARCHAR(255) NULL,
	CONSTRAINT `PK_Użytkownik` PRIMARY KEY (`Id_użytkownika` ASC)
)

;

CREATE TABLE `Zawodnik`
(
	`Id_zawodnika` INT NOT NULL AUTO_INCREMENT,
	`Imie` varchar(255) NULL,
	`Nazwisko` varchar(255) NULL,
	`Nr_licencji` INT NULL,
	`Nr_polisy` INT NULL,
	`Nr_telefoniczny` INT NULL,
	`Ostatnia_kategoria_wagowa` varchar(255) NULL,
	`Stopień_zaawansowania` varchar(255) NULL,
	`Uprawnienia_sędziowskie` BOOL NULL,
	`Kategoria_wiekowa` VARCHAR(255) NULL,
	`Czy_opłacono_licencję` BOOL NULL,
	`Data_zakończenia_obowiązujących_badań` DATE NULL,
	`Data_zakończenia_polisy` DATE NULL,
	`Zdjęcie` LONGBLOB NULL,
	`Data_urodzenia` DATETIME NULL,
	`Czy_zdolny_do_powołania` BOOL NULL,
	`Id_grupy` INT NULL,
	CONSTRAINT `PK_Zawodnik` PRIMARY KEY (`Id_zawodnika` ASC)
)

;

CREATE TABLE `Zawody`
(
	`Id_zawodów` INT NOT NULL AUTO_INCREMENT,
	`Data` DATE NULL,
	`Miasto` varchar(255) NULL,
	`Treść_komunikatu` varchar(255) NULL,
	CONSTRAINT `PK_Zawody` PRIMARY KEY (`Id_zawodów` ASC)
)

;

/* Create Foreign Key Constraints */

ALTER TABLE `Grupa` 
 ADD CONSTRAINT `FK_Grupa_Trener`
	FOREIGN KEY (`Id_trenera`) REFERENCES `Trener` (`Id_trenera`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `HistoriaZawodów` 
 ADD CONSTRAINT `FK_HistoriaZawodów_Zawodnik`
	FOREIGN KEY (`Id_zawodnika`) REFERENCES `Zawodnik` (`Id_zawodnika`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `HistoriaZawodów` 
 ADD CONSTRAINT `FK_HistoriaZawodów_Zawody`
	FOREIGN KEY (`Id_zawodów`) REFERENCES `Zawody` (`Id_zawodów`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `Powołanie` 
 ADD CONSTRAINT `FK_Powołanie_Zawodnik`
	FOREIGN KEY (`Id_zawodnika`) REFERENCES `Zawodnik` (`Id_zawodnika`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `Powołanie` 
 ADD CONSTRAINT `FK_Powołanie_Zawody`
	FOREIGN KEY (`Id_zawodów`) REFERENCES `Zawody` (`Id_zawodów`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `Trener` 
 ADD CONSTRAINT `FK_Trener_Użytkownik`
	FOREIGN KEY (`Id_trenera`) REFERENCES `Użytkownik` (`Id_użytkownika`) ON DELETE Restrict ON UPDATE Restrict
;

SET FOREIGN_KEY_CHECKS=1
; 
