<?php
session_start(); // Iniciar la sesión antes de cualquier salida

// Verificar si hay una fila encontrada en la sesión
$foundRow = isset($_SESSION['book_found_row']) ? $_SESSION['book_found_row'] : null;

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
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">Book Information</h2>
                <hr>
                <p class="card-text"><strong>ISBN:</strong> <?php echo $isbn; ?></p>
                <p class="card-text"><strong>Title:</strong> <?php echo $title; ?></p>
                <p class="card-text"><strong>Publisher:</strong> <?php echo $publisher; ?></p>
                <p class="card-text"><strong>Summary:</strong> <?php echo $summary; ?></p>
            </div>
        </div>
    </div>
    <form action="search_book_ui.php" method="get" class="mt-4">
            <div class="form-group text-center">
                <input class="btn btn-primary btn-lg" type="submit" value="Search Another book">
            </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
