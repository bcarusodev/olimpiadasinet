<?php 
include "includes.php";
include "login.php";
?>

<html>
  <head>
 <?php 
 $titulo = "Identificacion"; 
 getHead($titulo); ?>
  </head>

  <body>  
    <div class="container mt-5 border rounded shadow p-3 mb-5 bg-white rounded contresp">
  <div align="center" class="pt-5 pl-5 pr-5">
    <h1>Problematica Olimpiadas</h1><br>
    <h5><nav aria-label="breadcrumb">
  <ol class="breadcrumb float justify-content-center bg-white">
    <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
  </ol>
</nav></h5>
<form class="form-signin w-50" method="POST" action="">
    <?php if (isset($errLogin)) { echo $errLogin; } ?>
  <h1 class="h3 mb-3 font-weight-normal">Iniciar sesion</h1>
      <label for="inputEmail" class="sr-only">Usuario</label>
      <input type="user" name="user" id="inputEmail" class="form-control" placeholder="Introduzca su usuario" required="" autofocus="" autocomplete="off">
      <label for="inputPassword" class="sr-only">Clave</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Introduzca su clave" required="" autocomplete="off">
            <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Recordar
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Iniciar sesion</button>
    </form><br> 
    <a class="text-muted text-black" href="arduino/index.php">Ver estadisticas de Arduino</a><br>
</div>
<!-- Pie de pagina  -->
<div class="m-8"><hr><?php getPiePagina(); ?>
  </div>
  
<!-- Fin Pie de pagina  -->
  </body>
</html>