## Ejecucion de Querys ##


mixed query(string query, array parametros, boolean retorno);



* string query: corresponde a la consulta a realizar.

* array parametros: corresponde a los parametros que utilizara la query 
  para su ejecucion, indicando el 
  tipo de datos y los valores de las variables.

* boolean retorno: 'false' indica retorno de datos y 'true' retorna boleano 
  de ejecucion de query.



####Ejemplos de uso:####

__________________________________________________________________________________________
###### Ejemplo 1 ######

include 'sistema/class.controlador.php';

$funciones = new Funciones();

$data = array('i', '1');

$sql = "SELECT * FROM datos WHERE iddatos = ?";

$resultado = $funciones->query($sql, $data, false);

foreach ($resultado as $campo) {

	echo $campo['iddatos'];
	
	echo $campo['nombredatos'];
	
}

__________________________________________________________________________________________

###### Ejemplo 2 ######

include 'sistema/class.controlador.php';

$funciones = new Funciones();

$resultado = $funciones->query("SELECT * FROM datos", '', false);

foreach ($resultado as $result) {

    echo $result['iddatos']." : ".$result['nombredatos'] ."<br/>" ;
    
}

__________________________________________________________________________________________

###### Ejemplo 3 ######

include 'sistema/class.controlador.php';

$funciones = new Funciones();

$id = 8;

$name = "Juan";

$funciones->query("INSERT INTO datos(iddatos, nombredatos) VALUES (?,?)", array('is', $id, $name), true);

echo $funciones->IdInsertado;

