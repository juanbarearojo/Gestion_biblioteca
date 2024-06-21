<?php
session_start(); // Iniciar la sesión antes de cualquier salida

$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'bibliotecario';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Home_Bibliotecario</title>
        <!-- Incluir CSS de UIKit -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.6.22/css/uikit.min.css" />
    </head>
    <body>
        <div class="uk-container uk-margin-top">
            <h1 class="uk-heading-line"><span>Ciao, <?php echo $username; ?>!</span></h1>

            <form action="gestion_libros.php" method="get" class="uk-form-stacked uk-margin">
                <input class="uk-button uk-button-primary" type="submit" value="Gestionar libros">
            </form>
            <form action="profilo_bibliotecario.php" method="get" class="uk-form-stacked uk-margin">
                <input class="uk-button uk-button-primary" type="submit" value="Il tuo profilo">
            </form>
        </div>
        
        <!-- Incluir JS de UIKit -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.6.22/js/uikit.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.6.22/js/uikit-icons.min.js"></script>
    </body>
</html>

</html>
