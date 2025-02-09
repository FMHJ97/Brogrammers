<?php

require_once 'a_config.php';
require_once '../framework-php-bootstrap/controller/usuarioController.php';


use Google\Service\Oauth2;

//Cuando el index.php es llamado desde Google tras la autenticación
//nos pasa el parámetro "code" mediante una petición get.    
if (isset($_GET["code"])) {
  //Obtenemos el objeto token
  $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

  //Si ha habido algún error en la autenticación, el array asociativo $token 
  //contendrá la variable "error", en caso contrario hay éxito y 
  //ya podemos recuperar los datos del perfil del usuario
  if (!isset($token['error'])) {
    //Set the access token used for requests
    $google_client->setAccessToken($token['access_token']);

    //Store "access_token" value in $_SESSION variable for future use.
    $_SESSION['access_token'] = $token['access_token'];

    //Create Object of Google Service OAuth 2 class
    $google_service = new Oauth2($google_client);

    //Get user profile data from google
    $data = $google_service->userinfo->get();

    //me guardo toda la info en una sesión para si no existe, meterla en Register.php*******************
    $_SESSION['google_data'] = $data;


    //Saco el email para ver si existe en la base de datos
    $email = $data['email'];

    $usuario = UserController::find($email);

    if ($usuario) {
      $_SESSION['logged'] = $usuario;
      //header('Location: index.php');
      $redirect_url = $_SESSION['redirect_after_google'] ?? 'index.php';
      unset($_SESSION['redirect_after_google']); //limpio la variable.

      header("Location: $redirect_url");
      exit;
    } else {
      // Si el usuario no existe, redirigir al registro con un mensaje de alerta
      header("Location: register.php");
      // header("Location: register.php?message=" . urlencode("<div class='alert alert-danger mt-3'>El usuario no existe, regístrese.</div>"));
      exit;
    }
  }
} else {
  // Si no hay código de autenticación, generamos la URL para autenticarse con Google
  $auth_url = $google_client->createAuthUrl();
}


//Si no se ha hecho el login con Google correctamente mostramos un botón para logarse.
// if (!isset($_SESSION['access_token'])) {
//Create a URL to obtain user authorization


//COMENTO EL "IF" PARA QUE APAREZCA SIEMPRE EL BOTÓN AUNQUE ESTÉ LOGADO PARA LAS PRUEBAS QUE ESTOY HACIENDO.
$login_button = '<a href="' . $google_client->createAuthUrl() . '"><img src="/assets/img/google-imagotipo.svg" class="googlebtn"/></a>';


// }
?>