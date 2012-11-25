<?php 

  class Controller extends System{

  	protected function view($nome, $var = null){
  		
  		if(is_array($var) && count($var) > 0) {
  			
  			extract($var,EXTR_PREFIX_ALL,'view');
		  
		    return $this->nome = require_once( VIEW .$nome.'.phtml');
		    exit();
		    
  			}
		   
		  }
	   
	  }