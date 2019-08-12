<?php
	session_start();

	if(isset($_SESSION['usuario'])){
	
			include ("funciones.php");
	
		if (validarGetNum('tipo')){
			$bd= conectarse_bd();
			$sqlT= 	'DELETE FROM tipospropiedades
					WHERE  idtipopropiedad= '.$_GET['tipo'];	
			mysql_query ($sqlT, $bd);
			
			header("Location: cargarTipos.php?page=1");
		}
	}
	else{
		header("Location: consultasBusqueda.php?page=1");
	}
?>