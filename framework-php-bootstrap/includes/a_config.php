<?php
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/index.php":
			$CURRENT_PAGE = "Index"; 
			//$PAGE_TITLE = "Portfolio";
			break;

		case "/login.php":
			$CURRENT_PAGE = "Login"; 
			$PAGE_TITLE = "Login";
			break;
		
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "GroundSound";
	}
?>