<?php

function multiplo5y7($numero) {
    if(($numero%5 == 0) && ($numero%7 == 0)){
        return $numero.' si es múltiplo de 5 y 7';
    }else{
        return $numero.' NO es múltiplo de 5 y 7';
    }
}

?>