
    <div class="col-sm-12 ">
        <div class="col-sm-8">
            <h4>Categorías</h4>
        </div>
        <div class="col-sm-4">
            
        </div>
        <hr class="col-sm-12">
    </div>
        
    <div class="card shadow col-sm-12" >                
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" onclick="categoria.categorias()">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Registro</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row form-group body-tab-theme">
                        <div class="col-md-3 offset-md-9 form-group">
                            <input id="buscarCategoria" type="text" class="form-control" placeholder="Buscar">
                        </div>
                        <div class="col-sm-12 text-center" id="loadCategoria">

                        </div>
                        <div class="col-sm-12 " id="tablaCategorias">

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row form-group body-tab-theme">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" id="txtNombreCategoria" placeholder="Nombre">
                                <small id="emailHelp" class="form-text text-muted">Agregue categoría</small>
                            </div>
                            <button class="btn btn-outline-secondary" onclick="categoria.registrarCategoria()">Registrar</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>           
    </div>
   <div id="mdlCategoria" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <div class="modal-title col-sm-9" id="tittleCategoria"></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            
                            <div class="col-sm-12 ml-auto ">
                                <p class="">
                                    SubCategoría:
                                </p>
                                <input type="text" id="txtNombreSubCategoria" placeholder="SubCategoría"  class="form-control form-control-sm">
                            </div>
                           
                            <div class="col-12 col-sm-12 ml-auto ">
                                <br>
                            </div>
                            <div class="col-12 col-sm-4 offset-sm-8 row align-self-end form-group">
                                
                                <button id="btn-guardarSub" class="btn btn-outline-secondary btn-block" onclick="categoria.registroSubCategoria()">
                                    <i class="fa fa-save"></i> Guardar
                                </button>
                                <div class="col-sm-12 hidden" id="btn-ModificarSub">
                                    <button  class="btn btn-outline-secondary  " onclick="categoria.modificarSubCategoria()">
                                        <i class="fa fa-save"></i> Modificar
                                    </button>
                                    <button  class="btn btn-outline-secondary  " onclick="categoria.cerrarmodificarSubCategoria()">
                                        <i class="fa fa-times" aria-hidden="true"></i> 
                                    </button>
                                </div>
                                
                            </div>
                            <div class="col-12 col-sm-12 ml-auto ">
                                <hr>
                            </div>                            
                        </div>   
                        <div class="row">                            
                            <div class="col-12 col-sm-4 offset-sm-4  ml-auto form-group">
                                <input id="buscarSubCategoria" type="text" class="form-control" placeholder="Buscar: SubCategorías">
                            </div>
                            <div class="col-sm-12 text-center" id="loadSubCategoria">

                            </div>
                            <div class="col-sm-12 " id="tablaSubCategorias"></div>
                        </div>              
                    </div>
                </div>
            </div>
        </div>
    </div>
    