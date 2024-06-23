<?php
session_start(); // Iniciar la sesión

// Configuración de la base de datos
$host = "postgres";
$dbname = "juan_barearojo_proggetto";
$user = "juan_barearojo";
$password = "Jbr_02062003+(SQL)";

// Conexión a la base de datos
$db = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$db) {
    die("Connection failed: " . pg_last_error());
}

// Obtener datos del formulario
$ISBN = $_POST['ISBN'];
$title = $_POST['title'];
$table = "books"; // Asumiendo que la tabla se llama "books"

// Preparar y ejecutar la consulta SQL
if (!empty($ISBN)) {
    // Buscar por ISBN
    $sql = "SELECT * FROM $table WHERE ISBN = $1";
    $result = pg_prepare($db, "search_query", $sql);
    if ($result === false) {
        die("Failed to prepare query: " . pg_last_error());
    }
    $result = pg_execute($db, "search_query", array($ISBN));
} else {
    // Buscar por título si el ISBN está vacío
    $sql = "SELECT * FROM $table WHERE title = $1";
    $result = pg_prepare($db, "search_query", $sql);
    if ($result === false) {
        die("Failed to prepare query: " . pg_last_error());
    }
    $result = pg_execute($db, "search_query", array($title));
}

if ($result === false) {
    die("Failed to execute query: " . pg_last_error());
}

// Verificar el resultado y guardar la fila encontrada
if (pg_num_rows($result) > 0) {
    // Obtener la primera fila del resultado
    $row = pg_fetch_assoc($result);
    
    // Guardar la fila en la sesión
    $_SESSION['found_row'] = $row;

    // Redirigir a la página de resultados
    header("Location: ../lettore/found_book.php");
} else {
    echo "No book found with the provided ISBN or title.";
}

// Liberar el resultado y cerrar la conexión
pg_free_result($result);
pg_close($db);
?>
