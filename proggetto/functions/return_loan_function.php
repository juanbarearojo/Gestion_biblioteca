<?php

$host = "postgres";
$dbname = "juan_barearojo_proggetto";
$user = "juan_barearojo";
$password = "Jbr_02062003+(SQL)";

$db = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$db) {
    die("Connessione al database fallita: " . pg_last_error());
}

$copy_id = $_POST['copy_id'];
$loan_date = $_POST['loan_date'];

$sql = "UPDATE loan SET actual_return_date = CURRENT_TIMESTAMP WHERE copy_id = $1 AND loan_date = $2";
$result = pg_prepare($db, "update_sql", $sql);

if ($result === false) {
    die("Fallo al preparar el query: " . pg_last_error());
}

$result = pg_execute($db, "update_sql", array($copy_id, $loan_date));
if ($result === false) {
    die("Fallo al ejecutar el query: " . pg_last_error());
} else {
    echo "<script>alert('Return book successfull');</script>";
    echo "<script>window.location.href = '../lettore/manage_loans_lettore.php';</script>";
}

// Liberar el resultado y cerrar la conexión
pg_free_result($result);
pg_close($db);

?>
