<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes.php';
session_start();
if(!isset($_SESSION['idUsuario'])) {
  header("location: ../../index.php");
  }
?>

<html>
  <head>
 <?php
 $titulo = "Añadir Animal";
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
    <li class="breadcrumb-item"><a href="../../index.php">Inicio</a></li>
    <li class="breadcrumb-item"><a href="../animales.php">Control Animales</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
  </ol>
</nav></h6>
    <br><br>
    <?php
    if (isset ($_POST["peso"]) && isset ($_POST["tipo"]) && isset ($_POST["fechaVacunacion"])) {
        // Asignamos las variables recibidas del GET en variables PHP para el script
        $peso = $_POST["peso"];
        $tipo = $_POST["tipo"];
        $fechaVacunacion = $_POST["fechaVacunacion"];

        if ($peso && $tipo && $fechaVacunacion) {
        // Comenzamos la fase de registro si todos los campos fueron completados
        // Comprobamos que $peso tengan valores numericos validos
        if (is_numeric($peso)) {
            // Y si $peso son numeros y enteros
            if ($peso >= 0 && $peso <= 500) {
        // Efectuamos el registro del participante
        if (mysqli_query($con, "INSERT INTO `animal` (`id`, `peso`, `tipo`, `fechaVacunacion`) VALUES (NULL, $peso, '$tipo', '$fechaVacunacion')") ) {
            $msg = "<div class='alert alert-success w-50'>Registrado correctamente</div>";
        }else{
            $msg = "<div class='alert alert-danger w-50'>Se produjo un error al registrar</div>";
        }
    }else{
        $msg = "<div class='alert alert-danger w-50'>Ingrese valores válidos.</div>";
    }
        }else{
        $msg = "<div class='alert alert-danger w-50'>Verifica los campos ingresados</div>";
        }
    }else{
        $msg = "<div class='alert alert-danger w-50'>Faltan rellenar campos</div>";
    }
    }

    ?>
    <?php if (isset($msg)) { echo $msg; } // Muestra mensaje de error si se produce uno ?>
    <form method=POST action="">
      * Se asignara un identificador unico (ID) al animal automaticamente.<br>
  <div class="form-group mt-2 ml-5 mr-5">
    <label>Tipo</label>
    <select name="tipo" id="tipo" class="form-control w-50">
      <option value="Vaca">Vaca</option>
      <option value="Ternera">Ternera</option>
      <option value="Ternera">Caballo</option> 
    </select>
  </div>
  <div class="form-group ml-5 mr-5">
    <label>Peso</label>
    <input type="number" name="peso" class="form-control w-50" maxlength="30" placeholder="Expresado en kg" required="" autocomplete="off">
  </div>
  <div class="form-group ml-5 mr-5">
    <label>Fecha de Vacunacion</label>
    <input type="date" name="fechaVacunacion" class="form-control d-block w-50" required="" autocomplete="off"></input>
  </div>

  <button type="submit" class="btn btn-success mb-2 mt-2">Registrar</button> <a class="btn btn-secondary mb-2 mt-2" onclick="location.href='../animales.php'" style="
    color: #fff;
">Cancelar</a></form>
</div>

<!-- Pie de pagina  -->
<div class="m-8"><hr><?php getPiePagina(); ?>
  </div>
<!-- Fin Pie de pagina  -->
  </body>
</html>
