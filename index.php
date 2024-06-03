<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Incluir CSS de UIKit -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.6.22/css/uikit.min.css" />
</head>
<body>
    <div class="uk-container uk-margin-top">
        <h1>Login</h1>
        <form action="progetto/functions/login.php" method="post" class="uk-form-stacked">
            <div class="uk-margin">
                <label class="uk-form-label" for="username">Username:</label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="text" id="username" name="username" required>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="password">Password:</label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="password" id="password" name="password" required>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="role">Role:</label>
                <div class="uk-form-controls">
                    <select class="uk-select" id="role" name="role" required>
                        <option value="lettore">Lettore</option>
                        <option value="bibliotecario">Bibliotecario</option>
                    </select>
                </div>
            </div>
            <div class="uk-margin">
                <input class="uk-button uk-button-primary" type="submit" value="Login">
            </div>
        </form>
    </div>
    <!-- Incluir JS de UIKit -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.6.22/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.6.22/js/uikit-icons.min.js"></script>
</body>
</html>
