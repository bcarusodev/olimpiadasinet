<?php
function getHead($titulo) {
    $root = "http://".$_SERVER['SERVER_NAME']; // Directorio root

    ?>
    <title><?php echo "Olimpiadas - ".$titulo; ?></title>
    <!-- Bootstrap -->
    <?php echo "<link href=".$root."/css/bootstrap.min.css rel='stylesheet'>"; ?>
    <?php echo "<script src=".$root."/js/bootstrap.min.js></script>"; ?>

    <!-- CSS adicional -->
    <?php echo "<link href=".$root."/css/tablas.css rel='stylesheet'>"; ?>

    <!-- FontAwesome -->
    <?php echo "<link href=".$root."/css/fontawesome.css rel='stylesheet'>"; ?>
    <?php echo "<script src=".$root."/js/fontawesome.js></script>"; ?>

    <?php 
} // Output: Olimpiadas - nombreTitulo (en el titulo de las paginas)

function getPiePagina() {
    ?>
    <div class="footer p-3" align=center>
<small class="text-muted">EEST N°8 Almafuerte - ET N°1 Otto Krause<br>Bruno Caruso - Franco Sancristobal - Brian Duran - Gonzalo Benavente
</small></div>

<?php
}


function getRanking () {
    include "conexion.php";
    // Categoria Infantiles (a partir de 15 años)
    echo "<span class='d-block p-2 bg-light text-black'><h5 style='
    padding-top: 6px;
    font-size: 14px;
'>CATEGORIA INFANTILES</h5></span>";
    if ($resultado = mysqli_query($con,"SELECT numCompetidor,nombre,edad,club_nombre FROM participante WHERE categoria = 'Infantil'")) {
        echo "<table class='table'>
        <thead>
          <tr>
            <th scope='col'>Numero Competidor</th>
            <th scope='col'>Nombre y Apellido</th>
            <th scope='col'>Edad</th>
            <th scope='col'>Club</th>
          </tr>
        </thead>
        <tbody>"; 
    
        while ($fila = mysqli_fetch_array($resultado)) {
            echo "<tr>
            <th scope='row'>".$fila["numCompetidor"]."</th>
            <td>".$fila["nombre"]."</td>
            <td>".$fila["edad"]."</td>
            <td>".$fila["club_nombre"]."</td>";
  
          echo "</tr>";
        }
    
        echo "</tbody>
      </table>";
    } else {
        echo ("<strong>Error al obtener los datos</strong>");
    }

    // Categoria Juveniles (16 a 17 años)
    echo "<span class='d-block p-2 bg-light text-black'><h5 style='
    padding-top: 6px;
    font-size: 14px;
'>CATEGORIA JUVENILES</h5></span>";
    if ($resultado = mysqli_query($con,"SELECT numCompetidor,nombre,edad,club_nombre FROM participante WHERE categoria = 'Juvenil'")) {
        echo "<table class='table'>
        <thead>
          <tr>
            <th scope='col'>Numero Competidor</th>
            <th scope='col'>Nombre y Apellido</th>
            <th scope='col'>Edad</th>
            <th scope='col'>Club</th>
          </tr>
        </thead>
        <tbody>"; 
    
        while ($fila = mysqli_fetch_array($resultado)) {
            echo "<tr>
            <th scope='row'>".$fila["numCompetidor"]."</th>
            <td>".$fila["nombre"]."</td>
            <td>".$fila["edad"]."</td>
            <td>".$fila["club_nombre"]."</td>";
  
          echo "</tr>";
        }
    
        echo "</tbody>
      </table>";
    } else {
        echo ("<strong>Error al obtener los datos</strong>");
    }

    // Categoria Adultos (18 a 23 años)
    echo "<span class='d-block p-2 bg-light text-black'><h5 style='
    padding-top: 6px;
    font-size: 14px;
'>CATEGORIA ADULTOS</h5></span>";
    if ($resultado = mysqli_query($con,"SELECT numCompetidor,nombre,edad,club_nombre FROM participante WHERE categoria = 'Adulto'")) {
        echo "<table class='table'>
        <thead>
          <tr>
            <th scope='col'>Numero Competidor</th>
            <th scope='col'>Nombre y Apellido</th>
            <th scope='col'>Edad</th>
            <th scope='col'>Club</th>
          </tr>
        </thead>
        <tbody>"; 
    
        while ($fila = mysqli_fetch_array($resultado)) {
            echo "<tr>
            <th scope='row'>".$fila["numCompetidor"]."</th>
            <td>".$fila["nombre"]."</td>
            <td>".$fila["edad"]."</td>
            <td>".$fila["club_nombre"]."</td>";
  
          echo "</tr>";
        }
    
        echo "</tbody>
      </table>";
    } else {
        echo ("<strong>Error al obtener los datos</strong>");
    }

    // Categoria Profesionales (a partir de 24 años)
    echo "<span class='d-block p-2 bg-light text-black'><h5 style='
    padding-top: 6px;
    font-size: 14px;
'>CATEGORIA PROFESIONALES</h5></span>";
    if ($resultado = mysqli_query($con,"SELECT numCompetidor,nombre,edad,club_nombre FROM participante WHERE categoria = 'Profesional'")) {
        echo "<table class='table'>
        <thead>
          <tr>
            <th scope='col'>Numero Competidor</th>
            <th scope='col'>Nombre y Apellido</th>
            <th scope='col'>Edad</th>
            <th scope='col'>Club</th>
          </tr>
        </thead>
        <tbody>"; 
    
        while ($fila = mysqli_fetch_array($resultado)) {
            echo "<tr>
            <th scope='row'>".$fila["numCompetidor"]."</th>
            <td>".$fila["nombre"]."</td>
            <td>".$fila["edad"]."</td>
            <td>".$fila["club_nombre"]."</td>";
  
          echo "</tr>";
        }
    
        echo "</tbody>
      </table>";
    } else {
        echo ("<strong>Error al obtener los datos</strong>");
    }

    }
  

?>