<?php

$host = "postgres";
$dbname = "juan_barearojo_proggetto";
$user = "juan_barearojo";
$password = "Jbr_02062003+(SQL)";

$db = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$db) {
    die("Connessione al database fallita: " . pg_last_error());
}

$isbn = $_POST['isbn'];
$library_id = $_POST['library_id'];

$sql = "DELETE FROM copy WHERE copy_id = (
            SELECT copy_id 
            FROM copy 
            WHERE isbn = $1 AND library_id = $2 
            LIMIT 1
        )";
$result = pg_prepare($db, "delete_sql", $sql);

if ($result === false) {
    die("Fallo al preparar el query: " . pg_last_error());
}

$result = pg_execute($db, "delete_sql", array($isbn, $library_id));
if ($result === false) {
    die("Fallo al ejecutar el query: " . pg_last_error());
} else {
    echo "<script>alert('Copy eliminated without errors');</script>";
    echo "<script>window.location.href = '../bibliotecario/manage_books.php';</script>";
}

// Liberar el resultado y cerrar la conexión
pg_free_result($result);
pg_close($db);

?>
