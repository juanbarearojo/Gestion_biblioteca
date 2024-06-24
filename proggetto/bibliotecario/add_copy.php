<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Añadir_libros</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Add Book to the database</h1>
    <form action="../functions/add_copy_function.php" method="post">
        <div class="form-group">
            <label for="ISBN">ISBN:</label>
            <input type="text" class="form-control" id="ISBN" name="ISBN" required>
        </div>
        <div class="form-group">
            <label for="title">Library Id:</label>
            <input type="text" class="form-control" id="library_id" name="library_id" required>
        </div>
        <button type="submit" class="btn btn-primary">Add copy of book</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>