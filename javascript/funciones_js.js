// Precarga de imágenes
if (document.images) {
  var boton2_off = new Image() ;
  boton2_off.src = "image/fa.png";
   var boton3_off = new Image();
  boton3_off.src = "image/tu.png";
   var boton2_on = new Image();
  boton2_on.src = "image/f.png";
    var boton3_on = new Image();
  boton3_on.src = "image/ta.png";
}

// Carga de imagen cuando el ratón pasa por encima
function entra(boton) {
  if (document.images) {
	    if (boton == 'boton2') {
      document.images[boton].src = boton2_on.src;
    }
	if (boton == 'boton3') {
      document.images[boton].src = boton3_on.src;
    }
  }
}

// Carga de imagen cuando el ratón abandona el área de la imagen 
function sale(boton) {
  if (document.images) {
	if (boton == 'boton2') {
      document.images[boton].src = boton2_off.src;
  }
  if (boton == 'boton3') {
      document.images[boton].src = boton3_off.src;
    }
}
}

//pasar las imágenes
var photos=new Array() 
var pasar=0 

photos[0]="image/destacados/destacados4.jpg"
photos[1]="image/destacados/destacados1.jpg"
photos[2]="image/destacados/destacados3.jpg"
photos[3]="image/destacados/destacados2.jpg"
photos[4]="image/destacados/destacados-casa1.png"
photos[5]="image/destacados/destacados-casa2.png" 
photos[6]="image/destacados/destacados-duplex1.png" 
photos[7]="image/destacados/destacados-duplex2.png"
photos[8]="image/destacados/destacados-lotf1.png"

function backward(){ 
	if (pasar>0){ 
		window.status='' 
		pasar-- 
		document.images.photoslider.src=photos[pasar] 
	} 
} 

function forward(){ 
	if (pasar<photos.length-1){ 
		pasar++ 
		document.images.photoslider.src=photos[pasar] 
	} 
	else window.status='End of gallery' 
}
//fin de pasar imgágenes

//leer mas
function hideshow (postid) {
	var post = document.getElementById(postid);
	if (post.className=="show"){ post.className="hide"; } 
	else { post.className="show"; }
}
// fin leer mas
