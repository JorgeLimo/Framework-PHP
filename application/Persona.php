<?php 
class Persona {
	private	$_cantar;
	private $_bailar;
	private $_reir;
	private $_dormir;
	private $_estado;
    public function __construct() {
    	$this->_cantar = "Lero Leroooo";
    	$this->_bailar = "Tururuuu...";
    	$this->_reir = "jejejejej";
    	$this->_dormir = "ZZzZzZzZz";
    	$this->_estado = false;
    }
    function getCantar(){
    	return $this->_cantar;
    }
    function setCantar($palabra){
    	$this->_cantar = $palabra;
    }

    function getReir(){
    	return $this->_reir;
    }
    function setReir($palabra){
    	$this->_reir = $palabra;
    }
}
?>