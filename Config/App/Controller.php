<?php

class Controller{

    public function __construct()
    {
         $this-> views = new Views();
         $this->cargarModel();                         
    }

    public function cargarModel()                       #Este metodo es llamado dentro del contructor
    {
        $model = get_class($this)."Model";              #Obtiene el nombre de la clase de cada controloador con get_class y se concatena con .Model
        $ruta = "Models/".$model.".php";                #Especifa ruta del modelo
        if (file_exists($ruta)) {                       #Verifica si exite ese archivo
            require_once $ruta;                         #Si exite lo requerimos 
            $this->model = new $model();                #Intancia 
        }
    }
}

?>