<?php 
	require '../../models/usuario.php';
	$usuario=new usuario();

	if($_POST['button']=="rutas"){
        session_start();    
        $ruta="";
        if(isset($_POST['ruta'])!=null){
            $ruta=$_POST["ruta"];
        }					
        $_SESSION['url']=$ruta;
        echo json_encode(['result'=>true]);
	}
	
	if($_POST['button']=="rutasHome"){
        session_start();    
        $ruta="";
        if(isset($_POST['ruta'])!=null){
            $ruta=$_POST["ruta"];
        }					
        $_SESSION['urlHome']=$ruta;
        echo json_encode(['result'=>true]);
    }

	if($_POST["button"]=="iniciarSesion"){	
		$Pass=hash_hmac('sha256',$_POST['pass'], 'claveItm');	
        $bindLogin=[':User'=>$_POST['user'],':Pass'=>$Pass];      
		$DatosLogin=$usuario->ConsultarTablaCondicion('select * from usuarios where username=:User and pass=:Pass',$bindLogin);	
		if($DatosLogin!=false){
			session_start();
			$_SESSION['url']="home";
            $_SESSION['appSession']=true;
			$_SESSION['idusuario']=$DatosLogin[0]['id'];
			$_SESSION['documento']=$DatosLogin[0]['documento'];
			$_SESSION['nombreusuario']=$DatosLogin[0]['nombre'];
			$_SESSION['username']=$DatosLogin[0]['username'];
			$_SESSION['pass']=$DatosLogin[0]['pass'];
			echo json_encode(['result'=>true]);
		}else{
			echo json_encode(['result'=>$bindLogin]);
		}
    }
	
	if($_POST['button']=="registro"){
		$Pass=hash_hmac('sha256',$_POST['documento'], 'claveItm');			
		$usuario->__SET('documento',$_POST['documento']);
		$usuario->__SET('nombreusuario',$_POST['nombre']);
		$usuario->__SET('username',$_POST['documento']);
		$usuario->__SET('pass',$Pass);
		$Datos=$usuario->RegistroUsuario();
		if($Datos!=false){            
			echo json_encode(['result'=>true]);
		}else{
			echo json_encode(['result'=>false]);
		}
	}

	if($_POST['button']=="modificar"){
		$Pass=hash_hmac('sha256',$_POST['documento'], 'claveItm');			
		$usuario->__SET('documento',$_POST['documento']);	
		$usuario->__SET('pass',$Pass);	
		$Datos=$usuario->ModificarUsuario();
		if($Datos!=false){            
			echo json_encode(['result'=>$Datos]);
		}else{
			echo json_encode(['result'=>$Datos]);
		}
	}

    if($_POST["button"]=="cerrarSesion"){
		session_start();
		session_unset();
		session_destroy();
		if($_SESSION==null){
			echo json_encode(['result'=>true]);
		}else{
			echo json_encode(['result'=>false]);
		}		
	}