<?php

    require_once "Config/Config.php";    
    #configuraremos los controladores[0], métodos[1] y parámetros[2,3,4,...]
    $ruta = !empty($_GET['url']) ? $_GET['url'] : "Home/index";     #Si no existe la varieble url entonce se asigana Home/index
    $array = explode("/", $ruta);                                   #Con explode convertimos en arreglo (delimitador, ruta)
    $controller = $array[0];                                        #controller el la posicion 0 del array
    $metodo = "index";                                              #metodo por defecto index
    $parametro = "";             

    if (!empty($array[1])) {                                        #Verificamos si el array[1] no esta vacio
        if (!empty($array[1] != "")) {
            $metodo = $array[1];                                    #asiganamos el valor a $metodo
        }
    }

    if (!empty($array[2])) {                                       #Verificamos si el array[2] no esta vacio
        if (!empty($array[2] != "")) {
            for ($i=2; $i < count($array); $i++) { 
                $parametro .= $array[$i]. ",";                    #$parametro es igual los velores de array2 en adelante y concatemos una coma
            }
            $parametro = trim($parametro, ",");                   # quitar la ultima coma de $parametro 
        }
    }

    require_once "Config/App/autoload.php";

    $dirControllers = "Controllers/" . $controller . ".php";      #variable apara almacenar la ruta de la carpeta Controllers y se concatena con la obtenida de url
    if (file_exists($dirControllers)) {                           #Verificamos si exite la ruta
        require_once $dirControllers;                             #
        $controller = new $controller();
        if (method_exists($controller, $metodo)) {
            $controller->$metodo($parametro);
        } else {
            echo 'No existe el metodo';
        }
    }else{
        echo 'No existe el controlador';
    }



?>
