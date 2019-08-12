<?php
	session_start();

	if(isset($_SESSION['usuario'])){
	
		include ("funciones.php");
	
		if (validarGetNum('caracteristica')){
			$bd= conectarse_bd();
			$sqlC= 	'DELETE FROM caracteristicaspropiedades
					WHERE idcaracteristica= '.$_GET['caracteristica'];
			mysql_query ($sqlC, $bd);
			header("Location: ../PHP/cargarCaracteristicas.php?page=1");
		}
	}
	else{
		header("Location: consultasBusqueda.php?page=1");	
	}
?>