<?php
	$servidor="xxx";
	$usuario="xxx";
	$clave="xxx";
	$nombrebd="xxx";

		//Conectamos a la base de datos
	$conexion=new mysqli($servidor,$usuario,$clave,$nombrebd);
		//Pongo el paquete de caracteres
	$conexion->set_charset('UTF8');
?>
