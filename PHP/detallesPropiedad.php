<?
	session_start();
?>
<html>
	<head>
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

			<div class="bold">	
				<?php if (isset($_SESSION['usuario'])) { ?>
					<div class="log">	
						<a href="../PHP/usuario_logout.php" onclick=" return confirm('Cerrar sesion?')">Logout </a>
					</div>
				<?php } else { ?>
					<form method="post" action="usuario_login.php?propiedad=<?php echo $arreglo[0]['idpropiedad']?>" onsubmit="return inicioSesion()" class="usuario">
						<fieldset>
							<label for="us">Usuario: </label>
							<input type="text" name="usuario" size="13" id="us"/>					
							<label for="pass">Clave: </label>
							<input type="password" name="pass" size="15" id="pass"/>						
							<input type="submit" value=" Entrar "/>
						</fieldset>
					</form>	
				<?php } ?>
			</div>		
			
			<div class="cuerpo">
						
				<img class="imgIzq" src="image.php?propiedad=<?php echo $arreglo[0]['idpropiedad']?>" width="304" height="297" >
								
				<div class="caja-detalle" >
							<h3>Operacion:</h3>
							<h3>Tipo:</h3>
							<h3>Zona:</h3>
							<h3>Precio:</h3>
					<div class="detalleDerecha1">
						<div class="mas-marginbottom ">
							<?php if($arreglo[0]['estado'] <>''){ echo $arreglo[0]['estado']; }else{ echo 'Consulte.';}?>
						</div>
						<div class="mas-marginbottom ">
							<?php if($arreglo[0]['tipopropiedad'] <>''){ echo $arreglo[0]['tipopropiedad']; }else{ echo 'Consulte.';}?>
						</div>
						<div class="mas-marginbottom ">
							<?php if($arreglo[0]['zona'] <>''){ echo $arreglo[0]['zona']; }else{ echo 'Consulte.';}?>
						</div>
						<div class="mas-marginbottom ">
							<?php if( ($arreglo[0]['precio'] <>'')&&($arreglo[0]['precio']<>'0')){ echo '$'.$arreglo[0]['precio']; }else{ echo 'Consulte.';}?>
						</div>
					</div>	
				</div>
				<div class="detalleDerecha4" >
						<h3>Calle:</h3>
						<div class="menos-marginbottom">
							<?php if($arreglo[0]['calle'] <>''){ echo $arreglo[0]['calle']; }else{ echo 'Consulte.';}?>
						</div>
				</div>
				<div class="caja-detalle" >
							<h3>Piso:</h3>
							<h3>Habitaciones:</h3>
					<div class="detalleDerecha2">	
						<div class="menos-marginbottom">
							<?php if( ($arreglo[0]['piso'] <>'')&&($arreglo[0]['piso']<>'0')){ echo $arreglo[0]['piso']; }else{ echo '-';}?>
						</div>
						<div class="menos-marginbottom">
							<?php if( ($arreglo[0]['cantambientes'] <>'')&&($arreglo[0]['cantambientes']<>'0')){ echo $arreglo[0]['cantambientes']; }else{ echo '-';}?>
						</div>
					</div>
				</div>
				
				<div class="caja-detalle2" >			
							<h3>Nro:</h3>
							<h3>Dpto:</h3>
							<h3>Ba&ntilde;os:</h3>
					<div class="detalleDerecha3">
						<div class="menos-mb">
							<?php if( ($arreglo[0]['nro'] <>'')&&($arreglo[0]['nro']<>'0') ){ echo $arreglo[0]['nro']; }else{ echo '-';}?>
						</div>
						<div class="menos-mb">
							<?php if($arreglo[0]['dpto'] <>''){ echo $arreglo[0]['dpto']; }else{ echo '-';}?>
						</div>
						<div class="menos-mb">
							<?php if( ($arreglo[0]['cantbanos'] <>'')&&($arreglo[0]['cantbanos']<>'0') ){ echo $arreglo[0]['cantbanos']; }else{ echo '-';}?>
						</div>
					</div>
				</div>
				
					<div class="observaciones">
						<h3>Observaciones</h3>
						<?php if($arreglo[0]['observaciones'] <>''){ echo $arreglo[0]['observaciones'].'. '; }else{ echo 'Sin observaciones.';}?>
					</div>				
					<div class="caracteristicas">
						<h3>Caracter&iacute;sticas:</h3>
						<?php foreach ($arreglo as $fila):?>
							<?php if($fila['caracteristica'] <>''){ echo $fila['caracteristica'].'. '; }else{ echo 'Consulte.';}?>
						<?php endforeach; ?>
					</div>
				
			</div>		
			
			<?php if(isset($_SESSION['usuario'])){ ?>
				<div class="italic">
					<div class="iconos"> 
						<a href="Bpropiedad.php?propiedad=<?php echo $fila['idpropiedad']?>" onclick=" return confirm('Desea borrar esta propiedad?')">
							Borrar propiedad <img src="../image/icono_borrar.gif"  alt="Borrar propiedad"> 
						</a>
					</div>
					<div class="iconos" id="icono">	
						<a href="AyMCargarFormulario.php?propiedad=<?php echo $fila['idpropiedad']?>">
							Editar propiedad <img src="../image/icono_modificar.gif"  alt="Editar propiedad">
						</a>
					</div>	
				</div>
			<?php } ?>
			
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