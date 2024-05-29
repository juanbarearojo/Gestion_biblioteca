<?php
session_start(); // Iniciar la sesión

// Configuración de la base de datos
$host = "postgres";
$dbname = "juan_barearojo_proggetto";
$user = "juan_barearojo";
$password = "Jbr_02062003+(SQL)";

// Conexión a la base de datos
$db = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$db) {
    die("Connection failed: " . pg_last_error());
}

// Obtener datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

// Determinar la tabla según el rol
$table = $role == 'lettore' ? 'lettore_table' : 'bibliotecario_table';

// Preparar y ejecutar la consulta SQL
$sql = "SELECT * FROM $table WHERE usuario = $1 AND password = $2";
$result = pg_prepare($db, "login_query", $sql);

if ($result === false) {
    die("Failed to prepare query: " . pg_last_error());
}

$result = pg_execute($db, "login_query", array($username, $password));

if ($result === false) {
    die("Failed to execute query: " . pg_last_error());
}

// Verificar el resultado
if (pg_num_rows($result) > 0) {
    // Login exitoso, guardar el nombre de usuario en la sesión
    $_SESSION['username'] = $username;
    
    
    // Redirigir según el rol
    if ($role == 'lettore') {
        header("Location: ../lettore/lettore_home.php");
    } else if ($role == 'bibliotecario') {
        header("Location: ../bibliotecario/bibliotecario_home.php");
    }
} else {
    echo "Invalid username or password.";
}

// Liberar el resultado y cerrar la conexión
pg_free_result($result);
pg_close($db);
?>
