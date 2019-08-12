<?php
require "conexion.php";
class DevolverProductos extends Conexion{
	//CONSTRCTOR
    public function DevolverProductos(){
        parent::__construct();

    }
	//ESTA FUNCION ARMA EL ARREGLO 
	public function consulta($sql){
		$sentencia=$this->conexion_db->prepare($sql);
        $sentencia->execute(array());
        $resultado=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        $sentencia->closeCursor();
        return $resultado;
        $this->conexion_db=null;
		}
    public function get_productos(){
        $sql="SELECT * FROM propiedades";
        return $this->consulta($sql);
    }
	  public function getEstado(){
        $sql="SELECT DISTINCT estado FROM propiedades";
        return $this->consulta($sql);
    }
	public function getZona(){
        $sql="SELECT DISTINCT zona FROM propiedades";
       return $this->consulta($sql);
    }
	public function getCantAmbientes(){
        $sql="SELECT DISTINCT cantambientes FROM propiedades";
        return $this->consulta($sql);
    }
	public function getTiposPropiedades(){
        $sql="SELECT tipopropiedad, idtipopropiedad
				FROM tipospropiedades
				ORDER BY tipopropiedad";
        return $this->consulta($sql);
    }
	public function getCaracteristicasPropiedades(){
        $sql="SELECT caracteristica, idcaracteristica
				FROM caracteristicaspropiedades
				ORDER BY caracteristica";
        return $this->consulta($sql);
    }
	public function getDetallesPropiedad($dato){
        $sql="SELECT DISTINCT p.idpropiedad, p.calle, p.nro, p.piso, p.dpto, p.estado, p.precio, p.zona, p.cantambientes, p.cantbanos, p.contenidoFoto, p.tipoFoto, p.observaciones, t.tipopropiedad, c.caracteristica
			FROM propiedades p
			LEFT JOIN tipospropiedades t ON t.idtipopropiedad=p.idtipopropiedad
			LEFT JOIN caracteristicaspropiedades_propiedades cp ON cp.idpropiedad=p.idpropiedad
			LEFT JOIN caracteristicaspropiedades c ON c.idcaracteristica=cp.idcaracteristica
			WHERE p.idpropiedad='".$dato."'";
        return $this->consulta($sql);
    }
	public function getFotos($dato){
        $sql="SELECT tipoFoto, contenidoFoto
				FROM propiedades
				WHERE idpropiedad= ".$dato;
        return $this->consulta($sql);
    }
}
?>