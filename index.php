<?php   session_start(); 
define('MODELS', 'app/models/');
define('VIEW','app/view/');
define('CONTROLLER','app/controller/');



require_once ('system/system.php');
require_once ('system/model.php');

function __autoload($file)
{
	 
	require_once MODELS .$file.'.php';
}



require_once ('system/controller.php');

  $start = new System();
  $start->iniciar();
  
 
