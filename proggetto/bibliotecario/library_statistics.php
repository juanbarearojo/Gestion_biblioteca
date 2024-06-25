<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Library Statistics</title>
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
        <div class="container mt-5 text-center">
            <h1 class="display-4">Get Library Statistics</h1>
        </div>
        <div class="container mt-4">
            <form id="libraryForm" method="post">
                <div class="form-group">
                    <label for="library_id">Library ID:</label>
                    <input class="form-control" type="text" id="library_id" name="branch_id" required>
                </div>
                <div class="form-group text-center">
                    <button type="button" class="btn btn-primary btn-lg" onclick="submitForm('statistiche')">Statistiche per sede</button>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="submitForm('ritardi')">Ritardi per sede</button>
                </div>
            </form>
        </div>

        <a href="bibliotecario_home.php" class="btn go-back-btn">Go HOME</a>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            function submitForm(searchType) {
                const form = document.getElementById('libraryForm');
                if (searchType === 'statistiche') {
                    form.action = 'statistiche_per_ogni_sede.php';
                } else if (searchType === 'ritardi') {
                    form.action = 'ritardi_per_ogni_sede.php';
                }
                form.submit();
            }
        </script>
    </body>
</html>
