<?php
class IngredientesModel extends Query{                                  #heredados de clase Query
   
    private $codigo, $nombre, $cantidad, $id_medida, $id, $estado;
    
    //funcion constructor
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getMedidas()
    {
        $sql = "SELECT * FROM medidas WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }

    //funcion obtine todos datos de los usuarios registrados
    public function getIngredientes()
    {
        $sql= "SELECT i.*, m.ID AS id_medida, m.nombre AS medida, m.nombre_corto AS Abreviatura FROM ingredientes i INNER JOIN medidas m ON i.id_medida = m.ID";
        // $sql= "SELECT i.*, m.ID AS id_medida, m.nombre AS medida FROM ingredientes i INNER JOIN medidas m ON i.id_medida = m.ID";
        // $sql = "SELECT p.*, m.ID AS id_medida, m.nombre AS medida, c.ID AS id_categoria, c.nombre AS categoria FROM productos p INNER JOIN medidas m ON p.id_medida = m.ID INNER JOIN categorias c ON p.id_categoria = c.ID";
        $data = $this->selectAll($sql);
        return $data;
    }

    //funcion para registrar usuarios, recibe 7 parametros
    public function registrarIngrediente(string $codigo, string $nombre, int $id_medida, string $cantidad)
    {
        //igualamos variables con valores de paremetros recibidos
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->id_medida = $id_medida;
        $this->cantidad = $cantidad;

        
        $vericar = "SELECT * FROM ingredientes WHERE codigo = '$this->codigo'"; //verifica si la clave_usuario(DB) es igual al usuario (varibale ingresada)
        $existe = $this->select($vericar);                                   //se usa el metodo select creado en query
        if (empty($existe)) {                                                //verifica si NO dato en la variable
            $sql = "INSERT INTO ingredientes(codigo, nombre,id_medida, cantidad) VALUES (?,?,?,?)";   //query que se enviara con nombres de base de datos
            $datos = array($this->codigo, $this->nombre,$this->id_medida, $this->cantidad); //estos valores se envian a metodo save en Query
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
    public function modificarIngrediente(string $codigo, string $nombre,int $id_medida, string $cantidad,int $id)
    {
        //igualamos variables con valores de paremetros recibidos
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->id_medida = $id_medida;
        $this->cantidad = $cantidad;
        $this->id = $id;

        $sql = "UPDATE ingredietes SET codigo = ?, nombre = ?, id_medida = ?, cantidad = ? WHERE ID = ?";
        $datos = array($this->codigo, $this->nombre,$this->id_medida,$this->cantidad,$this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }


    public function editarIngre(int $id)
    {
        $sql = "SELECT * FROM ingredientes WHERE ID = $id";
        $data = $this->select($sql);
        return $data;
    }

    public function estadoIngre(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE ingredientes SET estado= ? WHERE ID = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql,$datos);
        return $data;
    }
}
?>