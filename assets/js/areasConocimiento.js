$(document).ready(function() {
    conocimiento.cargarCategorias();
    $("#txtbuscarTemas").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#tbl-categorias #spanNombreCategoria").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

var conocimiento={
    cargarCategorias() {
        $("#loadInformacion").html('<i class="fa fa-circle-o-notch fa-spin fa-fw" ></i> Cargando...');
        $("#contenedorInformacion").html("");
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'controllers/app/categoria.php',
            data: {
                button: "categorias"
            }
        }).done(function (response) {
            $("#loadInformacion").html('');
            var tabla = '<div id="tbl-categorias" class="row">';
            if (response.result !== false) {
                var vercategoria;
                response.datos.forEach(categoria => {
                    debugger
                    tabla += '<div class="col-sm-3 form-group" id="spanNombreCategoria">';
                    tabla += '<div class="card shadow" >';
                    tabla += '<div class="card-body">';
                    tabla += '<h5 class="card-title">' + categoria.nombre + '</h5>';
                    tabla += '</div>';
                    tabla += '<ul class="list-group list-group-flush">';
                    if (categoria.datosDependencia!==false){
                        categoria.datosDependencia.forEach(subcategoria => {
                            tabla += '<li class="list-group-item">' + subcategoria.nombre + '</li>';
                        });
                    }       
                    tabla += '</ul>';
                    tabla += '<div class="card-body">';
                    tabla += '<a href="#" class="btn btn-outline-secondary btn-block"><i class="fa fa-eye"></i> Ver más...</a>';                    
                    tabla += '</div>';
                    tabla += '</div>';
                    tabla += '</div>';
                });
            }
            tabla += '</div>';
            $("#contenedorInformacion").html(tabla);
        }).fail(function (response) {
            console.log("error");
        });
    }
}