<?php 

/*
   * AUTOR : MICHEL DAMASCENO
   * E-MAIL MICHEM-DAMASCENO#HOTMAIL.COM
   * CONTROLADOR DE CADASTRO DE USUÁRIO FREE
   *  VERSÃO 1.0
   */

    class login extends Controller{
    
      public function  Verifica($login, $senha)
	   {
	   	      $sql = "SELECT 
		                 usu_usuario,
		                 usu_senha ,
		                 usu_cod
		              FROM 
		                 usuario
			          WHERE 
			             usu_usuario = '$login' 
			         AND usu_senha = '$senha' ";
		    
		    require_once("config.php");
					 
		    $l = new ConsultaLogin();
			$l->ConectaDB($config);
		   return $user = $l->Contar($sql);
		   print_r($l->selecionar());
	   }
	   	
		public function logar(){
			
			if(isset($_POST['enviar']))
			{
			
			  $senhaUser = $_POST['senha'];
			  $loginuser = $_POST['login'];
			  $contar = $this->Verifica("$loginuser","$senhaUser");
			 
			  if($contar == 1)
			  {
			  	  $_SESSION['login'] = $loginuser;
			      $_SESSION['senha'] = $senhaUser;
				  header('location:http://127.0.0.1/framework2/admin/home');
			  }
			  else
			  {
			  
				 unset( $_SESSION['login']);
				 unset( $_SESSION['senha']);
				 
				$msg =  "Usuário não existe por favor verifique sua senha e seu login.";
			  	 
			  }
			   
		    }  
			  
			  $dados['titulo']= "Bem vindo a tela de login"; 
			    $dados['msg']= $msg; 
	 	      $this->view('login',$dados);
		}
		
    }
