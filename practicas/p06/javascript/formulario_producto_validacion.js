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
        document.getElementById('validacion-nombre').innerHTML = '*Máximo 100 caracteres';

    }
    if( marca.length > 25){
        formularioValido = false;
        document.getElementById('validacion-marca').innerHTML = '*Máximo 25 caracteres';

    }
    if(detalles.length > 250){
        formularioValido = false;
        document.getElementById('validacion-detalles').innerHTML = '*Máximo 250 caracteres';

    }
    if(ruta_img.length > 100){
        formularioValido = false;
        document.getElementById('validacion-img').innerHTML = '*Máximo 100 caracteres';

    }

    /*Validamos que ningún campo este vacío*/
    campos = new Array (7);
    campos[0] = nombre;
    campos[1] = marca;
    campos[2] = modelo;
    campos[3] = precio;
    campos[4] = unidades;
    campos[5] = detalles;
    campos[6] = ruta_img;
    var i;
    for(i = 0; i < 7; i++){
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