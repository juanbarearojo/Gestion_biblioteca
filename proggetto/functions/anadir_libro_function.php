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
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$edicion = $_POST['edicion'];
$descripcion = $_POST['descripcion'];
$genero = $_POST['genero'];

$sql = "INSERT INTO libros_table(titulo, autor, edición, descripcion, genero) VALUES ($1, $2, $3, $4, $5)";
$result = pg_prepare($db, "insert_sql", $sql);

if ($result === false) {
    die("Fallo al preparar el query: " . pg_last_error());
}

$result = pg_execute($db, "insert_sql", array($titulo, $autor, $edicion, $descripcion, $genero));
if ($result === false) {
    die("Fallo al ejecutar el query: " . pg_last_error());
} else {
    header("Location: ../bibliotecario/gestion_libros.php");
}

// Liberar el resultado y cerrar la conexión
pg_free_result($result);
pg_close($db);
?>
