<?php
class ProductosModel extends Query{                                  #heredados de clase Query
   
    private $codigo, $nombre, $descripcion, $precio_creacion, $precio_venta, $id_medida, $id_categoria, $id, $estado;
    
    //funcion constructor
    public function __construct()
    {
        parent::__construct();
    }
    
    // public function getMedidas()
    // {
    //     $sql = "SELECT * FROM medidas WHERE estado = 1";
    //     $data = $this->selectAll($sql);
    //     return $data;
    // }

    public function getCategorias()
    {
        $sql = "SELECT * FROM categorias WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }


    //funcion obtine todos datos de los usuarios registrados
    public function getProductos()
    {
        // $sql = "SELECT p.*, m.ID AS id_medida, m.nombre AS medida, c.ID AS id_categoria, c.nombre AS categoria FROM productos p INNER JOIN medidas m ON p.id_medida = m.ID INNER JOIN categorias c ON p.id_categoria = c.ID";
        $sql = "SELECT p.*, c.ID AS id_categoria, c.nombre AS categoria FROM productos p INNER JOIN categorias c ON p.id_categoria = c.ID";
        $data = $this->selectAll($sql);
        return $data;
    }

    //funcion para registrar usuarios, recibe 7 parametros
    public function registrarProducto(string $codigo, string $nombre, string $precio_creacion,string $precio_venta, int $id_categoria)
    {
        //igualamos variables con valores de paremetros recibidos
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        // $this->descripcion =$descripcion;
        $this->precio_creacion = $precio_creacion;
        $this->precio_venta = $precio_venta;
        // $this->id_medida = $id_medida;
        $this->id_categoria = $id_categoria;

        
        $vericar = "SELECT * FROM productos WHERE codigo = '$this->codigo'"; //verifica si la clave_usuario(DB) es igual al usuario (varibale ingresada)
        $existe = $this->select($vericar);                                   //se usa el metodo select creado en query
        if (empty($existe)) {                                                //verifica si NO dato en la variable
            $sql = "INSERT INTO productos(codigo, nombre, precio_creacion, precio_venta, id_categoria) VALUES (?,?,?,?,?)";   //query que se enviara con nombres de base de datos
            $datos = array($this->codigo, $this->nombre,$this->precio_creacion,$this->precio_venta,$this->id_categoria); //estos valores se envian a metodo save en Query
            $data = $this->save($sql, $datos);                              //se llama el metodo save de Query y envia los dos parametros
            if ($data == 1) {                                               //verifica si el insert fue correcto
                $res = "ok";
            }else{
                $res = "error";
            }
        }else{
            $res = "existe";
        }
        return $res;
    }

    //funcion modificar usuario recibe 8 parametros, omite pass
    public function modificarProducto(string $codigo, string $nombre, string $precio_creacion,string $precio_venta,int $id_categoria,int $id)
    {
        //igualamos variables con valores de paremetros recibidos
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        // $this->descripcion =$descripcion;
        $this->precio_creacion = $precio_creacion;
        $this->precio_venta = $precio_venta;
        // $this->id_medida = $id_medida;
        $this->id_categoria = $id_categoria;
        $this->id = $id;

        $sql = "UPDATE productos SET codigo = ?, nombre = ?, precio_creacion = ?, precio_venta = ?, id_categoria = ? WHERE ID = ?";
        $datos = array($this->codigo, $this->nombre,$this->precio_creacion,$this->precio_venta,$this->id_categoria,$this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }


    public function editarPro(int $id)
    {
        $sql = "SELECT * FROM productos WHERE ID = $id";
        $data = $this->select($sql);
        return $data;
    }

    public function estadoPro(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        // print_r($id);
        $sql = "UPDATE productos SET estado= ? WHERE ID = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql,$datos);
        return $data;
    }
}
?>