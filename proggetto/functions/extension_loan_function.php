<?php

$host = "postgres";
$dbname = "juan_barearojo_proggetto";
$user = "juan_barearojo";
$password = "Jbr_02062003+(SQL)";

$db = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$db) {
    die("Connessione al database fallita: " . pg_last_error());
}

$fiscal_code = $_POST['fiscal_code'];
$copy_id = $_POST['copy_id'];
$loan_date = $_POST['loan_date'];

$sql = "UPDATE loan SET expected_return_date = CURRENT_DATE + INTERVAL '10 days' WHERE fiscal_code = $1 AND copy_id = $2 AND loan_date = $3";
$result = pg_prepare($db, "update_sql", $sql);

if ($result === false) {
    die("Fallo al preparar el query: " . pg_last_error());
}

$result = pg_execute($db, "update_sql", array($fiscal_code, $copy_id, $loan_date));
if ($result === false) {
    die("Fallo al ejecutar el query: " . pg_last_error());
} else {
    echo "<script>alert('Loan extended successfully');</script>";
    echo "<script>window.location.href = '../bibliotecario/manage_loans.php';</script>";
}

// Liberar el resultado y cerrar la conexión
pg_free_result($result);
pg_close($db);

?>
