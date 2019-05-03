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
		//$this->_view->usuarios = $resultado;
		//$this->_view->titulo = "Administrar Usuarios";
		$this->_view->renderizar("index");exit;
	}

	function subirarchivo(){

		$this->_view->renderizar("upload");exit;
	}

	function procesararchivo(){

		if(!Session::get("autenticacion")){
			$response['estado'] = false;
			$response['mensaje'] = "Necesita estar Logeado";
			echo json_encode($response);exit;
		}
		//$_GET // $_POST
        $pathfile = $_FILES['fileData']['name'];
        $ext = pathinfo($pathfile, PATHINFO_EXTENSION);
        $uploadDir = 'private/archivos/';
        $dataRamdon = rand(10,1000);
        $tmpFile = $_FILES['fileData']['tmp_name'];//el archivo en binario
        $tmp_name_now = time().'-'.$dataRamdon.".".$ext;
        $filename = $uploadDir . $tmp_name_now; //la ruta con el nuevo nombre

	    if (move_uploaded_file($tmpFile,$filename)) {

		//usuario->actualizarFoto($filename);	
		$response['estado'] = true;
		$response['path'] = $filename;
		$response['mensaje'] = "Se cargo el archivo";
		echo json_encode($response);

	    }else{

		$response['estado'] = false;
		$response['mensaje'] = "No cargo el archivo";
		echo json_encode($response);
	    }



	}


}

?>