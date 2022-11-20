<?php

class IngresarProducto extends Controller{
     
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

    public function listar()
    {
        $data = $this->model->getProductosTabla();
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-success">Activo</span>';
            }else{
                $data[$i]['estado'] = '<span class="badge bg-danger">Inactivo</span>';
            }
            
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function buscar($cod)
    {
        // $codigo = $_POST['codigo'];
        $data = $this->model->getProductoCod($cod);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);    // convertir variable data en json, JSON_UNESCAPED pra evia error con acentos
        die();
    }

    public function ingresar()
    {
        // print_r($_POST);
        // exit;    

        $id = $_POST['id'];
        $datos= $this->model->getProductos($id);
        // print_r($_POST);
        // exit;
        $id_producto = $datos['ID'];                                //Desde consulta
        $precio_creacion = $datos['precio_creacion'];               //Desde consulta
        $cantidad_ingresar = $_POST['cantidad_ingresar'];           //desde formulario con metodo POST
        $descripcion = $_POST['descripcion'];                       //desde formulario con metodo POST
        $id_usuario = $_SESSION['id_usuario'];                      //Desde la sesion, constructor inicializado
        $costo_total =  $precio_creacion * $cantidad_ingresar;
        $codigo = $_POST['codigo'];
        $cantidad_nueva = $datos['cantidad'] +$cantidad_ingresar;                             //Desde consulta
        $estado = 1;
        // print_r($_POST);
        // print_r($datos);
        // $descripcion = $_POST['descripcion'];
         
        if (empty($codigo) || empty($cantidad_ingresar) || empty($descripcion)) {
            $msg = "Todos los campos son obligatorios";  
        }else{    
            // $costo_total= intval($cantidad_ingresar) * intval($precio_creacion);
            // $costo_total = strval($costo_total);        
            $data = $this->model->registrarCompra($cantidad_ingresar,$descripcion, $costo_total, $id_producto, $id_usuario,$estado);            //trae el metodo editar usuario de Model
            if ($data =="ok") {
                // $costo_total= intval($cantidad_ingresar) * intval($precio_creacion);
                // $costo_total = strval($costo_total); 
                $data = $this->model->actualizarProducto($cantidad_nueva,$id_producto);            //trae el metodo editar usuario de Model
            }if ($data =="ok") {    
                $msg = "ok";
            }else{
                $msg = "Error al ingresar producto";
            }
                     
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    
    }

    public function eliminar()
    {
        // print_r($_POST);
        // exit;    

        $id = $_POST['id'];
        $datos= $this->model->getProductos($id);
        // print_r($_POST);
        // exit;
        $id_producto = $datos['ID'];                                //Desde consulta
        $precio_creacion = $datos['precio_creacion'];               //Desde consulta
        $cantidad_ingresar = $_POST['cantidad_ingresar'];           //desde formulario con metodo POST
        $descripcion = $_POST['descripcion'];                       //desde formulario con metodo POST
        $id_usuario = $_SESSION['id_usuario'];                      //Desde la sesion, constructor inicializado
        $costo_total =  ($precio_creacion * $cantidad_ingresar)*-1;
        $codigo = $_POST['codigo'];
        $cantidad_nueva = $datos['cantidad'] - $cantidad_ingresar;                             //Desde consulta
        $estado = 0;
        // print_r($_POST);
        // print_r($datos);
        // $descripcion = $_POST['descripcion'];
        // print_r($cantidad_nueva);
        // exit;
        

        if (empty($codigo) || empty($cantidad_ingresar) || empty($descripcion)) {
            $msg = "Todos los campos son obligatorios";
        }if ($cantidad_nueva<0) {
            $msg = "La cantidad de productos a eliminar supera al almacen";
        }else{    
            // $costo_total= intval($cantidad_ingresar) * intval($precio_creacion);
            // $costo_total = strval($costo_total);        
            $data = $this->model->registrarCompra($cantidad_ingresar,$descripcion, $costo_total, $id_producto, $id_usuario,$estado);            //trae el metodo editar usuario de Model
            if ($data =="ok") {
                // $costo_total= intval($cantidad_ingresar) * intval($precio_creacion);
                // $costo_total = strval($costo_total); 
                $data = $this->model->actualizarProducto($cantidad_nueva,$id_producto);            //trae el metodo editar usuario de Model
            }if ($data =="ok") {    
                $msg = "ok";
            }else{
                $msg = "Error al ingresar producto";
            }
                     
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    
    }
}