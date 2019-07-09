$(document).ready(function(){
    categoria.categorias();
    $("#buscarCategoria").on("keyup",function(){
        var value=$(this).val().toLowerCase();
        $("#tbl-categorias #spanNombreCategoria").filter(function(){
            $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
        });
    });
    $("#buscarSubCategoria").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#tbl-subcategorias tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
var idCategoria=null;
var nombreCategoria=null;
var idSubCategoria=null;
var nombreSubCategoria=null;
var nombreCategoriamodificar=null;
var idCategoriaModificar=null;
var categoria={
    categorias(){
        $("#loadCategoria").html('<i class="fa fa-circle-o-notch fa-spin fa-fw" ></i> Cargando...');
        $("#tablaCategorias").html("");
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'controllers/app/categoria.php',
            data: {
                button: "categorias"
            }
        }).done(function (response) {
            $("#loadCategoria").html('');
            var tabla = '<div id="tbl-categorias" class="row">';                
            if (response.result !== false) {
                var vercategoria;
                response.datos.forEach(categoria => {
                    vercategoria = "<button class='btn btn-outline-secondary btn-sm btn-block' onclick='categoria.vercategoria(" + categoria.id_categoria +",\"" + categoria.nombre +"\")'><i class='fa fa-eye'></i> Ver</button>";
                    tabla +='<div class="col-sm-3 form-group" id="spanNombreCategoria">';
                    tabla +='<div class="card shadow">';
                    tabla +='<div class="card-body">';
                    tabla += '<h5 class="card-title">' + categoria.nombre + '</h5>';
                    tabla += vercategoria;
                    tabla +='</div>';
                    tabla += '</div>';
                    tabla += '</div>';                    
                });
            } 
            tabla += '</div>';
            $("#tablaCategorias").html(tabla);
        }).fail(function (response) {
            console.log("error");
        });
    },
    registrarCategoria(){
        var txtNombreCategoria = $("#txtNombreCategoria").val();
        if (txtNombreCategoria!==""){
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'controllers/app/categoria.php',
                data: {
                    button: "registrarCategoria",
                    nom: txtNombreCategoria
                }
            }).done(function (response) {

                if (response.result === true) {
                    $("#txtNombreCategoria").val("");
                    swal(
                        "Registrado",
                        "",
                        "success"
                    );
                } else {
                    swal(
                        "Error",
                        "Se presentó un error en el registro vuelve a intentarlo",
                        "error"
                    );
                }
            }).fail(function (response) {
                console.log("error");
            });
        }else{
            swal("Error","Verifique datos de registro","error");
        }
    },
    vercategoria(id,nombre){
        var eliminarcategoria = "<button class='btn btn-outline-danger btn-sm ' onclick='categoria.eliminarcategoria(" + id + ",\"" + nombre + "\")'><i class='fa fa-trash-o' aria-hidden='true'></i> </button>";
        var modificarcategoria = "<button class='btn btn-outline-secondary btn-sm ' onclick='categoria.modificarcategoria()'><i class='fa fa-pencil' aria-hidden='true' ></i> </button>";
        $("#tittleCategoria").html("Categoría: " + nombre + " " + modificarcategoria + " " + eliminarcategoria);
        idCategoria=id;
        nombreCategoria = nombre;
        categoria.subcategorias();
        $("#mdlCategoria").modal("show");
    },
    subcategorias() {
        $("#loadSubCategoria").html('<i class="fa fa-circle-o-notch fa-spin fa-fw" ></i> Cargando...');
        $("#tablaSubCategorias").html("");
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'controllers/app/categoria.php',
            data: {
                button: "subcategorias",
                idCategoria: idCategoria
            }
        }).done(function (response) {
            $("#loadSubCategoria").html('');
            
            if (response.result !== false) {
                var tabla = '<table id="tbl-subcategorias" class="table table-bordered "><tbody>';
                var eliminarModificarsubcategoria;
                response.datos.forEach(subcategoria => {
                    eliminarModificarsubcategoria = "<button class='btn btn-outline-danger btn-sm ' onclick='categoria.eliminarsubcategoria(" + subcategoria.id_subcategoria + ")'><i class='fa fa-trash-o' aria-hidden='true'></i> </button>";
                    eliminarModificarsubcategoria += " <button class='btn btn-outline-secondary btn-sm ' onclick='categoria.modificarsubcategoria(" + subcategoria.id_subcategoria + ",\"" + subcategoria.nombre + "\")'><i class='fa fa-pencil' aria-hidden='true'></i> </button>";
                    tabla += '<tr><td>' + eliminarModificarsubcategoria + ' ' + subcategoria.nombre + ' </td></tr>';
                });
                tabla += '</tbody></table >';
                $("#tablaSubCategorias").html(tabla);
            }
            
        }).fail(function (response) {
            console.log("error");
        });
    },
    registroSubCategoria(){
        
        var txtNombreSubCategoria = $("#txtNombreSubCategoria").val();
        var sw=true;
        if (txtNombreSubCategoria===""){
            sw=false;
        }
        if(sw){
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'controllers/app/categoria.php',
                data: {
                    button: "registroSubCategoria",
                    nom: txtNombreSubCategoria,
                    idCategoria: idCategoria
                }
            }).done(function (response) {

                if (response.result === true) {
                    $("#txtNombreSubCategoria").val("");
                    categoria.subcategorias();
                    swal(
                        "Registrado",
                        "",
                        "success"
                    );
                } else {
                    swal(
                        "Error",
                        "Se presentó un error en el registro vuelve a intentarlo",
                        "error"
                    );
                }
            }).fail(function (response) {
                console.log("error");
            });
        }else{
            swal("Error", "Verifique datos de registro", "error");
        }
    },
    modificarsubcategoria(id_sub,nombre){    
        idSubCategoria=id_sub;
        nombreSubCategoria=nombre;    
        $("#txtNombreSubCategoria").val(nombre);
        $("#btn-guardarSub").addClass("hidden");
        $("#btn-ModificarSub").removeClass("hidden");
    },
    cerrarmodificarSubCategoria(){
        idSubCategoria = null;
        nombreSubCategoria = null;  
        $("#txtNombreSubCategoria").val("");
        $("#btn-ModificarSub").addClass("hidden");
        $("#btn-guardarSub").removeClass("hidden");
    },
    modificarSubCategoria(){
        var txtNombreSubCategoria = $("#txtNombreSubCategoria").val();
        var sw = true;
        if (txtNombreSubCategoria === "") {
            sw = false;
        }
        if (sw) {
            if (nombreSubCategoria !== txtNombreSubCategoria){
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: 'controllers/app/categoria.php',
                    data: {
                        button: "modificarSubCategoria",
                        nom: txtNombreSubCategoria,
                        idSubCategoria: idSubCategoria
                    }
                }).done(function (response) {

                    if (response.result === true) {
                        categoria.cerrarmodificarSubCategoria();
                        $("#txtNombreSubCategoria").val("");
                        categoria.subcategorias();
                        
                    } else {
                        swal(
                            "Error",
                            "Se presentó un error en el registro vuelve a intentarlo",
                            "error"
                        );
                    }
                }).fail(function (response) {
                    console.log("error");
                });
            } else {
                swal("Error", "Debe de tener algún cambio para modificar", "error");
            }
        } else {
            swal("Error", "Verifique datos de registro", "error");
        }
    },
    modificarcategoria(){
        var cancelar = "<button class='btn btn-outline-danger btn-sm ' onclick='categoria.cancelarModificar()'><i class='fa fa-trash-o' aria-hidden='true'></i> Cancelar</button>";
        var modificar = "<button class='btn btn-outline-secondary btn-sm ' onclick='categoria.confirmarModificarCategoria()'><i class='fa fa-pencil' aria-hidden='true' ></i> Modificar</button>";
        var html = '<input type="text" id="txtModificarCategoria" placeholder="Categoría"  class="form-control form-control-sm col-sm-5"> <br>' + modificar + ' ' + cancelar+'';
        $("#tittleCategoria").html(html);
        $("#txtModificarCategoria").val(nombreCategoria);
    },
    confirmarModificarCategoria(){
        var newNombre = $("#txtModificarCategoria").val();
        if (newNombre!==nombreCategoria){
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'controllers/app/categoria.php',
                data: {
                    button: "confirmarModificarCategoria",
                    newNombre: newNombre,
                    idCategoria: idCategoria
                }
            }).done(function (response) {

                if (response.result === true) {
                    categoria.vercategoria(idCategoria,newNombre);
                    categoria.categorias();

                } else {
                    swal(
                        "Error",
                        "Se presentó un error en el registro vuelve a intentarlo",
                        "error"
                    );
                }
            }).fail(function (response) {
                console.log("error");
            });
        }else{
            swal("Error", "Debe de tener algún cambio para modificar", "error");
        }
    },
    cancelarModificar(){
        categoria.vercategoria(idCategoria, nombreCategoria);
    },
    eliminarcategoria(id,nombre){
        var table = $("#tablaSubCategorias").html();
        if (table===""){
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'controllers/app/categoria.php',
                data: {
                    button: "eliminarcategoria",
                    idCategoria: idCategoria
                }
            }).done(function (response) {

                if (response.result === true) {
                    $("#mdlCategoria").modal("toggle");
                    categoria.categorias();

                } else {
                    swal(
                        "Error",
                        "Se presentó un error en el registro vuelve a intentarlo",
                        "error"
                    );
                }
            }).fail(function (response) {
                console.log("error");
            });
        }else{
            swal("Error", "Para eliminar debe remover las subcategorias.", "error");
        }
    },
    eliminarsubcategoria(id){
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'controllers/app/categoria.php',
            data: {
                button: "eliminarsubcategoria",
                idSubCategoria: id
            }
        }).done(function (response) {
            if (response.result === true) {
                categoria.subcategorias();
            } else {
                swal(
                    "Error",
                    "Se presentó un error en el registro vuelve a intentarlo, verificar que la subcategoría no tenga temas.",
                    "error"
                );
            }
        }).fail(function (response) {
            console.log("error");
        });
    }
}