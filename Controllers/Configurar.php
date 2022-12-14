<?php
class Configurar extends Controller{                         #clase usuarios heredados clase controller     
   
    public function __construct() { 
        session_start();                                   #Inicalizamos sesion
       

        parent::__construct();                             #cargamos constructor de la instancia para que funcione el modelo
    }
    public function index()
    {
        // if (empty($_SESSION['activo'])) {                  #Verificamos sino hay sesion activa
        //     header("location: ".base_url);                 #
        // }  
        $data= $this->model->getEmpresa();
        // if (empty($data['nombre'])) $data['nombre'] = "Sin especificar";
        // if (empty($data['RFC'])) $data['RFC'] = "Sin especificar";
        // if (empty($data['telefono'])) $data['telefono'] = "Sin especificar";
        // if (empty($data['direccion'])) $data['direccion'] = "Sin especificar";
        // if (empty($data['num_dir_empresa'])) $data['num_dir_empresa'] = "Sin especificar";
        // if (empty($data['email_empresa'])) $data['email_empresa'] = "Sin especificar";
        // if (empty($data['mensaje'])) $data['mensaje'] = "Sin especificar";
        if (empty($data['ID'])) $data= $this->model->crearEmpresa();  
        $data= $this->model->getEmpresa();

        $this->views->getView($this, "index",$data);
    }   

    public function home()
    {
        // if (empty($_SESSION['activo'])) {                  #Verificamos sino hay sesion activa
        //     header("location: ".base_url);                 #
        // }  
        $data['usuario']= $this->model->getDatos('usuario');
        $data['clientes']= $this->model->getDatos('clientes');
        $data['productos']= $this->model->getDatos('productos');
        $data['ventas']= $this->model->getVentas();
        $this->views->getView($this, "home", $data);
    }

    public function salir()
    {
        session_destroy();
        header("location: ".base_url);
    }

    public function modificar(){
        // print_r($_POST);
        // exit;

        $nombre = $_POST['nombre'];         
        $RFC = $_POST['rfc'];               
        $telefono = $_POST['telefono'];     
        $direccion = $_POST['direccion'];   
        $num = $_POST['num_dir_empresa'];   
        $email = $_POST['correo'];          
        $mensaje = $_POST['mensaje'];       
        $id = $_POST['id'];       

        $data= $this->model->modificarEmp( $nombre, $RFC , $telefono, $direccion, $num, $email, $mensaje, $id);
            if ($data == "ok") {
                $msg = "modificado";
            }else{
                $msg = "Error";
            }        
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die(); 
    }

    public function reporteStock()
    {
        $data= $this->model->getStockMinimo();
        // print_r($data);
        echo json_encode($data);
        die(); 
    }

    public function productosVendidos()
    {
        $data= $this->model->getMasVendidos();
        // print_r($data);
        echo json_encode($data);
        die(); 
    }


}