<?php 
include "includes.php";
?>

<html>
  <head>
 <?php 
 $titulo = "API Arduino"; 
 getHead($titulo); ?>
  </head>

<body>
<br>
<h3>API Arduino - Problematica de Olimpiadas Programacion</h3>
<?php

if (isset($_GET['fecha']) && isset($_GET['hora']) && isset($_GET['minuto']) && isset($_GET['valor']) && isset($_GET['unidadFisica']) && isset($_GET['estadoTransductor']) && isset($_GET['duracionMedicion']) && isset($_GET['estadoTransmision']) {
	$fecha = $_GET['fecha'];
	$hora = $_GET['hora'].":".$_GET['minuto'];
	$valor = $_GET['valor'];
	$unidadFisica = $_GET['unidadFisica'];
	$estadoTransductor = $_GET['estadoTransductor'];
	$duracionMedicion = $_GET['duracionMedicion'];
	$estadoTransmision = $_GET['estadoTransmision'];

    echo "Valores recibidos:<br>";
    echo "{".$numCompetidor.",".$numBoya.",".$hora."}";
    echo "<br><br>";

    if (mysqli_query($con, "INSERT INTO arduino VALUES ('$numBoya', '$hora', '$numCompetidor')")) {
        echo "Query a db: Exitosa";
    }else{
        echo "Query a db: ";
        printf("Error: %s\n", mysqli_error($con));
    }

}else{
    echo "No se recibieron valores.";
}
?>



</body>


</html>