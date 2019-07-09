<?php 	
	session_start();
	if($_SESSION!=null){		
		if(isset($_SESSION['appSession'])!=null){
			
			require "views/menuAdmin.php";
		}else{
			include "controllers/views/menuUsuario.php";
		}
	}else{
		include "controllers/views/menuUsuario.php";
	}
 ?>