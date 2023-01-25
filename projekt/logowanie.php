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

    <div class="login-container">
        <div class="heading">Zaloguj się do systemu</div>
        <form action="logowanie.php" method="post">
            <div class="form-row">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="form-row">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-row">
                <a href="phaslo.html" class="forgot-password">Przypomnij hasło?</a>
                <input type="submit" value="Zaloguj">
            </div>

        </form>
        <?php
        $username = $_POST['username'];
        $password = $_POST['password'];
        $conn = new mysqli('127.0.0.1', 'root', '', 'SPZJ');

        $query = "SELECT * FROM użytkownik WHERE Login='$username' AND Hasło='$password'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            session_start();
            $row = $result->fetch_assoc();
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['Typ_użytkownika'] = $row['Typ_użytkownika'];
            header('Location: logowanie.php');
        } else {
            echo "Niepoprawne dane logowania";
        }
        $conn->close();
        ?>
        <?php
        session_start();

        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            header('Location: logowanie.php');
            exit;
        }

        if ($_SESSION['Typ_użytkownika'] === 'Trener') {
            header('Location: trener.php');
        } elseif ($_SESSION['Typ_użytkownika'] === 'Zawodnik') {
            header('Location: trener.php');
        } elseif (($_SESSION['Typ_użytkownika'] === 'Prezes')) {
            header('Location: prezes.php');
        }
        ?>
    </div>



</body>

</html>