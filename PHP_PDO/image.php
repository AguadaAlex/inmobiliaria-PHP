<?php
	$cont=$_GET['propiedad'];
	require "devolverProductos.php";
	$productos=new DevolverProductos();
	$arregloF=$productos->getFotos($cont);
	
	
	//header('content type: '.$arregloF[0]['tipoFoto']);
	echo $arregloF[0]['contenidoFoto'];
	//$imagen_data=base64_encode($arregloF[0]['contenidoFoto']);
	//echo "data:".$arregloF[0]['tipoFoto'].";base64,".$imagen_data;
?>