<?php

include 'class.correo.php';
include 'sistema/class.db.php';

class Funciones{

	public function EnviarCorreo($de,$denombre,$para,$paraNombre,$responder,$responderNombre,$copia="",$copiaOculta="",$asunto,$cuerpo){
		
		$correo = new Correo();

		$correo->string_de              = $de;
		$correo->string_deNombre        = $denombre;
		$correo->string_para            = $para;
		$correo->string_paraNombre      = $paraNombre;
		$correo->string_responder       = $responder;
		$correo->string_responderNombre = $responderNombre;
		$correo->string_copia           = $copia;
		$correo->string_copiaOculta     = $copiaOculta;
		$correo->string_asunto          = $asunto;
		$correo->string_cuerpo          = $cuerpo;
		return $correo->EnviarCorreo();
	}

	public function query($sql,$parametros,$cierre){

		$database = new Database();
		$database->sql = $sql;
		$database->parametros = $parametros;
		$database->cierre = $cierre;
		return $database->query($cierre);
	}
}

?>