<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes.php';
?>

<html>
  <head>
 <?php
 $titulo = "Añadir Corral";
 getHead($titulo); ?>
  </head>

  <body>
  <div class="container mt-5 border rounded shadow p-3 mb-5 bg-white rounded">
  <div align="center" class="m-3">
    <h1>Problematica Olimpiadas</h1><br>
   <h4><?php echo $titulo; ?></h4>
    <h6><nav aria-label="breadcrumb">
  <ol class="breadcrumb float justify-content-center bg-white">
    <li class="breadcrumb-item"><a href="../../index.php">Inicio</a></li>
    <li class="breadcrumb-item"><a href="../corrales.php">Control Corrales</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
  </ol>
</nav></h6>
    <br><br>
    <?php
    if (isset ($_POST["tipo"]) && isset ($_POST["capacidad"])) {
        // Asignamos las variables recibidas del GET en variables PHP para el script
        $tipo = $_POST["tipo"];
        $capacidad = $_POST["capacidad"];

        if ($tipo && $capacidad) {
        // Comenzamos la fase de registro si todos los campos fueron completados
        // Comprobamos que $id y $capacidad tengan valores numericos validos
        if (is_numeric($capacidad)) {
            // Y si $id y $peso son numeros y enteros
            if ($capacidad >= 0 && $capacidad <= 500) {
        // Efectuamos el registro
        if (mysqli_query($con, "INSERT INTO `corral` (`id`, `tipo`, `capacidad`) VALUES (NULL, '$tipo', $capacidad)") ) {
            $msg = "<div class='alert alert-success w-50'>Registrado correctamente</div>";
        }else{
            $msg = "<div class='alert alert-danger w-50'>Se produjo un error al registrar</div>";
        }
    }else{
        $msg = "<div class='alert alert-danger w-50'>Ingrese valores válidos</div>";
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
      * Se asignara un identificador unico (ID) al corral automaticamente.<br>
  <div class="form-group mt-2 ml-5 mr-5">
    <label>Tipo de corral</label>
     <select name="tipo" class="form-control w-50">
      <option value="Recepcion">Recepcion</option>
      <option value="Racionamiento">Racionamiento</option>
      <option value="Convalescencia">Convalescencia</option>
    </select>
  </div>

  <label>Capacidad</label>

  <div class="col-auto w-50">
      <div class="input-group mb-2">
        <input type="number" name="capacidad" class="form-control w-50" maxlength="30" placeholder="Expresado en unidades" required="" autocomplete="off"> 
          <div class="input-group-prepend">
          <div class="input-group-text">u</div>
        </div>
      </div>
    </div>


  <button type="submit" class="btn btn-success mb-2 mt-2">Registrar</button> <a class="btn btn-secondary mb-2 mt-2" onclick="location.href='../corrales.php'" style="
    color: #fff;
">Cancelar</a></form>
</div>

<!-- Pie de pagina  -->
<div class="m-8"><hr><?php getPiePagina(); ?>
  </div>
<!-- Fin Pie de pagina  -->
  </body>
</html>
