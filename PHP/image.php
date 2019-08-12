<?php
	include("funciones.php");

	$bd= conectarse_bd();
	
	$arregloF= getFotos($bd);
	
	//header('content type: '.$arregloF[0]['tipoFoto']);
	//echo $arregloF[0]['contenidoFoto'];	
	echo 'data:'.$arregloF[0]['tipoFoto'].';base64,'.base64_encode($arregloF[0]['contenidoFoto']).;
?>