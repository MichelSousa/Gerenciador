<?php

  /*
   * AUTOR : MICHEL DAMASCENO
   * E-MAIL MICHEM-DAMASCENO#HOTMAIL.COM
   * CONTROLADOR DE CADASTRO DE USUÁRIO FREE
   *  VERSÃO 1.0
   */

 class Cadastro extends Controller
     {
	 
	 /*
	  * PEGA OS DADOS RECEBIDOS DOS CAMPOS PREENCHIDOS DE CADASTRO 
	  */
	 
	   public function Post()
	   {
	   		 
		 if(isset($_POST['enviar']))
		    {
		     	
		     $nome    =  $_POST['nome'];
		     $email   =  $_POST['email'];
	         $senha   =  $_POST['senha'];
		     $repetir =  $_POST['senha2'];
			 $data = Date('y-m-d');
			
			if(empty($nome) || empty($email) || empty($senha) )
			{
			  echo 'Preencha todos os campos';
			}
			 else if($senha != $repetir)
			{
			   	echo 'Senhas tem que serem iguais';
			}
			else
			{ 
			   
             $lista = array(
	               'USU_PLA_COD' => 1,
			       'USU_NOME' => $nome ,
			       'USU_USUARIO' => $email,
			       'USU_SENHA' => $senha ,
			       'USU_DTINCLUSAO' =>  '00',
			       'USU_VALIDO' => true,
			       'USU_COD_DONO' =>1
			       );
  
			 include 'config.php';
			 $free = new CadastroGratis();
			 $free->ConectaDB($config);
			 $free->InsertOrdem($lista);	 
			} 
		  }
	   }
	  
	  public function  free(){
	 	 $dados['nome']= $this->Post(); 
	 	 $this->view('free',$dados);
     }
}