<?php 


class usuariosController extends Controller{

    private $_usuarios;

    public function __construct() {
       parent::__construct();
       $this->_usuarios = $this->loadModel('usuarios');
    }

	function index(){

		if(!Session::get("autenticacion")){
			$this->redireccionar("login");exit;
		}


        $resultado = $this->_usuarios->obtenerUsuarios();
		$this->_view->usuarios = $resultado;
		$this->_view->titulo = "Administrar Usuarios";
		$this->_view->renderizar("index");exit;
	}

	function agregar(){

		echo "jeje";
	}


}

?>