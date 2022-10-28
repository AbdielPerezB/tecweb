<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
	<?php
		/** SE CREA EL OBJETO DE CONEXION */
		@$link = new mysqli('localhost', 'root', 'nora2040', 'marketzone');	

		/** comprobar la conexión */
		if ($link->connect_errno) 
		{
			die('Falló la conexión: '.$link->connect_error.'<br/>');
			    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
		}

		/** Crear una tabla que no devuelve un conjunto de resultados */
		if ( $result = $link->query("SELECT * FROM productos WHERE eliminado = 0;") ) 
		{
            /** Se extraen las tuplas obtenidas de la consulta */
			$row = $result->fetch_all(MYSQLI_ASSOC);

            /** Se crea un arreglo con la estructura deseada. $data es el arreglo donde estan todos mis registros consultados*/
            foreach($row as $num => $registro) {            // Se recorren tuplas
                foreach($registro as $key => $value) {      // Se recorren campos
                    $data[$num][$key] = $value;
                }
            }

			/** útil para liberar memoria asociada a un resultado con demasiada información */
			$result->free();
		}
		/*Cerramos la conexión con la BD*/
		$link->close();
	?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Productos</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<h3>PRODUCTOS</h3>

		<br/>
		
		<?php if( isset($data) ) : ?>

			<table class="table">
				<thead class="thead-dark">
					<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre</th>
					<th scope="col">Marca</th>
					<th scope="col">Modelo</th>
					<th scope="col">Precio</th>
					<th scope="col">Unidades</th>
					<th scope="col">Detalles</th>
					<th scope="col">Imagen</th>
					</tr>
				</thead>
				<tbody>
				<!--Creamos una tabla dinámica con PHP-->
				<?php
					foreach($data as $registro){
						echo "<tr>";
							echo "<th scope='row'>".$registro['id']."</th>";
							echo "<td>".$registro['nombre']."</td>";
							echo "<td>".$registro['marca']."</td>";
							echo "<td>".$registro['modelo']."</td>";
							echo "<td>".$registro['precio']."</td>";
							echo "<td>".$registro['unidades']."</td>";
							echo "<td>".$registro['detalles']."</td>";
							echo "<td><img src=../p05/".$registro['imagen']." width='150'></td>";
						echo "</tr>";
					}
				?>
				</tbody>
			</table>
		<?php endif; ?>
	</body>
</html>