<?php 
include $_SERVER['DOCUMENT_ROOT'].'/includes.php';
?>

<html>
  <head>
 <?php 
 $titulo = "Eliminar Operador"; 
 getHead($titulo); ?>

  <script>
window.onload = function() {
  mostrarSeleccionado("operador","nombre");
}

function mostrarSeleccionado($elementId1,$elementId2){
  var nombreSeleccionado = document.getElementById($elementId1).value;
  document.getElementById($elementId2).innerHTML = nombreSeleccionado;
}

 </script>

  </head>

  <body>
  <div class="container mt-5 border rounded shadow p-3 mb-3 bg-white rounded">
  <div align="center" class="m-3">
    <h1>Problematica Olimpiadas</h1><br>
     <h4><?php echo $titulo; ?></h4>
    <h6><nav aria-label="breadcrumb">
  <ol class="breadcrumb float justify-content-center bg-white">
    <li class="breadcrumb-item"><a href="../../index.php">Inicio</a></li>
    <li class="breadcrumb-item"><a href="../operadores.php">Control Operadores</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
  </ol>
</nav></h6>
   
    <br><br>
    <?php 
    if (isset ($_POST["operador"])) {
        // Asignamos las variables recibidas del GET en variables PHP para el script
        $operador = $_POST["operador"];

        if ($operador) {
         // Comenzamos la fase de registro del participante si todos los campos fueron completados
        // Efectuamos el registro del club
        if (mysqli_query($con, "DELETE FROM operador WHERE nombre = '$operador'") ) {
            $msg = "<div class='alert alert-success w-50'>Eliminado correctamente</div>";
        }else{
            $msg = "<div class='alert alert-danger w-50'>Se produjo un error al eliminar</div>";
        }
        }else{
            $msg = "<div class='alert alert-danger w-50'>Faltan rellenar campos</div>";
        }
        
    }

    ?>
    <?php if (isset($msg)) { echo $msg; } // Muestra mensaje de error si se produce uno ?>
    <form method=POST action="">



 <div class="form-group ml-5 mr-5 mb-4">
    <label>Seleccionar operador</label>
    <select name="operador" id="operador" class="form-control w-50" required="" autocomplete="off" onChange="mostrarSeleccionado('operador','nombre')">
    <?php 
    $query = mysqli_query ($con, "SELECT nombre FROM operador");
    while ($resultado = mysqli_fetch_array($query)) {
     echo "<option name='".$resultado['nombre']."'>".$resultado['nombre']."</option>";
    }
    ?>
    </select>
  </div>

  <label>Operador a eliminar</label>
    <span id="nombre" class="input-group-text w-50 justify-content-center">-</span>
  <br>

  <button type="submit" class="btn btn-danger mb-2 mt-2">Confirmar</button> <a class="btn btn-secondary mb-2 mt-2" onclick="location.href='../operadores.php'" style="
    color: white;
">Cancelar</a></form>

<!-- Pie de pagina  -->
<div class="m-8"><hr><?php getPiePagina(); ?>
  </div>
</div>
<!-- Fin Pie de pagina  -->
  </body>
</html>