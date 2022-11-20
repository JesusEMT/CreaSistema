<?php
class Clientes extends Controller{                         #clase usuarios heredados clase controller     
   
    public function __construct() { 
        session_start();                                   #Inicalizamos sesion
       

        parent::__construct();                             #cargamos constructor de la instancia para que funcione el modelo
    }
    public function index()
    {
        if (empty($_SESSION['activo'])) {                  #Verificamos sino hay sesion activa
            header("location: ".base_url);                 #
        }  
        //$this->views->getView($this,"index");              #mediante this accede a views con el metodo getviews (controlador, "vista")
        //print_r($this->model->getUsuario());
        
        $this->views->getView($this, "index");
    }
    public function listar()
    {
        $data = $this->model->getClientes();
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                    <button class="btn btn-primary" type="button" onclick="editarCli('.$data[$i]['ID'].');">  <i class= "fas fa-edit">  </i>  </button>
                    <button class="btn btn-danger" type="button"  onclick="btnEliminarCli('.$data[$i]['ID'].');"><i class= "fas fa-trash-alt">  </i></button>
                <div/>';
            }else{
                $data[$i]['estado'] = '<span class="badge bg-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                    <button class="btn btn-success" type="button" onclick="btnReingresarCli('.$data[$i]['ID'].');"><i class= "fas fa-undo-alt"> </i> </button>
                <div/>';
            }
          
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    
    public function registrar()
    {
        // print_r($_POST);
        // exit();
        $telefono = $_POST['telefono'];
        $nombre = $_POST['nombre'];
        $paterno = $_POST['paterno'];
        $materno = $_POST['materno'];
        $email = $_POST['email'];
        $direccion = $_POST['direccion'];
        $num = $_POST['num'];
        $id = $_POST['id'];


        if (empty($email)) {
            $email = "Sin Correo";
        }
        if (empty($direccion)) {
            $direccion = "Sin dirección"; 
            $num = "S/N";
        }
        if (empty($num)) {
            $num = "S/N";
        }

        if (empty($telefono) || empty($nombre)|| empty($paterno) || empty($materno)) {
            $msg = "Todos los campos son obligatorios";  
        }else{
            if ($id == "") {                       //Si es vacio se hara la INSERT
                    $data = $this->model->registrarClientes($telefono, $nombre, $paterno, $materno, $email, $direccion, $num);            //trae el metodo registrar usuario de Model
                    if ($data == "ok") {
                        $msg = "si";
                    }else if($data == "existe"){
                        $msg = "El Cliente ya existe";
                    }else{
                        $msg = "Error al registrar Cliente";
                    }
                    
            }else{
                $data = $this->model->modificarCliente($telefono, $nombre, $paterno, $materno, $email, $direccion, $num, $id);            //trae el metodo editar usuario de Model
                if ($data =="modificado") {
                    $msg = "modificado";
                }else{
                    $msg = "Error al modificar el Cliente";
                }
            }          
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();   
    }
    
    public function editar(int $ID)
    {       
        $data = $this->model->editarCli($ID);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);        //json pra no tener problema con acentos
        die();
        // print_r($data);
    }

    public function eliminar(int $ID)
    {
        // print_r($id_usuario);
        $data = $this->model->estadoCli(0,$ID);
        // print_r($data);
        if ($data == 1) {
            $msg = "ok";
        }else{
            $msg = "Error al eliminar el cliente";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $ID)
    {
        // print_r($id_usuario);
        $data = $this->model->estadoCli(1,$ID);
        // print_r($data);
        if ($data == 1) {
            $msg = "ok";
        }else{
            $msg = "Error al reingresar el cliente";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function salir()
    {
        session_destroy();
        header("location: ".base_url);
    }
}