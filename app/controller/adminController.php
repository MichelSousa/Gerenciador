<?php 
    
     class Admin extends Controller{
     	
		public $list_user;
		public $cod_dono;
		public $id;
		public $nome;
		public $last_user;
		
		   public function user()
		   {
		         
		      $login = $_SESSION['login'];
			  $senha = $_SESSION['senha'];
			  $user = new user();
			  $user->ConectaDB();
			  $all = $user->dados($login,$senha);  
				 
				 foreach($all as $row)
             {
                  $this->nome = $row['usu_nome'] ;
			      $this->id    = $row['usu_cod'] ;
             }		
		    	
			      $this->list_user = $user->listar($this->id);
			   
			 }
		   
		 public function Home()
		   {
		  
		   	  $dados['objeto']  = $this->user();
			  $dados['nome']    = $this->nome;
			  $dados['user_id'] =   $this->id;
			  $this->view('admin',$dados);	  
		   }
		   
		   public function Usuario()
		   {    
		        $dados['objeto']      = $this->user(); 
		   	    $dados['list']        = $this->list_user;
		   	    $dados['nome']        = $this->nome;
			    $dados['user_id']     = $this->id;
			    $this->view('admin/usuario',$dados);	
		   }
		   
		   public function NovoUsuario(){
		   	
			   $dados['objeto']  = '';
		   	   $this->view('admin/novousuario',$dados);
			   $login = $_SESSION['login'];
			   $senha = $_SESSION['senha'];
			   $novo_user = new user();
			   $novo_user->ConectaDB();
			   $listar = $novo_user->dados($login,$senha);
			   
			   foreach($listar as $linha_user){
			   	   $cod_pla_cod =  $linha_user['usu_pla_cod'];
				   $user_cod_dono = $linha_user['usu_cod_dono'];
			   }
			   
			  if(isset($_POST['novouser']))
				
				{   
				   $senha = rand(5,1000); 
				               
 			        $email     =  $_POST['email'];
				    $nome      =  $_POST['nome'];
			        $permissao = $_POST['permissao'];
				    $novo_user->Post($cod_pla_cod,  $user_cod_dono,$nome,$email,$senha );
				  
				    $novo_user->lastuser($email);
					
					foreach($novo_user->lastuser($email) as $list_cod){
						$cod =  $list_cod['USU_COD'];
					}
					 $per = new permissaousuario();
					 $per->ConectaDB();
					 $per->permisao($permissao,$cod);
					 
					  echo "usuario inserido com sucesso";	  
				}

                  
			  
		   }
		   
     }
