<?php 
	require "crudApp.php";
	class usuario
	{
		private $idusuario;
		private $documento;
		private $nombreusuario;
		private $apellidousuario;
		private $email;
		private $username;
		private $pass;
		private $idcargo;
		private $idtiporol;
        
		public function __SET($Dato,$Value){
			return $this->$Dato=$Value;
		}
		public function __GET($Dato){
			return $this->$Dato;
		}

		public function ConsultarTablaCondicion($sql,$bint){
			$crud=new Crud();
			$rows=$crud->ConsultarTablaCondicion($sql,$bint);
			return $rows;
		}

		public function ConsultarTabla($sql){
			$crud=new Crud();
			$rows=$crud->ConsultarTabla($sql);
			return $rows;
		}	

		public function RegistroUsuario(){
			$crud=new Crud();
			$bindUsuario=[':documento'=>$this->__GET("documento"),':nombreusuario'=>$this->__GET("nombreusuario"),':username'=>$this->__GET("username"),':pass'=>$this->__GET("pass")];
			$resul=$crud->Ejecutar("insert into usuarios (documento,nombre,username,pass) values (:documento,:nombreusuario,:username,:pass)",$bindUsuario);
			return $resul;
		}	

		public function ModificarUsuario(){
			$crud=new Crud();
			$datoUsuarios=$crud->ConsultarTabla("select * from usuarios where documento='".$this->__GET("documento")."' LIMIT 1");
			$id="";
			foreach ($datoUsuarios as $row) {
				$id=$row['id'];
			}
			$bindUsuario=[':id'=>$id,':pass'=>''];
			$resul=$crud->Ejecutar("update usuarios set pass=:pass where id=:id",$bindUsuario);
			$bindUsuario=[':id'=>$id,':pass'=>$this->__GET("pass")];
			$resul=$crud->Ejecutar("update usuarios set pass=:pass where id=:id",$bindUsuario);
			return $resul;
		}	
	}