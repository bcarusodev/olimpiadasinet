<?php 
include $_SERVER['DOCUMENT_ROOT'].'/includes.php';
?>

<html>
  <head>
 <?php 
 $titulo = "Control Animales"; 
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
if ($resultado = mysqli_query($con,"SELECT * FROM animal LIMIT 15")) {
    // Output: vector con los datos de la tabla
    echo "<table class='table d-float w-50 justify-content-center'>
    <thead>
      <tr align=center>
        <th scope='col'>ID</th>
        <th scope='col'>Tipo</th>
        <th scope='col'>Peso</th>
        <th scope='col'>Fecha de Vacunacion</th>
      </tr>
    </thead>
    <tbody>"; 

    // Ejecutamos un while que recorra el vector obtenido por la query almacenada en la variable $resultado
    while ($fila = mysqli_fetch_array($resultado)) { 
        echo "<tr>
        <td align=center>".$fila["id"]."</td>
        <td align=center>".$fila["tipo"]."</td>
        <td align=center>".$fila["peso"]."</td>
        <td align=center>".$fila["fechaVacunacion"]."</td>";
        
      echo "</tr>";
    }

    echo "</tbody>
  </table>";
} else {
    echo ("<strong>Error al obtener los datos</strong>");
}

?>
<br>
    <br>
    <a href="animal/anadir.php"><button type="button" class="btn btn-outline-primary btn-lg"><i class="fas fa-plus"></i> Añadir animal</button></a>
    <a href="animal/modificar.php"><button type="button" class="btn btn-outline-primary btn-lg"><i class="far fa-edit"></i> Modificar animal</button></a>
    <a href="animal/eliminar.php"><button type="button" class="btn btn-outline-primary btn-lg"><i class="fas fa-trash"></i> Eliminar animal</button></a>
    <br><br><button class="btn btn-outline-secondary mb-2" onclick="location.href='../index.php'">Volver</button><br>
  </div>
<!-- Pie de pagina  -->
<div class="m-8"><hr><?php getPiePagina(); ?>
  </div>
<!-- Fin Pie de pagina  -->
  </body>
</html>