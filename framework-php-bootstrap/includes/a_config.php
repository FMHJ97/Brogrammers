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

		case "/restore_password.php":
			$CURRENT_PAGE = "Recuperar Contraseña"; 
			$PAGE_TITLE = "Recuperar Contraseña";
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