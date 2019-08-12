<?php
require "devolverProductos.php";
$productos=new DevolverProductos();
$arregloP=$productos->get_productos();


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<!--<form action="index.php" method="get">
<label>introduce  pais:<input type="text" name="buscar"  /></label>
<input type="submit" name="enviando"  value="¡dale!"/>
</form>!-->
<?php
foreach($arregloP as $elemento){
	echo $elemento['estado'];
	}
?>
</body>
</html>