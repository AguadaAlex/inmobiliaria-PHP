<?php
	session_start();

	if(isset($_SESSION['usuario'])){
	
		include('funciones.php');
	
		if ($_GET['caracteristica'] != ''){
			$bd = conectarse_bd();
			$sql = 'SELECT idcaracteristica, caracteristica
					FROM caracteristicaspropiedades
					WHERE idcaracteristica='.$_GET['caracteristica'];
			$caracteristicaAModificar = consulta($sql, $bd);	
		}
		
		include ('caracteristicasFormularioAyM.php');
	}
	else{
		header("Location: consultasBusqueda.php?page=1");	
	}
?>