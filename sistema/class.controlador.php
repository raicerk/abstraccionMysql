<?php

include 'sistema/class.db.php';


class Funciones{

	private $IdInsertado;
	private $datos;

	public function __get($property){
        if (property_exists($this, $property)){
            return $this->$property;
        }
    }
 
    public function __set($property, $value){
        if (property_exists($this, $property)){
            $this->$property = $value;
        }
    }

	public function query($sql,$parametros,$cierre){
		$database = new Database();
		$database->sql = $sql;
		$database->parametros = $parametros;
		$database->cierre = $cierre;
		$this->datos = $database->query($cierre);
		$this->IdInsertado = $database->Insert_Id;
		return $this->datos;
	}


}

?>