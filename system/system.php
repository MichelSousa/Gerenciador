<?php

class System{

	private $_url;
	private $_explode;
	public $_controller;
	public $_action;
	public $_params;
	public $baseurl;

	public function __construct(){

		$this->setUrl();
		$this->setExplode();
		$this->setController();
		$this->setAction();
		$this->BaseUrl();
		//$this->setParams();
		
	}
    
	private function setUrl(){

		$_GET['url'] = (isset($_GET['url']) ? $_GET['url']  : "index/indexAction");
		$this->_url = $_GET['url'];
	}

	private function setExplode(){

		$this->_explode = explode('/',$this->_url);
	}

	private function setController(){

		$this->_controller = $this->_explode[0];

	}

	private function setAction(){

		$acao = (!isset($this->_explode[1]) || $this->_explode[1] ==null || $this->_explode[1] == 'index' ? 'indexAction'  : $this->_explode[1]);

		$this->_action = $acao;
	}

	/*private function setParams(){
		unset($this->_explode[0],$this->_explode[1]);
		 
		if(end($this->_explode)==null){

			array_pop($this->_explode);

		}
		

		$i=0;
		
		if(!empty($this->_explode)){


			foreach($this->_explode as $val){
				
				if($i % 2 == 0){
					
					$ind[] = $val;
					
				}else{
					
					$value[] = $val;
				}
				$i++;
			}
			
		}else{
			
            $ind[] =array();
			$value[] = array();
		}
         		
        if(  count($ind) == count($value) && !empty($ind) && !empty($value)){
        	
        	 $this->_params = array_combine($ind, $value);
        	
        }else
        	
        	$this->_params = array();
        
	} */
	
	public function getParam($nome){
	
		return $this->_params[$nome];
	}
	
	
	public function iniciar(){
	
		$controller_path = CONTROLLER . $this->_controller .'Controller'.'.php';
		
		if(is_file($controller_path))
		{
			require_once ( CONTROLLER . $this->_controller .'Controller.php');
		}
		else
		{
			echo utf8_decode('Controller n�o existe!');
		}
		
	
        $classe = new $this->_controller();
        
        if(!method_exists($classe, $this->_action)){
        	echo utf8_decode('Erro Action n�o existe!');
        }
        
		$action = $this->_action;
		$classe->$action();
		
	}
	public function BaseUrl()
	     {
		    $this->baseurl =   $_SERVER['SERVER_NAME'];
			return $this->baseurl;
	     }
  }