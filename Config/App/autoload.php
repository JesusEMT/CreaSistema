<?php
    spl_autoload_register(function($class){                        #
        if (file_exists("Config/App/".$class.".php")) {            #Verificamos en si existe el archivo
            require_once "Config/App/" . $class . ".php";          #Si exite requeirmos el archivo
        }
    })

?>