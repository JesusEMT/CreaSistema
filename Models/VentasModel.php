<?php
class VentasModel extends Query{                                  #heredados de clase Query
   
    // private $cod
    
    //funcion constructor
    public function __construct()
    {
        parent::__construct();
    }

    public function getClientes()                
    {
        $sql = "SELECT * FROM clientes WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }  
    
    public function getClienteV(int $id_venta)                
    {
        $sql = "SELECT v.ID, v.id_cliente, c.* FROM ventas v INNER JOIN clientes c ON c.ID = v.id_cliente WHERE v.ID = $id_venta";
        $data = $this->selectAll($sql);
        return $data;
    }  


    public function getProductoCod(string $cod)            //obtener datos producto mediante codigo
    {
        $sql = "SELECT * FROM productos WHERE codigo= '$cod' AND  estado = 1";
        $data = $this->select($sql);
        return $data;
    }

    public function getProductos(int $id)                 //obtenr los datos del produto mediante id
    {
        $sql = "SELECT * FROM productos WHERE ID = $id";
        $data = $this->select($sql);
        return $data;


    }
  
    public function getDetalleTV(int $id_usuario)
    {
        $sql = "SELECT dtv.*, p.ID AS ID_PRO, p.nombre FROM detalle_temporal_venta dtv INNER JOIN productos p ON dtv.id_producto_dtv = p.ID WHERE dtv.id_usuario_dtv = $id_usuario" ;
        // $sql = "SELECT * FROM productos WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function calcularTotalVenta(int $id_usuario)
    {
        $sql = "SELECT sub_total_dtv, SUM(sub_total_dtv) AS total FROM detalle_temporal_venta WHERE id_usuario_dtv = $id_usuario" ;
        $data = $this->select($sql);
        return $data;
    }

    public function registrarDetalle(int $id_producto, int $id_usuario, string $precio_venta, int $cantidad_ingresar, string $sub_total)
    {
        $this->id_producto = $id_producto;
        $this->id_usuario = $id_usuario;
        $this->precio_venta = $precio_venta;
        $this->cantidad_ingresar = $cantidad_ingresar;
        $this->sub_total = $sub_total;
        // $this->estado = $estado;
        
        $sql = "INSERT INTO detalle_temporal_venta(id_producto_dtv, id_usuario_dtv, precio_dtv, cantidad_dtv, sub_total_dtv) VALUES (?,?,?,?,?)";
        $datos = array($this->id_producto,$this->id_usuario,$this->precio_venta,$this->cantidad_ingresar,$this->sub_total);
        // print_r($datos);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function eliminar_DTV(int $ID_DTV)              //eliminar registro tabla
    {
        $sql = "DELETE FROM detalle_temporal_venta WHERE ID_DTV = ?" ;
        $datos = array($ID_DTV);
        $data = $this->save($sql,$datos);        
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;    
    }

    public function consultarRepetidos(int $id_producto, int $id_usuario)
    {
        $sql = "SELECT * FROM detalle_temporal_venta WHERE id_producto_dtv = $id_producto AND id_usuario_dtv = $id_usuario";
        $data = $this->select($sql);
        return $data;
    }

    public function actualizarDetalle(string $precio_venta, int $cantidad_ingresar, string $sub_total,int $id_producto, int $id_usuario)
    {
        $this->id_producto = $id_producto;
        $this->id_usuario = $id_usuario;
        $this->precio_venta = $precio_venta;
        $this->cantidad_ingresar = $cantidad_ingresar;
        $this->sub_total = $sub_total;
        // $this->estado = $estado;
        
        $sql = "UPDATE detalle_temporal_venta SET precio_dtv = ?, cantidad_dtv = ?, sub_total_dtv =? WHERE id_producto_dtv = ? AND id_usuario_dtv = ?";
        $datos = array($this->precio_venta, $this->cantidad_ingresar,$this->sub_total, $this->id_producto,$this->id_usuario);
        // print_r($datos);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function registrarVentaM($id_cliente, string $total)
    {
        $sql = "INSERT INTO ventas (id_cliente,total) VALUES (?,?)";
        $datos = array($id_cliente, $total);
        // print_r($datos);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function id_ventaMax()
    {
        $sql = "SELECT MAX(ID) AS ID from ventas";
        $data = $this->select($sql);
        return $data;
    }

    public function registrarDetalleVenta(int $id_ventaMax,int $id_producto, int $cantidad_ingresar,string $precio_venta,string $sub_total)
    {
        $sql = "INSERT INTO detalle_ventas (id_venta, id_producto, cantidad, precio, sub_total) VALUES (?,?,?,?,?)";
        $datos = array($id_ventaMax,$id_producto, $cantidad_ingresar,$precio_venta, $sub_total);
        // print_r($datos);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function getEmpresa()
    {
        $sql = "SELECT * FROM empresa";
        $data = $this->select($sql);
        return $data;
    }

    public function vaciarDtv($id_usuario)
    {
        $sql = "DELETE FROM detalle_temporal_venta WHERE id_usuario_dtv = ?";
        $datos = array($id_usuario);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }


    public function getDetalleVenta(int $id_venta)
    {
        $sql = "SELECT v.*, dv.*, p.ID AS ID_pro, p.nombre AS nom_pro, cl.* FROM  ventas v INNER JOIN detalle_ventas dv ON v.ID  = dv.id_venta INNER JOIN productos p ON p.ID = dv.id_producto INNER JOIN clientes cl ON cl.ID = v.id_cliente  WHERE v.ID = $id_venta";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getHistorialVentas()
    {
        // $sql = "SELECT * FROM ventas";
        $sql = "SELECT cl.ID AS ID_cli, CONCAT(cl.nombre ,' ' , cl.paterno_cli ,' ' ,cl.materno_cli) AS nombre_cli, v.* FROM clientes cl INNER JOIN ventas v ON v.id_cliente = cl.ID";
        $data = $this->selectAll($sql);
        return $data;
    }


    public function actualizarProductosVenta(int $cantidad_nueva, int $id_producto )
    {
        $this->cantidad_nueva = $cantidad_nueva;
        $this->id_producto = $id_producto;

        $sql = "UPDATE productos SET cantidad = ? WHERE ID = ?";
        $datos = array($this->cantidad_nueva,$this->id_producto);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function getAnularVenta(int $id_venta)
    {
        $sql = "SELECT v.*, dv.* FROM ventas v INNER JOIN detalle_ventas dv ON v.ID = dv.id_venta WHERE  v.ID = $id_venta ";
        $data = $this->selectAll($sql);
        return $data;
    }


    public function getAnular(int $id_venta )
    {
        $sql = "UPDATE ventas SET estado = ? WHERE ID = ?";
        $datos = array(0, $id_venta);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }

    





   

    
}
?>