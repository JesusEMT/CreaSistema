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
                $id_compra= $this->model->id_compra();  
                $msg = array('msg' => 'ok', 'id_compra'=> $id_compra['MAX(ID)']);
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
                $id_compra= $this->model->id_compra();  
                $msg = array('msg' => 'ok', 'id_compra'=> $id_compra['MAX(ID)']);
            }else{
                $msg = "Error al eliminar producto";
            }
                     
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    
    }

    public function generarPdf($id_compra)
    {

        $empresa= $this->model->getEmpresa();               //Traer los datos de la tabla empresa
        $compra= $this->model->getCompra($id_compra);
        $nombre_completo= ($compra["nombre_usuario"]." ".$compra['paterno_usuario']." ".$compra['materno_usuario']);
        $direccion_completa= ($empresa["direccion"]."  #".$empresa['num_dir_empresa']);
        $estado_compra = $compra['estado'];

        if ( $estado_compra == 1 ) {
            $estado_compra = 'Alta productos';
        }
        else if ($estado_compra == 0) {
            $estado_compra = 'Baja productos';
        }

        require('Libraries/fpdf/fpdf.php');

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetTitle(utf8_decode('Reporte de producción'));
        $pdf->image(base_url.'Assets/img/CreaLogo1.png',150,10,30);     //ruta de imagen, x, y, width,height
        // $pdf->Ln(20);
        $pdf->SetFont('Arial','B',18);
        $pdf->Cell(180,10,utf8_decode($empresa['nombre']),0,1,'C');
        $pdf->Ln(15);
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(80,10, utf8_decode('Reporte de Producción'),0,1,'L');

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(20,10,'Fecha :',0,0,'L');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(30,10, utf8_decode($compra['fecha']),0,1,'L');

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(30,10,'Folio reporte :',0,0,'L');
        $pdf->SetFont('Arial','',12);
        // $pdf->Cell(20,10, utf8_decode($compra['ID']),0,1,'L');
        $pdf->Cell(20,10, $id_compra,0,1,'L');

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(30,10,'Tipo reporte :',0,0,'L');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(20,10, $estado_compra,0,1,'L');

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(30,10, utf8_decode('Clave usuario:'),0,0,'L');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(30,10, utf8_decode($compra['clave_usuario']),0,1,'L');

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(20,10, utf8_decode('Usuario:'),0,0,'L');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(30,10, $nombre_completo,0,1,'L');

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(30,10, utf8_decode('Descripción:'),0,0,'L');
        $pdf->SetFont('Arial','',12);
        $pdf->MultiCell(120,10, utf8_decode($compra['descripcion']),0,'L',0);
        $pdf->Ln(10);

        //Encabezado ingreso/compra producto
        $pdf->SetFillColor(0,0,0);
        $pdf->SetTextColor(255,255,255);    
        
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(50,10, utf8_decode('Código'),0,0,'L',true);
        $pdf->Cell(100,10, utf8_decode('Nombre producto'),0,0,'L',true);
        $pdf->Cell(30,10, utf8_decode('Cantidad'),0,1,'L',true);

        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0,0,0);

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(50,10, utf8_decode($compra['codigo']),0,0,'L',true);
        $pdf->Cell(100,10, utf8_decode($compra['Nom_pro']),0,0,'L',true);
        $pdf->Cell(30,10, utf8_decode($compra['cantidad']),0,0,'L',true);








        $pdf->Output();

    }

    public function historial()
    {
        $this->views->getView($this, "historial");            //vista visible (controlador, archivo visible)

    }

    public function listar_historial()
    {
        $data= $this->model->getHistorialCompras();
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-success">Alta</span>';             
            }else{
                $data[$i]['estado'] = '<span class="badge bg-danger">Baja</span>';
            }
            $data[$i]['acciones'] = '<div>
            <a class="btn btn-primary "  href="'.base_url. "IngresarProducto/generarPdf/".$data[$i]['ID'].'" target="_blank"  >    <i class= "fas fa-file-pdf"> </i> </a>
            <div/>';
          
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }



}