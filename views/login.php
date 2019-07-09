<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Iniciar sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link href="assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style-login.css" rel="stylesheet">
    <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendors/sweetalert/sweetalert.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/vendors/datatables/css/dataTables.css">
</head>
<body class="text-center login">    
    <div class="form-signin">
        <div class="card">
            <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="inicio-tab" data-toggle="tab" href="#inicio" role="tab" aria-controls="inicio" aria-selected="true">inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="registro-tab" data-toggle="tab" href="#registro" role="tab" aria-controls="registro" aria-selected="false">registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contrasena-tab" data-toggle="tab" href="#contrasena" role="tab" aria-controls="contrasena" aria-selected="false">Recuperar</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="inicio" role="tabpanel" aria-labelledby="inicio-tab">
                    <br>
                    <img class="mb-4 " src="assets/img/itm-logo.png" alt=""  height="82">           
                    <div class="col-sm-12 ">

                        <input type="text" id="txtUserName" class="form-control shadow" placeholder="User Name" required autofocus>
                        <br>
                        <input type="password" id="txtPassword" class="form-control shadow" placeholder="Password" required>
                        <br>
                        <button class="btn btn-info btn-block shadow btn-theme" onclick="login.iniciarSesion()">Iniciar Sesión</button>
                    </div>   
                </div>
                <div class="tab-pane fade" id="registro" role="tabpanel" aria-labelledby="registro-tab">
                    <br>
                    <img class="mb-4 " src="assets/img/itm-logo.png" alt=""  height="82">           
                    <div class="col-sm-12 ">

                        <input type="text" id="txtnombreRegistro" class="form-control shadow" placeholder="Nombre" required autofocus>
                        <br>
                        <input type="text" id="txtdocumentoRegistro" class="form-control shadow" placeholder="Documento" required>
                        <br>
                        <button class="btn btn-info btn-block shadow btn-theme" onclick="login.registro()">Registro Usuario</button>
                    </div> 
                </div>

                <div class="tab-pane fade" id="contrasena" role="tabpanel" aria-labelledby="contrasena-tab">
                    <br>
                    <img class="mb-4 " src="assets/img/itm-logo.png" alt=""  height="82">           
                    <div class="col-sm-12 ">

                        <input type="text" id="txtdocumentoRecuperar" class="form-control shadow" placeholder="Documento" required>
                        <br>
                        <button class="btn btn-info btn-block shadow btn-theme" onclick="login.modificar()"> Recuperar</button>
                    </div> 
                </div>
                
            </div>
                                
            </div>
        </div>
    </div>
    
    <script src="assets/vendors/jquery/jquery.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>    
    <script src="assets/vendors/datatables/js/dataTables.js"></script>   
    <script src="assets/vendors/sweetalert/sweetalert-dev.js"></script>
    <script src="assets/js/login.js"></script>
</body>
</html>