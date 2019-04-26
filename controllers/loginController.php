<?php 

class loginController extends Controller{

    private $_login;

    public function __construct() {
        parent::__construct();
        $this->_login = $this->loadModel('login');
    }

	function index(){

		if(Session::get("auttenticacion")){
			$this->redireccionar();
		}

		$this->_view->error_msj = "";

		if($this->getInt("enviar") == 1){
			

		    $resultado = $this->_login->loginUsuarios($this->getSql("email"),$this->getSql("pwd"));

		    if(!$resultado){
		    	$this->_view->error_msj = '<div class="alert alert-danger">No se encuentro el usuario : ' . $this->getSql("email") . '</div>';
				$this->_view->renderizar("index");
				exit;
		    }

		    if($resultado['estado'] == 0){
		    	$this->_view->error_msj = '<div class="alert alert-danger">Por favor, revisar el email de activacion que se envio al correo : ' . $this->getSql("email") . '</div>';
				$this->_view->renderizar("index");
				exit;
		    }


		    Session::set("auttenticacion",true);
		    Session::set("idusuario", $resultado['idusuario']);
		    Session::set("nombres", $resultado['nombres']);
		    Session::set("apellidos", $resultado['apellidos']);


		    $this->_view->error_msj = '<div class="alert alert-success">Bienvenido ' . $resultado['nombres'] . "  " .    $resultado['apellidos'] . '</div>';



		}

		$this->_view->renderizar("index");

	}

	public function cerrar(){

			Session::destroy();
			$this->redireccionar("login");

	}

}

?>