<!DOCTYPE html>
<html>

<head>
    <title>Modifica Dati</title>
    <!-- Aggiungi link a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <!-- NAVBAR -->
    <?php include 'menu.html'; ?>


    <div class="container mt-5">
        <h2>Modifica Dati Persona</h2>

        <?php
        $conn = mysqli_connect("localhost", "root", "", "eserciziopersone");
        if (!$conn) {
            die("Connessione al database fallita: " . mysqli_connect_error());
        }

        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $newNome = $_POST['nome'];
            $newCognome = $_POST['cognome'];
            $newEta = $_POST['eta'];

            $updateQuery = "UPDATE persone SET nome='$newNome', cognome='$newCognome', eta='$newEta' WHERE id=$id";
            if (mysqli_query($conn, $updateQuery)) {
                echo '<div class="alert alert-success">Dato modificato con successo.</div>';
                header("Location: view_data.php");
            } else {
                echo '<div class="alert alert-danger">Errore nella modifica del dato.</div>';
            }
        }

        if (isset($_GET['id'])) {
            $editId = $_GET['id'];
            $editQuery = "SELECT * FROM persone WHERE id = $editId";
            $result = mysqli_query($conn, $editQuery);

            if (mysqli_num_rows($result) > 0) {

                $row = mysqli_fetch_assoc($result);
        ?>

                <form method="POST" action="edit_data.php">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" value="<?php echo $row['nome']; ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="cognome">Cognome:</label>
                        <input type="text" id="cognome" name="cognome" value="<?php echo $row['cognome']; ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="eta">Età:</label>
                        <input type="text" id="eta" name="eta" value="<?php echo $row['eta']; ?>" class="form-control">
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Salva Modifiche</button>
                    <button type="submit" name="submit" class="btn btn-warning" onclick="view_data.php">Torna ai Dati</button>
                </form>

        <?php

            } else {
                echo '<div class="alert alert-danger">Nessun dato trovato per l\'ID specificato.</div>';
            }
        }

        mysqli_close($conn);
        ?>

    </div>

    <!-- Aggiungi link a Bootstrap JS e jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>