<?php 
include "includes.php";
?>

<html>
  <head>
 <?php 
 $titulo = "Tarjeta SD"; 
 getHead($titulo); ?>
  </head>

<body>
<br>
<h3>Tarjeta SD - Problematica de Olimpiadas Programacion</h3>
<?php

if (isset($_GET['nombre']) && isset($_GET['contenido'])) {
    $nombre = $_GET['nombre'];
    $contenido = $_GET['contenido'];

    $direccionArchivo = "C:/xampp/htdocs/".$nombre."";
    echo "Valores recibidos:<br><br>";
    echo "Nombre archivo: ".$nombre;
    echo "<br>";
    echo "Contenido: ".$contenido;
    echo "<br>";

    $ar = fopen($direccionArchivo,"a+");
    fwrite ($ar, "\r\n"); 
    fwrite ($ar, $contenido);
}else{
    echo "No se recibieron valores.";
}
?>

