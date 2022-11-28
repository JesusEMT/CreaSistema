<?php

class Ventas extends Controller{
     
    public function __construct() { 
        session_start();                         #Inicalizamos sesion
       

        parent::__construct();                  #cargamos constructor de la instancia para que funcione el modelo
    }

    public function index()
    {
        if (empty($_SESSION['activo'])) {                  #Verificamos sino hay sesion activa
            header("location: ".base_url);                 #sino existe una cuwnta activa se redirecciona al login
        }  
        
        $data = $this->model->getClientes();
        $this->views->getView($this, "index", $data);            //vista visible (controlador, archivo visible)
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
  
        $id = $_POST['id'];                                     //metodo POST
        $datos= $this->model->getProductos($id);

        $id_producto = $datos['ID'];                                                 //Desde consulta BD
        $id_usuario = $_SESSION['id_usuario'];                                       //Desde la sesion, constructor inicializado
        $precio_venta = $datos['precio_venta'];                                     //Desde consulta BD
        $cantidad_ingresar = $_POST['cantidad_ingresar'];                           //desde formulario con metodo POST
        $comprobar =  $this->model->consultarRepetidos($id_producto,$id_usuario);    //variable para consultar si se añadio algun producto
        
        if (empty($comprobar)) {                                //Si no hay proucto añadido se añade a la tabla como nuevo 
            $sub_total =  $precio_venta * $cantidad_ingresar;
            $data = $this->model->registrarDetalle($id_producto, $id_usuario,$precio_venta, $cantidad_ingresar,$sub_total);
            if ($data =="ok") {  
                $id_ventaMax = $this->model->id_ventaMax();
                $msg = "ok";
            }else{
                $msg = "Error al ingresar producto";
            }
        }else{
            $total_cantidad =  $comprobar['cantidad_dtv'] + $cantidad_ingresar;
            $sub_total =  $precio_venta * $total_cantidad;
            $data = $this->model->actualizarDetalle($precio_venta, $total_cantidad,$sub_total, $id_producto, $id_usuario);
            if ($data =="modificado") {  
                $id_ventaMax = $this->model->id_ventaMax();

                $msg = "modificado";
            }else{
                $msg = "Error al modificar ingreso de producto";
            }

        }

        

        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();       
    
    }

    public function listar()
    {
        $id_usuario = $_SESSION['id_usuario'];                  //Desde la sesion, constructor inicializado
        $data['detalle_tabla'] = $this->model->getDetalleTV($id_usuario);
        $data['total_pagar'] = $this->model->calcularTotalVenta($id_usuario);        
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar($ID_DTV)
    {
        $data= $this->model->eliminar_DTV($ID_DTV);  
        if ($data =='ok') {  
            $msg = 'ok';
        }else{
            $msg = 'error';
        }

        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();    
        

    }

    public function registrarVenta($id_cliente)
    {
        $id_usuario = $_SESSION['id_usuario'];                  //Desde la sesion, constructor inicializado
        $totalVenta = $this->model->calcularTotalVenta($id_usuario);        
        $data= $this->model->registrarVentaM($id_cliente, $totalVenta['total']);
        if ($data =='ok') { 
            $detalleTV= $this->model->getDetalleTV($id_usuario);
            $id_ventaMax = $this->model->id_ventaMax();

            foreach ($detalleTV as $row) {
                $cantidad_ingresar = $row['cantidad_dtv'];
                $precio_venta = $row['precio_dtv'];
                $id_producto = $row['id_producto_dtv'];
                $sub_total = $cantidad_ingresar * $precio_venta;                
                $this->model->registrarDetalleVenta($id_ventaMax['ID'],$id_producto,$cantidad_ingresar,$precio_venta,$sub_total);
                $stock_actual= $this->model->getProductos($id_producto);
                $cantidad_nueva = $stock_actual['cantidad'] - $cantidad_ingresar;
                $this->model->actualizarProductosVenta($cantidad_nueva,$id_producto );

            }
            $vaciar= $this->model->vaciarDtv($id_usuario); 
            if ($vaciar == 'ok') {
                $msg = array('msg'=> 'ok', 'id_ventaMax'=> $id_ventaMax['ID']);
            }
        }else{
            $msg = 'Error al realizar la venta' ;
        }

        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die(); 

    }

    public function historial()
    {
        $this->views->getView($this, "historial");            //vista visible (controlador, archivo visible)

    }

    public function listar_historial()
    {
        $data= $this->model->getHistorialVentas();
        for ($i=0; $i < count($data); $i++) { 
            
            $data[$i]['acciones'] = '<div>
            <a class="btn btn-danger "  href="'.base_url. "Ventas/generarPdf/".$data[$i]['ID'].'" target="_blank"  >    <i class= "fas fa-file-pdf"> </i> </a>
            <div/>';
          
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function generarPdf($id_ventaMax)
    {

        $empresa= $this->model->getEmpresa();               //Traer los datos de la tabla empresa
        $venta= $this->model->getDetalleVenta($id_ventaMax);
        $nombre_completo= ($venta[0]["nombre"]." ".$venta[0]['paterno_cli']." ".$venta[0]['materno_cli']);
        $direccion_completa= ($empresa["direccion"]."  #".$empresa['num_dir_empresa']);
        $direccion_completa_cli= ($venta[0]["direccion"]."  #".$venta[0]['num_dir_cli']);
        $clienteV = $this->model->getClienteV($id_ventaMax);


        // print_r($venta);
        // exit;
     
        require('Libraries/fpdf/fpdf.php');

        $pdf = new FPDF('P','mm', array(80, 200));
        $pdf->AddPage();
        $pdf->SetMargins(5,0,0);
        $pdf->SetTitle(utf8_decode('Reporte de venta'));
        $pdf->image(base_url.'Assets/img/CreaLogo1.png',60,6,12);     //ruta de imagen, x, y, width,height
        // $pdf->Ln(20);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,8,utf8_decode($empresa['nombre']),0,1,'L');

        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(15,5, utf8_decode('RFC:'),0,0,'L');
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(40,5, utf8_decode($empresa['RFC']),0,1,'L');    
                
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(15,5, utf8_decode('Dirección:'),0,0,'L');
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(40,5,utf8_decode($direccion_completa),0,1,'L');

        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(15,5, utf8_decode('Teléfono:'),0,0,'L');
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(40,5, utf8_decode($empresa['telefono']),0,1,'L');    

        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(15,5, utf8_decode('Correo:'),0,0,'L');
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(40,5, utf8_decode($empresa['email_empresa']),0,1,'L');   
        $pdf->Ln(2); 

        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(20,5, utf8_decode('Folio venta:'),0,0,'L');
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(40,5,$id_ventaMax ,0,1,'L');  
        
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(10,5, utf8_decode('Fecha:'),0,0,'L');
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(40,5, utf8_decode($venta[0]['fecha']),0,1,'L');
        $pdf->Ln(3);

         
         $pdf->SetFont('Arial','B',8);        
         $pdf->Cell(15,5, utf8_decode('Cliente :'),0,0,'L');
         $pdf->Cell(40,5,$nombre_completo,0,1,'L');   
         $pdf->Cell(15,5, utf8_decode('Telefono:'),0,0,'L');
         $pdf->Cell(40,5, utf8_decode($venta[0]['telefono']),0,1,'L');
         $pdf->Cell(15,5, utf8_decode('Dirección:'),0,0,'L');
         $pdf->Cell(20,5,$direccion_completa_cli,0,1,'L');      
         $pdf->Ln(10);

        //Encabezado lista de venta producto
        $pdf->SetFillColor(0,0,0);
        $pdf->SetTextColor(255,255,255);    
        
        $pdf->SetFont('Arial','B',8);        
        $pdf->Cell(10,6, utf8_decode('Cant.'),0,0,'L',true);
        $pdf->Cell(34,6, utf8_decode('Descripción'),0,0,'L',true);
        $pdf->Cell(13,6, utf8_decode('Precio'),0,0,'L',true);
        $pdf->Cell(12,6, utf8_decode('Subtotal'),0,1,'R',true);

        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0,0,0);

        $pdf->SetFont('Arial','',8);
        foreach ($venta as $row) {
            $pdf->Cell(10,8, utf8_decode($row['cantidad']),0,0,'L');
            $pdf->Cell(34,8, utf8_decode($row['nom_pro']),0,0,'L');
            $pdf->Cell(13,8, utf8_decode($row['precio']),0,0,'L');
            $pdf->Cell(12,8, number_format($row['cantidad'] * $row['precio'],2,'.',','),0,1,'R');
    
        }
        $pdf->Ln(2);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(70,6, utf8_decode('Total a pagar'),0,1,'R');
        $pdf->Cell(70,6, utf8_decode($row['total']),0,0,'R');


        $pdf->Output();

    }



}