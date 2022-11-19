<?php
    include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();
    // SE VERIFICA HABER RECIBIDO EL ID
    if( isset($_POST['texto']) ) {
        $texto = $_POST['texto'];
        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        if ( $result = $conexion->query("SELECT * FROM productos WHERE nombre LIKE '%{$texto}%' OR marca LIKE '%{$texto}%' OR detalles LIKE '%{$texto}%'") ) {
            // SE OBTIENEN LOS RESULTADOS
			$filas = $result->fetch_all(MYSQLI_ASSOC);

            if(!is_null($filas)) {
                // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                foreach($filas as $numFila => $fila) {
                    foreach($fila as $campo => $valor){
                        $data[$numFila][$campo] = utf8_encode($valor);
                    }
                }
            }
			$result->free();
		} else {
            die('Query Error: '.mysqli_error($conexion));
        }
		$conexion->close();
    } 
    
    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>