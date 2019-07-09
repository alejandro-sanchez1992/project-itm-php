$(document).ready(function(){

});

$(document).keypress(function (e) {

});

var login={
    iniciarSesion(){
        var txtUserName=$("#txtUserName").val();
        var txtPassword=$("#txtPassword").val();
        var sw = true;
        if (txtUserName == "") {
            sw = false;
        }
        if (txtPassword == "") {
            sw = false;
        }
        if (sw) {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'controllers/app/login.php',
                data: {
                    button: "iniciarSesion",
                    user: txtUserName,
                    pass: txtPassword
                }
            }).done(function (response) {
                
                if (response.result === true) {
                    $(location).attr('href', 'app.php'); 		
                } else {
                    swal(
                        "Error inicio sesión",
                        "Usuario o contraseña incorrectas.",
                        "error"
                    );
                }
            }).fail(function (response) {
                console.log("error");
            });
        } else {
            swal("Verifique datos de Inicio Sesión.", "", "error");
        }
    },
    registro(){
        var txtnombreRegistro = $("#txtnombreRegistro").val();
        var txtdocumentoRegistro = $("#txtdocumentoRegistro").val();
        var sw=true;
        if(txtnombreRegistro==""){
            sw=false;
        }
        if (txtdocumentoRegistro== "") {
            sw = false;
        }
        if (sw){
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'controllers/app/login.php',
                data: {
                    button: "registro",
                    nombre: txtnombreRegistro,
                    documento: txtdocumentoRegistro
                }
            }).done(function (response) {
    
                if (response.result === true) {
                    swal(
                        "Usuario Registrado",
                        "puede iniciar sesión",
                        "success"
                    );
                    $("#txtnombreRegistro").val("");
                    $("#txtdocumentoRegistro").val("");
                } else {
                    swal(
                        "Error Registro",
                        "",
                        "error"
                    );
                }
            }).fail(function (response) {
                console.log("error");
            });

        }else{
            swal("Verifique datos de registro.","","error");
        }
    },
    modificar(){
        var txtdocumentoRecuperar = $("#txtdocumentoRecuperar").val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'controllers/app/login.php',
            data: {
                button: "modificar",
                documento: txtdocumentoRecuperar
            }
        }).done(function (response) {
            debugger
            if (response.result === true) {
                swal(
                    "Usuario Recuperado",
                    "puede iniciar sesión con el documento",
                    "success"
                );
                
                $("#txtdocumentoRecuperar").val("");
            } else {
                swal(
                    "Error en Recuperar",
                    "",
                    "error"
                );
            }
        }).fail(function (response) {
            console.log("error");
        });
    }
}