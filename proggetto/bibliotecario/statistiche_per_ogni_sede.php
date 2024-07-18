<?php
session_start(); // Iniciar la sesión antes de cualquier salida
$username = $_SESSION['username'];



$db = pg_connect("host=$host dbname=$dbname user=$user password=$password");
if (!$db) {
    die("Conexión a la base de datos fallida: " . pg_last_error());
}

// Configurar el search_path para asegurar el esquema correcto
$result = pg_query($db, 'SET SEARCH_PATH TO public, juan_barearojo');
if (!$result) {
    die("Setting search path failed: " . pg_last_error());
}

// Obtener el branch_id de la solicitud POST
$branch_id = isset($_POST['branch_id']) ? (int)$_POST['branch_id'] : 0;

if ($branch_id === 0) {
    die("Branch ID inválido.");
}

// Consulta para obtener los datos de estadísticas usando la función
$sql = "SELECT * FROM juan_barearojo.statistiche_per_ogni_sede($branch_id)";

// Ejecutar la consulta
$result = pg_query($db, $sql);

if (!$result) {
    die("Query failed: " . pg_last_error());
}

$statistics = array();

// Procesar los resultados de la consulta
while ($row = pg_fetch_assoc($result)) {
    $statistics[] = array(
        'total_copies' => $row['total_copies'],
        'total_isbns' => $row['total_isbns'],
        'total_loans_in_progress' => $row['total_loans_in_progress']
    );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <title>Library Statistics</title>
    <style>
        .go-back-btn {
            position: absolute;
            bottom: 20px;
            right: 20px;
            font-size: 35px;
            background-color: #ff9800;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">Library Statistics</h2>
                <hr>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Total Copies</th>
                            <th scope="col">Total ISBNs</th>
                            <th scope="col">Total Loans in Progress</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($statistics as $stat): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($stat['total_copies']); ?></td>
                                <td><?php echo htmlspecialchars($stat['total_isbns']); ?></td>
                                <td><?php echo htmlspecialchars($stat['total_loans_in_progress']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="bibliotecario_home.php" class="btn go-back-btn">Go HOME</a>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
pg_close($db);
?>
