<?php
session_start(); // Iniciar la sesión antes de cualquier salida

$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'bibliotecario';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Home_Bibliotecario</title>
    </head>
    <body>
        <h1>Ciao, <?php echo $username; ?>!</h1>

        <form action="gestion_libros.php" method="get">
            <input type="submit" value="Gestionar libros">
        </form>
        <form action="profilo_bibliotecario.php" method="get">
            <input type="submit" value="Il tuo profilo">
        </form>
    </body>
</html>
