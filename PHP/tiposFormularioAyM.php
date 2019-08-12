<?php
	if (!(isset($tipoAModificar))){ session_start();}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/estilo.css" />
		<script type="text/javascript" src="../javascript/validar.js"></script>		
		<title> <?php if (isset($tipoAModificar)){ echo 'IM - Modificar tipo de propiedad'; } else { echo 'Crear tipo de propiedad'; } ?> </title>
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

			<div class="bold">	
				<?php if (isset($_SESSION['usuario'])) { ?>
					<div class="log">	
						<a href="../PHP/usuario_logout.php" onclick=" return confirm('Cerrar sesion?')">Logout </a>
					</div>
				<?php } ?>
			</div>
			
			<div class="formulario">
						
				<form name="formulario" method="post" action="tiposAyM.php" onsubmit="return validarCampo('el tipo','este tipo de propiedad')">
					<label>Tipo: </label>
					<input type="text" name="tipo" id="dato" size="15" onKeyUp="valida_longitud(50)" value="<?php if (isset($tipoAModificar)){ echo $tipoAModificar[0]['tipopropiedad']; }?>"/>
					<input type="hidden" name="id" value="<?php if (isset($tipoAModificar)){ echo $tipoAModificar[0]['idtipopropiedad']; }?>" />
					<input type="submit" value=" GUARDAR "/>
				</form>
						
			</div>		
			
			<div id="footer">
				<div id="piedepagina">Inmobiliaria&nbsp;Madelon :: Direcci&oacute;n: Calle 50 y 120 :: Horario: Lun. a Vie. de 8 a 18hs. </div>
				<div id="piedepaginamini"> Copyright &copy;2011 - Todos los derechos reservados</div>
				<div class="imgFooter" id="if">
					<a href="http://www.facebook.com/"> <img src="../image/fa.png" alt="Facebook" onmouseover="this.src='../image/f.png';" onmouseout="this.src='../image/fa.png';"> </a> 
					<a href="http://twitter.com/"> <img src="../image/tu.png" alt="Twitter" onmouseover="this.src='../image/ta.png';" onmouseout="this.src='../image/tu.png';" ></a>
				</div>
			</div>
			
		</div>
	</body>
</html>