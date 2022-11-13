<?php
class Ingredientes extends Controller{                         #clase usuarios heredados clase controller     
   
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
        
        $data['medidas'] = $this->model->getMedidas();        // obtiene lista y muestra en 'medidas' asi llamdao en foreach de index
        $this->views->getView($this, "index",$data);
    }
    public function listar()
    {
        $data = $this->model->getIngredientes();
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                    <button class="btn btn-primary" type="button" onclick="btnEditarIngre('.$data[$i]['ID'].');">  <i class= "fas fa-edit">  </i>  </button>
                    <button class="btn btn-danger" type="button"  onclick="btnEliminarIngre('.$data[$i]['ID'].');"><i class= "fas fa-trash-alt">  </i></button>
                <div/>';
            }else{
                $data[$i]['estado'] = '<span class="badge bg-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                    <button class="btn btn-success" type="button" onclick="btnReingresarIngre('.$data[$i]['ID'].');"><i class= "fas fa-undo-alt"> </i> </button>
                <div/>';
            }
            
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    
    public function registrar()
    {
        // print_r($_POST);
        // exit;
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $medida = $_POST['medida'];
        $cantidad = $_POST['cantidad'];
        $id = $_POST['id'];

        if (empty($codigo) || empty($nombre)|| empty($medida) || empty($cantidad)) {
            $msg = "Todos los campos son obligatorios";  
        }else{
            if ($id == "") {
                $data = $this->model->registrarIngrediente($codigo,$nombre,$medida,$cantidad);            //trae el metodo registrar producto de Model
                if ($data == "ok") {
                    $msg = "si";
                }else if($data == "existe"){
                    $msg = "El Ingrediente ya existe";
                }else{
                    $msg = "Error al registrar Ingrediente";
                }   
            }else{
                $data = $this->model->modificarIngrediente($codigo,$nombre,$medida,$cantidad,$id);            //trae el metodo editar usuario de Model
                if ($data =="modificado") {
                    $msg = "modificado";
                }else{
                    $msg = "Error al modificar el Ingrediente";
                }
            }          
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar(int $id)
    {       
        $data = $this->model->editarIngre($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);        //json pra no tener problema con acentos
        die();
        // print_r($data);
    }

    public function eliminar(int $id)
    {
        // print_r($id_usuario);
        $data = $this->model->estadoIngre(0,$id);
        // print_r($data);
        if ($data == 1) {
            $msg = "ok";
        }else{
            $msg = "Error al eliminar el Ingrediente";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id)
    {
        $data = $this->model->estadoIngre(1,$id);
        if ($data == 1) {
            $msg = "ok";
        }else{
            $msg = "Error al reingresar el Ingrediente";
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