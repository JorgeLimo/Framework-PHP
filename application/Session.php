<?php 

class Session
{

	public static function init()
	{	
		session_start();
	}


	//Session::destroy();
	//Session::destroy("hola")
	//Session::destroy(["hola", "hola2"])
	public static function destroy($clave = false)
	{
		if ($clave) {
			if (is_array($clave)) {
				for ($i=0; $i < count($clave); $i++) { 
					if (isset($_SESSION[$clave[$i]])) {
						unset($_SESSION[$clave[$i]]);
					}
				}
			}else{
				if (isset($_SESSION[$clave])) {
					unset($_SESSION[$clave]);
				}

			}
		}else{
			session_destroy();
		}
	}

	
	///calve = nombre, valor = 123
	//Session::set("hola",123)
	public static function set($clave, $valor)
	{
		if (!empty($clave)) {
			//$_session['nombre'] = 123;
			$_SESSION[$clave] = $valor;
		}

	}
	
	//Session::get("hola")
	public static function get($clave)
	{
		if(isset( $_SESSION[$clave] ))
			return $_SESSION[$clave]; 
	}






}

?>