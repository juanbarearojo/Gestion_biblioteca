<?php
//configuracin de la base de datos
$host = "postgres";
$dbname = "juan_barearojo_proggetto";
$user = "juan_barearojo";
$password = "Jbr_02062003+(SQL)"

db = pg_connect("host=$host dbanme= $dbname user=$user password=$password")
if(!db){
    die("Conexión a la base de datos fallida: " .preg_last_error())
}

//obtener datos de los formularios
$titulo = $_POST['titulo']
$autor = $_POST['autor']
$edicion = $_POST['edicion']
$descripcion = $_POST['descripcion']
$genero = $_POST['genero']
?>