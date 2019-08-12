<?php
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
					<form method="post" action="usuario_login.php" onsubmit="return inicioSesion()" class="usuario">
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
			
				<div class="filtro">
					<form method="get" action="consultasBusqueda.php">
						<fieldset>
							<legend>Criterio de b&uacute;squeda</legend>
							<div class="caja-busqueda">
								<label>Tipo de operaci&oacute;n </label>
								<div class="mini">
									<input type="radio" name="estado" value="venta" <?php if ((isset($_GET['estado']))&&($_GET['estado']=='venta')){echo('checked="checked"');}?> >
										Venta
									</input>
								</div>
								<div class="mini">
									<input type="radio" name="estado" value="alquiler" <?php if ((isset($_GET['estado']))&&($_GET['estado']=='alquiler')){echo('checked="checked"');}?> >
										Alquiler
									</input>
								</div>
							</div>
							<div class="caja-busqueda">
								<label> dormitorio: </label>
								<div class="mini-busqueda">
									<select name="zona" >
										<option></option>
										<option value="Centro" <?php if ((isset($_GET['cantambientes']))&&($_GET['cantambientes']=='1')){ echo('selected="selected"'); } ?>> 1 </option>
										<option value="No centro" <?php if ((isset($_GET['cantambientes']))&&($_GET['cantambientes']=='2')){ echo('selected="selected"'); } ?>> 2 </option>
										<option value="Alrededores" <?php if ((isset($_GET['cantambientes']))&&($_GET['cantambientes']=='3')){ echo('selected="selected"'); } ?>> 3 </option>	
									</select>
								</div>
									<label> Zona: </label>
								<div class="mini-busqueda">
									<select name="zona" >
										<option></option>
										<option value="Centro" <?php if ((isset($_GET['zona']))&&($_GET['zona']=='Centro')){ echo('selected="selected"'); } ?>> Centro </option>
										<option value="No centro" <?php if ((isset($_GET['zona']))&&($_GET['zona']=='No centro')){ echo('selected="selected"'); } ?>> No centro </option>
										<option value="Alrededores" <?php if ((isset($_GET['zona']))&&($_GET['zona']=='Alrededores')){ echo('selected="selected"'); } ?>> Alrededores </option>	
									</select>
								</div>
									<label> tipo de vivienda: </label>
								<div class="mini-busqueda">
									<select name="zona" >
										<option></option>
										<option value="Centro" <?php if ((isset($_GET['tipopropiedad']))&&($_GET['tipopropiedad']=='Departamento')){ echo('selected="selected"'); } ?>> Departamento </option>
											
									</select>
								</div>
							</div>
							<div class="caja-busqueda">
									<label> Caracteristicas: </label>
								<div class="mini-busqueda">
									<select multiple="multiple" size="5" name="caracteristica[]">
										<?php foreach($arregloC as $fila): ?>
											<option value="<?php echo $fila['idcaracteristica'] ?>"
												<?php if (isset($_GET['caracteristica'])){ ?>
													<?php foreach($_GET['caracteristica'] as $carac) {
															if (($carac['caracteristica']==$fila['idcaracteristica'])){ 
																echo('selected="selected"');
															} 
														}
													?>
												<?php } ?>	> <?php echo $fila['caracteristica'] ?>
											</option>
										<?php endforeach; ?>                 
									</select>									
								</div>	
							</div>
							<div class="buscar">
								<input type="submit" name="mandar" value=" Buscar propiedad"/>
							</div>
							<a href="../PHP/consultasBusqueda.php?page=1">Reiniciar b&uacute;squeda.</a>
						</fieldset>
					</form>
				</div>

				<?php if (isset($_SESSION['usuario'])): ?>
					<div class="ABM">
						<img src="../image/flechita.png"><a href="AyMCargarFormulario.php"> Crear propiedad</a>
						<img src="../image/flechita.png"><a href="cargarCaracteristicas.php?page=1"> Caracter&iacute;sticas</a>
						<img src="../image/flechita.png"><a href="cargarTipos.php?page=1"> Tipos de propiedades</a>
						<img src="../image/flechita.png"><a href="cargarTipos.php?page=1"> hogares con una cochera</a>
					</div>
					<?php if (!$pagProp){ echo '<h3 class="fraseLogin">No se encontraron propiedades .</h3>';} ?>
				<?php else: ?>				
					<?php if (!$pagProp){ echo '<h3 class="fraseLogout">No se encontraron propiedades .</h3>';} else { echo '<p>Seleccione propiedad para ver detalles.</p>';} ?>				
				<?php endif; ?>
			
				<?php if ($pagProp){ ?>					
					<?php if(isset($_SESSION['usuario'])){ ?> 
					<div class="caja-logueado">
						<?php }else{ ?>	
						<div class="caja">
						<?php } ?>
							<ul>
								<li>
									<div class="encabezado">
										<div class="mini-echo">
											<h3>Estado</h3>
										</div>
										<div class="mini-echo">
											<h3>Tipo</h3>
										</div>
										<div class="mini-echo">
											<h3>Zona</h3>
										</div>	
										<div class="mini-echo">
											<h3>Precio</h3>
										</div>
										<div class="mini-echo">
											<h3>Hab.</h3>
										</div>								
										<div class="mini-echo">
											<h3>Calle</h3>
							
										</div>
									</div>
								</li>
							</ul>	
							
							<?php foreach ($pagProp as $fila):?>
								<ul>
									<li>
									
										<a href="detallesCargarPropiedad.php?propiedad=<?php echo $fila['idpropiedad']?>">							
											<div class="mini-foto">
												
												<img src="image.php?propiedad=<?php echo $fila['idpropiedad']?>" width="50" height="50">
											<?php	echo "<img src='data:image/jpeg;base64,".base64_encode($fila['contenidoFoto'])."'>";?>
											</div>	
											<div class="caja-echo" >
												<div class="mini-echo">
													<?php if($fila['estado'] <>''){ echo $fila['estado']; }else{ echo 'Consulte.';}?>
												</div>
												<div class="mini-echo">
													<?php if($fila['tipopropiedad'] <>''){ echo $fila['tipopropiedad']; }else{ echo 'Consulte.';}?>
												</div>
												<div class="mini-echo">
													<?php if($fila['zona'] <>''){ echo $fila['zona']; }else{ echo 'Consulte.';}?>
												</div>
												<div class="mini-echo">
													<?php if( ($fila['precio'] <>'')&&($fila['precio']<>'0')){ echo '$ '.$fila['precio']; }else{ echo 'Consulte.';}?>
												</div>
												<div class="mini-echo">
													<?php if( ($fila['cantambientes'] <>'')&&($fila['cantambientes']<>'0')){ echo $fila['cantambientes']; }else{ echo '-';}?>
												</div>
												<div class="mini-echo"  id="masWidth">
													<?php if($fila['calle'] <>''){ echo $fila['calle']; }else{ echo 'Consulte.';}?>
												</div>
											</div>
										</a>
										<?php if (isset($_SESSION['usuario'])): ?>		
											<div class="imgMB">
												<a href="Bpropiedad.php?propiedad=<?php echo $fila['idpropiedad']?>" onclick=" return confirm('Desea borrar esta propiedad?')"> <img src="../image/icono_borrar.gif"  alt="Borrar"> </a>
												<a href="AyMCargarFormulario.php?propiedad=<?php echo $fila['idpropiedad']?>"> <img src="../image/icono_modificar.gif"  alt="Editar"> </a>
											</div>
										<?php endif; ?>		
									</li>
								</ul>
							<?php endforeach; ?>
						<?php if(isset($_SESSION['usuario'])){ ?> 
						</div>
					<?php }else{ ?>
					</div> <?php } ?>
					
				<?php } ?>
			
			</div>
				
				<?php if(isset($_SESSION['usuario'])){ ?> 
				<div class="pag-logueado">
					<?php }else{ ?> 
					<div class="pag"> <?php } ?>
						<?php echo $linksPaginador ?>
					<?php if(isset($_SESSION['usuario'])){ ?> 
					</div>
					<?php }else{ ?>
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