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
		<script type=text/javascript>
			function actualizar() {
				// se obtiene el id de la fila donde está el botón presinado
				var rowId = event.target.parentNode.parentNode.id;

				// se obtienen los datos de la fila en forma de arreglo
				var data = document.getElementById(rowId).querySelectorAll(".row-data");
				/**
				querySelectorAll() devuelve una lista de elementos (NodeList) que 
				coinciden con el grupo de selectores CSS indicados.
				(ver: https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Selectors)

				En este caso se obtienen todos los datos de la fila con el id encontrado
				y que pertenecen a la clase "row-data".
				*/

				var nombre = data[0].innerHTML;
				var marca  = data[1].innerHTML;
				var modelo = data[2].innerHTML;
				var precio = data[3].innerHTML;
				var unidades = data[4].innerHTML;
				var detalles = data[5].innerHTML;
				var imagen   = data[6].innerHTML;

				send2form(nombre, marca, modelo, precio, unidades, detalles, imagen);
			}
		</script>
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
					<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
				<!--Creamos una tabla dinámica con PHP-->
				<?php
					foreach($data as $registro){
						echo "<tr id=".$registro['id'].">";
							echo "<th scope='row'>".$registro['id']."</th>";
							echo "<td class=row-data>".$registro['nombre']."</td>";
							echo "<td class=row-data>".$registro['marca']."</td>";
							echo "<td class=row-data>".$registro['modelo']."</td>";
							echo "<td class=row-data>".$registro['precio']."</td>";
							echo "<td class=row-data>".$registro['unidades']."</td>";
							echo "<td class=row-data>".$registro['detalles']."</td>";
							echo "<td class=row-data><img src=".$registro['imagen']." width='150'></td>";
                            echo "<td class=row-data><input type='button' value='ACTUALIZAR' onclick='actualizar()' /></td>";
						echo "</tr>";
					}
				?>
				</tbody>
			</table>
			<script>
				function send2form(nombre, marca, modelo, precio, unidades, detalles, imagen){
					var form = document.createElement("form");

					var nombreIn = document.createElement("input");
					nombreIn.type = 'text';
					nombreIn.name = 'nombre';
					nombreIn.value = nombre;
					form.appendChild(nombreIn);

					var marcaIn = document.createElement("input");
					marcaIn.type = 'text';
					marcaIn.name = 'marca';
					marcaIn.value = marca;
					form.appendChild(marcaIn);

					var modeloIn = document.createElement("input");
					modeloIn.type = 'text';
					modeloIn.name = 'modelo';
					modeloIn.value = modelo;
					form.appendChild(modeloIn);

					var precioIn = document.createElement("input");
					precioIn.type = 'text';
					precioIn.name = 'precio';
					precioIn.value = precio;
					form.appendChild(precioIn);

					var unidadesIn = document.createElement("input");
					unidadesIn.type = 'text';
					unidadesIn.name = 'unidades';
					unidadesIn.value = unidades;
					form.appendChild(unidadesIn);

					var detallesIn = document.createElement("input");
					detallesIn.type = 'text';
					detallesIn.name = 'detalles';
					detallesIn.value = detalles;
					form.appendChild(detallesIn);

					var imagenIn = document.createElement("input");
					imagenIn.type = 'text';
					imagenIn.name = 'imagen';
					imagenIn.value = imagen;
					form.appendChild(imagenIn);

					

					console.log(form);

					form.method = 'POST';
					form.action = 'http://localhost/tecnologiasweb/practicas/p07/formulario_productos_v2.php';  

					document.body.appendChild(form);
					form.submit();
				}
        	</script>
		<?php endif; ?>
	</body>
</html>