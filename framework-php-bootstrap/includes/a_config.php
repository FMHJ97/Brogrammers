<?php
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/index.php":
			$CURRENT_PAGE = "Index"; 
			$PAGE_TITLE = "GroundSound Festival";
			break;

		case "/login.php":
			$CURRENT_PAGE = "Iniciar Sesión"; 
			$PAGE_TITLE = "Iniciar Sesión";
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

		case "/restore_password.php":
			$CURRENT_PAGE = "Recuperar Contraseña"; 
			$PAGE_TITLE = "Recuperar Contraseña";
			break;	

		case "/gallery.php":
			$CURRENT_PAGE = "Gallery"; 
			$PAGE_TITLE = "Gallery";
			break;			
		
		case "/register.php":
			$CURRENT_PAGE = "Crear Cuenta"; 
			$PAGE_TITLE = "Crear Cuenta";
			break;	

		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "GroundSound Festival";
	}
?>