<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
    $variable1 = "PHP 5";
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
       <title>Pr&aacute;ctica 2 - Variables PHP</title>
    </head>
    <body>
        <h2>Determina cuál de las siguientes variables son válidas y explica por qué:</h2>
        <p>
            $_myvar; //válida porque comienza con underscore<br>
            $_7var; //válida porque comienza con un underscore<br>
            myvar;  //no válida porque falta el símbolo '$'<br>
            $myvar; //válida porque comienza con una letra<br>
            $var7;  //válida porque comienza con una letra<br>
            $_element1; //válida porque comienza con underscore<br>
            $house*5;   //no válida por contener el '*'<br>
        </p>
        <?php
        $_myvar;
        $_7var;
        //myvar;
        $myvar;
        $var7;
        $_element1;
        //$house*5;
        ?>
        <hr>
        <h2>2. Proporcionar los valores de $a, $b, $c como sigue:</h2>
        <p>
            $a = “ManejadorSQL”;<br>
            $b = 'MySQL’;<br>
            $c = &$a;<br>
            <?php
            $a = "ManejadorSQL";
            $b = 'MySQL';
            $c = &$a;
            ?>
            <h3>a. Ahora muestre el contenido de cada variable</h3>
            <?php echo "$a <br> $b <br> $c"; ?>
            <h3>b. Agrega al contenido actual las siguientes asignaciones (describe qué está ocurriendo):</h3>
            $a = "PHP Server"; //En esta línea se asigna la cadena "PHP Server" a la variable $a<br>
            $b = &$a; //En esta segunda línea se referencia a $a via $b
            <?php
            $a = "PHP Server";
            $b = &$a;
            ?>
            <h3>c. Vuelve a mostrar el contenido de cada uno</h3>
            <?php
            echo "$a <br> $b <br> $c";
            ?>
            <h3>d. Describe en y muestra en la página obtenida qué ocurrió en el segundo bloque de asignaciones</h3>
            En el segundo bloque de asignaciones la variable $a esta tomando el nuevo valor de "PHP Server"<br>
            y la variable $b esta referenciando a la variable $a, además, la variable $c de igual forma<br>
            ya estaba referenciando a $a desde el primer bloque de asignaciones, por ello, cuando mandamos<br>
            a imprimir las tres variables, las tres nos devuelven el mismo texto de "PHP Server"
        </p>
        <hr>
        <h2>3. Muestra el contenido de cada variable inmediatamente después de cada asignación,<br>
            verificar la evolución del tipo de estas variables (imprime todos los componentes de los<br>
            arreglo):</h2>
        <p>
            <?php
            $a = "PHP5";
            echo $a;
            
            echo"<br>";
            
            $z[] = &$a;
            print_r($z);
            
            echo "<br>";
            
            $b = "5a version de PHP";
            echo $b;
            
            echo "<br>";
            
            $c = settype($b,"integer")*10;
            echo $c;
            
            echo"<br>";
            
            $a .= strval($b);
            echo $a;
            
            echo "<br>";
            
            $b *= $c;
            echo $b;
            
            echo "<br>";
            
            $z[0] = "MySQL";
            print_r($z);
            ?>
        </p>
      
    </body>
</html>