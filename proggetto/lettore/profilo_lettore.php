<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'N/A';
$password = isset($_SESSION['password']) ? $_SESSION['password'] : 'N/A';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Il tuo profilo</title>
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

    <div class="container mt-5 text-center">
        <h1 class="display-4">Il tuo profilo</h1>
        <h2 class="display-5 mt-4">Il tuo Username: <span class="text-primary"><?php echo $username; ?></span></h2>
        <h2 class="display-5">Il tuo Password: <span class="text-primary"><?php echo $password; ?></span></h2>
    </div>

    <div class="container mt-4" style="max-width: 500px;">
        <form action="../functions/change_password.php" method="post">
            <div class="form-group">
                <label for="password">New Password:</label>
                <input class="form-control" type="password" id="password" name="password" required>
            </div>
            <div class="form-group text-center">
                <input class="btn btn-primary btn-lg" type="submit" value="Change Password">
            </div>
        </form>
    </div>

    <!-- Incluir JS de Bootstrap y sus dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
