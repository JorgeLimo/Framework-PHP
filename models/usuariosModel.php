<?php 

class usuariosModel extends Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function obtenerUsuarios()
	{
		$datos = $this->_db->query("SELECT * FROM usuarios where estado = 1");
		return $datos->fetchAll();//muchas filas
	}


	public function activarUsuario($hash, $idusuario){


       $result =  $this->_db->prepare("UPDATE usuarios SET estado=:estado WHERE idusuario=:idusuario AND hash =:hash")
            ->execute(
                array(
                    ':idusuario' => $idusuario,
                    ':hash' => $hash,
                    ':estado' => 1
                ));
        return $result;

	}


}


?>