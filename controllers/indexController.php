<?php 

class indexController extends Controller{

	//declaro mi variable de mi modelo
    private $_index;

    public function __construct() {
        parent::__construct();
        //lleno mi variable con el modelo que deseeo "index"
        $this->_index = $this->loadModel('index');
    }

	function index(){

		if(!Session::get("autenticacion")){
			$this->redireccionar("login");exit;
		}

        $resultado = $this->_index->obtenerUsuarios();
		//$this->_view->usuarios = $resultado;
		//$this->_view->titulo = "Precios...";

		$this->_view->assign("titulo","Precios...");
		$this->_view->renderizar("index");exit;
	}


	function ionicuser(){
        $resultado = $this->_index->obtenerUsuarios();
		echo json_encode($resultado);exit;
	}


	function data(){

		$this->_view->titulo = "Precios.,,";
		$this->_view->renderizar("data");
	}

	function eliminar($idusuario){
        $resultado = $this->_index->eliminarUsuario($idusuario);
       	$this->redireccionar();
	}

	function listar(){
        $resultado = $this->_index->obtenerUsuarios();
        $usuario = $this->_index->obtenerUsuarioPorId("1");
		echo json_encode($resultado);
	}


}

?>