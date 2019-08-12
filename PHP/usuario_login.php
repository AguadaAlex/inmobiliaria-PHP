<?php
	session_start();
	
	include('funciones.php');
	
	if( (isset($_POST['usuario']))&&(isset($_POST['pass'])) ){
		$bd= conectarse_bd();
		$sql= 'SELECT nombreusuario
				FROM usuarios
				WHERE nombreusuario= "'.$_POST['usuario'].'" 
				AND clave= "'.$_POST['pass'].'"';
		$arregloLog= consulta($sql, $bd);
		
		if (isset($arregloLog[0])){
			$_SESSION['usuario'] = $_POST['usuario'];
			
			if (validarGetNum('propiedad')){
				header('Location: detallesCargarPropiedad.php?propiedad='.$_GET['propiedad']);
			}
			else{
				header("Location: consultasBusqueda.php?page=1");					
			}
		}	
		else{
			header("Location: consultasBusqueda.php?page=1");
		}
	}
	else{
		header("Location: consultasBusqueda.php?page=1");
	}
?>