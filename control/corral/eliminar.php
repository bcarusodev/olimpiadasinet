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
 $titulo = "Eliminar Corral"; 
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
    if (isset ($_POST["idCorral"])) {
        // Asignamos las variables recibidas del POST en variables PHP para el script
        $id = $_POST["idCorral"];

        if ($id) {
         // Comenzamos la fase de eliminacion si $id tiene valores validos
        if (mysqli_query($con, "DELETE FROM corral WHERE id = '$id'") ) {
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

   <div class="form-group ml-5 mr-5">
    <label>Seleccionar corral</label>
    <select name="idCorral" class="form-control w-50" required="" autocomplete="off">
    <?php 
    $query = mysqli_query ($con, "SELECT id,tipo,capacidad FROM corral");
    while ($resultado = mysqli_fetch_array($query)) {
    echo "<option value='".$resultado['id']."'>Corral ".$resultado['id']." - ".$resultado['tipo']." - Capacidad: ".$resultado['capacidad']."</option>";
    }
   
    ?>
    </select>
  </div>
  
  <button type="submit" class="btn btn-danger mb-2 mt-2">Eliminar</button> <a class="btn btn-secondary mb-2 mt-2" onclick="location.href='../corrales.php'" style="
    color: #fff;
">Cancelar</a></form>
</div>

<!-- Pie de pagina  -->
<div class="m-8"><hr><?php getPiePagina(); ?>
  </div>
<!-- Fin Pie de pagina  -->
  </body>
</html>