<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update location copy</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Update one copy location</h1>
    <form action="../functions/update_location_copy_function.php" method="post">
        <div class="form-group">
            <label for="ISBN">ISBN:</label>
            <input type="text" class="form-control" id="isbn" name="isbn" required>
        </div>
        <div class="form-group">
            <label for="old_library_id">Old library id:</label>
            <input type="text" class="form-control" id="old_library_id" name="old_library_id" required>
        </div>
        <div class="form-group">
            <label for="new_library_id">New library id:</label>
            <input type="text" class="form-control" id="new_library_id" name="new_library_id" required>
        </div>
        <button type="submit" class="btn btn-primary">Update location from one copy</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>