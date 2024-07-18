<?php



$db = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$db) {
    die("Connessione al database fallita: " . pg_last_error());
}

$fiscal_code = $_POST['fiscal_code'];

$sql = "UPDATE reader SET overdue_count = 0 WHERE fiscal_code = $1";
$result = pg_prepare($db, "update_sql", $sql);

if ($result === false) {
    die("Fallo al preparar el query: " . pg_last_error());
}

$result = pg_execute($db, "update_sql", array($fiscal_code));
if ($result === false) {
    die("Fallo al ejecutar el query: " . pg_last_error());
} else {
    echo "<script>alert('Overdue count updated successfully');</script>";
    echo "<script>window.location.href = '../bibliotecario/manage_readers.php';</script>";
}

// Liberar el resultado y cerrar la conexión
pg_free_result($result);
pg_close($db);

?>
