<?php
class UsuariosModel extends Query{                                  #heredados de clase Query
   
    private $usuario, $nombre,$paterno,$materno, $direccion, $num, $telefono, $email, $pass, $id_caja, $id, $estado, $pass_hash;
    
    //funcion constructor
    public function __construct()
    {
        parent::__construct();
    }

    //funcion obtine datos de usuario para login
    public function getUsuario(string $usuario, string $pass)
    {
        $sql = "SELECT * FROM usuario WHERE clave_usuario='$usuario' AND password_usuario='$pass'";
        $data = $this->select($sql);
        return $data;
    }
    
    //funcion obtine el nombre del valor de id_cajas
    public function getCajas()
    {
        $sql = "SELECT * FROM cajas WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }

    //funcion obtine todos datos de los usuarios registrados
    public function getUsuarios()
    {
        //$sql = "SELECT * FROM usuario";
        $sql = "SELECT u.*, c.id_caja, c.nombre_caja FROM usuario u INNER JOIN cajas c WHERE u.id_caja = c.ID_caja";
        //$sql = "SELECT u.*, c.id_caja as id_caja, c.caja FROM usuario u INNER JOIN caja c WHERE u.id_caja = c.id";
        $data = $this->selectAll($sql);
        return $data;
    }

    //funcion para registrar usuarios, recibe 10 parametros
    public function registrarUsuario(string $usuario, string $nombre,string $paterno,string $materno, string $direccion,string $num, string $telefono,string $email,string $pass, int $id_caja)
    {
        //igualamos variables con valores de paremetros recibidos
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->paterno = $paterno;
        $this->materno = $materno;
        $this->direccion =$direccion;
        $this->num = $num;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->pass = $pass;
        $this->id_caja = $id_caja;

        
        $vericar = "SELECT * FROM usuario WHERE clave_usuario = '$this->usuario'"; //verifica si la clave_usuario(DB) es igual al usuario (varibale ingresada)
        $existe = $this->select($vericar);                                   //se usa el metodo select creado en query
        if (empty($existe)) {                                                //verifica si NO dato en la variable
            $sql = "INSERT INTO usuario(clave_usuario, nombre_usuario, paterno_usuario, materno_usuario, direccion_usuario, num_dir, telefono_usuario, email_usuario, password_usuario, id_caja) VALUES (?,?,?,?,?,?,?,?,?,?)";   //query que se enviara con nombres de base de datos
            $datos = array($this->usuario, $this->nombre,$this->paterno,$this->materno,$this->direccion,$this->num,$this->telefono,$this->email,$this->pass,$this->id_caja); //estos valores se envian a metodo save en Query
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

    //funcion modificar usuario recibe 10 parametros, omite pass
    public function modificarUsuario(string $usuario, string $nombre,string $paterno,string $materno, string $direccion,string $num, string $telefono,string $email,int $id_caja,int $id)
    {
        //igualamos variables con valores de paremetros recibidos
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->paterno = $paterno;
        $this->materno = $materno;
        $this->direccion =$direccion;
        $this->num = $num;
        $this->telefono = $telefono;
        $this->email = $email;
        //$this->pass = $pass;
        $this->id_caja = $id_caja;
        $this->id = $id;

        $sql = "UPDATE usuario SET clave_usuario = ?, nombre_usuario = ?,paterno_usuario = ?,materno_usuario = ?, direccion_usuario = ?, num_dir = ?, telefono_usuario = ?, email_usuario = ?, id_caja = ? WHERE ID_usuario = ?";
        $datos = array($this->usuario, $this->nombre,$this->paterno,$this->materno,$this->direccion,$this->num,$this->telefono,$this->email,$this->id_caja,$this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }


    public function editarUser(int $id_usuario)
    {
        $sql = "SELECT * FROM usuario WHERE ID_usuario = $id_usuario";
        $data = $this->select($sql);
        return $data;
    }

    public function estadoUser(int $estado_usuario, int $id_usuario)
    {
        $this->id = $id_usuario;
        $this->estado = $estado_usuario;
        $sql = "UPDATE usuario SET estado_usuario= ? WHERE ID_usuario = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql,$datos);
        return $data;
    }

    public function getPass(string $pass_hash, int $id_usuario)
    {
        $sql = "SELECT * FROM usuario WHERE password_usuario ='$pass_hash' AND ID_usuario= $id_usuario ";
        $data = $this->select($sql);
        return $data;
    }


    public function modificarPass(string $pass, int $id_usuario )
    {

        // print_r($pass);
        $sql = "UPDATE usuario SET password_usuario= ? WHERE ID_usuario = ?";
        $datos = array($pass, $id_usuario);
        $data = $this->save($sql,$datos);
        return $data;
    }

}
?>