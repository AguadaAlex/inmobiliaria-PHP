<?php
	session_start();

	if(isset($_SESSION['usuario'])){

		include ("funciones.php");
		$bd= conectarse_bd();
		$arregloC= getCaracteristicasPropiedades($bd);
		
		//Incluye e instancia el paginador
		include 'pagination.class.php';
		$paginador = new pagination;
		// Devuelve caracteristicas por pagina
		$pagCaract = $paginador -> generate ($arregloC, 8);
		// Da los link (anterior, siguiente, primero, ultimo)
		$linksPaginador= $paginador->links();
		
		include("caracteristicas.php");
	}
	else{
		header("Location: consultasBusqueda.php?page=1");	
	}
?>