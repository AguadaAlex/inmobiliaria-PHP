<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="../css/estilo.css" />
		<title>IM - Buscador de propiedades</title>
</head>

<body>
		<div class="contenedor">
			<div class="cabecera">
				<div class="titulo">
					<a href="../home.html">
						<div id="superior">
							Madelon 
						</div>
						<div id="inferior">
							Inmobiliaria
						</div>
					</a>
				</div>
			</div>
			
			<div class="enlaces">
				<a href="../home.html">Home</a>				
				<a href="../quienessomos.html">Quienes Somos</a>				
				<a href="../comollegar.html">C&oacute;mo llegar</a>				
				<a href="../contacto.html">Contacto</a>	
				<a href="../PHP/consultasBusqueda.php?page=1">Hogares</a>							
			</div>
			<?php
            foreach ($pagProp as $fila){
   echo $fila['estado'];
	echo $fila['tipoFoto'];
	echo "proyectando elemento".$fila['idpropiedad'];
	echo "<img src='data:image/jpeg;base64,".base64_encode($fila['contenidoFoto'])."'>";
	}
			
			
			
			?>
			
			<div id="footer">
				<div id="piedepagina">Inmobiliaria&nbsp;Madelon :: Direcci&oacute;n: Calle 50 y 120 :: Horario: Lun. a Vie. de 8 a 18hs. </div>
				<div id="piedepaginamini"> Copyright &copy;2011 - Todos los derechos reservados</div>
				<div class="imgFooter" id="if">
					<a href="http://www.facebook.com/"> <img src="../image/fa.png" alt="Facebook" onMouseOver="this.src='../image/f.png';" onMouseOut="this.src='../image/fa.png';"> </a> 
					<a href="http://twitter.com/"> <img src="../image/tu.png" alt="Twitter" onMouseOver="this.src='../image/ta.png';" onMouseOut="this.src='../image/tu.png';" ></a>
				</div>
			</div>
		</div>
	</body>
</html>