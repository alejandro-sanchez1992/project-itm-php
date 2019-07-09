$(document).ready(function(){
    // menuUsuario.rutas("home");
});

var menuUsuario={
    // rutas(ruta){
        
    //     $('#Contenedor').attr('src', 'controllers/views/' + ruta + '.php');
    // },
    rutas(ruta) {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'controllers/app/login.php',
            data: {
                button: "rutasHome",
                ruta: ruta
            }
        }).done(function (response) {
            location.reload();
        }).fail(function (response) {
            console.log("error");
        });
    },
}