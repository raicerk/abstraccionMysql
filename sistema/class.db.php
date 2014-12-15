<?php

include_once 'class.constantes.php';

class Database{
    
    private $sql;
    private $parametros;
    private $cierre;
    private $host;
    private $user;
    private $pass;
    private $ddbb;


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

    private function conexion(){
        $conexion = new mysqli(constant('hostConexion'), constant('userConexion'), constant('passConexion'), constant('ddbbConexion'));
        return $conexion;
    }

    public function query(){
        $results = array();    
        $mysqli = self::conexion();
        $stmt = $mysqli->prepare($this->sql) or die ("error al preparar la query!");
        
        if (is_array($this->parametros)) {
            call_user_func_array(array($stmt, 'bind_param'), self::refValues($this->parametros));
        }

        $stmt->execute();
           
        if($this->cierre){
            $result = $mysqli->affected_rows;
        }else{
            $meta = $stmt->result_metadata();    
    
            while ($field = $meta->fetch_field()) {
                $parameters[] = &$row[$field->name];
            }  
    
            call_user_func_array(array($stmt, 'bind_result'), self::refValues($parameters));
               
            while ($stmt->fetch()) {  
                $x = array();  
                foreach( $row as $key => $val ) {  
                    $x[$key] = $val;  
                }  
                $results[] = $x;  
            }

            $result = $results;
        }

        $stmt->close();
        $mysqli->close();
          
        return  $result;
    }

    private function refValues($arr){
        $refs = array();
        if (strnatcmp(phpversion(),'5.3') >= 0){
            foreach($arr as $key => $value){
                $refs[$key] = &$arr[$key];
            }
            return $refs;
        }else{
            return $arr;
        }    
    }     
}

?>