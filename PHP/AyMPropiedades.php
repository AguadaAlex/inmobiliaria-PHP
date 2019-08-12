<?php

	session_start();

	if(isset($_SESSION['usuario'])){
	
		include ("funciones.php");

		$bd= conectarse_bd();
		
		//Validacion de los parametros, si no hay, no inserta ni modifica.
		if ( 	( validarPostChar('estado') )&&
				( validarPostNum('tipo')	)&&
				( validarPostChar('zona') 	)&&
				( validarPostChar('calle') 	)
			){
			
				if ( ($_FILES["file"]["type"] == "image/jpeg")||($_FILES["file"]["type"] == "image/gif")||($_FILES["file"]["type"] == "image/png") 
					 ) {

						if ($_FILES["file"]["error"] > 0){
							echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
						}
						else{
							$name=$_FILES["file"]["name"];
							$tipoFoto = $_FILES["file"]["type"];
							$tmp=$_FILES["file"]["tmp_name"];
							$contenidoFoto = addslashes( file_get_contents($_FILES['file']['tmp_name']) );
						//echo $name.'<br>'.$tmp;
							//$folder='../image';
							//move_uploaded_file($tmp,$folder.'/'.$name);
							 //$contenidoFoto = file_get_contents($folder.'/'.$name) ;
							 //$contenido= mysqli_real_escape_string($bd,$tmp);
						//$contenidoFoto = addslashes( file_get_contents($_FILES['file']['tmp_name']) );
						}
				}
				else{
				echo"que paso";
					echo "Invalid file";
				}
			
			
			$tipo= $_POST['tipo'];
			$estado = $_POST['estado'];
			$zona= $_POST['zona'];
			$calle= $_POST['calle'];
			$precio= $_POST['precio'];
			$banios= $_POST['banios'];
			$hab= $_POST['ambientes'];
			$nro= $_POST['nro'];
			$piso= $_POST['piso'];
			$dpto= $_POST['dpto'];
			$obs= $_POST['observaciones'];
			
			if ( isset($_POST['id']) && ( $_POST['id'] != '' ) ){

				$id= $_POST['id'];

				$sqlP = 'UPDATE propiedades 
						SET idtipopropiedad= '.$tipo.',
						estado= "'.$estado.'",
						zona= "'.$zona.'",
						calle= "'.$calle.'",
						precio= '.$precio.',
						cantbanos= '.$banios.',
						cantambientes= '.$hab.',
						nro= '.$nro.',
						piso= '.$piso.',
						dpto= "'.$dpto.'",
						observaciones= "'.$obs.'"';
						
				if($_FILES["file"]["size"] > 0){
					$sqlP= $sqlP.', contenidoFoto= "'.$contenidoFoto.'",
									tipoFoto= "'.$tipoFoto.'" ';
				}
				
				$sqlP= $sqlP.'WHERE idpropiedad= '.$id;
				
				mysqli_query ( $bd,$sqlP);
				
				if ( isset($_POST['caracteristica']) ){
				
					$caracteristicas = $_POST['caracteristica'];
					$sqlCa=	deleteCaracteristicasPropiedades ($id, $bd);
					
					foreach($caracteristicas as $idcaracteristica){
						$sqlC= 'INSERT INTO caracteristicaspropiedades_propiedades (idpropiedad, idcaracteristica)
								VALUES ('.$id.', '.$idcaracteristica.')';
						mysqli_query ( $bd,$sqlC);
					}
				}
				header("Location: detallesCargarPropiedad.php?propiedad=".$id);
			}
			else{	
				
				if($_FILES["file"]["size"] > 0){
					$sql= 'INSERT INTO propiedades (idpropiedad, idtipopropiedad, calle, nro, piso, dpto, estado, precio, zona, cantambientes, cantbanos, tipoFoto,contenidoFoto, observaciones)
						   VALUES (NULL, '.$tipo.', "'.$calle.'", '.$nro.', '.$piso.', "'.$dpto.'", "'.$estado.'", '.$precio.', "'.$zona.'", '.$hab.', '.$banios.',"'.$tipoFoto.'","'.$contenidoFoto.'", "'.$obs.'")';
				}
				else{
					$sql= 'INSERT INTO propiedades (idpropiedad, idtipopropiedad, calle, nro, piso, dpto, estado, precio, zona, cantambientes, cantbanos, observaciones)
						   VALUES (NULL, '.$tipo.', "'.$calle.'", '.$nro.', '.$piso.', "'.$dpto.'", "'.$estado.'", '.$precio.', "'.$zona.'", '.$hab.', '.$banios.', "'.$obs.'")';
				}
				
				if (!mysqli_query($bd,$sql)) {
					die('Invalid query: ' . mysqli_error($bd));
				}
			
				$idP= mysqli_insert_id($bd);					
					
				// Si la propiedad tiene caracteristicas se las agrega (puede no tenerlas).
				if(  (isset($_POST['caracteristica']))&&(($_POST['caracteristica']) > 0)  ){
					$caracteristicas = $_POST['caracteristica'];
					
					//El siguiente sql busca el id la propiedad recien insertada guardandola como id.
					$idP= mysqli_insert_id($bd);
					
					
					// El siguiente sql le agrega las caracteristicas a la propiedad recien insertada.
					foreach($caracteristicas as $caracteristica){
						$sqlC= 'INSERT INTO caracteristicaspropiedades_propiedades (idpropiedad, idcaracteristica)
								VALUES ('.$idP.', '.$caracteristica.')';
						mysqli_query ( $bd,$sqlC);					
					}
				}
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