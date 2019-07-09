<?php 	
	session_start();
	if($_SESSION!=null){		
		if(isset($_SESSION['appSession'])!=null){
			header("location: app.php");
		}else{
			include "controllers/views/login.php";
		}	
	}else{
		include "controllers/views/login.php";
	}
 ?>