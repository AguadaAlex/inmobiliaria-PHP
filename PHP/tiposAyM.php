<?php
	session_start();

	if(isset($_SESSION['usuario'])){
	
			include ("funciones.php");
		
		if ( (isset($_POST['tipo'])) && ($_POST['tipo'] != '') ){
			$bd= conectarse_bd();
			if ( isset($_POST['id']) && ( $_POST['id'] != '' ) ){
				$sqlT = 'UPDATE tipospropiedades 
						SET  tipopropiedad= "'.$_POST['tipo'].'" 
						WHERE  idtipopropiedad= '.$_POST['id'];
			}
			else{
				$sqlT= 	'INSERT INTO tipospropiedades ( idtipopropiedad,  tipopropiedad)
						VALUES (NULL, "'.$_POST['tipo'].'")';
			}
			mysqli_query ($bd,$sqlT);
			
			header("Location: cargarTipos.php?page=1");
		}
	}
	else{
		header("Location: consultasBusqueda.php?page=1");
	}
?>