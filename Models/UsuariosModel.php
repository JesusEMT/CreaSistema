<?php
class UsuariosModel extends Query{                                  #heredados de clase Query
   
    private $usuario, $nombre, $direccion, $telefono, $email, $pass, $id_caja, $id, $estado;
    
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

    //funcion para registrar usuarios, recibe 7 parametros
    public function registrarUsuario(string $usuario, string $nombre, string $direccion, string $telefono,string $email,string $pass, int $id_caja)
    {
        //igualamos variables con valores de paremetros recibidos
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->direccion =$direccion;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->pass = $pass;
        $this->id_caja = $id_caja;

        // $vericar = "SELECT * FROM usuarios WHERE usuario = '$this->usuario'";
        // $existe = $this->select($vericar);
        // if (empty($existe)) {
            $sql = "INSERT INTO usuario(clave_usuario, nombre_usuario, direccion_usuario, telefono_usuario, email_usuario, password_usuario, id_caja) VALUES (?,?,?,?,?,?,?)";   //query que se enviara con nombres de base de datos
            $datos = array($this->usuario, $this->nombre,$this->direccion,$this->telefono,$this->email,$this->pass,$this->id_caja); //estos valores se envian a metodo save en Query
            $data = $this->save($sql, $datos);                              //se llama el metodo save de Query y envia los dos parametros
            if ($data == 1) {                                               //verifica si el insert fue correcto
                $res = "ok";
            }else{
                $res = "error";
            }
        // }else{
        //     $res = "existe";
        // }
        return $res;
    }
    // public function modificarUsuario(string $usuario, string $nombre, int $id_caja, int $id)
    // {
    //     $this->usuario = $usuario;
    //     $this->nombre = $nombre;
    //     $this->id = $id;
    //     $this->id_caja = $id_caja;
    //     $sql = "UPDATE usuarios SET usuario = ?, nombre = ?, id_caja = ? WHERE id = ?";
    //     $datos = array($this->usuario, $this->nombre, $this->id_caja, $this->id);
    //     $data = $this->save($sql, $datos);
    //     if ($data == 1) {
    //         $res = "modificado";
    //     } else {
    //         $res = "error";
    //     }
    //     return $res;
    // }
    // public function editarUser(int $id)
    // {
    //     $sql = "SELECT * FROM usuarios WHERE id = $id";
    //     $data = $this->select($sql);
    //     return $data;
    // }
    // public function accionUser(int $estado, int $id)
    // {
    //     $this->id = $id;
    //     $this->estado = $estado;
    //     $sql = "UPDATE usuarios SET estado = ? WHERE id = ?";
    //     $datos = array($this->estado, $this->id);
    //     $data = $this->save($sql, $datos);
    //     return $data;
    // }
}
?>