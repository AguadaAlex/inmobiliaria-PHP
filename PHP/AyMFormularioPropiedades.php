<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/estilo.css" />
		<script type="text/javascript" src="../javascript/validar.js"></script>	
		<title> <?php if (isset($arregloD)){ echo 'IM - Modificar propiedad'; } else { echo 'IM - Crear propiedad'; } ?> </title>
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
			
			<div class="cuerpo">
						
				<div class="filtro">
					<form method="POST" action="AyMPropiedades.php" enctype="multipart/form-data" onsubmit="return validarPropiedades()">
						<fieldset>
							<?php if(isset ($_GET['propiedad']) ){ ?> <legend>Modificar propiedad</legend>
							<?php }else{ ?> <legend>Agregar nueva propiedad</legend> <?php } ?>
							<div class="caja-busqueda2">
								<label>*Tipo de operaci&oacute;n </label>
								
									<div class="mini">
										<input type="radio" id="estado" name="estado" value="venta" <?php if ((isset($arregloD))&&($arregloD[0]['estado']=='venta')){ echo('checked="checked"'); } ?>>
											Venta
										</input>
									</div>
									<div class="mini">
										<input type="radio" id="estado" name="estado" value="alquiler" <?php if ((isset($arregloD))&&($arregloD[0]['estado']=='alquiler')){ echo('checked="checked"'); } ?>>
											Alquiler
										</input>
									</div>
							</div>
								
							<div class="caja-busqueda2">
								<label>*Tipo propiedad: </label>
								<select name="tipo" id="tipo">
									<?php if ( !(isset($arregloD))){ echo('<option></option>'); } ?>
									<?php foreach($arregloT as $fila): ?>
										<option value="<?php echo $fila['idtipopropiedad'] ?>" <?php if ((isset($arregloD))&&($arregloD[0]['tipopropiedad']==$fila['tipopropiedad'])){ echo('selected="selected"'); } ?> > <?php echo $fila['tipopropiedad'] ?> </option>
									<?php endforeach; ?>
								</select>
									<label>*Zona: </label>
								<div class="mini-busqueda">
									<select name="zona" >
										<option></option>
										<option value="Centro" <?php if ((isset($_GET['zona']))&&($_GET['zona']=='Centro')){ echo('selected="selected"'); } ?>> Centro </option>
										<option value="No centro" <?php if ((isset($_GET['zona']))&&($_GET['zona']=='No centro')){ echo('selected="selected"'); } ?>> No centro </option>
										<option value="Alrededores" <?php if ((isset($_GET['zona']))&&($_GET['zona']=='Alrededores')){ echo('selected="selected"'); } ?>> Alrededores </option>	
									</select>
								</div>
							</div>
							<div class="caja-busqueda2">
								<label>Caracteristicas: </label>
								<div class="mini-busqueda">
									<select multiple="multiple" size="5" name="caracteristica[]">
										<?php foreach($arregloC as $fila): ?>
											<option value="<?php echo $fila['idcaracteristica'] ?>" 
												<?php if (isset($arregloD)){ ?>
													<?php foreach($arregloD as $propiedad){ 
														if ($propiedad['caracteristica'] == $fila['caracteristica']){
															echo('selected="selected"');
														}
													} ?>
												<?php } ?>	> <?php echo $fila['caracteristica'] ?> 
											</option>
										<?php endforeach; ?>                 
									</select>
									<input type="hidden" name="id" value="<?php if (isset($arregloD)){ echo $arregloD[0]['idpropiedad']; }?>" />	
								</div>	
							</div>
							
							<div class="caja-busqueda2">
								<div class="indiv">
									<label>Precio: </label>
									<input type="text" name="precio" id="precio" size="10" value="<?php if (isset($arregloD)){ echo $arregloD[0]['precio']; }else{ echo '0';}?>"/>
									<label>Ba&ntilde;os:</label>
									<input type="text" name="banios" id="banios" size="10" value="<?php if (isset($arregloD)){ echo $arregloD[0]['cantbanos']; }else{ echo '0';}?>"/>
									<label>Ambientes:</label>
									<input type="text" name="ambientes" id="rooms" size="5" value="<?php if (isset($arregloD)){ echo $arregloD[0]['cantambientes']; }else{ echo '0';}?>"/>
								</div>
							</div>
							<div class="caja-busqueda2">
								Direccion:
								<div class="indiv" id="calle">
									<label>*Calle:</label>
									<input type="text" name="calle" id="ubicacion" size="43" value="<?php if (isset($arregloD)){ echo $arregloD[0]['calle']; }?>"/>						
								</div>
								
								<div class="indiv" id="direccion">
									<label>N&deg;</label>
									<input type="text" name="nro" id="nro" size="5" value="<?php if (isset($arregloD)){ echo $arregloD[0]['nro']; }else{ echo '0';}?>"/>
									<label>Piso:</label>
									<input type="text" name="piso" id="piso" size="5" value="<?php if (isset($arregloD)){ echo $arregloD[0]['piso']; }else{ echo '0';}?>"/>
									<label>Dpto:</label>
									<input type="text" name="dpto" id="dpto" size="4" value="<?php if (isset($arregloD)){ echo $arregloD[0]['dpto']; }?>"/>
								</div>
							</div>
							<div class="foto">
								<input type='file' name="file">
							</div>
							<div class="caja-obser">
									<label>Observaciones:</label>
									<textarea name="observaciones" id="dato" rows="5" cols="65" onKeyUp="valida_longitud(300)"><?php if (isset($arregloD)){ echo $arregloD[0]['observaciones']; }?></textarea>
								*Campos obligatorios.
							</div>	
							
							<div class="guardar">
								<input type="submit" name="mandar" value=" Guardar "/>
								<input type="reset" value=" Borrar "/>
							</div>
						</fieldset>
					</form>
				</div>
				
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