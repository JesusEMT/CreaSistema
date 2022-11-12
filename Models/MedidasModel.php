<?php
class MedidasModel extends Query{                                  #heredados de clase Query
   
    private $telefono, $nombre, $email, $direccion, $id, $estado,$nombre_corto;
    
    //funcion constructor
    public function __construct()
    {
        parent::__construct();
    }
    

    //funcion obtine todos datos de los usuarios registrados
    public function getMedidas()
    {
        //$sql = "SELECT * FROM usuario";
        $sql = "SELECT * FROM medidas";
        $data = $this->selectAll($sql);
        return $data;
    }

    //funcion para registrar usuarios, recibe 7 parametros
    public function registrarMedida(string $nombre, string $nombre_corto)
    {
        //igualamos variables con valores de paremetros recibidos
        $this->nombre = $nombre;
        $this->nombre_corto = $nombre_corto;

        $verificar = "SELECT * FROM medidas WHERE nombre = '$this->nombre'"; //verifica si la clave_usuario(DB) es igual al usuario (varibale ingresada)
        $existe = $this->select($verificar);                                   //se usa el metodo select creado en query
        if (empty($existe)) {                                                //verifica si NO dato en la variable
            $sql = "INSERT INTO medidas(nombre, nombre_corto) VALUES (?,?)";   //query que se enviara con nombres de base de datos
            $datos = array($this->nombre, $this->nombre_corto); //estos valores se envian a metodo save en Query
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
    public function modificarMedida(string $nombre, string $nombre_corto,int $id)
    {
        //igualamos variables con valores de paremetros recibidos
        $this->nombre = $nombre;
        $this->nombre_corto = $nombre_corto;
        $this->id = $id;

        $sql = "UPDATE medidas SET nombre = ?, nombre_corto = ?  WHERE ID = ?";
        $datos = array($this->nombre, $this->nombre_corto, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }


    public function editarMedida(int $ID)
    {
        $sql = "SELECT * FROM medidas WHERE ID = $ID";
        $data = $this->select($sql);
        return $data;
    }

    public function estadoMedida(int $estado, int $ID)
    {
        $this->id = $ID;
        $this->estado = $estado;
        $sql = "UPDATE medidas SET estado= ? WHERE ID = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql,$datos);
        return $data;
    }
}
?>