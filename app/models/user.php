<?php 

/*
   * AUTOR : MICHEL DAMASCENO
   * E-MAIL MICHEM-DAMASCENO#HOTMAIL.COM
   * Classe para verificação de permissão do usuário
   * PENSELCICK VERSÃO 1.0
   */

     final class user extends Model{	
		protected $_table = 'usuario';	

		
		public function listar($id){
			
			 $sql = "select u.usu_nome, u.usu_pla_cod , u.usu_cod , u.usu_cod_dono ,u.usu_usuario, p.per_nome 
				     from 
				       usuario u , permissao p ,permissaousuario pp 
					 where
					   u.USU_COD = pp.PES_USU_COD 
				     and 
					    pp.PES_PER_COD = p.PER_COD
					 and u.USU_COD_DONO = " . $id;
			 
		       return $this->SelecionarDados($sql);
		  
		  }
		
		public function dados($login,$senha){
			
			 $sql = "SELECT 
		                 usu_usuario,
		                 usu_senha ,
		                 usu_cod,
		                 usu_nome,
		                 usu_pla_cod,
		                 usu_cod_dono
		              FROM 
		                 usuario
			          WHERE 
			             usu_usuario = '$login' 
			         AND usu_senha = '$senha' ";
			
		   return   $this->SelecionarDados($sql);
     
		}
		  
		 public function Post($cod_plano , $cod_dono,$nome,$email,$senha){
			 
			$dados = array(
	               'USU_PLA_COD' => $cod_plano,
			       'USU_NOME' => $nome ,
			       'USU_USUARIO' => $email,
			       'USU_SENHA' => $senha ,
			       'USU_DTINCLUSAO' =>  '00',
			       'USU_VALIDO' => true,
			       'USU_COD_DONO' => $cod_dono
			       );
			       
			     $this->InsertOrdem($dados);  
			      
             } 
           
           public function Permissao($tipo_per , $usu_cod){
           			
           		$dados = array(
           		  'pes_per_cod'=>$tipo_per,
           		  'pes_usu_cod'=>$usu_cod
           		);
				
				$this->InsertOrdem($dados);
           } 
           
          public function lastuser($email){
          	 	$sql = "SELECT USU_COD FROM usuario WHERE usu_usuario  = '$email' ";
          	    return   $this->SelecionarDados($sql);
          }      
		    
	 }
      
      