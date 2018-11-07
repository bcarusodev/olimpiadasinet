<?php 
include $_SERVER['DOCUMENT_ROOT'].'/includes.php';
?>

<html>
  <head>
 <?php 
 $titulo = "Control Operadores"; 
 getHead($titulo); ?>
  </head>

  <body>
    <div class="container mt-5 border rounded shadow p-3 mb-3 bg-white rounded">
  <div align="center" class="m-3">
    <h1>Problematica Olimpiadas</h1><br>
    <h4>
      <?php echo $titulo; ?></h4>
    <h6><nav aria-label="breadcrumb">
  <ol class="breadcrumb float justify-content-center bg-white">
    <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
  </ol>
</nav></h6>
    <br><br>
    <?php 
  // Se realiza la consulta a la base de datos
if ($resultado = mysqli_query($con,"SELECT * FROM operador LIMIT 15")) {
    // Output: vector con los datos de la tabla
    echo "<table class='table d-float w-50 justify-content-center'>
    <thead>
      <tr align=center>
        <th scope='col'>Nombre y Apellido</th>
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
        <td align=center>".$fila["nombre"]."</td>";
        
      echo "</tr>";
    } while ($fila = mysqli_fetch_array($resultado));
  }

    echo "</tbody>
  </table>";
} else {
    echo ("<strong>Error al obtener los datos</strong>");
}

?>
<br>
<br>
    <a href="operador/anadir.php"><button type="button" class="btn btn-outline-primary btn-lg"><i class="fas fa-user-plus"></i> Añadir operador</button></a>
    <a href="operador/modificar.php"><button type="button" class="btn btn-outline-primary btn-lg"><i class="fas fa-user-edit"></i> Modificar operador</button></a>
    <a href="operador/eliminar.php"><button type="button" class="btn btn-outline-primary btn-lg"><i class="fas fa-user-times"></i> Eliminar operador</button></a>
    <br><br><button class="btn btn-outline-secondary mb-2" onclick="location.href='../index.php'">Volver</button><br>
  </div>
<!-- Pie de pagina  -->
<div class="m-8"><hr><?php getPiePagina(); ?>
  </div>
<!-- Fin Pie de pagina  -->
  </body>
</html>