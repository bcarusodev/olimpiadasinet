<!DOCTYPE html>
<html>
<head>
	<title>Estadisticas Arduino - Problematica Olimpiadas</title>
	<link href="../css/bootstrap.min.css" rel='stylesheet'>
	<link href="../js/bootstrap.min.js" rel='stylesheet'>
</head>
<body>
	<div class="m-5" align="center">
	<h4>Problematica Olimpiadas</h4>
	<h5 class="text-muted">Estadisticas Arduino</h5>
</div>
	<div class="container shadow rounded border" align=Center>

<?php 
include "conexion.php";
  // Se realiza la consulta a la base de datos
if ($resultado = mysqli_query($con,"SELECT * FROM arduino")) {
    // Output: vector con los datos de la tabla
    echo "<table class='table d-float justify-content-center'>
    <thead>
      <tr align=center>
        <th scope='col'>Fecha</th>
        <th scope='col'>Hora</th>
        <th scope='col'>Valor</th>
        <th scope='col'>Unidad Fisica</th>
        <th scope='col'>Estado Transductor</th>
        <th scope='col'>Duracion de Medicion</th>
        <th scope='col'>Estado de Transmision</th>
      </tr>
    </thead>
    <tbody>"; 

    // Ejecutamos un while que recorra el vector obtenido por la query almacenada en la variable $resultado
$fila = mysqli_fetch_array($resultado);

    if ($fila == null) {
      echo "</table>
         Sin datos";

    }else{
    do { 
        echo "<tr>
         <td align=center>".$fila["fecha"]."</td>
        <td align=center>".$fila["hora"].":".$fila["minuto"]."hs</td>
        <td align=center>".$fila["valor"]."</td>
        <td align=center>".$fila["unidadFisica"]."</td>
         <td align=center>".$fila["estadoTransductor"]."</td>
          <td align=center>".$fila["duracionMedicion"]."seg</td>
           <td align=center>".$fila["estadoTransmision"]."</td></td>";
        
      echo "</tr>";
    } while ($fila = mysqli_fetch_array($resultado));
  }

    echo "</tbody>
  </table>";
} else {
    echo ("<strong>Error al obtener los datos</strong>");
}

?>
</div>
<div class="footer m-5" align="center"><small class="text-muted">EEST N°8 Almafuerte - ET N°1 Otto Krause<br>Bruno Caruso - Franco Sancristobal - Brian Duran - Gonzalo Benavente
</small>
</div>
</body>
</html>