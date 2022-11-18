<?php
    $conexion = @mysqli_connect(
        'localhost',
        'root',
        'nora2040',
        'marketzone'
    );

    /**
     * NOTA: si la conexión falló $conexion contendrá false
     **/
    if(!$conexion) {
        die('¡Base de datos NO conectada!');
    }
?>