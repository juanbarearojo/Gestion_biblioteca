<?php
session_start(); // Iniciar la sesión antes de cualquier salida

// Verificar si hay una fila encontrada en la sesión
$foundRow = isset($_SESSION['found_row']) ? $_SESSION['found_row'] : null;

$isbn = $foundRow ? htmlspecialchars($foundRow['isbn']) : 'N/A';
$title = $foundRow ? htmlspecialchars($foundRow['title']) : 'N/A';
$publisher = $foundRow ? htmlspecialchars($foundRow['publisher']) : 'N/A';
$summary = $foundRow ? htmlspecialchars($foundRow['summary']) : 'N/A';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <title>Found Book</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="display-4 text-center">ISBN: <?php echo $isbn; ?></h1>
        <h2 class="display-4 text-center">Title: <?php echo $title; ?></h2>
        <h3 class="display-4 text-center">Publisher: <?php echo $publisher; ?></h3>
        <h4 class="display-4 text-center">Summary: <?php echo $summary; ?></h4>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
