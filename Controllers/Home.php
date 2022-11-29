<?php
    class Home extends Controller
    {
        public function __construct() {
            session_start();                                   #Inicalizamos sesion
            if (!empty($_SESSION['activo'])) {
                header("location: ".base_url."Configurar/home");
            }
    
            parent::__construct();              #se la cargamos constructor de las vistas
        }
        
        public function index(){
            
            $this->views->getView($this, "index");
        }

    }
    


?>