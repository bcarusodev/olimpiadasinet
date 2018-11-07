<?php
include "conexion.php";
?>

<html>
  <head>
 <title>API Arduino</title>
  </head>

<body>
<br>
<h3>API Arduino - Problematica de Olimpiadas Programacion</h3>
<?php

if (isset($_GET['fecha']) && isset($_GET['hora']) && isset($_GET['minuto']) && isset($_GET['valor']) && isset($_GET['unidad']) && isset($_GET['estadoTransductor']) && isset($_GET['duracionMedicion']) && isset($_GET['estadoTransmision']) && isset($_GET['clave'])) {

	$fecha = $_GET['fecha'];
	$hora  = $_GET['hora'];
  $minuto = $_GET['minuto'];
	$valor = $_GET['valor'];
	$unidadFisica = $_GET['unidad'];
	$estadoTransductor = $_GET['estadoTransductor'];
	$duracionMedicion  = $_GET['duracionMedicion'];
	$estadoTransmision = $_GET['estadoTransmision'];
  $clave = $_GET['clave'];
  $claveServidor = 4760;

  if ($clave == $claveServidor) {

    echo "Valores recibidos:<br>";
    echo "Fecha: " . $fecha . "<br/>";
    echo "Hora: " . $hora . "<br/>";
    echo "Minuto: " . $minuto . "<br/>";
    echo "Valor: " . $valor . "<br/>";
    echo "Unidad física: " . $unidadFisica . "<br/>";
    echo "Estado del estadoTransductor/actuador: " . $estadoTransductor . "<br/>";
    echo "Duracion de la medición: " . $duracionMedicion . "<br/>";
    echo "Estatus de transmisión: " . $estadoTransmision . "<br/><br/>";

    // se realizan las conversaciones del Arduino (byte) a datos legibles por usuario
    if ($unidadFisica == 1) {
      $unidadFisica = "lt";
    }elseif ($unidadFisica == 2) {
      $unidadFisica = "kg";
    }

     if ($estadoTransductor == 0) {
      $estadoTransductor = "Inactivo";
    }elseif ($estadoTransductor == 1) {
      $estadoTransductor = "Activo";
    }elseif ($estadoTransductor == 2) {
      $estadoTransductor = "Falla";
    }

     if ($estadoTransmision == 1) {
      $estadoTransmision = "Activo";
    }elseif ($estadoTransmision == 2) {
      $estadoTransmision = "Inactivo";
    }

    if (mysqli_query($con, "INSERT INTO `arduino` (`fecha`, `hora`, `minuto`, `valor`, `unidadFisica`, `estadoTransductor`, `duracionMedicion`, `estadoTransmision`) VALUES ($fecha, $hora, $minuto, $valor, '$unidadFisica', '$estadoTransductor', $duracionMedicion, '$estadoTransmision')")) {
        echo "Query a db: Exitosa";
    }else{
        echo "Query a db: ";
        printf("Error: %s\n", mysqli_error($con));
    }
}else{
    echo "No se recibieron valores.";
}
}
?>
</body>


</html>
