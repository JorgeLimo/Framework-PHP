<?php 
class Post {

	private	$_postId;
	private $_id;
	private $_name;
	private $_email;
	private $_body;

    public function __construct() {

    }

    function getPostId(){
    	return $this->_cantar;
    }
    function setPostId($palabra){
    	$this->_cantar = $palabra;
    }

    function getId(){
    	return $this->_reir;
    }
    function setId($palabra){
    	$this->_reir = $palabra;
    }
}
?>