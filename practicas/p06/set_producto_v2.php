<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <title>Inserción de Nuevo Producto</title>
        <style type="text/css">
			body {margin: 20px; 
			background-color: #C4DF9B;
			font-family: Verdana, Helvetica, sans-serif;
			font-size: 90%;}
			h1 {color: #005825;
			border-bottom: 1px solid #005825;}
			h2 {font-size: 1.2em;
			color: #4A0048;}
		</style>
    </head>
    <body>
        <?php
        $nombre = $_POST['nombre_producto'];
        $marca  = $_POST['marca_producto'];
        $modelo = $_POST['modelo_producto'];
        $precio = $_POST['precio_producto'];
        $detalles = $_POST['detalles_producto'];
        $unidades = $_POST['unidades_producto'];
        $imagen   = $_POST['ruta_img_producto'];

        /** SE CREA EL OBJETO DE CONEXION */
        @$link = new mysqli('localhost', 'root', 'nora2040', 'marketzone');	

        /** comprobar la conexión */
        if ($link->connect_errno) 
        {
            die('<h1>Falló la conexión: '.$link->connect_error.'</h1><br/>');
            /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
        }

        /** script de insersión a la BD. Lo utilizaremos despues de validar que no se repita la marca ni el modelo
         * en el producto que queremos insertar
        */
        $sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}', 0)";

        /** Validamos que no se repita la marca*/
        if ( mysqli_num_rows($link->query("SELECT * FROM productos WHERE marca = '{$marca}'")) != 0 ) 
        {
            echo '<h1><strong>Error:</strong> La marca está repetida</h1>';
        }
        /*Validamos que no se repita el modelo */
        elseif(mysqli_num_rows($result = $link->query("SELECT * FROM productos WHERE modelo = '{$modelo}'")) != 0)
        {
            echo '<h1><strong>Error:</strong> El modelo está repetido</h1>';;
        }
        /*Despues de validar que no se repita la marca y modelo insertamos */
        elseif( $link->query($sql) ) 
        {
            echo '<h1>Datos insertados con éxito</h1>';
            echo '<p>A continuación se muestra el resumen de los datos insertados: </p>';
            echo '<h2>Datos insertados:</h2>';
            echo '<ul>';
            echo "<li><strong>ID: </strong> <em>$link->insert_id</em></li>";
            echo "<li><strong>Nombre: </strong> <em>{$nombre}</em></li>";
            echo "<li><strong>Marca: </strong> <em>{$marca}</em></li>";
            echo "<li><strong>Modelo: </strong> <em>{$modelo}</em></li>";
            echo "<li><strong>Precio: </strong> <em>{$precio}</em></li>";
            echo "<li><strong>Unidades: </strong> <em>{$unidades}</em></li>";
            echo "<li><strong>Ruta de la Imagen: </strong> <em>{$imagen}</em></li>";
            echo "<li><strong>Detalles: </strong> <em>{$detalles}</em></li>";
            echo '</ul>';
        }
        else
        {
            echo 'El Producto no pudo ser insertado =(';
        }

        $link->close();
        ?>
    </body>
</html>