<?php
switch ($_SERVER["SCRIPT_NAME"]) {
	case "/about_us.php":
		$CURRENT_PAGE = "Sobre Nosotros";
		$PAGE_TITLE = "Sobre Nosotros";
		break;

	case "/address.php":
		$CURRENT_PAGE = "Address";
		$PAGE_TITLE = "Address";
		break;

	case "/cart.php":
		$CURRENT_PAGE = "Carrito";
		$PAGE_TITLE = "Carrito";
		break;

	case "/contact.php":
		$CURRENT_PAGE = "Contact";
		$PAGE_TITLE = "Contact";
		break;

	case "/cookies.php":
		$CURRENT_PAGE = "Política de Cookies";
		$PAGE_TITLE = "Política de Cookies";
		break;

	case "/dificultades.php":
		$CURRENT_PAGE = "Dificultades";
		$PAGE_TITLE = "Dificultades";
		break;

	case "/gallery.php":
		$CURRENT_PAGE = "Gallería";
		$PAGE_TITLE = "Galería";
		break;

	case "/gestion_galeria.php":
		$CURRENT_PAGE = "Gestion Galeria";
		$PAGE_TITLE = "Gestion Galeria";
		break;

	case "/gestion_merch.php":
		$CURRENT_PAGE = "Gestion Merch";
		$PAGE_TITLE = "Gestion Merch";
		break;

	case "/gestion_usuarios.php":
		$CURRENT_PAGE = "Gestion Usuarios";
		$PAGE_TITLE = "Gestion Usuarios";
		break;

	case "/index.php":
		$CURRENT_PAGE = "Index";
		$PAGE_TITLE = "GroundSound Festival";
		break;

	case "/info.php":
		$CURRENT_PAGE = "Info";
		$PAGE_TITLE = "Info";
		break;

	case "/infogeneral.php":
		$CURRENT_PAGE = "Info General";
		$PAGE_TITLE = "Info General";
		break;

	case "/juegoFMHJ.php":
		$CURRENT_PAGE = "Videojuego FMHJ";
		$PAGE_TITLE = "Videojuego FMHJ";
		break;

	case "/juegoFranRuiz.php":
		$CURRENT_PAGE = "Videojuego Fran Ruiz";
		$PAGE_TITLE = "Videojuego Fran Ruiz";
		break;

	case "/juegoJMPA.php":
		$CURRENT_PAGE = "Videojuego JMPA";
		$PAGE_TITLE = "Videojuego JMPA";
		break;

	case "/juegoTaylor.php":
		$CURRENT_PAGE = "Videojuego Taylor";
		$PAGE_TITLE = "Videojuego Taylor";
		break;

	case "/legal.php":
		$CURRENT_PAGE = "Términos Legales";
		$PAGE_TITLE = "Términos Legales";
		break;

	case "/lineup.php":
		$CURRENT_PAGE = "Lineup";
		$PAGE_TITLE = "Lineup";
		break;

	case "/login.php":
		$CURRENT_PAGE = "Iniciar Sesión";
		$PAGE_TITLE = "Iniciar Sesión";
		break;

	case "/merch_item.php":
		$CURRENT_PAGE = "Merch Producto";
		$PAGE_TITLE = "Merch Producto";
		break;

	case "/merch.php":
		$CURRENT_PAGE = "Merch";
		$PAGE_TITLE = "Merch";
		break;

	case "/parking_camping.php":
		$CURRENT_PAGE = "Parking & Camping";
		$PAGE_TITLE = "Parking & Camping";
		break;

	case "/payment.php":
		$CURRENT_PAGE = "Payment";
		$PAGE_TITLE = "Payment";
		break;

	case "/perfilusuario.php":
		$CURRENT_PAGE = "Perfil Usuario";
		$PAGE_TITLE = "Perfil Usuario";
		break;

	case "/privacy.php":
		$CURRENT_PAGE = "Política de Privacidad";
		$PAGE_TITLE = "Política de Privacidad";
		break;

	case "/register.php":
		$CURRENT_PAGE = "Crear Cuenta";
		$PAGE_TITLE = "Crear Cuenta";
		break;

	case "/restore_password.php":
		$CURRENT_PAGE = "Recuperar Contraseña";
		$PAGE_TITLE = "Recuperar Contraseña";
		break;

	case "/ticketing.php":
		$CURRENT_PAGE = "Ticketing";
		$PAGE_TITLE = "Ticketing";
		break;

	case "/tickets.php":
		$CURRENT_PAGE = "Tickets";
		$PAGE_TITLE = "Tickets";
		break;

	case "/venta.php":
		$CURRENT_PAGE = "Política de Venta";
		$PAGE_TITLE = "Política de Venta";
		break;

	default:
		$CURRENT_PAGE = "Index";
		$PAGE_TITLE = "GroundSound Festival";
}





require_once '../framework-php-bootstrap/controller/productoController.php';
require_once '../framework-php-bootstrap/model/producto.php';
require_once '../framework-php-bootstrap/controller/usuarioController.php';
require_once '../framework-php-bootstrap/model/usuario.php';
require_once '../framework-php-bootstrap/controller/valoracionController.php';
require_once '../framework-php-bootstrap/model/valoracion.php';


//Include Google Client Library for PHP autoload file
require_once __DIR__ . '/../vendor/autoload.php';


//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('975033941456-e68iiht6sbmqkmkjpi70rkf5eorhvbn4.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost:8080/index.php');


$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();






// Verifico si la página actual NO es index.php y le aplico a las demás el bloqueo de cookies
if ($_SERVER['PHP_SELF'] != '/index.php') {
	if (!isset($_COOKIE['groundSoundCookie'])) {
		header('Location: index.php');
		exit();
	}
}
