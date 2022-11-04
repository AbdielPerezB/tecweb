<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Formulario de insersión de datos a PRODUCTOS</title>
        <style>
            ol, ul{
                list-style-type: none;
            }
            .mensaje-de-validacion{
                color: red;
                font-size: 15px;
                margin: 0px;
                padding: 0px;
            }
            </style>
            <script type="text/javascript" src="javascript/formulario_producto_validacion.js"></script>
    </head>

    <body>
        <h1>Formulario de inserción de datos a la tabla Productos de la BD Marketzone</h1>
        <form id="form_insert" action="set_producto_v2.php" method="post">
            <h2>Nuevo Producto</h2>
            <fieldset>
                <legend>Inserta los datos del nuevo producto:</legend>
                <ul>
                    <li>
                        <label for="nombre">Nombre: </label><input id="nombre" name="nombre_producto" type="text" size="25" maxlength="200" onblur="verificarCampoVacio(this, 'validacion-nombre')" value="<?= !empty($_POST['nombre'])?$_POST['nombre']:""?>">
                        <p class="mensaje-de-validacion" id="validacion-nombre"></p>
                    </li>
                    <li>
                    <label for="marca">Marca: </label><input id="marca" name="marca_producto" type="text" size="25" maxlength="200" onblur="verificarCampoVacio(this, 'validacion-nombre')" value="<?= !empty($_POST['marca'])?$_POST['marca']:""?>">

                        <p class="mensaje-de-validacion" id="validacion-marca"></p>
                    </li>
                    <li>
                        <label for="modelo">Modelo: </label><input id="modelo" name="modelo_producto" type="text" size="25" maxlength="100" onblur="verificarCampoVacio(this, 'validacion-modelo')" value="<?= !empty($_POST['modelo'])?$_POST['modelo']:""?>">
                        <p class="mensaje-de-validacion" id="validacion-modelo"></p>
                    </li>
                    <li>
                        <label for="precio">Precio: $</label><input id="precio" name="precio_producto" type="text" size="25" maxlength="100" placeholder="0.00" onblur="verificarCampoVacio(this, 'validacion-precio')"value="<?= !empty($_POST['precio'])?$_POST['precio']:""?>">
                        <p class="mensaje-de-validacion" id="validacion-precio"></p>
                    </li>
                    <li>
                        <label for="unidades">Unidades: </label><input id="unidades" name="unidades_producto" type="number" min="0" onblur="verificarCampoVacio(this, 'validacion-unidades')"value="<?= !empty($_POST['unidades'])?$_POST['unidades']:""?>">
                        <p class="mensaje-de-validacion" id="validacion-unidades"></p>
                    </li>
                    <li>
                        <label for="detalles">Detalles: </label><br/><textarea id="detalles" name="detalles_producto" rows="4" cols="60" ><?= !empty($_POST['detalles'])?$_POST['detalles']:""?></textarea>
                        <p class="mensaje-de-validacion" id="validacion-detalles"></p>
                    </li>
                    <li>
                        <label for="ruta-img">Ruta de la Imagen: </label><input id="ruta-img" name="ruta_img_producto" type="text" size="20" maxlength="200" placeholder="ej: img/imagen.png" value="<?= !empty($_POST['imagen'])?$_POST['imagen']:""?>">
                        <p class="mensaje-de-validacion" id="validacion-img"></p>
                    </li>
                </ul>
            </fieldset>
            <p>
                <input type="button" value="ACTUALIZAR" onClick="validarFormulario()">
            </p>
        </form>
    </body>
</html>