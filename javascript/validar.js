function validarCampos(){
	nombre=document.getElementById("name").value;   /* document.getElementById Busca un elemento en el HTML con cierto ID*/
	apellido=document.getElementById("lastname").value; 
	telefono=document.getElementById("telephone").value;
	correo=document.getElementById("email").value;
	mensaje=document.getElementById("dato").value;
	ambientes=document.getElementById("rooms").value;
	superficie=document.getElementById("surface").value;
	
	if (!(nombre && apellido && correo && mensaje)){  /*&& and*/
		alert("Quedaron campos obligatorios sin completarfsdfdsfsdf");
	}
	else {
			if (!(haySoloLetras(nombre))){
				alert ('Nombre inv\u00e1lido');  /*\u00e1 = á , caracteres en unicode*/
			}
			else {
					if (!(haySoloLetras(apellido))){
						alert ('Apellido inv\u00e1lido');
					}
					else{
							if (!(haySoloNumeros(telefono))){
								alert ('N\u00famero telef\u00f3nico inv\u00e1lido'); 
							}
							else{
									if (!(valCorreo(correo))){
										alert('a ingresado un correo electr\u00f3nico v\u00e1lido \(ej20@ejemplo.com\)hghfh ');
									}
									else{
											if(!(haySoloNumeros(ambientes))){
												alert('Ingrese solo n\u00fameros para la cantidad de ambientes');	
													}
											else{
													if(!(haySoloNumeros(superficie))){
														alert('Ingrese solo n\u00fameros para la superficie');
													}
													else{
															ConfirmarEnvio();
													}
												}
										}
								}
						}
				}
		}		
	return false;	
}

function haySoloLetras(string){
	var i=0;
	var ok=true;
	var fin=string.length-1;
	while((i<=fin) && (ok)){		
		if ((string.charCodeAt(i) >= 48) && (string.charCodeAt(i) <= 57)){
			ok=false;
		}
		i++;
	}
	
	return ok;
}

function haySoloNumeros(string){
	var i=0;
	var ok=true;
	var fin=string.length-1;
	while((i<=fin) && (ok)){
		if ((string.charCodeAt(i) < 48) || (string.charCodeAt(i) > 57)){
			ok=false;
		}
		i++;
	}
	
	return ok;
}

function valCorreo(String){
	var atpos=String.indexOf("@");
	var dotpos=String.lastIndexOf(".");
	var ok=true;
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=String.length){
		ok=false;
	}
	return ok;
}

function ConfirmarEnvio(){
	enviar = window.confirm('Los datos fueron enviados satisfactoriamentesdasadsdaas');
	if (enviar){
		submit()
	}
	'return false';
}

function valida_longitud(tam){ 
	dato=document.getElementById("dato").value;
		
	if(dato.length > tam){ alert('Has superado los '+tam+' caracteres permitido.');}
	else{ return false; }	
} 

function validarCampo(palabra,frase){
	dato=document.getElementById("dato").value;
	
	if ( !(dato) ){ alert("Complete "+palabra+" antes de guardar."); }
	else { 	
		if ( !(haySoloLetras(dato)) ){ alert ('El dato ingresado es inv\u00e1lido');} 
		else{ if ( window.confirm('Desea confirmar '+frase+'?') ){ return true;} }
	}
	return false;
}

//function validarPropiedades(){
	
	estado=document.getElementById("estado").value;
	tipo=document.getElementById("tipo").value;
	//zona=document.getElementById("zona").value; 
	calle=document.getElementById("ubicacion").value;
	precio=document.getElementById("precio").value;
	banios=document.getElementById("banios").value;
	ambientes=document.getElementById("rooms").value;
	nro=document.getElementById("nro").value;
	piso=document.getElementById("piso").value;
	dpto=document.getElementById("dpto").value;
	observaciones=document.getElementById("dato").value;
	
	if (!(estado && tipo  && calle)){
		alert("Quedaron campos obligatorios sin completar.fsdfsdfsdfdsf");
	}
	else {
			if(!(haySoloNumeros(precio))){
				alert('Ingrese solo n\u00fameros en el precio.');
			}
			else {
					if (!(haySoloNumeros(banios))){
						alert ('Ingrese solo n\u00fameros en la cantidad de ba\u00f1os.');
					}
					else{
							if(!(haySoloNumeros(ambientes))){
								alert('Ingrese solo n\u00fameros en la cantidad de ambientes.'); 
							}
							else{
									if (!(haySoloNumeros(nro))){
										alert('Ingrese un nn\u00famero v\u00e1lido.');
									}
									else{
											if (!(haySoloNumeros(piso))){
												alert ('Ingrese un piso v\u00e1lido.');	
													}
											else{
													if (!( (haySoloLetras(dpto)) || (haySoloNumeros(dpto)) ) ){
														alert ('Ingrese un departamento v\u00e1lido');
													}
													else{
															if ( window.confirm('Los datos de la propiedad son correctos?') ){return true;}
														}
												}
										}
								}
						}
				}
		}		
	return false;	
}