<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/estilo.css" />
		<title>IM - Tipos de propiedades</title>
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
			
			<div class="img-lateral">
				<img src="../image/tipos.png" width="181" height="500">	
			</div>			
			<div class="ABM-listado" >		
				<img src="../image/flechita.png"><a href="tiposFormularioAyM.php"> Crear nuevo</a>
			</div>
			<div class="listado">					
					<?php foreach($pagTip as $fila): ?>
						<ul>
							<li>
								<?php echo $fila['tipopropiedad']?>
								<a href="tiposBaja.php?tipo=<?php echo $fila['idtipopropiedad'] ?>" onclick=" return confirm('Desea borrar el tipo <?php echo $fila['tipopropiedad']; ?> ?')"> <img src="../image/icono_borrar.gif"  alt="Borrar"> </a>
								<a href="tiposModificar.php?tipo=<?php echo $fila['idtipopropiedad'] ?>"> <img src="../image/icono_modificar.gif"  alt="Editar"> </a>
							</li>
						</ul>
					<?php endforeach; ?> 						
			</div>					
			<div class="pag-listado">
				<?php echo $linksPaginador ?>
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