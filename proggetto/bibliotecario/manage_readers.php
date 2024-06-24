<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Manage Readers</title>
        <!-- Incluir CSS de Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
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
            <h1 class="display-4">Manage Readers</h1>

            <form action="create_reader.php" method="get" class="my-4">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Create a reader account">
            </form>
            <form action="eliminate_debt.php" method="get" class="my-4">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Eliminate reader debt">
            </form>
            <form action="eliminate_reader.php" method="get" class="my-4">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Eliminate reader from system">
            </form>
        </div>
        
        <a href="bibliotecario_home.php" class="btn go-back-btn">Go HOME</a>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
