<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <title>eliminare_libro</title>
    </head>
    <body>
        <h1>Eliminare il libro dal database</h1>
        <h2>inserire il codice del libro che si vuole cancellare</h2>
        <form action="../functions/eliminar_libro_function.php" method="post">
            <label for="Codigo:">Coidgo:</label>
            <input type="text" id="codigo" name="codigo" required>
            <br>
            <input type="submit" value="Eliminare libro">
        </form>
    </body>

</html>