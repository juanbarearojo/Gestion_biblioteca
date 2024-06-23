<?php
session_start();
$username = $_SESSION['username'];
$password = $_SESSION['password'];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Il tuo profilo</title>
        <!-- Incluir CSS de Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
   
    </head>
    <body>

        <div class="container mt-5">
            <h1 class="display-4">Il tuo profilo</h1>
            <h2 class = "display-5">Il tuo Username: <?php echo $username;?></h2>
            <h2 class = "display-5">Il tuo Password: <?php echo $password;?></h2>

            <form action="../functions/login.php" method="post">
                <div class="form-group">
                    <label for="password">New Password:</label>
                    <input class="form-control" type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Change Password">
                </div>
            </form>

        </div>


        <!-- Incluir JS de Bootstrap y sus dependencias -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

</html>