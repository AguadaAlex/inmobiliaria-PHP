<?php
	session_start();

	if(isset($_SESSION['usuario'])){
	
		include ("funciones.php");
		
		$bd= conectarse_bd();
		
		$arregloZ= getZona($bd);
		$arregloE= getEstado($bd);
		$arregloT= getTiposPropiedades($bd);
		$arregloC= getCaracteristicasPropiedades($bd);
		if ( (isset($_GET['propiedad']))&&(validarGetNum('propiedad')) ){
			$arregloD= getDetallesPropiedad($_GET['propiedad'],$bd);
		}
		
		include ("../PHP/AyMFormularioPropiedades.php");
	}
	else{
		header("Location: consultasBusqueda.php?page=1");	
	}
?>