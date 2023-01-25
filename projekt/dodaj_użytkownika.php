<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="logowanie.css">
</head>

<body>

    <form action="dodaj_użytkownika.php" method="post">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login">
        <br>
        <label for="haslo">Hasło:</label>
        <textarea id="haslo" name="haslo"></textarea>
        <br>
        <label for="imie">Imię:</label>
        <input type="text" id="imie" name="imie">
        <br>
        <label for="nazwisko">Nazwisko:</label>
        <input type="text" id="nazwisko" name="nazwisko">
        <br>
        <label for="mail">Mail:</label>
        <input type="text" id="mail" name="mail">
        <br>
        <label for="typ">Typ użytkownika:</label>
        <select id="typ" name="typ">
            <option value='Trener'>Trener</option>
            <option value='Zawodnik'>Zawodnik</option>
        </select>
        <br>
        <input type="submit" value="Dodaj użytkownika" name="submit">
    </form>


    <?php
    if (isset($_POST['submit'])) {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $mail = $_POST['mail'];
        $typ = $_POST['typ'];


        $conn = new mysqli('127.0.0.1', 'root', '', 'SPZJ');

        $query = "INSERT INTO użytkownik (Login,Mail,Hasło,Typ_użytkownika,Imię_użytkownika,Nazwisko_użytkownika) VALUES ('$login','$haslo','$typ','$imie','$nazwisko','$mail')";

        if ($conn->query($query) === TRUE) {
            echo "Poprawnie dodano użytkownika";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>

</body>

</html>