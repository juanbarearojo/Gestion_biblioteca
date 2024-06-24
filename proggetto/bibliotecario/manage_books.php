<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Manage Books</title>
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
            <h1 class="display-4">Manage Books</h1>

            <form action="add_book.php" method="get" class="my-4">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Add book to the database">
            </form>
            <form action="add_copy.php" method="get" class="my-4">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Add copy to the database">
            </form>
            <form action="eliminate_copy.php" method="get" class="my-4">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Eliminate copy from one library">
            </form>
            <form action="update_location_copy.php" method="get" class="my-4">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Modify location copy">
            </form>
        </div>
        
        <a href="bibliotecario_home.php" class="btn go-back-btn">Go HOME</a>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
