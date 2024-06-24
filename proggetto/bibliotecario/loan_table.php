<?php
session_start(); // Iniciar la sesión antes de cualquier salida
$username = $_SESSION['username'];


// Función para abrir la conexión a PostgreSQL

$host = "postgres";
$dbname = "juan_barearojo_proggetto";
$user = "juan_barearojo";
$password = "Jbr_02062003+(SQL)";

$db = pg_connect("host=$host dbname=$dbname user=$user password=$password");
if (!$db) {
    die("Conexión a la base de datos fallida: " . pg_last_error());
}

// Configurar el search_path para asegurar el esquema correcto
$result = pg_query($db, 'SET SEARCH_PATH TO public');

// Consulta para obtener los datos de préstamos
$sql = "SELECT copy_id, fiscal_code, loan_date, actual_return_date, expected_return_date FROM juan_barearojo.loan" ;

// Ejecutar la consulta
$result = pg_query($db, $sql);

if (!$result) {
    die("Query failed: " . pg_last_error());
}

$loans = array();

// Procesar los resultados de la consulta
while ($row = pg_fetch_assoc($result)) {
    $copy_id = $row['copy_id'];
    $fiscal_code = $row['fiscal_code'];
    $loan_date = $row['loan_date'];
    $actual_return_date = $row['actual_return_date'];
    $expected_return_date = $row['expected_return_date'];

    $loans[] = array($copy_id, $fiscal_code, $loan_date, $actual_return_date, $expected_return_date);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
        <title>Found Loans</title>
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
                    <h2 class="card-title text-center">Loans Information</h2>
                    <hr>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Copy ID</th>
                                <th scope="col">Fiscal Code</th>
                                <th scope="col">Loan Date</th>
                                <th scope="col">Actual Return Date</th>
                                <th scope="col">Expected Return Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($loans as $loan): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($loan[0]); ?></td>
                                    <td><?php echo htmlspecialchars($loan[1]); ?></td>
                                    <td><?php echo htmlspecialchars($loan[2]); ?></td>
                                    <td><?php echo htmlspecialchars($loan[3]); ?></td>
                                    <td><?php echo htmlspecialchars($loan[4]); ?></td>
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
