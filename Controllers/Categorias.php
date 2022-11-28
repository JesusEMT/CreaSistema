<?php
class Categorias extends Controller{                         #clase usuarios heredados clase controller     
   
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
        
        // $data['cajas'] = $this->model->getCajas();
        $this->views->getView($this, "index");
    }
    public function listar()
    {
        $data = $this->model->getCategorias();
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                    <button class="btn btn-primary" type="button" onclick="btnEditarCat('.$data[$i]['ID'].');">  <i class= "fas fa-edit">  </i>  </button>
                    <button class="btn btn-danger" type="button"  onclick="btnEliminarCat('.$data[$i]['ID'].');"><i class= "fas fa-trash-alt">  </i></button>
                <div/>';
            }else{
                $data[$i]['estado'] = '<span class="badge bg-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                    <button class="btn btn-success" type="button" onclick="btnReingresarCat('.$data[$i]['ID'].');"><i class= "fas fa-undo-alt"> </i> </button>
                <div/>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    
    public function registrar()
    {
        //print_r($_POST);
        $nombre = $_POST['nombre'];
        $id = $_POST['id'];

        if (empty($nombre)) {
            $msg = "Todos los campos son obligatorios";  
        }else{
            if ($id == "") {                                    //Si es vacio se hara la INSERT 
                $data = $this->model->registrarCategoria($nombre);            //trae el metodo registrar usuario de Model
                if ($data == "ok") {
                    $msg = "si";
                }else if($data == "existe"){
                    $msg = "La categoria ya existe";
                }else{
                    $msg = "Error al registrar categoria";
                }  
            }else{
                $data = $this->model->modificarCategoria($nombre,$id);            //trae el metodo editar usuario de Model
                if ($data =="modificado") {
                    $msg = "modificado";
                }else{
                    $msg = "Error al modificar la categoria";
                }
            }          
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();        
    }

    public function editar(int $ID)
    {       
        $data = $this->model->editarCategoria($ID);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);        //json pra no tener problema con acentos
        die();
        // print_r($data);
    }

    public function eliminar(int $ID)
    {
        // print_r($ID);
        $data = $this->model->estadoCategoria(0,$ID);
        // print_r($data);
        if ($data == 1) {
            $msg = "ok";
        }else{
            $msg = "Error al eliminar la categoria";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $ID)
    {
        // print_r($ID);
        $data = $this->model->estadoCategoria(1,$ID);
        // print_r($data);
        if ($data == 1) {
            $msg = "ok";
        }else{
            $msg = "Error al reingresar la categoria";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    // public function salir()
    // {
    //     session_destroy();
    //     header("location: ".base_url);
    // }
}