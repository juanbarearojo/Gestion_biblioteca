<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Añadir_libros</title>
    </head>
    <body>

        <h1>Añadir libros </h1>
        <form action="../functions/anadir_libro_function.php" method="post">
            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="titulo" required>
            <br>
            <label for="autor">Autor:</label>
            <input type="text" id="autor" name="autor" required>
            <br>
            <label for="edicion">Edicion:</label>
            <input type="text"id="edicion" name="edicion" required>
            <br>
            <label for="descripcion">Descripcion:</label>
            <input type="text"id="descripcion" name="descripcion" required>
            <br>
            <select name="genero" id="genero" required>
                <option value="Ficción">Ficción</option>
                <option value="No Ficción">No Ficción</option>
                <option value="Fantasía">Fantasía</option>
                <option value="Ciencia Ficción">Ciencia Ficción</option>
                <option value="Misterio">Misterio</option>
                <option value="Biografía">Biografía</option>
                <option value="Romance">Romance</option>
            </select>
            <br>
            <input type="submit" value="Añadir libro">

        </form>

    </body>
</html>
