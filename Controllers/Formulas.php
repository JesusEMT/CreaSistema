<?php

class Formulas extends Controller{
     
    public function __construct() { 
        session_start();                         #Inicalizamos sesion
       

        parent::__construct();                  #cargamos constructor de la instancia para que funcione el modelo
    }

    public function index()
    {
        if (empty($_SESSION['activo'])) {                  #Verificamos sino hay sesion activa
            header("location: ".base_url);                 #sino existe una cuwnta activa se redirecciona al login
        }  
    
        $this->views->getView($this, "index");            //vista visible (controlador, archivo visible)
    }









}




?>