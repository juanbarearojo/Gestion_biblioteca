<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Return a loan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Return a loan</h1>
    <form action="../functions/return_loan_function.php" method="post">
        <div class="form-group">
            <label for="copy_id">Copy of id of the book you want to return:</label>
            <input type="text" class="form-control" id="copy_id" name="copy_id" required>
        </div>
        <div class="form-group">
            <label for="loan_date">Date where the loan was taken:</label>
            <input type="text" class="form-control" id="loan_date" name="loan_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Return book</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>