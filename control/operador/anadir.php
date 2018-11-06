<?php 
include $_SERVER['DOCUMENT_ROOT'].'/includes.php';
?>

<html>
  <head>
 <?php 
 $titulo = "Añadir Operador"; 
 getHead($titulo); ?>
  </head>

  <body>
    <div class="container mt-5 border rounded shadow p-3 mb-3 bg-white rounded">
  <div align="center" class="m-3">
    <h1>Problematica Olimpiadas</h1><br>
    <h4><?php echo $titulo; ?></h4>
    <h6><nav aria-label="breadcrumb">
  <ol class="breadcrumb float justify-content-center bg-white">
    <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
    <li class="breadcrumb-item"><a href="../registro.php">Registro</a></li>
    <li class="breadcrumb-item"><a href="../menuOperador.php">Control Operadores</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
  </ol>
</nav></h6>
    <br><br>
    <?php 
    if (isset ($_POST["nombre"])) {
        // Asignamos las variables recibidas del GET en variables PHP para el script
        $nombre = $_POST["nombre"]." ".$_POST["apellido"];

        if ($nombre) {
         // Comenzamos la fase de registro si todos los campos fueron completados
        // Efectuamos el registro del operador
        if (mysqli_query($con, "INSERT INTO operador VALUES ('', '$nombre')") ) {
            $msg = "<div class='alert alert-success w-50'>Registrado correctamente</div>";
        }else{
            $msg = "<div class='alert alert-danger w-50'>Se produjo un error al registrarse</div>";
        }
        }else{
            $msg = "<div class='alert alert-danger w-50'>Faltan rellenar campos</div>";
        }
        
    }

    ?>
    <?php if (isset($msg)) { echo $msg; } // Muestra mensaje de error si se produce uno ?>
    <form method=POST action="">
  <div class="form-group ml-5 mr-5">
    <label>Nombre</label>
    <input type="text" name="nombre" class="form-control w-50" placeholder="Nombre" required="" autocomplete="off">
  </div>
  <div class="form-group ml-5 mr-5">
    <label>Apellido</label>
    <input type="text" name="apellido" class="form-control w-50" placeholder="Apellido" required="" autocomplete="off">
  </div>
   <button type="submit" class="btn btn-success mb-2 mt-2">Registrar</button> <button class="btn btn-secondary mt-2 mb-2" onclick="location.href='../menuOperador.php'">Cancelar</button></form>

<!-- Pie de pagina  -->
<div class="m-8"><hr><?php getPiePagina(); ?>
  </div>

<!-- Fin Pie de pagina  -->
  </body>
</html>