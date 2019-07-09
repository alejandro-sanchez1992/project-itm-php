<?php 
	require_once("conexionApp.php");
	class Crud 
	{
		public function ConsultarTabla($sql){
			try {
				$Cone=new ConexionApp();
				$sth=$Cone->getConexionApp()->prepare($sql);
				$sth->execute();
				$resul=$sth->fetchAll();
				$sw=false;
				if($sth->rowCount()>0){
					$sw=$resul;
				}
				$sth->closeCursor();
				$sth=null;
				$Cone=null;
				return $sw;
			} catch (Exception $e) {
				return false;
			}
		}

		public function ConsultarTablaCondicion($sql,$bind){
			try {
				$Cone=new ConexionApp();
				$sth=$Cone->getConexionApp()->prepare($sql);
				$sth->execute($bind);
				$resul=$sth->fetchAll();
				$sw=false;
				if($sth->rowCount()>0){
					$sw=$resul;
				}
				$sth->closeCursor();
				$sth=null;
				$Cone=null;
				return $sw;
			} catch (Exception $e) {
				return false;
			}
		}		
		
		public function Ejecutar($sql,$bind){
			try {
				$Cone=new ConexionApp();
				$sth=$Cone->getConexionApp()->prepare($sql);
				$sth->execute($bind);				
				$sw=false;
				if($sth->rowCount()>0){
					$sw=true;
				}
				$sth->closeCursor();
				$sth=null;
				$Cone=null;
				return $sw;
			} catch (Exception $e) {
				return false;
			}
		}	
	}