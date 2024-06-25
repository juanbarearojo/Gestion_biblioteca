<?php
session_start(); // Iniciar la sesión antes de cualquier salida

$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'bibliotecario';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
        <title>Home Lettore</title>
    </head>
    <body>
        <div class="container mt-5">
            <h1 class="display-4 text-center">Ciao <?php echo $username;?></span></h1>

            <form action="search_book_ui.php" method="get" class="mt-4">
                <div class="form-group text-center">
                    <input class="btn btn-primary btn-lg" type="submit" value="Search a book">
                </div>
            </form>
            <form action="profilo_lettore.php" method="get" class="mt-4">
                <div class="form-group text-center">
                    <input class="btn btn-primary btn-lg" type="submit" value="Your Profile">
                </div>
            </form>
            <form action="manage_loans_lettore.php" method="get" class="mt-4">
                <div class="form-group text-center">
                    <input class="btn btn-primary btn-lg" type="submit" value="Loans">
                </div>
            </form>
            <form action="../functions/logout.php" method="post" class="my-4">
                <input class="btn btn-danger btn-lg btn-block" type="submit" value="Logout">
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>

