<?php

class Bootstrap
{
    public static function run(Request $peticion)
    {
        $controller = $peticion->getControlador() . 'Controller'; //indexController
        $rutaControlador = ROOT . 'controllers' . DS . $controller . '.php';

        $metodo = $peticion->getMetodo();
        $args = $peticion->getArgs();
  
        if(is_readable($rutaControlador)){

            /**** nuevo ***/
            require_once $rutaControlador;
            $controller = new $controller;// new indexController //new ventasController

            if(is_callable(array($controller, $metodo))){
                $metodo = $peticion->getMetodo();
            }
            else{
                $metodo = 'index';
            }
            
            if(isset($args)){
                call_user_func_array(array($controller, $metodo), $args);
            }
            else{
                call_user_func(array($controller, $metodo));
            }  
            
            /**** nuevo ***/

        } else {
            //error 404
            echo "la URL NO EXISTE";
            //header('location:' . BASE_URL);
            //exit;
       
        }


    }
}

?>