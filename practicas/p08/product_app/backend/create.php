<?php
    include_once __DIR__.'/database.php';
    $productos_eliminado = false;//variable para comprobar si el producto que estamos insertando en la db ya está eliminado

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);
        //Validamos que no exista un producto en la db con el mismo nombre
        if ( mysqli_num_rows($conexion->query("SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}'")) == 0 ){
            //si no existe, insertamos el producto
            //QUERY
            $sql = "INSERT INTO productos VALUES (null, 
            '{$jsonOBJ->nombre}', 
            '{$jsonOBJ->marca}', 
            '{$jsonOBJ->modelo}', 
            {$jsonOBJ->precio}, 
            '{$jsonOBJ->detalles}', 
            {$jsonOBJ->unidades}, 
            '{$jsonOBJ->imagen}', 
            0)";

            if($conexion->query($sql)){
                echo '[SERVIDOR]: Dato Insertado';
                echo 'Nombre: '.$jsonOBJ->nombre;
                echo 'marca: '.$jsonOBJ->marca;
                echo 'modelo: '.$jsonOBJ->modelo;
                echo 'Precio: '.$jsonOBJ->precio;
                echo 'Unidades: '.$jsonOBJ->unidades;
                echo 'Detalles: '.$jsonOBJ->detalles;
                echo 'Ruta de la imagen: '.$jsonOBJ->imagen;

            }else{
                echo 'Falló la insersión';
            }
        }
        //si ya existe en la db verificamos que este marcado como eliminado
        else{
            if ( $result = $conexion->query("SELECT eliminado FROM productos WHERE nombre = '{$jsonOBJ->nombre}'") ) 
            {
                //verificamos si TODOS los productos con ese nombre están eliminados
                $filas = $result->fetch_all(MYSQLI_ASSOC);
                foreach($filas as $numFila => $fila){
                    foreach($fila as $encabezado => $dato){
                        if($dato == 1){
                            $productos_eliminado = true;
                        }
                    }
                }
                $result->free();

                if($productos_eliminado){
                    //Insertamos
                    //QUERY
                    $sql = "INSERT INTO productos VALUES (null, 
                    '{$jsonOBJ->nombre}', 
                    '{$jsonOBJ->marca}', 
                    '{$jsonOBJ->modelo}', 
                    {$jsonOBJ->precio}, 
                    '{$jsonOBJ->detalles}', 
                    {$jsonOBJ->unidades}, 
                    '{$jsonOBJ->imagen}', 
                    0)";

                    if($conexion->query($sql)){
                        echo '[SERVIDOR]: Dato Insertado';
                        echo 'Nombre: '.$jsonOBJ->nombre;
                        echo 'marca: '.$jsonOBJ->marca;
                        echo 'modelo: '.$jsonOBJ->modelo;
                        echo 'Precio: '.$jsonOBJ->precio;
                        echo 'Unidades: '.$jsonOBJ->unidades;
                        echo 'Detalles: '.$jsonOBJ->detalles;
                        echo 'Ruta de la imagen: '.$jsonOBJ->imagen;

                    }else{
                        echo 'Falló la insersión';
                    }
                }else{
                    echo '[SERVIDOR]:Error el nombre de este producto ya existe en la Base de Datos';
                }

            }
        }
        $conexion->close();
    }
?>