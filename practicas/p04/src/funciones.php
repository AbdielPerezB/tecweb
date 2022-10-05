<?php

function multiplo5y7($numero) {
    if(($numero%5 == 0) && ($numero%7 == 0)){
        return $numero.' si es múltiplo de 5 y 7';
    }else{
        return $numero.' NO es múltiplo de 5 y 7';
    }
}

function imparparimpar(){
    $arreglo = [3];
    $matriz = [];

    $contador = 0;
    do{
        global $arreglo;
        global $matriz;
        
        $a = rand(1,1000);
        $b = rand(1,1000);
        $c = rand(1,1000);
        
        $arreglo[0] = $a;
        $arreglo[1] = $b;
        $arreglo[2] = $c;
        
        $matriz[] = $arreglo;
        
        $contador++;

    }while(($a%2 == 0) || ($b%2 != 0) || ($c%2 == 0));

    foreach($matriz as $fila){
        echo $fila[0]." ".$fila[1]." ".$fila[2];
        echo "<br>";
    }
    echo "<br>";
    $elementos = $contador*3;
    echo "$elementos elementos obtenidos de $contador iteraciones";
}

function ejercicio3($numero){
    $numero_random = rand();
    echo $numero_random;
    echo "<br>";
    while($numero_random%$numero != 0){
        $numero_random = rand();
        echo $numero_random;
        echo "<br>";
    }
}
//variante do-while
/*function ejercicio3($numero){
    do{
        $numero_random = rand();
        echo $numero_random;
        echo "<br>";
    }while($numero_random%$numero != 0);
}*/

?>