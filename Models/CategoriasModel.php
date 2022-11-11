<?php
class CategoriasModel extends Query{                                  #heredados de clase Query
   
    private $nombre,$id, $estado,$ID;
    
    //funcion constructor
    public function __construct()
    {
        parent::__construct();
    }    

    //funcion obtine todos datos de los usuarios registrados
    public function getCategorias()
    {
        $sql = "SELECT * FROM categorias";
        //$sql = "SELECT u.*, c.id_caja as id_caja, c.caja FROM usuario u INNER JOIN caja c WHERE u.id_caja = c.id";
        $data = $this->selectAll($sql);
        return $data;
    }

    //funcion para registrar categoria, recibe 1 parametros
    public function registrarCategoria(string $nombre)
    {
        $this->nombre = $nombre;
        
        $verificar = "SELECT * FROM categorias WHERE nombre = '$this->nombre'"; //verifica si la clave_usuario(DB) es igual al usuario (varibale ingresada)
        $existe = $this->select($verificar);                                    //se usa el metodo select creado en query
        if (empty($existe)) {                                                  //verifica si NO dato en la variable
            $sql = "INSERT INTO categorias(nombre) VALUES (?)";   //query que se enviara con nombres de base de datos
            $datos = array($this->nombre); //estos valores se envian a metodo save en Query
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

    //funcion modificar usuario recibe 7 parametros, omite pass
    public function modificarCategoria(string $nombre, int $id)
    {
        //igualamos variables con valores de paremetros recibidos
        $this->nombre = $nombre;
        $this->id = $id;

        $sql = "UPDATE categorias SET nombre = ? WHERE ID = ?";
        $datos = array($this->nombre, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }


    public function editarCategoria(int $ID)
    {
        $sql = "SELECT * FROM categorias WHERE ID = $ID";
        $data = $this->select($sql);
        return $data;
    }

    public function estadoCategoria(int $estado, int $ID)
    {
        $this->id = $ID;
        $this->estado = $estado;
        $sql = "UPDATE categorias SET estado= ? WHERE ID = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql,$datos);
        return $data;
    }
}
?>