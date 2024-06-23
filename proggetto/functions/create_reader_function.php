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
$fiscal_code= $_POST['fiscal_code'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$password = $_POST['password'];
$services = $_POST['services'];

$sql = "INSERT INTO reader(fiscal_code, first_name, last_name, services,username,pasword) VALUES ($1, $2, $3, $4,$5,$6)";
$result = pg_prepare($db, "insert_sql", $sql);

if ($result === false) {
    die("Fallo al preparar el query: " . pg_last_error());
}

$result = pg_execute($db, "insert_sql", array(fiscal_code, first_name, last_name, services,username,pasword));
if ($result === false) {
    die("Fallo al ejecutar el query: " . pg_last_error());
} else {
    echo "<script>alert('Add book No error');</script>";
    echo "<script>window.location.href = '../bibliotecario/gestion_libros.php';</script>";
}

// Liberar el resultado y cerrar la conexión
pg_free_result($result);
pg_close($db);
?>
