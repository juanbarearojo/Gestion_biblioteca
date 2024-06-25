<?php
session_start(); // Iniciar la sesión antes de cualquier salida

// Verificar si hay filas encontradas en la sesión
$foundRows = isset($_SESSION['books_found_rows']) ? $_SESSION['books_found_rows'] : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <title>Found Books</title>

</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Books Information</h2>
        <hr>
        <?php if (!empty($foundRows)): ?>
            <?php foreach ($foundRows as $row): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="card-text"><strong>ISBN:</strong> <?php echo htmlspecialchars($row['isbn']); ?></p>
                        <p class="card-text"><strong>Title:</strong> <?php echo htmlspecialchars($row['title']); ?></p>
                        <p class="card-text"><strong>Author:</strong> <?php echo htmlspecialchars($row['first_name'] . ' ' . $row['last_name']); ?></p>
                        <p class="card-text"><strong>Publisher:</strong> <?php echo htmlspecialchars($row['publisher']); ?></p>
                        <p class="card-text"><strong>Summary:</strong> <?php echo htmlspecialchars($row['summary']); ?></p>
                        <p class="card-text"><strong>Copy ID:</strong> <?php echo htmlspecialchars($row['copy_id']); ?></p>
                        <p class="card-text"><strong>Status:</strong> <?php echo htmlspecialchars($row['status']); ?></p>
                        <p class="card-text"><strong>Library Id:</strong> <?php echo htmlspecialchars($row['library_id']); ?></p>
                        <p class="card-text"><strong>Address:</strong> <?php echo htmlspecialchars($row['address']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">No books found with the provided ISBN or title.</p>
        <?php endif; ?>
    </div>
    <form action="search_book_ui.php" method="get" class="mt-4">
        <div class="form-group text-center">
            <input class="btn btn-primary btn-lg" type="submit" value="Search Another Book">
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

