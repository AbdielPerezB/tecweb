<?php
$nombre = 'nombre_producto';
$marca  = 'marca_producto';
$modelo = 'modelo_producto';
$precio = 1.0;
$detalles = 'detalles_producto';
$unidades = 1;
$imagen   = 'img/imagen.png';

/** SE CREA EL OBJETO DE CONEXION */
@$link = new mysqli('localhost', 'root', 'nora2040', 'marketzone');	

/** comprobar la conexión */
if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}
$sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";

/** Validamos que no se repita la marca*/
if ( $link->query("SELECT * FROM productos WHERE marca = '{$marca}'") ) 
{
    echo 'Error: La marca esta repetida';
    
}
/*Validamos que no se repita el modelo */
elseif($link->query("SELECT * FROM productos WHERE modelo = '{$modelo}'") )
{
	echo 'Error: modelo repetido';
}
/*En caso de que todo este bien insertamos */
elseif($link->query($sql))
{
    
}
$link->close();
?>