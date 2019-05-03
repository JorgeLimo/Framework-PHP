<?php 

class indexModel extends Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function obtenerUsuarios()
	{
		$datos = $this->_db->query("SELECT * FROM usuarios where estado = 1");
		return $datos->fetchAll();//muchas filas
	}

	public function obtenerUsuarioPorId($idusuario){

		$query = "SELECT email FROM usuarios WHERE idusuario = ".$idusuario;
		$datos = $this->_db->query($query);
		return $datos->fetch();//una fila
	}

	public function eliminarUsuario($idusuario){

       $result =  $this->_db->prepare("UPDATE usuarios SET estado=:estado WHERE idusuario=:idusuario")
            ->execute(
                array(
                    ':idusuario' => $idusuario,
                    ':estado' => 0
                ));
        return $result;
	}

	function actualizarUsuarios($idusuario, $nombre, $apellidos, $email, $estado){

       $result =  $this->_db->prepare("UPDATE usuarios SET nombres=:nombre, apellidos=:apellidos, email=:email, estado=:estado WHERE idusuario=:idusuario")
            ->execute(
                array(
                    ':nombre' => $nombre,
                    ':apellidos' => $apellidos,
                    ':email' => $email,
                    ':estado' => $estado,
                    ':idusuario' => $idusuario
                ));
        return $result;

	}



  public function agregarUsuarios($nombres,$apellidos,$email,$estado){

        $this->_db->prepare("INSERT INTO usuarios (`nombres`, `apellidos`, `email`, `estado`) VALUES (:nombres,:apellidos,:email,:estado)")
            ->execute(
                array(
                    ':nombres' => $nombres,
                    ':apellidos' => $apellidos,
                    ':email' => $email,
                    ':estado' => $estado
                ));

        return $this->_db->lastInsertId();
  }


}


?>