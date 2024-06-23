<?php
// Configuración de la base de datos
$host = "postgres";
$dbname = "juan_barearojo_proggetto";
$user = "juan_barearojo";
$password = "Jbr_02062003+(SQL)";

$db = pg_connect("host=$host dbname=$dbname user=$user password=$password");
if (!$db) {
    die("Conexión a la base de datos fallida: " . pg_last_error());
}

// Obtener datos de los formularios
$isbn= $_POST['ISBN'];
$title = $_POST['title'];
$summary = $_POST['summary'];
$publisher = $_POST['publisher'];

$sql = "INSERT INTO book(isbn, title, summary, publisher) VALUES ($1, $2, $3, $4)";
$result = pg_prepare($db, "insert_sql", $sql);

if ($result === false) {
    die("Fallo al preparar el query: " . pg_last_error());
}

$result = pg_execute($db, "insert_sql", array($isbn, $title, $summary, $publisher));
if ($result === false) {
    die("Fallo al ejecutar el query: " . pg_last_error());
} else {
    echo "<script>alert('Libro insertado con éxito');</script>";
    echo "<script>window.location.href = '../bibliotecario/gestion_libros.php';</script>";
}

// Liberar el resultado y cerrar la conexión
pg_free_result($result);
pg_close($db);
?>
