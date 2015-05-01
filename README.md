## Configuración ##

En el archivo class.constantes.php deben ingresar los valores correspondientes a la base de datos que desea conectarse

## Instancia de la librería ##

Para poder utilizar la clase y las funciones definidas se debe incluir el archivo class.controlador.php con las funciones nativas de php (include - include_once - require - require_once) según se necesite, el próximo paso es instanciar el objeto funciones y llamar a la función y variables definidas para la ejecución de querys para esto usaremos:

    $funciones = new Funciones();


## Ejecución de Querys ##

Definición de la función

mixed query(string query, array parámetros, boolean retorno);

* String query: corresponde a la consulta a realizar.
    puede ser tanto una query de una sola linea:
    
    SELECT * FROM DATOS;
    
    o un llamado a un procedimiento almacenado
    
    CALL procedureName (?,?,?);

* Array parámetros: corresponde a los parámetros que utilizara la query para su ejecución, indicando el tipo de datos y los valores de las variables.

    En el se indica el tipo de datos que pueden ser tres:

    | Caracter | Descripción          |
    | -------- | -------------------- |
    |     i    | variable tipo entero |
    |     d    | variable tipo double |
    |     s    | variable tipo string |
    |     b    | variable tipo blob   |

        

* Boolean retorno: 'false' indica retorno de datos y 'true' retorna boleano 
  de ejecución de query.

## Retorno de IdInsertado Query ##

int IdInsertado;

* Int IdInsertado: Posee el valor de Id Insertado en una ejecución de query tipo 'INSERT'.


## Cuenta de registros ##

int CantidadRegistros;

* Int CantidadRegistros: Posee el numero de registros devueltos en una ejecución de query tipo 'SELECT' sin necesidad de ejecutar o retornar los valores y trabajar con ellos.



####Ejemplos de uso:####

__________________________________________________________________________________________
###### Ejemplo Querys 1 ######

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

###### Ejemplo Querys 2 ######

    include 'sistema/class.controlador.php';
    $funciones = new Funciones();
    $resultado = $funciones->query("SELECT * FROM datos", '', false);
    foreach ($resultado as $result) {
        echo $result['iddatos']." : ".$result['nombredatos'] ."<br/>" ;
    }

__________________________________________________________________________________________

###### Ejemplo Querys 3 ######

    include 'sistema/class.controlador.php';
    $funciones = new Funciones();
    $id = 8;
    $name = "Juan";
    $funciones->query("INSERT INTO datos(iddatos, nombredatos) VALUES (?,?)", array('is', $id, $name), true);


__________________________________________________________________________________________
###### Ejemplo IdInsertado ######

    include 'sistema/class.controlador.php';
    $funciones = new Funciones();
    $id = 8;
    $name = "Juan";
    $funciones->query("INSERT INTO datos(iddatos, nombredatos) VALUES (?,?)", array('is', $id, $name), true);
    echo $funciones->IdInsertado;
    
__________________________________________________________________________________________
###### Ejemplo CantidadRegistros ######

    include 'sistema/class.controlador.php';
    $funciones = new Funciones();
    $resultado = $funciones->query("SELECT * FROM datos", '', false);
    echo $funciones->CantidadRegistros;
