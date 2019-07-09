<?php 
	
	class ConexionApp
	{
		
		protected static $db;
		public function ConexionApp(){
			try {		
				self::$db = new PDO('mysql:host=localhost;dbname=itm_php','root','');				
				self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);				
			} catch (Exception $e) {
				echo "Conexion Error" .$e->getMessage();
			}
		}
		
		public function getConexionApp(){
			if(!self::$db){
				new ConexionApp();
			}
			return self::$db;
		}		

	}