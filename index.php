<?php 
include "includes.php";
?>

<html>
  <head>
 <?php 
 $titulo = "Inicio"; 
 getHead($titulo); ?>
  </head>

  <body>  
    <div class="container mt-5 border rounded shadow p-3 mb-5 bg-white rounded">
  <div align="center" class="p-5">
    <h1>Problematica Olimpiadas</h1><br>
    <h5><nav aria-label="breadcrumb">
  <ol class="breadcrumb float justify-content-center bg-white">
    <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
  </ol>
</nav></h5><h6 class="text-muted">Estadisticas generales</h6>
    <br><br>

<div class="container">

  <!-- Animales !-->
  <div class="row">
    <div class="col md-4">
    <div class="card text-center">
  <div class="card-header">
    Animales
  </div>
  <div class="card-body">
    <p class="card-text">
       <?php 
  // Se realiza la consulta a la base de datos
if ($resultado = mysqli_query($con,"SELECT * FROM participante LIMIT 5")) {
    // Output: vector con los datos de la tabla
    echo "<table style='font-size: 80%;' cellpadding='4' align=center>
    <thead>
      <tr align=center style='padding: 0.10rem;border: unset;'>
        <th scope='col'>Tipo</th>
        <th scope='col'>Peso</th>
        <th scope='col'>F. Vac.</th>
      </tr>
    </thead>
    <tbody>"; 

    // Ejecutamos un while que recorra el vector obtenido por la query almacenada en la variable $resultado
    while ($fila = mysqli_fetch_array($resultado)) { 
        echo "<tr>
        <td align=center>".$fila["numCompetidor"]."</td>
        <td align=center>".$fila["nombre"]."</td>
        <td align=center>".$fila["edad"]."</td>";
        
      echo "</tr>";
    }

    echo "</tbody>
  </table>";
} else {
    echo ("<strong>Error al obtener los datos</strong>");
}

?>    
    </p>
  </div>
  <div class="card-footer text-muted">
    <a class="text-muted" href="control/animales.php">Ver más</a>
  </div>
</div>
</div>

<!-- Zonas !-->
<div class="col md-4">
    <div class="card text-center">
  <div class="card-header">
    Zonas
  </div>
  <div class="card-body">
    <p class="card-text">
      <?php 
  // Se realiza la consulta a la base de datos
if ($resultado = mysqli_query($con,"SELECT * FROM participante LIMIT 5")) {
    // Output: vector con los datos de la tabla
    echo "<table style='font-size: 80%;' cellpadding='4' align=center>
    <thead>
      <tr align=center>
        <th scope='col'>Tipo</th>
        <th scope='col'>Capacidad</th>
      </tr>
    </thead>
    <tbody>"; 

    // Ejecutamos un while que recorra el vector obtenido por la query almacenada en la variable $resultado
    while ($fila = mysqli_fetch_array($resultado)) { 
        echo "<tr>
        <td align=center>".$fila["numCompetidor"]."</td>
        <td align=center>".$fila["edad"]."</td>";
        
      echo "</tr>";
    }

    echo "</tbody>
  </table>";
} else {
    echo ("<strong>Error al obtener los datos</strong>");
}

?>    
    </p>
  </div>
   <div class="card-footer text-muted">
    <a class="text-muted" href="control/animales.php">Ver más</a>
  </div>
</div>
</div>

<!-- Corrales !-->
<div class="col md-4">
    <div class="card text-center">
  <div class="card-header">
    Corrales
  </div>
  <div class="card-body">
    <p class="card-text">
    Contenido box</p>
  </div>
</div>
</div>

<!-- Operadores !-->
<div class="col md-4">
    <div class="card text-center">
  <div class="card-header">
    Operadores
  </div>
  <div class="card-body">
    <p class="card-text">
    Contenido box</p>
  </div>
</div>
</div>
</div>
<br>
   </div>
  <br>
  <div class="d-block">
  <button type="button" class="btn btn-outline-primary btn-lg ml-2 mr-2" onclick="location.href='control/animales.php'">Control Animales</button>

  <button type="button" class="btn btn-outline-primary btn-lg ml-2 mr-2" onclick="location.href='control/zonas.php'">Control Zonas</button>

  <button type="button" class="btn btn-outline-primary btn-lg ml-2 mr-2" onclick="location.href='control/corrales.php'">Control Corrales</button>

  <button type="button" class="btn btn-outline-primary btn-lg ml-2 mr-2" onclick="location.href='control/operadores.php'">Control Operadores</button>
</div><br>  
</div>
<!-- Pie de pagina  -->
<div class="m-8"><hr><?php getPiePagina(); ?>
  </div></div>
  
<!-- Fin Pie de pagina  -->
  </body>
</html>