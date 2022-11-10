<?php
class Usuarios extends Controller{                         #clase usuarios heredados clase controller     
   
    public function __construct() { 
        session_start();                                   #Inicalizamos sesion
       

        parent::__construct();                             #cargamos constructor de la instancia para que funcione el modelo
    }
    public function index()
    {
        if (empty($_SESSION['activo'])) {                  #Verificamos sino hay sesion activa
            header("location: ".base_url);                 #sino existe una cuwnta activa se redirecciona al login
        }  
        //$this->views->getView($this,"index");              #mediante this accede a views con el metodo getviews (controlador, "vista")
        //print_r($this->model->getUsuario());
        
        $data['cajas'] = $this->model->getCajas();
        $this->views->getView($this, "index",$data);
    }
    public function listar()
    {
        $data = $this->model->getUsuarios();
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado_usuario'] == 1) {
                $data[$i]['estado_usuario'] = '<span class="badge bg-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                    <button class="btn btn-primary" type="button" onclick="editarUser('.$data[$i]['ID_usuario'].');">  <i class= "fas fa-edit">  </i>  </button>
                    <button class="btn btn-danger" type="button"  onclick="btnEliminarUser('.$data[$i]['ID_usuario'].');"><i class= "fas fa-trash-alt">  </i></button>
                <div/>';
            }else{
                $data[$i]['estado_usuario'] = '<span class="badge bg-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                    <button class="btn btn-success" type="button" onclick="btnReingresarUser('.$data[$i]['ID_usuario'].');"><i class= "fas fa-undo-alt"> </i> </button>
                <div/>';
            }
            
            // }else {
            //     $data[$i]['estado_usuario'] = '<span class="badge bg-danger">Inactivo</span>';
            //     $data[$i]['acciones'] = '<div>
            //     <button class="btn btn-success" type="button" </button>
            //     <div/>';
            // }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function validar()
    {     
        if (empty($_POST['usuario']) || empty($_POST['pass'])) {            //verificamos si los campos estan vacios
            $msg = "Los campos estan vacios";
        }else{                                                              //Si es diferente a vacio
            $usuario = $_POST['usuario'];                            
            $pass = $_POST['pass'];
            $hash = hash("SHA256", $pass);
            $data = $this->model->getUsuario($usuario,$hash);
            if ($data) {
                $_SESSION['id_usuario'] = $data['ID_usuario'];
                $_SESSION['usuario'] = $data['clave_usuario'];
                $_SESSION['nombre'] = $data['nombre_usuario'];
                $_SESSION['activo'] = true;                                 //mantener la sesion activo para proteger rutas privadas
                $msg = "ok";
            }else{
                $msg = "Usuario o contraseña incorrecta";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        //print_r($data);
        die();
    }
    
    public function registrar()
    {
        //print_r($_POST);
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        //$estado = $_POST['estado'];
        $pass = $_POST['pass'];
        $confirmar = $_POST['confirmar'];
        $caja = $_POST['caja'];
        $id = $_POST['id'];

        $hash = hash("SHA256", $pass);              //hash para encriptar contraseña con el tipo de SHA256
        if (empty($usuario) || empty($nombre)|| empty($direccion) || empty($telefono) || 
            empty($email) || empty($caja)) {
            $msg = "Todos los campos son obligatorios";  
        }else{
            if ($id == "") {                                    //Si es vacio se hara la INSERT
                if($pass != $confirmar){
                    $msg = "Las contraseña no coinciden";
                }else{
                    $data = $this->model->registrarUsuario($usuario, $nombre, $direccion,$telefono,$email,$hash,$caja);            //trae el metodo registrar usuario de Model
                    if ($data == "ok") {
                        $msg = "si";
                    }else if($data == "existe"){
                        $msg = "El usuario ya existe";
                    }else{
                        $msg = "Error al registrar usuario";
                    }
                }    
            }else{
                $data = $this->model->modificarUsuario($usuario, $nombre, $direccion, $telefono, $email, $caja, $id);            //trae el metodo editar usuario de Model
                if ($data =="modificado") {
                    $msg = "modificado";
                }else{
                    $msg = "Error al modificar el usuario";
                }
            }          
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    //         }else{
    //             $data = $this->model->modificarUsuario($usuario, $nombre, $caja, $id);
    //             if ($data == "modificado") {
    //                 $msg = array('msg' => 'Usuario modificado con éxito', 'icono' => 'success');
    //             }else {
    //                 $msg = array('msg' => 'Error al modificar el usuario', 'icono' => 'error');
    //             }
    //         }
    //     }
        
    }
    public function editar(int $id_usuario)
    {       
        $data = $this->model->editarUser($id_usuario);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);        //json pra no tener problema con acentos
        die();
        // print_r($data);
    }

    public function eliminar(int $id_usuario)
    {
        // print_r($id_usuario);
        $data = $this->model->estadoUser(0,$id_usuario);
        // print_r($data);
        if ($data == 1) {
            $msg = "ok";
        }else{
            $msg = "Error al eliminar el usuario";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id_usuario)
    {
        // print_r($id_usuario);
        $data = $this->model->estadoUser(1,$id_usuario);
        // print_r($data);
        if ($data == 1) {
            $msg = "ok";
        }else{
            $msg = "Error al reingresar el usuario";
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