    <?php
        require_once(__DIR__."/../scorm/samples/config.php");
        require_once(__DIR__.'/../scorm/ScormEngineService.php');
        global $CFG;

        $ServiceUrl = $CFG->scormcloudurl;
        $AppId = $CFG->scormcloudappid;
        $SecretKey = $CFG->scormcloudsecretkey;
        $Origin = $CFG->scormcloudorigin;

        write_log('Creating ScormEngineService');
        $ScormService = new ScormEngineService($ServiceUrl,$AppId,$SecretKey,$Origin);
        write_log('ScormEngineService Created');
        $courseService = $ScormService->getCourseService();

                            
        //$importurl = $CFG->wwwroot."/ImportFinish.php";
        //$courseListUrl = $CFG->wwwroot."../scorm/samples/CourseListSample.php";
        $courseListUrl = "http://itmphp.local/app.php";
        //$cloudUploadLink = $uploadService->GetUploadUrl($importurl)
         
        $courseId = uniqid();
        $cloudUploadLink = $courseService->GetImportCourseUrl($courseId,$courseListUrl);
    ?>

    <div class="col-sm-12 ">
        <div class="col-sm-8">
            <h4>Temas</h4>
        </div>
        <div class="col-sm-4">
            
        </div>
        <hr class="col-sm-12">
    </div>
        
    <div class="card shadow col-sm-12" >                
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
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
                        <?php
                            $debugService = $ScormService->getdebugService();
                            if ($debugService->CloudPing()){
                                echo "<p style='color:green'>La llamada CloudPing fue exitosa.</p>";
                            } else {
                                echo "<p style='color:red'>La llamada CloudPing no tuvo éxito.</p>";
                            }
                            if ($debugService->CloudAuthPing()){
                                echo "<p style='color:green'>La llamada a CloudAuthPing fue exitosa.</p>";
                            } else {
                                echo "<p style='color:red'>La llamada a CloudAuthPing no tuvo éxito.</p>";
                            }
                            echo "<br/><br/>";
                            echo '<a data-toggle="tab" href="#profile" role="tab">Importar nuevo objeto de aprendizaje</a>';
                            echo "<br/><br/>";

                            write_log('Creating CourseService');
                            $courseService = $ScormService->getCourseService();
                            write_log('CourseService Created');

                            write_log('Getting CourseList');
                            $allResults = $courseService->GetCourseList();
                            write_log('CourseList count = '.count($allResults));

                            echo '<table border="1" cellpadding="5">';
                            echo '<tr><td>Id del Curso</td><td>Titulo</td><td>Registrados</td><td></td><td>metadatos</td><td>Detalles</td><td>Propiedades</td> </tr>';
                            foreach($allResults as $course)
                            {
                                echo '<tr><td>';
                                echo $course->getCourseId();
                                echo '</td><td>';
                                echo $course->getTitle();
                                echo '</td><td>';
                                echo '<a href="scorm/samples/RegistrationListSample.php?courseid='.$course->getCourseId().'">'.$course->getNumberOfRegistrations().'</a>';
                                echo '</td><td>';
                                echo '<a href="scorm/samples/DeletePackageSample.php?id='.$course->getCourseId().'">Borrar Objecto</a>';
                                echo '</td><td>';
                                echo '<a href="scorm/samples/CourseMetadataSample.php?courseid='.$course->getCourseId().'">metadatos</a>';
                                echo '</td><td>';
                                echo '<a href="scorm/samples/CourseDetailSample.php?courseid='.$course->getCourseId().'">detalles</a>';
                                echo '</td><td>';
                                echo '<a href="scorm/samples/CoursePropertiesSample.php?courseid='.$course->getCourseId().'">propiedades</a>';
                                echo '</td><td>';
                                echo '<a href="scorm/samples/CourseInvitationList.php?courseid='.$course->getCourseId().'">invitaciones</a>';
                                echo '</td><td>';
                                $prevUrl = $courseService->GetPreviewUrl($course->getCourseId(),$CFG->wwwroot."/CourseListSample.php","https://cloud.scorm.com/sc/css/cloudPlayer/cloudstyles.css");
                                echo '<a href="'.$prevUrl.'">Ir la Curso</a>';
                                echo '</td><td>';
                                echo '<a href="CourseExistsSample.php?courseid='.$course->getCourseId().'">Existente?</a>';
                                echo '</td</tr>';
                            }
                            echo '</table><br/><br/>';

                            $reportService = $ScormService->getReportingService();
                            $repAuth = $reportService->GetReportageAuth("freenav",true);
                            $reportageUrl = $reportService->GetReportageServiceUrl()."Reportage/reportage.php?appId=".$AppId;
                            $reportUrl = $reportService->GetReportUrl($repAuth,$reportageUrl);


                            echo '<h3><a href="'.$reportUrl.'">Ver Reporte de la aplicación.</a></h3>';

                            ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row form-group body-tab-theme">
                        <div class="col-sm-12">
                            <button class="btn btn-outline-secondary" >Registrar Formulario</button>
                            <form action="<?php echo $cloudUploadLink; ?>" method="post" enctype="multipart/form-data">
                                <input type="file" name="filedata" id="file" /> 
                                <input class="btn btn-outline-secondary" type="submit" name="submit" value="Registrar Archivo" />
                            </form>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>           
    </div>