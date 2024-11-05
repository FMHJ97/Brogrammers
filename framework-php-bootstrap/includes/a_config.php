<?php
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/index.php":
			$CURRENT_PAGE = "Index"; 
			//$PAGE_TITLE = "Portfolio";
			break;
		
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "GroundSound";
	}
?>