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

	function activar($hash = false, $idusuario = false){

        $resultado = $this->_usuarios->activarUsuario($hash, $idusuario);

        if($resultado){
        	$this->redireccionar("login/index/activar");
        }else{
        	echo "Ocurrio un error";
        }
	}


	function enviarCorreo(){
		/**
        $this->getLibrary('class.phpmailer');
                
		$mail = new PHPMailer();

        $mail->From = "no-reply@ourimmm.com";
        $mail->FromName = "Registro de activacion"; 
		$mail->Subject = 'Activa tu cuenta | Ourlimm Training';**/
                
        $mensaje = '<table style="font-family:arial">';
        $mensaje .=     '<tr>';
        $mensaje .=       '<td style="background-color:#514f4f;width:200px;height:300px;">';
        $mensaje .=         '<center><img src="https://www.ourlimm.training/public/logo_training.png"></center>';
        $mensaje .=       '</td>';
        $mensaje .=       '<td style="background-color:#e76951;width:400px;height:300px;padding-left:20px;padding-right:20px;">';
        $mensaje .=         '<h2 style="color:#ffffff">Hola <span style="color:#514f4f">Hola Jorge Luis Limo</span></h2>';
        $mensaje .=         '<p style="color:#ffffff;text-align:justify">Activa tu cuenta ahora.</p>';
        $mensaje .=         '<p style="color:#ffffff;text-align:justify">Click aquí : <strong><a target="blank" href="'. BASE_URL .'usuarios/activar/DG5S56GDF65G6DB65CV5B56D65BD65F/1" style="text-decoration:none;color:#514f4f">recuperar contraseña</a></strong></p>';
                $mensaje .=         '<p style="color:#ffffff;text-align:justify">Recuerda que al cambiar la contraseña no se podrá restaurar.</p>';
                $mensaje .=       '</td>';
                $mensaje .=     '</tr>';
                $mensaje .= '</table>'; 
                echo $mensaje;
                /**
                $mail->Body = $mensaje;
                $mail->AltBody = 'Su servidor de correo no soporta contenido HTML';
                $mail->AddAddress("jorge.limo@ourlimm.com");
                //$mail->AddAddress('informes@academica.pe');        
                $mail->Send();
                **/

	}

	function procesararchivo(){


		header('Content-type: application/json');

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