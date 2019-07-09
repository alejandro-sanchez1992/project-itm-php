$(document).ready(function () {
    
});

var admin={
    cerrar(){
        debugger
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'controllers/app/login.php',
            data: {
                button: "cerrarSesion",
            }
        }).done(function (response) {

            if (response.result === true) {
                $(location).attr('href', '.');
            } else {
                swal(
                    "Error cerrar sesión",
                    "",
                    "error"
                );
            }
        }).fail(function (response) {
            console.log("error");
        });
    },
    rutas(ruta) { 
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'controllers/app/login.php',
            data: {
                button:"rutas",
                ruta: ruta
            }
        }).done(function (response) {            
            location.reload();
        }).fail(function (response) {
            console.log("error");
        });        
    },
}