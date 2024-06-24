<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Manage Loans</title>
        <!-- Incluir CSS de Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    </head>
    <body>
        <div class="container mt-5">
            <h1 class="display-4">Manage Loans</h1>

            <form action="loan_table.php" method="get" class="my-4">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="All loans">
            </form>
            <form action="extension_loan.php" method="get" class="my-4">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Extension of Loan">
            </form>
            <form action="bibliotecario_home.php" method="get" class="my-4">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Go back">
            </form>
        </div>
        
        <!-- Incluir JS de Bootstrap y sus dependencias -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>