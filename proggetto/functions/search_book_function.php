<?php
session_start(); // Iniciar la sesión



// Conexión a la base de datos
$db = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$db) {
    die("Connection failed: " . pg_last_error());
}

// Obtener datos del formulario
$ISBN = $_POST['ISBN'];
$title = $_POST['title'];
$table = "book"; 

// Preparar y ejecutar la consulta SQL
if (!empty($ISBN)) {
    // Buscar por ISBN
    $sql = "SELECT b.*, a.first_name, a.last_name, c.copy_id, c.status, l.library_id, l.address
            FROM $table b
            LEFT JOIN written_by wb ON b.isbn = wb.isbn
            LEFT JOIN author a ON wb.author_id = a.author_id
            LEFT JOIN copy c ON b.isbn = c.isbn
            LEFT JOIN library l ON c.library_id = l.library_id
            WHERE b.isbn = $1 AND c.status = 'available'";
    $result = pg_prepare($db, "search_query", $sql);
    if ($result === false) {
        die("Failed to prepare query: " . pg_last_error());
    }
    $result = pg_execute($db, "search_query", array($ISBN));
} else {
    // Buscar por título si el ISBN está vacío
    $sql = "SELECT b.*, a.first_name, a.last_name, c.copy_id, c.status, l.library_id, l.address
            FROM $table b
            LEFT JOIN written_by wb ON b.isbn = wb.isbn
            LEFT JOIN author a ON wb.author_id = a.author_id
            LEFT JOIN copy c ON b.isbn = c.isbn
            LEFT JOIN library l ON c.library_id = l.library_id
            WHERE b.title = $1 AND c.status = 'available'";
    $result = pg_prepare($db, "search_query", $sql);
    if ($result === false) {
        die("Failed to prepare query: " . pg_last_error());
    }
    $result = pg_execute($db, "search_query", array($title));
}

if ($result === false) {
    die("Failed to execute query: " . pg_last_error());
}

// Verificar el resultado y guardar las filas encontradas
if (pg_num_rows($result) > 0) {
    // Obtener todas las filas del resultado
    $rows = pg_fetch_all($result);
    
    // Guardar las filas en la sesión
    $_SESSION['books_found_rows'] = $rows;

    // Redirigir a la página de resultados
    header("Location: ../lettore/found_book.php");
} else {
    echo "No book found with the provided ISBN or title.";
}

// Liberar el resultado y cerrar la conexión
pg_free_result($result);
pg_close($db);
?>
