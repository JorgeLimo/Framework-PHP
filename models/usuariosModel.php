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


}


?>