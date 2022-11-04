function verificarCampoVacio(control, control_para_mostrar_mensaje){
    if (control.value == ''){
        document.getElementById(control_para_mostrar_mensaje).innerHTML = '*No puedes dejar el campo vacío <br><br>';
    }else{
        document.getElementById(control_para_mostrar_mensaje).innerHTML = '';
    }
}
/*Validamos todo*/
function validarFormulario(){
    var formularioValido = true;

    var nombre = document.getElementById('nombre').value;
    var marca = document.getElementById('marca').value;
    var modelo = document.getElementById('modelo').value;
    var precio = document.getElementById('precio').value;
    var unidades = document.getElementById('unidades').value;
    var detalles = document.getElementById('detalles').value;
    var ruta_img = document.getElementById('ruta-img').value;

    /*Verificamos que la longitud de algunos campos sea correcta, como la definimos en la BD*/
    if(nombre.length>100){
        formularioValido = false;
        document.getElementById('validacion-nombre').innerHTML = '*Máximo 100 caracteres<br><br';

    }
    if( modelo.length > 25){
        formularioValido = false;
        document.getElementById('validacion-modelo').innerHTML = '*Máximo 25 caracteres<br><br';

    }
    if( marca.length > 25){
        formularioValido = false;
        document.getElementById('validacion-marca').innerHTML = '*Máximo 25 caracteres<br><br';

    }
    if(detalles.length > 250){
        formularioValido = false;
        document.getElementById('validacion-detalles').innerHTML = '*Máximo 250 caracteres<br><br';
    }
    if(ruta_img.length > 50){
        formularioValido = false;
        document.getElementById('validacion-img').innerHTML = '*Máximo 50 caracteres';

    }

    /*Verificamos otros aspectos */
    if(precio< 99.99){
        formularioValido = false;
        document.getElementById('validacion-precio').innerHTML = '*El precio debe ser mayor a $99.99<br><br>';
    }
    if(unidades < 0){
        formularioValido = false;
        document.getElementById('validacion-unidades').innerHTML = '*Las unidades deben ser mayor o igual a 0<br><br';

    }

    /*Validamos que ningún campo este vacío*/
    campos = new Array (5);
    campos[0] = nombre;
    campos[1] = marca;
    campos[2] = modelo;
    campos[3] = precio;
    campos[4] = unidades;

    var i;
    for(i = 0; i < 5; i++){
        if(campos[i] == ''){
            formularioValido = false;
        }
    }

    /*Resultado de validación*/
    if(formularioValido == false){
        alert('El formulario no es válido');
    }else{
        form = document.getElementById('form_insert');
        form.submit();
    }
}