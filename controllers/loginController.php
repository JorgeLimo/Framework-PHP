<?php 

class loginController extends Controller{

    private $_login;

    public function __construct() {
        parent::__construct();
        $this->_login = $this->loadModel('login');
    }

	function index($activar = false){

		if(Session::get("autenticacion")){
			$this->redireccionar("index");
			exit;
		}

		if($activar){
			$this->_view->assign('_errormsj', '<div class="alert alert-success">Tu cuenta se activo correctamente</div>' );
		}


		if($this->getInt("enviar") == 1){
			

		    $resultado = $this->_login->loginUsuarios($this->getSql("email"),$this->getSql("pwd"));

		    if(!$resultado){


        		$this->_view->assign('_errormsj', '<div class="alert alert-danger">No se encuentro el usuario : ' . $this->getSql("email") . '</div>' );
				$this->_view->renderizar("index");
				exit;
		    }

		    if($resultado['estado'] == 0){
		    	$this->_view->assign("_errormsj", '<div class="alert alert-danger">Por favor, revisar el email de activacion que se envio al correo : ' . $this->getSql("email") . '</div>');
		    	$this->_view->renderizar("index");
				exit;
		    }

		    //*** El usuario es valido ... ***/

		    Session::set("autenticacion",true);
		    Session::set("idusuario", $resultado['idusuario']);
		    Session::set("nombres", $resultado['nombres']);
		    Session::set("apellidos", $resultado['apellidos']);
		    Session::set("foto", $resultado['foto']);


		    $this->redireccionar("index");exit;
		    //$this->_view->error_msj = '<div class="alert alert-success">Bienvenido ' . $resultado['nombres'] . "  " .    $resultado['apellidos'] . '</div>';



		}

		$this->_view->renderizar("index");

	}

	public function cerrar(){

			Session::destroy();
			$this->redireccionar("login");

	}

}

?>