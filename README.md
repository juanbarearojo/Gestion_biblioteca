# Proyecto de Gestión de Biblioteca 📚

## Descripción del Proyecto
Este proyecto tiene como objetivo desarrollar una aplicación de base de datos para la gestión de una biblioteca distribuida en diferentes ubicaciones. La aplicación permite a los lectores registrados visualizar información sobre los catálogos y solicitar préstamos de libros, mientras que los bibliotecarios pueden gestionar los libros y ubicaciones, así como registrar devoluciones.

## Funcionalidades Principales
1. **Lectores**:
   - Consultar información sobre los libros del catálogo.
   - Solicitar préstamos de libros especificando el título o el código ISBN.
   - Especificar una ubicación preferida para el préstamo.

2. **Bibliotecarios**:
   - Administrar información sobre los lectores y libros.
   - Insertar y gestionar ubicaciones y libros.
   - Ampliar la duración de los préstamos.
   - Eliminar morosidades de los lectores.

3. **Gestión de Biblioteca**:
   - La biblioteca está distribuida en diferentes ubicaciones, identificadas por un código único.
   - Mantiene información detallada sobre los libros, incluyendo ISBN, título, autores, argumento y editorial.
   - Control de disponibilidad de los libros y su gestión por ubicaciones.
   - Restricciones de préstamos basadas en la cantidad de devoluciones atrasadas y el número máximo de volúmenes prestados.

## Tecnologías Utilizadas
- **Base de Datos**: PostgreSQL, PL/pgSQL
- **Backend**: PHP
- **Frontend**: HTML

## Uso de la Aplicación
### Acceso a la Aplicación
- **Bibliotecarios**: Acceden mediante nombre de usuario y contraseña, pueden cambiar su contraseña y gestionar cuentas de usuarios.
- **Lectores**: Acceden mediante nombre de usuario y contraseña, pueden cambiar su contraseña y solicitar préstamos de libros.

### Funcionalidades
- **Solicitar Préstamos**: Los lectores pueden especificar el ISBN o el título de un libro y solicitar su préstamo. Pueden indicar una ubicación preferida.
- **Gestión de Libros y Ubicaciones**: Los bibliotecarios pueden añadir nuevos libros, eliminar libros no mantenidos, y gestionar las diferentes ubicaciones de la biblioteca.

## Documentación Técnica

## Acceso a la Aplicación
La aplicación desarrollada está accesible en línea a través de la siguiente URL:
[https://studenti.di.unimi.it/juan.barearojo@studenti.unimi.it](https://studenti.di.unimi.it/juan.barearojo@studenti.unimi.it) 🌐
