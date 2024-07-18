<?php
// Configuración de la base de datos


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

$sql = "INSERT INTO reader(fiscal_code, first_name, last_name, services,username,password) VALUES ($1, $2, $3, $4,$5,$6)";
$result = pg_prepare($db, "insert_sql", $sql);

if ($result === false) {
    die("Fallo al preparar el query: " . pg_last_error());
}

$result = pg_execute($db, "insert_sql", array($fiscal_code, $first_name, $last_name, $services,$username,$password));
if ($result === false) {
    die("Fallo al ejecutar el query: " . pg_last_error());
} else {
    echo "<script>alert('Add reader without errors');</script>";
    echo "<script>window.location.href = '../bibliotecario/manage_readers.php';</script>";
}

// Liberar el resultado y cerrar la conexión
pg_free_result($result);
pg_close($db);
?>
