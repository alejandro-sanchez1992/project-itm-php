<?php 
	require '../../models/categoria.php';
    $categoria=new categoria();
		
    if($_POST['button']=="categorias"){
        $datos=$categoria->ConsultarTabla('select * from categoria');	
        $datosResponse=[];
        if($datos!=null){
            foreach ($datos as $row) {
				$datosDependencia=$categoria->ConsultarTabla('select * from subcategoria where categoria_id='.$row['id_categoria']);	
                $datosResponse[]=['id_categoria'=>$row['id_categoria'],'nombre'=>$row['nombre'],'datosDependencia'=>$datosDependencia];
            }      
			echo json_encode(['result'=>true,'datos'=>$datosResponse]);
		}else{
			echo json_encode(['result'=>false]);
		}
    }

    if($_POST['button']=="subcategorias"){
        $datos=$categoria->ConsultarTabla('select * from subcategoria where categoria_id='.$_POST['idCategoria']);	
        if($datos!=false){            
			echo json_encode(['result'=>true,'datos'=>$datos]);
		}else{
			echo json_encode(['result'=>false]);
		}
    }

    if($_POST['button']=="registrarCategoria"){

		$categoria->__SET('nombre',$_POST['nom']);
		$Datos=$categoria->RegistroCategoria();
		if($Datos!=false){            
			echo json_encode(['result'=>true]);
		}else{
			echo json_encode(['result'=>false]);
		}
    }
    
    if($_POST['button']=="registroSubCategoria"){
        $categoria->__SET('idCategoria',$_POST['idCategoria']);
        $categoria->__SET('nombre',$_POST['nom']);
		$Datos=$categoria->RegistroSubCategoria();
		if($Datos!=false){            
			echo json_encode(['result'=>true]);
		}else{
			echo json_encode(['result'=>false]);
		}
    }

    if($_POST['button']=="modificarSubCategoria"){
        $categoria->__SET('idSubCategoria',$_POST['idSubCategoria']);
        $categoria->__SET('nombre',$_POST['nom']);
		$Datos=$categoria->ModificarSubCategoria();
		if($Datos!=false){            
			echo json_encode(['result'=>true]);
		}else{
			echo json_encode(['result'=>false]);
		}
	}
	
	if($_POST['button']=="confirmarModificarCategoria"){
		$categoria->__SET('nombre',$_POST['newNombre']);
        $categoria->__SET('idCategoria',$_POST['idCategoria']);
		$Datos=$categoria->confirmarModificarCategoria();
		if($Datos!=false){            
			echo json_encode(['result'=>true]);
		}else{
			echo json_encode(['result'=>false]);
		}
	}

	if($_POST['button']=="eliminarcategoria"){
		$categoria->__SET('idCategoria',$_POST['idCategoria']);
		$Datos=$categoria->eliminarcategoria();
		if($Datos!=false){            
			echo json_encode(['result'=>true]);
		}else{
			echo json_encode(['result'=>false]);
		}
	}

	if($_POST['button']=="eliminarsubcategoria"){
		$categoria->__SET('idSubCategoria',$_POST['idSubCategoria']);
		$Datos=$categoria->eliminarsubcategoria();
		if($Datos!=false){            
			echo json_encode(['result'=>true]);
		}else{
			echo json_encode(['result'=>false]);
		}
	}

	if($_POST['button']=="uploadArchivo"){
        $respuestaFile=false;
        $mensajeFile="";
        $fileName="";
        define("uploadURL", '../../assets/archivos/');
        define("fileName", 'conocimiento_');

        $fileName = '';
        $mensajeFile = 'ERROR EN EL SCRIPT';
        $extension = explode('.',$_FILES['userfile']['name']);
        $num = count($extension)-1;
        $File = fileName.time().'.'.$extension[$num];	
        if(is_uploaded_file($_FILES['userfile']['tmp_name']))
        {
            if(move_uploaded_file($_FILES['userfile']['tmp_name'], uploadURL.$File))
            {
                $respuestaFile = true;
                $fileName = $File;
                $mensajeFile = $File;
            }
            else{
                $mensajeFile = 'No se pudo subir el archivo';
            }		
                
        }
        else{
            $mensajeFile = 'No se pudo subir el archivo';
        }

        echo json_encode(["respuesta" => $respuestaFile,"mensaje" => $mensajeFile,"fileName" => $fileName]);
    }