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
    <?php echo "<link href=".$root."/css/fixes.css rel='stylesheet'>"; ?>

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

function obtenerMedida ($tipo) {
    $tipo = strtolower($tipo);
    if ($tipo == "alimentacion") {
          return "kg";
        }elseif ($tipo == "bebedero") {
          return "ml";
        }elseif ($tipo == "recepcion" OR $tipo == "racionamiento" OR $tipo == "convalescencia"){
            return "u";
        }
}

?>