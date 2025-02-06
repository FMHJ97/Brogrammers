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

	case "/gestion_usuarios.php":
		$CURRENT_PAGE = "Gestion Usuarios";
		$PAGE_TITLE = "Gestion Usuarios";
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
