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
    <?php
    $id = $_POST['id'];
    $conn = new mysqli('127.0.0.1', 'root', '', 'SPZJ');
    $query = "SELECT * FROM użytkownik WHERE Id_użytkownika = $id";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    ?>
    <form action="modyfikuj_użytkownik.php" method="post">
        <label for="login">Id użytkownika:</label>
        <input type="text" id="id" name="id" value="<?php echo $row['Id_użytkownika']; ?>">
        <br>
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" value="<?php echo $row['Login']; ?>">
        <br>
        <label for=" haslo">Hasło:</label>
        <input type="text" id="haslo" name="haslo" value="<?php echo $row['Hasło']; ?>">
        <br>
        <label for="imie">Imię:</label>
        <input type="text" id="imie" name="imie" value="<?php echo $row['Imię_użytkownika']; ?>">
        <br>
        <label for="nazwisko">Nazwisko:</label>
        <input type="text" id="nazwisko" name="nazwisko" value="<?php echo $row['Nazwisko_użytkownika']; ?>">
        <br>
        <label for="mail">Mail:</label>
        <input type="text" id="mail" name="mail" value="<?php echo $row['Mail']; ?>">
        <br>
        <label for="typ">Typ użytkownika:</label>
        <select id="typ" name="typ">
            <option value='Trener'>Trener</option>
            <option value='Zawodnik'>Zawodnik</option>
        </select>
        <br>
        <input type="submit" value="Modyfikuj użytkownika" name="submit">
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

        $query = "UPDATE użytkownik SET Login='$login',Mail='$mail',Hasło='$haslo',Typ_użytkownika='$typ',Imię_użytkownika='$imie',Nazwisko_użytkownika='$nazwisko' WHERE ID_użytkownika='$id'";

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