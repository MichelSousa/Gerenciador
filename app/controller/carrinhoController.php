<?php
        
    
     final  class Carrinho extends Controller{
     	 
		   public function pedido(){
		   	 
			  require_once("config.php");
			  
			  $pedidos = new Pedidos();
			  $pedidos->ConectaDB($config);
			  $planos = $pedidos->selecionar();
			  
			  $dados['planos'] = $planos;
			  $dados['titulo'] = "Dados do Pedido e Cadastro";
			  $this->view('pedido',$dados);
			}
     } 
     
	 
	 
     
 