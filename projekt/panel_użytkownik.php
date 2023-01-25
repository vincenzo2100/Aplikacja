<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="tabela.css">
</head>

<body>
    <?php
    $conn = new mysqli('127.0.0.1', 'root', '', 'SPZJ');
    $query = "SELECT * FROM użytkownik";
    $result = $conn->query($query);
    ?>
    <table>
        <tr>
            <th>Id użytkownika</th>
            <th>Login</th>
            <th>Mail</th>
            <th>Hasło</th>
            <th>Typ użytkownika</th>
            <th>Imię użytkownika</th>
            <th>Nazwisko użytkownika</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Id_użytkownika'] . "</td>";
                echo "<td>" . $row['Login'] . "</td>";
                echo "<td>" . $row['Mail'] . "</td>";
                echo "<td>" . $row['Hasło'] . "</td>";
                echo "<td>" . $row['Typ_użytkownika'] . "</td>";
                echo "<td>" . $row['Imię_użytkownika'] . "</td>";
                echo "<td>" . $row['Nazwisko_użytkownika'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
    Podaj ID użytkownika: <br>
    <form action="modyfikuj_użytkownik.php" method="post">
        <input type="text" id="id" name="id">
        <button onclick="window.location.href = 'modyfikuj_użytkownik.php';">Modyfikuj użytkownika
            <form action="modyfikuj_użytkownik.php" method="post">
                <a href="delete_product.php?id=<?php echo $row['id']; ?>"
                    onclick="return confirm('Czy na pewno chcesz usunąć produkt?');">Usuń</a>

            </form>
    </form>




</body>

</html>