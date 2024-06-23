<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <title>search_book</title>
</head>
<body>
    <div class="container mt-5 text-center">
        <h1 class="display-4">Search book by ISBN or Title </h1>

    </div>
    <div class="container mt-4" style="max-width: 500px;">
        <form action="../functions/search_book.php" method="post">
            <div class="form-group">
                <label for="ISBN">ISBN:</label>
                <input class="form-control" type="text" id="ISBN" name="ISBN" required>
            </div>
            <div class="form-group text-center">
                <input class="btn btn-primary btn-lg" type="submit" value="Search by ISBN">
            </div>
        </form>

        <form action="../functions/search_book.php" method="post">
            <div class="form-group">
                <label for="title">Title:</label>
                <input class="form-control" type="title" id="title" name="title" required>
            </div>
            <div class="form-group text-center">
                <input class="btn btn-primary btn-lg" type="submit" value="Search by title">
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
