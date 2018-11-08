<?php 
session_start(); //session_start() crea una sesión para ser usada mediante una petición GET o POST, o pasado por una cookie

// Configuracion de variables
if (isset ($_POST['user']) && isset($_POST['password'])) {
  // Proteccion contra inyecciones SQL
  $usuario = mysqli_real_escape_string($con,$_POST['user']);
  $clave = $_POST['password'];
  // Encriptacion de la clave
$sha1_pass = $clave; //sha1($clave);
// Proteccion contra ataques de fuerza bruta
$intentosSesion = 3; // Define la cantidad de intentos de inicio de sesion permitidos
}


if(!isset($_SESSION['idUsuario'])) //para saber si existe o no ya la variable de sesión que se va a crear cuando el usuario se logee
{
    if(isset($_POST['login'])) //Si la primera condición no pasa, haremos otra preguntando si el boton de login fue presionado
    {
        
        if(verificar_login($usuario,$sha1_pass,$result) == 1) //Si el boton fue presionado llamamos a la función verificar_login() dentro de otra condición preguntando si resulta verdadero y le pasamos los valores ingresados como parámetros.
        {
            /*Si el login fue correcto, registramos las variables de sesión y al mismo tiempo redireccionamos al dashboard.*/
            $_SESSION['idUsuario'] = $result->id;
            $_SESSION['user'] = $usuario;
            header("location: dashboard.php");
        }
        else
        {
    
    setcookie("contadorSesion", 0, time() + (60*2) );  // Crea una Cookie con un tiempo de vida de 2 minutos
    setcookie('contadorSesion',$_COOKIE['contadorSesion']+1);

   if ($_COOKIE["contadorSesion"] >= $intentosSesion) {
      $errLogin = "<i class='fa fa-exclamation-triangle fa-1x' aria-hidden='true'></i> <font size=2px>&nbsp; Llegaste al maximo de inicios de sesion permitidos</font>";
    }
            if ((!empty($_POST['user'])) and (!empty($_POST['password']))) {
      $errLogin = "<div class='alert alert-danger'><i class='fa fa-exclamation-triangle fa-1x' aria-hidden='true'></i> <font size=2px>&nbsp; Usuario o clave incorrecta</font></div>";
      //$errLogin = $_COOKIE["contadorSesion"];
      } else {
      $errLogin = "<i class='fa fa-exclamation-triangle fa-1x' aria-hidden='true'></i> <font size=2px>&nbsp; Introduce el usuario y la clave</font>";
      };
        } //Si la función verificar_login() no pasa, que se muestre un mensaje de error.
    }
   } else {
    // Si la variable de sesión 'idUsuario' ya existe, que redireccione al dashboard
    header("location: dashboard.php");
}
?>