<?php
class ClientesModel extends Query{                                  #heredados de clase Query
   
    private $telefono, $nombre,$paterno, $materno, $email, $direccion, $num, $id, $estado;
    
    //funcion constructor
    public function __construct()
    {
        parent::__construct();
    }
    

    //funcion obtine todos datos de los usuarios registrados
    public function getClientes()
    {
        //$sql = "SELECT * FROM usuario";
        $sql = "SELECT * FROM clientes";
        //$sql = "SELECT u.*, c.id_caja as id_caja, c.caja FROM usuario u INNER JOIN caja c WHERE u.id_caja = c.id";
        $data = $this->selectAll($sql);
        return $data;
    }

    //funcion para registrar usuarios, recibe 7 parametros
    public function registrarClientes(string $telefono, string $nombre, string $paterno, string $materno, string $email, string $direccion, string $num)
    {
        //igualamos variables con valores de paremetros recibidos
        $this->telefono = $telefono;
        $this->nombre = $nombre;
        $this->paterno = $paterno;
        $this->materno = $materno;
        $this->email = $email;
        $this->direccion =$direccion;
        $this->num = $num;
        
        $verificar = "SELECT * FROM clientes WHERE telefono = '$this->telefono'";       //verifica si la clave_usuario(DB) es igual al usuario (varibale ingresada)
        $existe = $this->select($verificar);                                            //se usa el metodo select creado en query
        if (empty($existe)) {                                                           //verifica si NO dato en la variable
            $sql = "INSERT INTO clientes(telefono, nombre, paterno_cli, materno_cli, email, direccion,num_dir_cli) VALUES (?,?,?,?,?,?,?)";   //query que se enviara con nombres de base de datos
            $datos = array($this->telefono, $this->nombre,$this->paterno,$this->materno, $this->email, $this->direccion,$this->num); //estos valores se envian a metodo save en Query
            $data = $this->save($sql, $datos);                                          //se llama el metodo save de Query y envia los dos parametros
            if ($data == 1) {                                                           //verifica si el insert fue correcto
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
    public function modificarCliente(string $telefono, string $nombre, string $paterno, string $materno, string $email, string $direccion, string $num, int $id)
    {
        //igualamos variables con valores de paremetros recibidos
        $this->telefono = $telefono;
        $this->nombre = $nombre;
        $this->paterno = $paterno;
        $this->materno = $materno;
        $this->email = $email;
        $this->direccion =$direccion;
        $this->num = $num;
        $this->id = $id;

        $sql = "UPDATE clientes SET telefono = ?, nombre = ?,paterno_cli = ?,materno_cli = ?, email = ?, direccion = ? , num_dir_cli = ? WHERE ID = ?";
        $datos = array($this->telefono, $this->nombre, $this->paterno, $this->materno, $this->email, $this->direccion, $this->num, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }


    public function editarCli(int $ID)
    {
        $sql = "SELECT * FROM clientes WHERE ID = $ID";
        $data = $this->select($sql);
        return $data;
    }

    public function estadoCli(int $estado, int $ID)
    {
        $this->id = $ID;
        $this->estado = $estado;
        $sql = "UPDATE clientes SET estado= ? WHERE ID = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql,$datos);
        return $data;
    }
}
?>