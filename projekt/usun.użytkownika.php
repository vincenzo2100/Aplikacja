<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $conn = new mysqli('127.0.0.1', 'root', '', 'SPZJ');

    $query = "DELETE FROM użytkownik WHERE id = '$id'";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();

    if ($conn->query($query) === TRUE) {
        echo "Poprawnie usunięto użytkownika";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>