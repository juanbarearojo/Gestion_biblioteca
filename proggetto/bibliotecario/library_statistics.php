<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library Statistics</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 text-center">
        <h1 class="display-4">Get Library Statistics</h1>
    </div>
    <div class="container mt-4">
        <form id="libraryForm" method="post">
            <div class="form-group">
                <label for="searchInput">Library ID:</label>
                <input class="form-control" type="text" id="searchInput" name="searchInput" required>
            </div>
            <div class="form-group text-center">
                <button type="button" class="btn btn-primary btn-lg" onclick="submitForm('statistiche')">Statistiche per sede</button>
                <button type="button" class="btn btn-secondary btn-lg" onclick="submitForm('ritardi')">Ritardi per sede</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function submitForm(searchType) {
            const form = document.getElementById('libraryForm');
            if (searchType === 'statistiche') {
                form.action = '../functions/statistiche_per_ogni_sede_function.php';
            } else if (searchType === 'ritardi') {
                form.action = '../functions/ritardi_per_ogni_sede_function.php';
            }
            form.submit();
        }
    </script>
</body>
</html>
