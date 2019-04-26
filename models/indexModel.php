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


}


?>