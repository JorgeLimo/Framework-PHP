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

    function subirarchivoExcel(){

        $this->_view->renderizar("excel");exit;
    }

    function subirData(){


        $this->getLibrary('PHPExcel/PHPExcel/IOFactory');

         $pathfile = $_FILES['excel']['name'];
         $ext = pathinfo($pathfile,PATHINFO_EXTENSION);
         $uploaDir = 'private/imports/';
         $dataRamdon = rand(1,9);

        $tmpFile = $_FILES['excel']['tmp_name'];
        $tmp_name_now = time() . "-". $dataRamdon . '.'. $ext;
        $filename= $uploaDir . $tmp_name_now;
        move_uploaded_file($tmpFile, $filename);


    $objPHPExcel = PHPEXCEL_IOFactory::load($filename);
    
    $objPHPExcel->setActiveSheetIndex(0);

    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

    $arrayData = array();

      for($i = 2; $i <= $numRows; $i++){
      

        $dato1= $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getValue();
        $dato2= $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getValue();
        array_push($arrayData ,  $dato1);
        array_push($arrayData ,  $dato2);

      }
      echo "<pre>";
      print_r($arrayData);
      exit;

    }

    function loginGoogle(){


        $this->_view->renderizar("google");exit;

    }

    function loginFB(){


        $this->_view->renderizar("facebook");exit;

    }

	function activar($hash = false, $idusuario = false){

        $resultado = $this->_usuarios->activarUsuario($hash, $idusuario);

        if($resultado){
        	$this->redireccionar("login/index/activar");
        }else{
        	echo "Ocurrio un error";
        }
	}

    function generarWord(){

          header("Content-type: application/vnd.ms-word");
          header("Content-Disposition: attachment;Filename=document_name.doc");    
          echo "<html>";
          echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
          echo "<body>";
          echo "<b>My first document</b>";
          echo "</body>";
          echo "</html>";
          exit;

    }

    function generarWord2(){


        $this->getLibrary('PHPWord-develop/bootstrap');

        // Creating the new document...
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        /* Note: any element you append to a document must reside inside of a Section. */

        // Adding an empty Section to the document...
        $section = $phpWord->addSection();
        // Adding Text element to the Section having font styled by default...
        $section->addText(
            '"Learn from yesterday, live for today, hope for tomorrow. '
                . 'The important thing is not to stop questioning." '
                . '(Albert Einstein)'
        );

        /*
         * Note: it's possible to customize font style of the Text element you add in three ways:
         * - inline;
         * - using named font style (new font style object will be implicitly created);
         * - using explicitly created font style object.
         */

        // Adding Text element with font customized inline...
        $section->addText(
            '"Great achievement is usually born of great sacrifice, '
                . 'and is never the result of selfishness." '
                . '(Napoleon Hill)',
            array('name' => 'Tahoma', 'size' => 10)
        );

        // Adding Text element with font customized using named font style...
        $fontStyleName = 'oneUserDefinedStyle';
        $phpWord->addFontStyle(
            $fontStyleName,
            array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true)
        );
        $section->addText(
            '"The greatest accomplishment is not in never falling, '
                . 'but in rising again after you fall." '
                . '(Vince Lombardi)',
            $fontStyleName
        );

        // Adding Text element with font customized using explicitly created font style object...
        $fontStyle = new \PhpOffice\PhpWord\Style\Font();
        $fontStyle->setBold(true);
        $fontStyle->setName('Tahoma');
        $fontStyle->setSize(13);
        $myTextElement = $section->addText('"Believe you can and you\'re halfway there." (Theodor Roosevelt)');
        $myTextElement->setFontStyle($fontStyle);

        // Saving the document as OOXML file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('helloWorld.docx');

        // Saving the document as ODF file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
        $objWriter->save('helloWorld.odt');

        // Saving the document as HTML file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
        $objWriter->save('helloWorld.html');

        /* Note: we skip RTF, because it's not XML-based and requires a different example. */
        /* Note: we skip PDF, because "HTML-to-PDF" approach is used to create PDF documents. */


    }

    function generarqr(){
    
        $this->getLibrary('phpqrcode/qrlib');

    //Declaramos una carpeta temporal para guardar la imagenes generadas
    $dir = 'private/temp/';
    //Si no existe la carpeta la creamos
    if (!file_exists($dir)){
        mkdir($dir);
    }
    //Declaramos la ruta y nombre del archivo a generar
    $filename = $dir.'test.png';

    //Parametros de Condiguración
    $tamaño = 10; //Tamaño de Pixel
    $level = 'L'; //Precisión Baja
    $framSize = 3; //Tamaño en blanco
    $contenido = "https://www.ourlimm.training"; //Texto
    //Enviamos los parametros a la Función para generar código QR 
    QRcode::png($contenido, $filename, $level, $tamaño, $framSize); 
    

    $this->_view->assign('qrimg', $dir.basename($filename) );
    $this->_view->renderizar("qr");exit;

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