<?php 

class View
{
    private $_controlador;
	
    public function __construct(Request $peticion) {
  		$this->_controlador = $peticion->getControlador();
	}

    public function renderizar($vista, $item = false)
    {

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
         $rutaView = ROOT . 'views' . DS .  $this->_controlador . DS . $vista . '.phtml';
        
        if(is_readable($rutaView)){

            include_once  ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'header.phtml' ;
            
            if(Session::get("autenticacion")){
                include_once  ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'nav.phtml' ;
            }
            
            include_once  $rutaView;
            

            if(Session::get("autenticacion")){
            include_once  ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'footer.phtml' ;
            }



        } 
        else {
            throw new Exception('No se encuentra la Vista');
        }

    }


}


 ?>