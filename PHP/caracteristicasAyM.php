<?php
	session_start();

	if(isset($_SESSION['usuario'])){
		include ("funciones.php");
		
		if ( (isset($_POST['caracteristica'])) && ($_POST['caracteristica'] != '') ){	
			$bd= conectarse_bd();
			if ( isset($_POST['id']) && ( $_POST['id'] != '' ) ){			
				$sqlC = 'UPDATE caracteristicaspropiedades 
						SET caracteristica= "'.$_POST['caracteristica'].'" 
						WHERE idcaracteristica= '.$_POST['id'];
			}
			else{
				$sqlC= 'INSERT INTO caracteristicaspropiedades (idcaracteristica, caracteristica)
						VALUES (NULL, "'.$_POST['caracteristica'].'")';				
			}
			//mysql_query ($sqlC,$bd);
			mysqli_query ($bd,$sqlC);
			header("Location: cargarCaracteristicas.php?page=1");
		}
	}
	else{
		header("Location: consultasBusqueda.php?page=1");	
	}
?>