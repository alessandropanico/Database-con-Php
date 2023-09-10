<!DOCTYPE html>
<html>
<head>
    <title>Inserimento Dati</title>
    <!-- Aggiungi link a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php include 'menu.html'; ?>

<div class="container mt-5">
    <h2>Inserisci Dati</h2>
    <form action="insert.php" method="post">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="nome" required>
        </div>
        <div class="form-group">
            <label for="cognome">Cognome:</label>
            <input type="text" class="form-control" name="cognome" required>
        </div>
        <div class="form-group">
            <label for="eta">Età:</label>
            <input type="number" class="form-control" name="eta" required>
        </div>
        <button type="submit" class="btn btn-primary">Inserisci Persona</button>
    </form>

</div>

<!-- Aggiungi link a Bootstrap JS e jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
