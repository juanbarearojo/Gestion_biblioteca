<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Eliminate Debt</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Eliminate debt from a reader</h1>
    <form action="../functions/eliminate_debt_function.php" method="post">
        <div class="form-group">
            <label for="fiscal_code">Fiscal code of the reader:</label>
            <input type="text" class="form-control" id="fiscal_code" name="fiscal_code" required>
        </div>
        <button type="submit" class="btn btn-primary">Eliminate debt</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>