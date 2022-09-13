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
        <h2>4. Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de<br>
            la matriz $GLOBALS o del modificador global de PHP.</h2>
        <p>
            <?php
            function mostrarVariables()
            {
                global $a, $z, $b, $c;
                echo $a;
                echo "<br>";
                print_r($z);
                echo "<br>";
                echo $b;
                echo "<br>";
                echo $c;
            }
            mostrarVariables();
            ?>
        </p>
        <h2>5. Dar el valor de las variables $a, $b, $c al final del siguiente script:</h2>
        <p>
            $a = “7 personas”;<br>
            $b = (integer) $a;<br>
            $a = “9E3”;<br>
            $c = (double) $a;<br>
            <?php
            $a = "7 personas";
            $b = intval($a);
            $a = "9E3";
            $c = doubleval($a);

            echo "<br>";
            echo $a;
            echo "<br>";
            echo $b;
            echo "<br>";
            echo $c;
            echo "<br>";
            ?>
        </p>
        <h2>6. Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas
            usando la función var_dump(< datos >).</h2>
        <p>
            <?php
            $a = "0";
            var_dump($a);

            echo "<br>";
            
            $b = "TRUE";
            var_dump($b);

            echo "<br>";
            
            $c = FALSE;
            var_dump($c);

            echo "<br>";
            
            $d = ($a OR $b);
            var_dump($d);

            echo "<br>";
            
            $e = ($a AND $c);
            var_dump($e);

            echo "<br>";
            
            $f = ($a XOR $b);
            var_dump($f);

            echo "<br>";
            ?>
            <h3>a. Después investiga una función de PHP que permita transformar el valor booleano de $c y $e<br>
                en uno que se pueda mostrar con un echo:</h3>
                <?php
                $c = settype($c,"int");
                $e = settype($e,"int");
                echo $c;
                echo "<br>";
                echo $e;
                echo "<br>";
                ?>


        </p>
      
    </body>
</html>