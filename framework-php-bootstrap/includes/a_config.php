<?php
switch ($_SERVER["SCRIPT_NAME"]) {
	case "/index.php":
		$CURRENT_PAGE = "Index";
		$PAGE_TITLE = "GroundSound Festival";
		break;

	case "/legal.php":
		$CURRENT_PAGE = "Términos Legales";
		$PAGE_TITLE = "Términos Legales";
		break;

	case "/privacy.php":
		$CURRENT_PAGE = "Política de Privacidad";
		$PAGE_TITLE = "Política de Privacidad";
		break;

	case "/venta.php":
		$CURRENT_PAGE = "Política de Venta";
		$PAGE_TITLE = "Política de Venta";
		break;

	case "/cookies.php":
		$CURRENT_PAGE = "Política de Cookies";
		$PAGE_TITLE = "Política de Cookies";
		break;

	case "/tickets.php":
		$CURRENT_PAGE = "Tickets";
		$PAGE_TITLE = "Tickets";
		break;

	case "/ticketing.php":
		$CURRENT_PAGE = "Ticketing";
		$PAGE_TITLE = "Ticketing";
		break;

	case "/parking_camping.php":
		$CURRENT_PAGE = "Parking & Camping";
		$PAGE_TITLE = "Parking & Camping";
		break;

	case "/merch.php":
		$CURRENT_PAGE = "Merch";
		$PAGE_TITLE = "Merch";
		break;

	case "/merch_item.php":
		$CURRENT_PAGE = "Merch Producto";
		$PAGE_TITLE = "Merch Producto";
		break;

	case "/gallery.php":
		$CURRENT_PAGE = "Gallería";
		$PAGE_TITLE = "Galería";
		break;

	case "/restore_password.php":
		$CURRENT_PAGE = "Recuperar Contraseña";
		$PAGE_TITLE = "Recuperar Contraseña";
		break;

	case "/login.php":
		$CURRENT_PAGE = "Iniciar Sesión";
		$PAGE_TITLE = "Iniciar Sesión";
		break;

	case "/register.php":
		$CURRENT_PAGE = "Crear Cuenta";
		$PAGE_TITLE = "Crear Cuenta";
		break;

	case "/cart.php":
		$CURRENT_PAGE = "Carrito";
		$PAGE_TITLE = "Carrito";
		break;

	case "/juegoFMHJ.php":
		$CURRENT_PAGE = "Videojuego FMHJ";
		$PAGE_TITLE = "Videojuego FMHJ";
		break;

	case "/juegoFranRuiz.php":
		$CURRENT_PAGE = "Videojuego Fran Ruiz";
		$PAGE_TITLE = "Videojuego Fran Ruiz";
		break;

	case "/juegoTaylor.php":
		$CURRENT_PAGE = "Videojuego Taylor";
		$PAGE_TITLE = "Videojuego Taylor";
		break;

	case "/about_us.php":
		$CURRENT_PAGE = "Sobre Nosotros";
		$PAGE_TITLE = "Sobre Nosotros";
		break;

	default:
		$CURRENT_PAGE = "Index";
		$PAGE_TITLE = "GroundSound Festival";
}

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('279007024087-f315mee9qtfbnb5caufe20gd5u1en74g.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://' . $_SERVER['SERVER_NAME'] . '/index.php');

// to get the email and profile
$google_client->addScope('email');
$google_client->addScope('profile');
