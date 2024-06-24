<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Eliminate Copy</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            <h1 class="mb-4">Eliminate one copy from a location</h1>
            <form action="../functions/eliminate_copy_function.php" method="post">
                <div class="form-group">
                    <label for="ISBN">ISBN:</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" required>
                </div>
                <div class="form-group">
                    <label for="library_id">Library id:</label>
                    <input type="text" class="form-control" id="library_id" name="library_id" required>
                </div>
                <button type="submit" class="btn btn-primary">Eliminate copy from one location</button>
            </form>
        </div>

        <a href="bibliotecario_home.php" class="btn go-back-btn">Go HOME</a>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>
</html>