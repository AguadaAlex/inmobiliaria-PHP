<?php

	session_start();

	if(isset($_SESSION['usuario'])){
	
		include ("funciones.php");
		$bd= conectarse_bd();
		$arregloT= getTiposPropiedades($bd);
		
		//Incluye e instancia el paginador
		include 'pagination.class.php';
		$paginador = new pagination;
		// Devuelve tipos por pagina
		$pagTip = $paginador -> generate ($arregloT, 8);
		// Da los link (anterior, siguiente, primero, ultimo)
		$linksPaginador= $paginador->links();
		
		include("tipos.php");
	}
	else{
		header("Location: consultasBusqueda.php?page=1");
	}
?>