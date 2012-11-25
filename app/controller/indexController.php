<?php
  
 class index extends Controller{
 
 	public function indexAction(){
 		
 		$dados['titulo']  = "Bem vindo a gerenciador de projetos";
 		$this->view('index',$dados);
 		
 	}
 	
 	 
 }