<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes.php';
?>

<html>
  <head>
 <?php
 $titulo = "Modificar Animal";
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
    <li class="breadcrumb-item"><a href="../animales.php">Control Animales</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
  </ol>
</nav></h6>
    <br><br>
    <?php
    if (isset($_POST["idAnimal"]) && isset($_POST["tipo"]) && isset($_POST["peso"]) && isset($_POST["fechaVacunacion"])) {
        // Asignamos las variables recibidas del POST en variables PHP para el script
        $id = $_POST["idAnimal"];
        $tipo = $_POST["tipo"];
        $peso = $_POST["peso"];
        $fechaVacunacion = $_POST["fechaVacunacion"];

        if ($tipo && $peso && $fechaVacunacion && is_numeric($peso)) {
         // Comenzamos la modificacion si los valores estan completos y si son validos
        // Efectuamos el update hacia la db para modificar
        if($peso >= 0 && $peso <=500){
        if (mysqli_query($con, "UPDATE `animal` SET `peso` = '$peso', `tipo` = '$tipo', `fechaVacunacion` = '$fechaVacunacion' WHERE `animal`.`id` = $id") ) {
            $msg = "<div class='alert alert-success w-50'>Modificado correctamente</div>";
        }else{
            $msg = "<div class='alert alert-danger w-50'>Se produjo un error al modificar</div>";
        }
      }else {
        $msg = "<div class='alert alert-danger w-50'>Ingrese valores válidos.</div>";
      }
        }else{
            $msg = "<div class='alert alert-danger w-50'>Faltan rellenar campos</div>";
        }

    }

    ?>
    <?php if (isset($msg)) { echo $msg; } // Muestra mensaje de error si se produce uno ?>
    <form method=POST action="">

   <div class="form-group ml-5 mr-5">
    <label>Seleccionar animal</label>
    <select name="idAnimal" class="form-control w-50" required="" autocomplete="off">
    <?php
    $query = mysqli_query ($con, "SELECT id,tipo,fechaVacunacion FROM animal");
    while ($resultado = mysqli_fetch_array($query)) {
     echo "<option value='".$resultado['id']."'>ID: ".$resultado['id']." - ".$resultado['tipo']." - Vac: ".$resultado['fechaVacunacion']."</option>";
    }

    ?>
    </select>
  </div>

  <div class="form-group ml-5 mr-5">
    <label>Modificar Tipo</label>
    <input type="text" name="tipo" class="form-control w-50" maxlength="30" placeholder="Nombre del animal" required="" autocomplete="off" value="<?php if (!empty($tipo)){ echo $tipo; }?>">
  </div>

  <div class="form-group ml-5 mr-5">
    <label>Modificar Peso</label>
    <input type="number" name="peso" class="form-control w-50" maxlength="30" placeholder="Expresado en kg" required="" autocomplete="off">
  </div>
  <div class="form-group ml-5 mr-5">
    <label>Modificar Fecha de Vacunacion</label>
    <input type="date" name="fechaVacunacion" class="form-control d-block w-50" required="" autocomplete="off"></input>
  </div>

  <button type="submit" class="btn btn-success mb-2 mt-2">Modificar</button> <a class="btn btn-secondary mb-2 mt-2" onclick="location.href='../animales.php'" style="
    color: #fff;
">Cancelar</a></form>
</div>

<!-- Pie de pagina  -->
<div class="m-8"><hr><?php getPiePagina(); ?>
  </div>
<!-- Fin Pie de pagina  -->
  </body>
</html>
