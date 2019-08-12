<?php
	session_start();

	if(isset($_SESSION['usuario'])){
	
		include ("funciones.php");
		
		if (validarGetNum('propiedad')){
			
			$bd= conectarse_bd();
			
			$id= $_GET['propiedad'];
						
			$slqPC= 'SELECT idcaracteristica
					FROM caracteristicaspropiedades_propiedades cp 
					INNER JOIN propiedades p ON p.idpropiedad=cp.idpropiedad
					WHERE p.idpropiedad='.$id;
			$arregloC= consulta($slqPC, $bd);			
			
			foreach($arregloC as $caracteristicas){
				$sqlCP=	deleteCaracteristicasPropiedades($id, $bd);
			}
		
			$sqlP=	'DELETE FROM propiedades
					WHERE idpropiedad= '.$id;			
			
			mysqli_query ( $bd,$sqlP);
			
			header("Location: ../PHP/consultasBusqueda.php?page=1");
		}
	}
	else{
		header("Location: consultasBusqueda.php?page=1");	
	}	
?>