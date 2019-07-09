    <script src="../../assets/vendors/jquery/jquery.min.js"></script>
    <script src="../../assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>    
    <script src="../../assets/vendors/datatables/js/dataTables.js"></script>   
    <script src="../../assets/vendors/sweetalert/sweetalert-dev.js"></script>
    <script src="../../assets/vendors/ajaxUpload/AjaxUpload.2.0.min.js"></script>
    <script src="../../assets/js/menuAdmin.js"></script>
    <script src="../../assets/js/<?php echo $_SESSION['url']; ?>.js"></script>
    <script>
        var btn_SubirArchivo2 = $('#btnUpload'), interval;
        new AjaxUpload('#files', {
            action: 'controllers/app/categoria.php',
            data: {
                button: "uploadArchivo"
            },
            onSubmit: function (file, ext) {                
                if (!(ext && /^(zip|rar)$/.test(ext))) {
                    // extensiones permitidas
                    swal({ title: "Sólo se permite Archivos  zip,rar", text: "Asegúrese que es archivo tenga estos formatos.", timer: 3300, showConfirmButton: true });
                    // cancela upload
                    return false;
                } else {
                    //$("#loadPdf").html('<i class="fa fa-spinner fa-pulse" id=""></i> <i class="fa fa-images"></i>');
                }
            },
            onComplete: function (file, response) {
                respuesta = $.parseJSON(response);
                if (respuesta.respuesta == true) {
                    swal({ title: "EL archivo cargado es correcto", text: "se verifico con éxito", timer: 3300, showConfirmButton: true });
                } else {
                    //$("#loadPdf").html("");
                }
                //this.enable();
            }
        });
    </script>
</body>
</html>