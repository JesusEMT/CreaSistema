<?php
class IngresarProductoModel extends Query{                                  #heredados de clase Query
   
    // private $cod
    
    //funcion constructor
    public function __construct()
    {
        parent::__construct();
    }

    public function getProductoCod(string $cod)                             //obtener datos producto mediante codigo
    {
        $sql = "SELECT * FROM productos WHERE codigo= '$cod'";
        $data = $this->select($sql);
        return $data;
    }

    public function getProductos(int $id)                                   //obtenr los datos del produto mediante id
    {
        $sql = "SELECT * FROM productos WHERE ID = $id";
        $data = $this->select($sql);
        return $data;


    }

    public function getProductosTabla()
    {
        $sql = "SELECT * FROM productos";
        // $sql = "SELECT * FROM productos WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarCompra(int $cantidad_ingresar, string $descripcion, string $costo_total, int $id_producto, int $id_usuario, int $estado)
    {
        $this->cantidad_ingresar = $cantidad_ingresar;
        $this->costo_total = $costo_total;
        $this->id_producto = $id_producto;
        $this->id_usuario = $id_usuario;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        
        $sql = "INSERT INTO compras(cantidad, descripcion, costo_total, id_producto, id_usuario, estado) VALUES (?,?,?,?,?,?)";
        $datos = array($this->cantidad_ingresar,$this->descripcion,$this->costo_total,$this->id_producto,$this->id_usuario, $this->estado);
        // print_r($datos);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function actualizarProducto(string $cantidad_nueva,int $id)
    {
        $this->cantidad_nueva = $cantidad_nueva;
        $this->id = $id;

        $sql = "UPDATE productos SET cantidad = ? WHERE ID = ?";
        $datos = array($this->cantidad_nueva,$this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function id_compra()
    {
        $sql = "SELECT MAX(ID) from compras";
        $maxC = $this->select($sql);
        return $maxC;
    }


    public function getEmpresa()
    {
        $sql = "SELECT * FROM empresa";
        $data = $this->select($sql);
        return $data;
    }

    public function getCompra($id_compra)
    {
        $this->id_compra = $id_compra;
        $sql = "SELECT c.*, u.ID_usuario AS ID_usu, u.nombre_usuario,u.paterno_usuario,u.materno_usuario,u.clave_usuario, p.ID AS ID_Pro, p.nombre AS Nom_pro, p.codigo FROM compras c INNER JOIN usuario u ON c.ID = $id_compra AND u.ID_usuario = c.id_usuario INNER JOIN productos p ON c.id_producto = p.ID";
        $data = $this->select($sql);
        return $data;
    }

    public function getHistorialCompras()
    {
        $sql = "SELECT * FROM compras";
        $sql = "SELECT c.*, u.ID_usuario AS ID_usu, u.nombre_usuario,u.paterno_usuario,u.materno_usuario,u.clave_usuario, p.ID AS ID_Pro, p.nombre AS Nom_pro, p.codigo FROM compras c INNER JOIN usuario u ON u.ID_usuario = c.id_usuario INNER JOIN productos p ON c.id_producto = p.ID";
        $data = $this->selectAll($sql);
        return $data;
    }

    
}
?>