<?php

$host = "postgres";
$dbname = "juan_barearojo_proggetto";
$user = "juan_barearojo";
$password = "Jbr_02062003+(SQL)";

$db = pg_connect("host = $host dbname=$dbname user=$user password=$password");
if(!db){
    die("Connessione al database fallita:", . pg_last_error());
}
$codigo = $_POST['codigo'];

$sql = DELETE FROM libros_table WHERE codigo = $1;
$result = pg_prepare($db, "insert_sql", $sql);

if ($result === false) {
    die("Fallo al preparar el query: " . pg_last_error());
}

$result = pg_execute($db, "insert_sql", array($titulo, $autor, $edicion, $descripcion, $genero));
if ($result === false) {
    die("Fallo al ejecutar el query: " . pg_last_error());
} else {
    echo "<script>alert('Libro eliminado con éxito');</script>";
    echo "<script>window.location.href = '../bibliotecario/gestion_libros.php';</script>";
}

// Liberar el resultado y cerrar la conexión
pg_free_result($result);
pg_close($db);

?>