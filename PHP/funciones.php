<?php
	function conectarse_bd(){
		/*$conexion_bd= mysql_connect('localhost:/tmp/mysql.sock','root','1234');
		if (!$conexion_bd){
			die('No se pudo conectar: '.mysql_error());
		}
		$ok_bd= mysql_select_db('inmobiliaria',$conexion_bd);
		if (!$ok_bd){
			die('No se pudo conectar: '.mysql_error());
		}
		return $conexion_bd;*/
		//conecxion a mysql wordbench
		$enlace = mysqli_connect("127.0.0.1", "root", "1234", "inmobiliaria");

		if (!$enlace) {
			echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
			echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
			echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
			exit;
			}

			echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos mi_bd es genial." . PHP_EOL;
			echo "Información del host: " . mysqli_get_host_info($enlace) . PHP_EOL;

			return $enlace;
	}
	
	function consulta($sql, $bd){
		$resultado = mysqli_query ($bd,$sql);
		if (!$resultado){
			die('Consulta invalida:'.mysql_error());
		}
		$arreglo = array();
		while ($fila = mysqli_fetch_assoc($resultado)){
			$arreglo[] = $fila;
		}
		return $arreglo;
	}	

	function validarPostNum($parametro){
		return ((isset($_POST[$parametro]))&&(is_numeric($_POST[$parametro])));
	}	
		
	function validarPostChar($parametro){
		return ( (isset($_POST[$parametro])) && ($_POST[$parametro] != '') );
	}	
	
	function validarGetNum($parametro){
		return ((isset($_GET[$parametro]))&&(is_numeric($_GET[$parametro])));
	}

	function getTiposPropiedades($bd){
		$sqlT= 	'SELECT tipopropiedad, idtipopropiedad
				FROM tipospropiedades
				ORDER BY tipopropiedad';
		return consulta($sqlT,$bd);
	}
	
	function getCaracteristicasPropiedades($bd){
		$sqlC= 'SELECT caracteristica, idcaracteristica
				FROM caracteristicaspropiedades
				ORDER BY caracteristica';
		return consulta($sqlC,$bd);
	}	
		
	function getZona($bd){
		$sqlC= 'SELECT DISTINCT zona
				FROM propiedades';
		return consulta($sqlC,$bd);			
	}
	function getCantAmbientes($bd){
		$sqlCa= 'SELECT DISTINCT cantambientes
				FROM propiedades';
		return consulta($sqlCa,$bd);			
	}
	function getEstado($bd){
		$sqlC= 'SELECT DISTINCT estado
				FROM propiedades';
		return consulta($sqlC,$bd);			
	}

	function getFotos($bd){
		$sqlF='SELECT tipoFoto, contenidoFoto
				FROM propiedades
				WHERE idpropiedad= '.$_GET['propiedad'];
		return consulta($sqlF,$bd);
	}

	function getDetallesPropiedad($id, $bd){
		$sqlD = 'SELECT DISTINCT p.idpropiedad, p.calle, p.nro, p.piso, p.dpto, p.estado, p.precio, p.zona, p.cantambientes, p.cantbanos, p.contenidoFoto, p.tipoFoto, p.observaciones, t.tipopropiedad, c.caracteristica
			FROM propiedades p
			LEFT JOIN tipospropiedades t ON t.idtipopropiedad=p.idtipopropiedad
			LEFT JOIN caracteristicaspropiedades_propiedades cp ON cp.idpropiedad=p.idpropiedad
			LEFT JOIN caracteristicaspropiedades c ON c.idcaracteristica=cp.idcaracteristica
			WHERE p.idpropiedad= '.$id;
		return consulta($sqlD, $bd);
	}
	
	function deleteCaracteristicasPropiedades($id, $bd){
		$sqlCP=	'DELETE FROM caracteristicaspropiedades_propiedades
				WHERE idpropiedad= '.$id;
		return	mysqli_query ( $bd,$sqlCP);
	}	
?>