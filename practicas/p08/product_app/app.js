// JSON BASE A MOSTRAR EN FORMULARIO
//Iicialmente es un Objeto Literal de JavaScript
var baseJSON = {
    "precio": 100.0,
    "unidades": 10,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function buscarID(e) {
    /**
     * Revisar la siguiente información para entender porqué usar event.preventDefault();
     * http://qbit.com.mx/blog/2013/01/07/la-diferencia-entre-return-false-preventdefault-y-stoppropagation-en-jquery/#:~:text=PreventDefault()%20se%20utiliza%20para,escuche%20a%20trav%C3%A9s%20del%20DOM
     * https://www.geeksforgeeks.org/when-to-use-preventdefault-vs-return-false-in-javascript/
     */
    e.preventDefault();

    // SE OBTIENE EL ID A BUSCAR
    var texto_a_buscar = document.getElementById('search').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {            
            // SE OBTIENE EL OBJETO LITERAL DE JAVASCRIPT A PARTIR DEL JSON QUE ENVIÓ EL PHP
            let productos = JSON.parse(client.responseText);
            console.log('[CLIENTE]:'+productos);
            /*for(var i = 0;i<productos.length;i++){
                console.log(productos[i].nombre);                                
                console.log(productos[i].marca);                                
                console.log(productos[i].modelo);                                
                console.log(productos[i].precio);                                
            }*/
            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
            if(Object.keys(productos).length > 0) {
                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                var i;
                let descripcion = '';
                let template = '';
                let templateFinal = '';
                for(i = 0; i < productos.length; i++){
                        descripcion = '';
                        descripcion += '<li>precio: '+productos[i].precio+'</li>';
                        descripcion += '<li>unidades: '+productos[i].unidades+'</li>';
                        descripcion += '<li>modelo: '+productos[i].modelo+'</li>';
                        descripcion += '<li>marca: '+productos[i].marca+'</li>';
                        descripcion += '<li>detalles: '+productos[i].detalles+'</li>';
                    
                    // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
                        template = '';
                        template += `
                            <tr>
                                <td>${productos[i].id}</td>
                                <td>${productos[i].nombre}</td>
                                <td><ul>${descripcion}</ul></td>
                            </tr>
                        `;
                        templateFinal += template;
                }
                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("productos").innerHTML = templateFinal;
                 
            }
        }
    };
    client.send("texto="+texto_a_buscar);
}

// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
    e.preventDefault();

    // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
    var productoJsonString = document.getElementById('description').value;
    // SE CONVIERTE EL JSON DE STRING A OBJETO LITERAL
    var finalJSON = JSON.parse(productoJsonString);
    // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
    finalJSON['nombre'] = document.getElementById('name').value;

    //Validamos el formulario
    if(finalJSON['nombre'] == ''){//El nombre no puede estar vacío
        alert('[CLIENTE]: Error, el nombre no puede estar vacío');
    }else if(finalJSON['marca'] == ''){//La marca no puede estar vacía
        alert('[CLIENTE]: Error, la marca no puede estar vacía');
    }else if(finalJSON['modelo'] == '' || finalJSON['modelo'].length > 25){//La marca no puede estar vacía y tener máximo 25 caracteres
        alert('[CLIENTE]: Error en el modelo');
    }else if(finalJSON['precio'] == '' || finalJSON['precio'] <= 99.99){//El precio debe ser requerido y tener mínimo 99.99
        alert('[CLIENTE]: Error, el precio debe ser mayor a $99.99');
    }else if(finalJSON['detalles'].length > 250){//Los detalles son opcionales y de haber son máximo 250 caracteres
        alert('[CLIENTE]: Los detalles no deben exceder los 250 caracteres');
    }else if(finalJSON['unidades'] < 0){//Las unidades deben ser requridas y mayor o igual a cero
        alert('[CLIENTE]: Las unidades deben ser mayor o igual a cero');
    }else if(finalJSON['imagen'] == ''){
        finalJSON['imagen'] = 'img/default.png';
    }
    //si el formulario esta bien, procedemos
    else{
        // SE OBTIENE EL STRING DEL JSON FINAL
        productoJsonString = JSON.stringify(finalJSON,null,2);

        // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
        var client = getXMLHttpRequest();
        client.open('POST', './backend/create.php', true);
        client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
        client.onreadystatechange = function () {
            // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
            if (client.readyState == 4 && client.status == 200) {
                //console.log(client.responseText);
                alert(client.responseText);
            }
        };
        client.send(productoJsonString);
    }
    
}

// SE CREA EL OBJETO DE CONEXIÓN COMPATIBLE CON EL NAVEGADOR
function getXMLHttpRequest() {
    var objetoAjax;

    try{
        objetoAjax = new XMLHttpRequest();
    }catch(err1){
        /**
         * NOTA: Las siguientes formas de crear el objeto ya son obsoletas
         *       pero se comparten por motivos historico-académicos.
         */
        try{
            // IE7 y IE8
            objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        }catch(err2){
            try{
                // IE5 y IE6
                objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
            }catch(err3){
                objetoAjax = false;
            }
        }
    }
    return objetoAjax;
}

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
}