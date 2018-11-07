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
 $titulo = "Modificar Operador"; 
 getHead($titulo); ?>
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
    if (isset($_POST["nombre"]) && isset($_POST["usuario"]) && isset($_POST["clave"])) {
        // Asignamos las variables recibidas del GET en variables PHP para el script
        $nombre = $_POST["nombre"];
        $id = $_POST["id"];
        $usuario = $_POST["usuario"];
        $clave = $_POST["clave"];

        if ($id && $nombre && $usuario && $clave) {
         // Comenzamos la fase de registro del participante si todos los campos fueron completados
        // Efectuamos el update hacia la db para modificar el nombre del participante
        if (mysqli_query($con, "UPDATE `operador` SET `nombre` = '$nombre', `usuario` = '$usuario',  `clave` = '$clave' WHERE `operador`.`id` = '$id'") ) {
            $msg = "<div class='alert alert-success w-50'>Modificado correctamente</div>";
        }else{
            $msg = "<div class='alert alert-danger w-50'>Se produjo un error al modificar</div>";
        }
        }else{
            $msg = "<div class='alert alert-danger w-50'>Faltan rellenar campos</div>";
        }
        
    }

    ?>
    <?php if (isset($msg)) { echo $msg; } // Muestra mensaje de error si se produce uno ?>
    <form method=POST action="">



 <div class="form-group ml-5 mr-5">
    <label>Seleccionar operador</label>
    <select name="id" id="id" class="form-control w-50" required="" autocomplete="off">
    <?php 
    $query = mysqli_query ($con, "SELECT nombre,usuario FROM operador");
    while ($resultado = mysqli_fetch_array($query)) {
     echo "<option name='".$resultado['id']."'>".$resultado['nombre']." - Usuario: ".$resultado['usuario']."</option>";
    }
   
    ?>
    </select>
  </div>

<label>Modificar datos</label>
  <div class="input-group w-50">
  <div class="input-group-prepend">
    <span class="input-group-text">Nombre y Apellido</span>
  </div>
  <input type="text" name="nombre" id="nombre" aria-label="Nombre" class="form-control" maxlength="45" required="" autocomplete="off">
</div>
<br>
<label>Modificar usuario</label>
  <div class="input-group w-50">
  <div class="input-group-prepend">
    <span class="input-group-text">Usuario</span>
  </div>
  <input type="text" name="usuario" id="usuario" aria-label="Usuario" class="form-control" maxlength="45" required="" autocomplete="off">
</div>
<br>
<label>Modificar clave</label>
  <div class="input-group w-50">
  <div class="input-group-prepend">
    <span class="input-group-text">Clave</span>
  </div>
  <input type="password" name="clave" id="clave" aria-label="Clave" class="form-control" maxlength="45" required="" autocomplete="off">
</div>
  <br>
  <button type="submit" class="btn btn-success mb-2 mt-2">Modificar</button> <a class="btn btn-secondary mb-2 mt-2" onclick="location.href='../operadores.php'" style="
    color: white;
">Cancelar</a></form>


<!-- Pie de pagina  -->
<div class="m-8"><hr><?php getPiePagina(); ?>
  </div>
</div>
<!-- Fin Pie de pagina  -->
  </body>
</html>