<?php
    include "views/common/header.php";
?> 
    <div class="row margin-admin">
        
        <div class="col-sm-2 form-group shadow">
            
                
            <ul class="list-group list-group-flush">
                <li class="list-group-item list-group-item-action" onclick="admin.rutas('categorias')">Categorias</li>
                <li class="list-group-item list-group-item-action" onclick="admin.rutas('temas')">Temas</li>
            </ul>
               
        </div>
        <div class="col-sm-10 form-group">        
            <br>      
            <?php include $_SESSION['url'].".php";?>
            <br>
            <!-- <iframe class="scrollbar force-overflow"  width="100%" height="530vh" frameborder="0"  scrolling="yes"  id="Contenedor" >
            </iframe> -->
        </div>
    </div>
<?php
    include "views/common/footer.php";
?> 

