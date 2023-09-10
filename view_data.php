<!DOCTYPE html>
<html>
<head>
    <title>Visualizzazione Dati</title>
    <!-- Aggiungi link a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php include 'menu.html'; ?>

<div class="container mt-5">
    <h2>Dati delle Persone</h2>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "eserciziopersone");
    if (!$conn) {
        die("Connessione al database fallita: " . mysqli_connect_error());
    }

    if (isset($_GET['delete'])) {
        $deleteId = $_GET['delete'];
        $deleteQuery = "DELETE FROM persone WHERE id = $deleteId";
        if (mysqli_query($conn, $deleteQuery)) {
            echo '<div class="alert alert-success">Dato eliminato con successo.</div>';
        } else {
            echo '<div class="alert alert-danger">Errore nell\'eliminazione del dato.</div>';
        }
    }

    $query = "SELECT * FROM persone";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo '<table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Cognome</th>
                        <th>Età</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>' . $row["nome"] . '</td>
                    <td>' . $row["cognome"] . '</td>
                    <td>' . $row["eta"] . '</td>
                    <td>
                        <a href="edit_data.php?id=' . $row["id"] . '" class="btn btn-warning btn-sm">Modifica</a>
                        <a href="view_data.php?delete=' . $row["id"] . '" class="btn btn-danger btn-sm">Elimina</a>
                    </td>
                  </tr>';
        }
        echo '</tbody>
            </table>';
    } else {
        echo 'Nessun dato presente nel database.';
    }

    mysqli_close($conn);
    ?>

</div>

<!-- Aggiungi link a Bootstrap JS e jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
