<?php
	include ("funciones.php");
	$bd= conectarse_bd();
	$arreglo= getDetallesPropiedad($_GET['propiedad'],$bd);
	include("detallesPropiedad.php");
?>