<?php

   require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");
   
	//Inicio la sesión
	   session_name("UCREADMIN");
	   session_start();
	//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
	if ($_SESSION["AUTH"] != "YES") {
		//si no existe, envio a la página de autentificacion
		header("Location:" . $mysite . "/index.php");
		//ademas salgo de este script
		exit();
   }

?>