<?php 
	require "crudApp.php";
	class categoria
	{
        private $idCategoria;
        private $idSubCategoria;
        private $nombre;
                
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

		public function RegistroCategoria(){
			$crud=new Crud();
			$bind=[':nombre'=>$this->__GET("nombre")];
			$resul=$crud->Ejecutar("insert into categoria (nombre) values (:nombre)",$bind);
			return $resul;
		}	

        public function RegistroSubCategoria(){
            $crud=new Crud();
			$bind=[':nombre'=>$this->__GET("nombre"),':categoria_id'=>$this->__GET("idCategoria")];
			$resul=$crud->Ejecutar("insert into subcategoria (nombre,categoria_id) values (:nombre,:categoria_id)",$bind);
			return $resul;
        }

        public function ModificarSubCategoria(){
            $crud=new Crud();
			$bind=[':nombre'=>$this->__GET("nombre"),':idSubCategoria'=>$this->__GET("idSubCategoria")];
			$resul=$crud->Ejecutar("update subcategoria set nombre=:nombre where id_subcategoria=:idSubCategoria",$bind);
			return $resul;
		}
		
		public function confirmarModificarCategoria(){
			 $crud=new Crud();
			$bind=[':nombre'=>$this->__GET("nombre"),':idCategoria'=>$this->__GET("idCategoria")];
			$resul=$crud->Ejecutar("update categoria set nombre=:nombre where id_categoria=:idCategoria",$bind);
			return $resul;
		}

		public function eliminarcategoria(){
			$crud=new Crud();
			$bind=[':idCategoria'=>$this->__GET("idCategoria")];
			$resul=$crud->Ejecutar("delete from categoria where id_categoria=:idCategoria",$bind);
			return $resul;
		}
		
		public function eliminarsubcategoria(){
			$crud=new Crud();
			$bind=[':idSubCategoria'=>$this->__GET("idSubCategoria")];
			$resul=$crud->Ejecutar("delete from subcategoria where id_subcategoria=:idSubCategoria",$bind);
			return $resul;
		}
	}