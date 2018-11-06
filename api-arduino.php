<?php 
include "includes.php";
?>

<html>
  <head>
 <?php 
 $titulo = "API Arduino"; 
 getHead($titulo); ?>
  </head>

<body>
<br>
<h3>API Arduino - Problematica de Olimpiadas Programacion</h3>
<?php

if (isset($_GET['numCompetidor']) && isset($_GET['numBoya']) && isset($_GET['hora'])) {
    $numCompetidor = $_GET['numCompetidor'];
    $numBoya = $_GET['numBoya'];
    $hora = $_GET['hora'].":".$_GET['minuto'].":".$_GET['segundo'];

    echo "Valores recibidos:<br>";
    echo "{".$numCompetidor.",".$numBoya.",".$hora."}";
    echo "<br><br>";

    if (mysqli_query($con, "INSERT INTO arduino VALUES ('$numBoya', '$hora', '$numCompetidor')")) {
        echo "Query a db: Exitosa";
    }else{
        echo "Query a db: ";
        printf("Error: %s\n", mysqli_error($con));
    }

}else{
    echo "No se recibieron valores.";
}
?>



</body>


</html>