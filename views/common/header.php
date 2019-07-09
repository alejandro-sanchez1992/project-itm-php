<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Banco de objetos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link href="../../assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../assets/vendors/sweetalert/sweetalert.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../assets/vendors/datatables/css/dataTables.css">
    <link href="../../assets/css/style-app.css" rel="stylesheet">
	
    <link href="../../assets/css/style-modulos.css" rel="stylesheet">
</head>
<body >
	<header> 
	    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
	        <a class="navbar-brand" href="#"><img class="mb-4 " src="assets/img/itm-logo.png" alt=""  height="52">   </a>
	        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	            <span class="navbar-toggler-icon"></span>
	        </button>

	        <div class="collapse navbar-collapse" id="navbarSupportedContent">
	            <ul class="navbar-nav mr-auto">
	            <!-- <li class="nav-item active">
	                <a class="nav-link" href="#">Inicio <span class="sr-only"></span></a>
	            </li> -->
	            </ul>
	            <div class="form-inline my-2 my-lg-0">
	                <a class="btn btn-outline-secondary my-2 my-sm-0"  onclick="admin.cerrar()"> <?php echo $_SESSION['nombreusuario']; ?> <i class="fa fa-power-off"></i></a>
	            </div>
	        </div>
	    </nav>
    </header>