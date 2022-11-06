<?php
class Usuarios extends Controller{                         #clase usuarios heredados clase controller     
    public function __construct() {
        session_start();                                   #Inicalizamos sesiones

        parent::__construct();                             #cargamos constructor de la instancia para que funcione el modelo
    }
    public function index()
    {
        //$this->views->getView($this,"index");              #mediante this accede a views con el metodo getviews (controlador, "vista")
        //print_r($this->model->getUsuario());
        // if (empty($_SESSION['activo'])) {
        //     header("location: " . base_url);
        // }
        // $data['cajas'] = $this->model->getCajas();
        $this->views->getView($this, "index");
    }
    // public function listar()
    // {
    //     $data = $this->model->getUsuarios();
    //     for ($i=0; $i < count($data); $i++) { 
    //         if ($data[$i]['estado'] == 1) {
    //             $data[$i]['estado'] = '<span class="badge bg-success">Activo</span>';
    //             $data[$i]['acciones'] = '<div>
    //             <button class="btn btn-primary" type="button" onclick="btnEditarUser(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i></button>
    //             <button class="btn btn-danger" type="button" onclick="btnEliminarUser(' . $data[$i]['id'] . ');"><i class="fas fa-trash-alt"></i></button>
    //             <div/>';
    //         }else {
    //             $data[$i]['estado'] = '<span class="badge bg-danger">Inactivo</span>';
    //             $data[$i]['acciones'] = '<div>
    //             <button class="btn btn-success" type="button" onclick="btnReingresarUser(' . $data[$i]['id'] . ');"><i class="fas fa-circle"></i></button>
    //             <div/>';
    //         }
    //     }
    //     echo json_encode($data, JSON_UNESCAPED_UNICODE);
    //     die();
    // }
    public function validar()
    {     
        if (empty($_POST['usuario']) || empty($_POST['pass'])) {            //verificamos si los campos estan vacios
            $msg = "Los campos estan vacios";
        }else{                                                              //Si es diferente a vacio
            $usuario = $_POST['usuario'];                            
            $pass = $_POST['pass'];
    //         $hash = hash("SHA256", $clave);
            $data = $this->model->getUsuario($usuario,$pass);
            if ($data) {
                $_SESSION['id_usuario'] = $data['ID_usuario'];
                $_SESSION['usuario'] = $data['clave_usuario'];
                $_SESSION['nombre'] = $data['nombre_usuario'];
                //$_SESSION['activo'] = true;
                $msg = "ok";
            }else{
                $msg = "Usuario o contraseña incorrecta";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        //print_r($data);
        die();
    }
    
    // public function registrar()
    // {
    //     $usuario = $_POST['usuario'];
    //     $nombre = $_POST['nombre'];
    //     $clave = $_POST['clave'];
    //     $confirmar = $_POST['confirmar'];
    //     $caja = $_POST['caja'];
    //     $id = $_POST['id'];
    //     $hash = hash("SHA256", $clave);
    //     if (empty($usuario) || empty($nombre) || empty($caja)) {
    //         $msg = array('msg' => 'Todo los campos son obligatorios', 'icono' => 'warning');
    //     }else{
    //         if ($id == "") {
    //             if($clave != $confirmar){
    //                 $msg = array('msg' => 'Las contraseña no coinciden', 'icono' => 'warning');
    //             }else{
    //                 $data = $this->model->registrarUsuario($usuario, $nombre, $hash, $caja);
    //                 if ($data == "ok") {
    //                     $msg = array('msg' => 'Usuario registrado con éxito', 'icono' => 'success');
    //                 }else if($data == "existe"){
    //                     $msg = array('msg' => 'El usuario ya existe', 'icono' => 'warning');
    //                 }else{
    //                     $msg = array('msg' => 'Error al registrar el usuario', 'icono' => 'error');
    //                 }
    //             }
    //         }else{
    //             $data = $this->model->modificarUsuario($usuario, $nombre, $caja, $id);
    //             if ($data == "modificado") {
    //                 $msg = array('msg' => 'Usuario modificado con éxito', 'icono' => 'success');
    //             }else {
    //                 $msg = array('msg' => 'Error al modificar el usuario', 'icono' => 'error');
    //             }
    //         }
    //     }
    //     echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    //     die();
    // }
    // public function editar(int $id)
    // {
    //     $data = $this->model->editarUser($id);
    //     echo json_encode($data, JSON_UNESCAPED_UNICODE);
    //     die();
    // }
    // public function eliminar(int $id)
    // {
    //     $data = $this->model->accionUser(0, $id);
    //     if ($data == 1) {
    //         $msg = array('msg' => 'Usuario dado de baja', 'icono' => 'success');
    //     }else{
    //         $msg = array('msg' => 'Error al eliminar el usuario', 'icono' => 'error');
    //     }
    //     echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    //     die();
    // }
    // public function reingresar(int $id)
    // {
    //     $data = $this->model->accionUser(1, $id);
    //     if ($data == 1) {
    //         $msg = array('msg' => 'Usuario reingresado con éxito', 'icono' => 'success');
    //     } else {
    //         $msg = array('msg' => 'Error al reingresar el usuario', 'icono' => 'error');
    //     }
    //     echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    //     die();
    // }
    // public function salir()
    // {
    //     session_destroy();
    //     header("location: ".base_url);
    // }
}