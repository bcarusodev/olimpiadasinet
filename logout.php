<?php 
include "includes.php";
session_start();
header("refresh:1;url=index.php");
session_destroy();
?>

<html>
  <head>
 <?php 
 $titulo = "Cerrar sesion"; 
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
Cerrando sesion...<br> 
Si no se redirecciona automaticamente, <a class="text-dark" href="logout.php">haga click aqui</a>.<br><br>
</div>
<!-- Pie de pagina  -->
<div class="m-8"><hr><?php getPiePagina(); ?>
  </div>
  
<!-- Fin Pie de pagina  -->
  </body>
</html>