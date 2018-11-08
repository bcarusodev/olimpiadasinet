<?php 
include $_SERVER['DOCUMENT_ROOT'].'/includes.php';
?>

<html>
  <head>
 <?php 
 $titulo = "Primer inicio"; 
 getHead($titulo); ?>
  </head>

  <body>
    <div class="container mt-5 border rounded shadow p-3 mb-3 bg-white rounded">
  <div align="center" class="m-3">
    <h1>Problematica Olimpiadas</h1><br>
    <h4><?php echo $titulo; ?></h4>
    <br><br>
    <?php 
    if (isset ($_POST["nombre"])) {
        // Asignamos las variables recibidas del GET en variables PHP para el script
        $nombre = $_POST["nombre"]." ".$_POST["apellido"];
        $usuario = $_POST["usuario"];
        $clave = $_POST["clave"];

        if ($nombre && $usuario && $clave) {
         // Comenzamos la fase de registro si todos los campos fueron completados
        // Efectuamos el registro del operador
        if (mysqli_query($con, "INSERT INTO operador VALUES ('', '$nombre', '$usuario', '$clave')") ) {
            $msg = "<div class='alert alert-success w-50'>Registrado correctamente</div>";
        }else{
            $msg = "<div class='alert alert-danger w-50'>Se produjo un error al registrarse</div>";
        }
        }else{
            $msg = "<div class='alert alert-danger w-50'>Faltan rellenar campos</div>";
        }
        
    }

    ?>
    <strong>IMPORTANTE:</strong> Eliminar este archivo despues de crear el primer usuario<br><br>
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
  <div class="form-group ml-5 mr-5">
    <label>Usuario</label>
    <input type="text" name="usuario" class="form-control w-50" placeholder="Usuario para iniciar sesion" required="" autocomplete="off">
  </div>
    <div class="form-group ml-5 mr-5">
    <label>Clave</label>
    <input type="password" name="clave" class="form-control w-50" placeholder="Clave para iniciar sesion" required="" autocomplete="off">
  </div>
   <button type="submit" class="btn btn-success mb-2 mt-2">Registrar</button></form>

<!-- Pie de pagina  -->
<div class="m-8"><hr><?php getPiePagina(); ?>
  </div>

<!-- Fin Pie de pagina  -->
  </body>
</html>