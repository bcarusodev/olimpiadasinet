<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes.php';
?>

<html>
  <head>
 <?php
 $titulo = "Añadir Zona";
 getHead($titulo); ?>

   <script>
window.onload = function() {
  mostrarSeleccionado("club","nombre");
}

function mostrarSeleccionado($elementId1,$elementId2){
  var nombreSeleccionado = document.getElementById($elementId1).value;
  document.getElementById($elementId2).innerHTML = nombreSeleccionado;
}

 </script>

  </head>

  <body>
  <div class="container mt-5 border rounded shadow p-3 mb-5 bg-white rounded">
  <div align="center" class="m-3">
    <h1>Problematica Olimpiadas</h1><br>
   <h4><?php echo $titulo; ?></h4>
    <h6><nav aria-label="breadcrumb">
  <ol class="breadcrumb float justify-content-center bg-white">
    <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
    <li class="breadcrumb-item"><a href="../zonas.php">Zonas</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
  </ol>
</nav></h6>
    <br><br>
    <?php
    // isset btn -> Registrar .
    // validamos si todos los campos. (PESO , TIPO , FECHAVACUNACION).
    if (isset ($_POST["tipo"]) && isset ($_POST["capacidad"])) {
        // Asignamos las variables recibidas del GET en variables PHP para el script
        $id = 1;
        $peso = $_POST["tipo"];
        $tipo = $_POST["capacidad"];

        if ($id && $peso && $tipo) {
        // Comenzamos la fase de registro si todos los campos fueron completados
        // Comprobamos que $id y $peso tengan valores numericos validos
        if (is_numeric($id) && is_numeric($peso)) {
            // Y si $id y $peso son numeros y enteros
            if ($id >= 0 && $peso >= 0) {
        // Efectuamos el registro del participante
        if (mysqli_query($con, "INSERT INTO Zona ('id', 'tipo', 'capacidad') VALUES ($id, $tipo, $capacidad)") )
            $msg = "<div class='alert alert-success w-50'>Registrado correctamente</div>";
        }else{
            $msg = "<div class='alert alert-danger w-50'>Se produjo un error al registrar</div>";
        }
    }else{
        $msg = "<div class='alert alert-danger w-50'>Solo se permiten valores enteros (mayores de 0)</div>";
    }
        }else{
        $msg = "<div class='alert alert-danger w-50'>Verifica los campos ingresados</div>";
        }
    }else{
        $msg = "<div class='alert alert-danger w-50'>Faltan rellenar campos</div>";
    }


    ?>
    <?php if (isset($msg)) { echo $msg; } // Muestra mensaje de error si se produce uno ?>
    <form method=POST action="">
  <div class="form-group ml-5 mr-5">
   <!-- <label>ID de Animal</label>
    <input type="text" name="id" class="form-control w-50" maxlength="30" placeholder="Dejar en blanco para que sea automatico" required="" autocomplete="off"> !-->
    <label>ID Zona</label>
    <span id="id" class="input-group-text w-50 justify-content-center">ID 1</span>
  </div>
  <div class="form-group ml-5 mr-5">
    <label>Tipo</label>
    <input type="text" name="tipo" class="form-control w-50" maxlength="30" placeholder="Zona:" required="" autocomplete="off">
  </div>
  <div class="form-group ml-5 mr-5">
    <label>Peso</label>
    <input type="number" name="peso" class="form-control w-50" maxlength="30" placeholder="Capacidad:" required="" autocomplete="off">
  </div>

  <button type="submit" class="btn btn-success mb-2 mt-2">Registrar</button> <button class="btn btn-secondary mb-2 mt-2" onclick="location.href='../menuCompetidor.php'">Cancelar</button></form>
</div>

<!-- Pie de pagina  -->
<div class="m-8"><hr><?php getPiePagina(); ?>
  </div>
<!-- Fin Pie de pagina  -->
  </body>
</html>
