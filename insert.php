<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = mysqli_connect("localhost", "root", "", "eserciziopersone");
    if (!$conn) {
        die("Connessione al database fallita: " . mysqli_connect_error());
    }

    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $eta = $_POST["eta"];

    $query = "INSERT INTO persone (nome, cognome, eta) VALUES ('$nome', '$cognome', $eta)";

    if (mysqli_query($conn, $query)) {
        echo "Inserimento avvenuto con successo";
        header("Location: view_data.php");


    } else {
        echo "Errore nell'inserimento: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
