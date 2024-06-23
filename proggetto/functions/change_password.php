<?php
session_start(); // Iniciar la sesión

// Configuración de la base de datos
$host = "postgres";
$dbname = "juan_barearojo_proggetto";
$user = "juan_barearojo";
$password = "Jbr_02062003+(SQL)";

$db = pg_connect("host=$host dbname=$dbname user=$user password=$password");
if (!$db) {
    die("Database connection failed: " . pg_last_error());
}

// Obtener datos del formulario
$username = $_SESSION['username'];
$password_new = $_POST['password'];
$role = $_SESSION['role'];

// Determinar la tabla en función del rol
$table = ($role === 'lettore') ? 'reader' : 'bibliotecario';

// Preparar la consulta para actualizar la contraseña
$sql = "UPDATE $table SET password = $1 WHERE username = $2";
$result = pg_prepare($db, "update_password", $sql);

if ($result === false) {
    die("Failed to prepare the query: " . pg_last_error());
}

// Ejecutar la consulta
$result = pg_execute($db, "update_password", array($password_new, $username));
if ($result === false) {
    die("Failed to execute the query: " . pg_last_error());
} else {
    // Cerrar la sesión
    session_destroy();

    echo "<script>alert('Password changed successfully. Please log in again.');</script>";
    echo "<script>window.location.href = '../../login.php';</script>";
}

// Liberar el resultado y cerrar la conexión
pg_free_result($result);
pg_close($db);
?>
