<?php
	include ("funciones.php");
	
	$bd= conectarse_bd();
	
	if ( $_POST['tipo'] != ''){
		$sqlT= 	'INSERT INTO tipospropiedades (idtipopropiedad, tipopropiedad)
				VALUES (NULL, "'.$_POST['tipo'].'")';
		mysql_query ($sqlT, $bd);
	}
?>