<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Manage your Loans</title>
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
            <h1 class="display-4">Manage your Loans</h1>

            <form action="loan_table_lettore.php" method="get" class="my-4">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="All your loans">
            </form>
            <form action="ask_loan.php" method="get" class="my-4">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Ask for a loan">
            </form>

        </div>
        
        <a href="lettore_home.php" class="btn go-back-btn">Go HOME</a>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
