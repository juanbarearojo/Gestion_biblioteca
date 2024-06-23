<?php
session_start(); // Iniciar la sesión antes de cualquier salida

$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'bibliotecario';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Home_Bibliotecario</title>
        <!-- Incluir CSS de Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    </head>
    <body>
        <div class="container mt-5">
            <h1 class="display-4">Ciao, <?php echo $username; ?>!</h1>

            <form action="gestion_libros.php" method="get" class="my-4">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Gestionar libros">
            </form>
            <form action="profilo_bibliotecario.php" method="get" class="my-4">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Il tuo profilo">
            </form>
            <form action="manage_readers.php" method="get" class="my-4">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Manage Readers">
            </form>
        </div>
        
        <!-- Incluir JS de Bootstrap y sus dependencias -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
