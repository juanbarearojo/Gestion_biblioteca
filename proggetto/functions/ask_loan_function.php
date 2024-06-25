<?php
session_start();

// Configuración de la base de datos
$host = "postgres";
$dbname = "juan_barearojo_proggetto";
$user = "juan_barearojo";
$password = "Jbr_02062003+(SQL)";

$db = pg_connect("host=$host dbname=$dbname user=$user password=$password");
if (!$db) {
    die("Conexión a la base de datos fallida: " . pg_last_error());
}

// Obtener el username del usuario desde la sesión
$username = $_SESSION['username'];

// Buscar el fiscal_code del usuario en la tabla READER
$sql = "SELECT fiscal_code FROM READER WHERE username = $1";
$result = pg_prepare($db, "find_fiscal_code", $sql);
$result = pg_execute($db, "find_fiscal_code", array($username));

if ($result && pg_num_rows($result) > 0) {
    $row = pg_fetch_assoc($result);
    $fiscal_code = $row['fiscal_code'];

    // Obtener datos del formulario
    $isbn = $_POST['ISBN'];
    $title = $_POST['title'];
    $library_id = $_POST['library_id'];

    // Buscar una copia disponible por ISBN o Título
    if (!empty($isbn)) {
        $sql = "SELECT copy_id FROM COPY WHERE isbn = $1 AND library_id = $2 AND status = 'available' LIMIT 1";
        $result = pg_prepare($db, "find_copy_by_isbn", $sql);
        $result = pg_execute($db, "find_copy_by_isbn", array($isbn, $library_id));
    } else {
        $sql = "SELECT c.copy_id FROM COPY c JOIN BOOK b ON c.isbn = b.isbn WHERE b.title = $1 AND c.library_id = $2 AND c.status = 'available' LIMIT 1";
        $result = pg_prepare($db, "find_copy_by_title", $sql);
        $result = pg_execute($db, "find_copy_by_title", array($title, $library_id));
    }

    if ($result && pg_num_rows($result) > 0) {
        $row = pg_fetch_assoc($result);
        $copy_id = $row['copy_id'];

        // Insertar en la tabla LOAN
        $sql = "INSERT INTO LOAN (copy_id, fiscal_code, loan_date, expected_return_date) VALUES ($1, $2, CURRENT_TIMESTAMP, CURRENT_DATE + INTERVAL '10 days')";
        $result = pg_prepare($db, "insert_loan", $sql);
        $result = pg_execute($db, "insert_loan", array($copy_id, $fiscal_code));

        if ($result) {
            echo "<script>alert('Loan successfully created');</script>";
            echo "<script>window.location.href = '../lettore/manage_loans_lettore.php';</script>";
        } else {
            die("Fallo al ejecutar el query de préstamo: " . pg_last_error());
        }
    } else {
        echo "<script>alert('No available copies found');</script>";
        echo "<script>window.location.href = '../lettore/lettore_home.php';</script>";
    }

    // Liberar el resultado y cerrar la conexión
    pg_free_result($result);
} else {
    echo "<script>alert('User not found');</script>";
    echo "<script>window.location.href = '../lettore/lettore_home.php';</script>";
}

pg_close($db);
?>
