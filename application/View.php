<?php 

//Importamos Smarty
require_once ROOT . 'libs' . DS . 'smarty' . DS . 'libs' . DS . 'Smarty.class.php';

//Heredamos todas las funcionalidades de Smarty con la palabra reservada EXTENDS y la Clase del archivo.
class View extends Smarty
{
    private $_controlador;
	
    public function __construct(Request $peticion) {
        //llamamos al constructor del smarty
        parent::__construct();
  		$this->_controlador = $peticion->getControlador();
	}

    public function renderizar($vista, $item = false)
    {


        //Se declaran las variables globales que pide el smarty
        $this->template_dir = ROOT . 'views' . DS . 'layout'. DS . DEFAULT_LAYOUT . DS;
        $this->config_dir = ROOT . 'views' . DS . 'layout'. DS . DEFAULT_LAYOUT . DS . 'configs' . DS;
        $this->cache_dir = ROOT . 'tmp' . DS . 'cache' . DS ;
        $this->compile_dir = ROOT . 'tmp' . DS . 'template' . DS ;


        $menu = array(
            array(
                'id' => 'inicio',
                'titulo' => 'Inicio',
                'enlace' => BASE_URL
                ),
            array(
                'id' => 'login',
                'titulo' => 'Login',
                'enlace' => BASE_URL . 'login'
                ),
            array(
                'id' => 'contacto',
                'titulo' => 'Contacto',
                'enlace' => BASE_URL . 'contacto'
                )
        );


        $_params = array(
            'ruta_css' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/css/',
            'ruta_img' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/img/',
            'ruta_js' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/js/',
            'ruta_scss' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/scss/',
            'ruta_vendor' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/vendor/',
            'menu' => $menu,
            'item' => $item,
            'root' => BASE_URL,
            'configs' => array(
                'app_name' => APP_NAME,
                'app_slogan' => APP_SLOGAN,
                'app_company'=> APP_COMPANY
                )
        );


        //views/index/index.phtml
         $rutaView = ROOT . 'views' . DS .  $this->_controlador . DS . $vista . '.tpl';
        
        if(is_readable($rutaView)){
            $this->assign('_contenido', $rutaView);
        } 
        else {
            throw new Exception('No se encuentra la Vista');
        }


        //se envia las variables globales que teniamos
        $this->assign('_layoutParams',$_params);
        //se muestra la plantailla master
        $this->display('template.tpl');

        

    }


}


 ?>