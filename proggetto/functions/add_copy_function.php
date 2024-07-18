<?php
// Configuración de la base de datos


$db = pg_connect("host=$host dbname=$dbname user=$user password=$password");
if (!$db) {
    die("Conexión a la base de datos fallida: " . pg_last_error());
}

// Obtener datos de los formularios
$isbn= $_POST['ISBN'];
$libray_id= $_POST['library_id'];


$sql = "INSERT INTO copy(isbn, library_id) VALUES ($1, $2)";
$result = pg_prepare($db, "insert_sql", $sql);

if ($result === false) {
    die("Fallo al preparar el query: " . pg_last_error());
}

$result = pg_execute($db, "insert_sql", array($isbn, $libray_id));
if ($result === false) {
    die("Fallo al ejecutar el query: " . pg_last_error());
} else {
    echo "<script>alert('Add copy of book No error');</script>";
    echo "<script>window.location.href = '../bibliotecario/manage_books.php';</script>";
}

// Liberar el resultado y cerrar la conexión
pg_free_result($result);
pg_close($db);
?>
