<?php


$db = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$db) {
    die("Connessione al database fallita: " . pg_last_error());
}

$isbn = $_POST['isbn'];
$old_library_id = $_POST['old_library_id'];
$new_library_id = $_POST['new_library_id'];

$sql = "UPDATE copy SET library_id = $3 WHERE copy_id = (
            SELECT copy_id 
            FROM copy 
            WHERE isbn = $1 AND library_id = $2 
            LIMIT 1
        )";
$result = pg_prepare($db, "update_sql", $sql);

if ($result === false) {
    die("Fallo al preparar el query: " . pg_last_error());
}

$result = pg_execute($db, "update_sql", array($isbn, $old_library_id, $new_library_id));
if ($result === false) {
    die("Fallo al ejecutar el query: " . pg_last_error());
} else {
    echo "<script>alert('Copy location updated without errors');</script>";
    echo "<script>window.location.href = '../bibliotecario/manage_books.php';</script>";
}

// Liberar el resultado y cerrar la conexión
pg_free_result($result);
pg_close($db);

?>
