<?php

	session_start();

	if(isset($_SESSION['usuario'])){
		
		include('funciones.php');
		
		if ($_GET['tipo'] != ''){
			$bd = conectarse_bd();
			$sql = 'SELECT idtipopropiedad, tipopropiedad
					FROM tipospropiedades
					WHERE idtipopropiedad='.$_GET['tipo'];
			$tipoAModificar = consulta($sql, $bd);	
		}
		
		include ('tiposFormularioAyM.php');
	}
	else{
		header("Location: consultasBusqueda.php?page=1");
	}
?>