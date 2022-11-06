<?php
class Views{

    public function getView($controlador, $vista, $data="")         #Funcion metodo  getView para mostrar la vista
    {
        $controlador = get_class($controlador);                     #Obtiene el nombre de la clase
        if ($controlador == "Home") {                               #Verficamos si el controlador es igual a home
            $vista = "Views/".$vista.".php";                        #Si es igual indica a que vista acceder .$vista
        }else{
            $vista = "Views/".$controlador."/".$vista.".php";       #Si diferente se concatna el controlador y la vista 
        }
        require $vista;
    }
}


?>