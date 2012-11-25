

 <?php

   class permissaousuario extends  Model{
   	  protected $_table = 'permissaousuario';
      public $db ;
	  
	  
       public function permisao($tipo_per,$cod_usu){
       	
          $this->db = new PDO("mysql:host=localhost;dbname=gerenciador","root",""); 
		  
       	  $sql   = "INSERT INTO permissaousuario (`PES_PER_COD`, `PES_USU_COD`)";
       	  $sql  .= " VALUES ($tipo_per,$cod_usu)";
		 
		 $query = $this->db->prepare($sql);
		 return $query->execute();
		 
       }

   }

  ?>