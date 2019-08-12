<?php
	require "devolverProductos.php";
	$productos=new DevolverProductos();
	$arregloP=$productos->get_productos();
	$arregloE=$productos->getEstado();
	$arregloZ=$productos->getZona();
	$arregloC=$productos->getCaracteristicasPropiedades();
	$arregloT=$productos->getTiposPropiedades();
	$arregloCA=$productos->getCantAmbientes();
	
	//include("funciones.php");
	
	//$bd= conectarse_bd();

	//$arregloE= getEstado($bd);
	//$arregloZ= getZona($bd);
	//$arregloC= getCaracteristicasPropiedades($bd);
	//$arregloT=getTiposPropiedades($bd);
	//$arregloCA=getCantAmbientes($bd);

	
	$sql= "SELECT DISTINCT t.tipopropiedad, p.idpropiedad, p.estado, p.zona, p.cantambientes, p.precio, p.calle
			FROM propiedades p
			LEFT JOIN tipospropiedades t ON t.idtipopropiedad=p.idtipopropiedad
			LEFT JOIN caracteristicaspropiedades_propiedades cp ON cp.idpropiedad=p.idpropiedad
			LEFT JOIN caracteristicaspropiedades c ON cp.idcaracteristica=c.idcaracteristica";

	if ( ((isset($_GET['tipopropiedad'])) && ($_GET['tipopropiedad'] != "")) || ((isset($_GET['cantambientes'])) && ($_GET['cantambientes'] != "")) ||((isset($_GET['zona'])) && ($_GET['zona'] != "")) || ((isset($_GET['estado'])) && ($_GET['estado'] != "")) ||((isset($_GET['caracteristica']))&&(count($_GET['caracteristica']) > 0)) ){
		$sql= $sql." WHERE ";
		if ((isset($_GET['zona'])) && ($_GET['zona'] != "")){
			$sql= $sql." p.zona='".$_GET['zona']."'";
		}
		if ((isset($_GET['cantambientes'])) && ($_GET['cantambientes'] != "")){
			if ((isset($_GET['estado'])) && ($_GET['estado'] != "")){
			if( (isset($_GET['zona'])) && ($_GET['zona'] != "") ) { 
				$sql= $sql." AND ";
			}
			$sql= $sql."AND ";
			}
			$sql= $sql." p.cantambientes='".$_GET['cantambientes']."'";
		}	
		
if ((isset($_GET['tipopropiedad'])) && ($_GET['tipopropiedad'] != "")){
if ((isset($_GET['cantambientes'])) && ($_GET['cantambientes'] != "")){
			if ((isset($_GET['estado'])) && ($_GET['estado'] != "")){
			if( (isset($_GET['zona'])) && ($_GET['zona'] != "") ) { 
				$sql= $sql." AND ";
			}
			$sql= $sql." AND ";
			}
			$sql= $sql." AND ";
			}
			$sql= $sql." p.tipopropiedad='".$_GET['tipopropiedad']."'";
		}	
	
	
		if ((isset($_GET['caracteristica']))&&(count($_GET['caracteristica']) > 0)){
			if( (isset($_GET['estado'])) && ($_GET['estado'] != "") || (isset($_GET['zona'])) && ($_GET['zona'] != "") ||((isset($_GET['tipopropiedad'])) && ($_GET['tipopropiedad'] != "")) || ((isset($_GET['cantambientes'])) )){ 
				$sql= $sql." AND ";
			}
			$ids= $_GET['caracteristica'];
			$sql= $sql."EXISTS (
						SELECT idcaracteristica 
						FROM caracteristicaspropiedades_propiedades 
						WHERE caracteristicaspropiedades_propiedades.idpropiedad = p.idpropiedad 
						AND caracteristicaspropiedades_propiedades.idcaracteristica =".$ids[0].")";			
				for ($i = 1; $i < count($_GET['caracteristica']); $i++){
					$sql= $sql." AND EXISTS (
							SELECT idcaracteristica 
							FROM caracteristicaspropiedades_propiedades 
							WHERE caracteristicaspropiedades_propiedades.idpropiedad = p.idpropiedad 
							AND caracteristicaspropiedades_propiedades.idcaracteristica =".$ids[$i].")";
				}
						
		}
	}
	if (isset($_GET['estado'])){
		$sql= $sql." ORDER BY t.tipopropiedad, p.precio";
	}

	
	
	$arreglo=$productos->consulta($sql);
	
	//Incluye e instancia el paginador
	include 'pagination.class.php';
	$paginador = new pagination;
	// Devuelve vehiculos por pagina
	$pagProp = $paginador -> generate ($arreglo, 9);
	// Da los link (anterior, siguiente, primero, ultimo)
	$linksPaginador= $paginador->links();
	
	include ("busqueda.php");	
?>