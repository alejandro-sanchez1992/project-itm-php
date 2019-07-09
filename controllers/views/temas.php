<?php
    session_start();
    if($_SESSION!=null){		
		if(isset($_SESSION['appSession'])!=null){
            require "../../views/temas.php";
        }else{
            include "../../views/login.php";
        }
    }else{
		include "../../views/login.php";
	}
?>