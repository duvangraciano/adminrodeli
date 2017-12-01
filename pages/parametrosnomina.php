<?php 

if (session_status() != PHP_SESSION_NONE) {
if (isset($pu['parametros_nomina'])) {
  
$sce = null; $pe = null; $sst = null; $apro = null; $vv = null;
$i = 0;

$data = $misc->consultaParametros()->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $key => $value) {
	foreach ($data[$key] as $k => $v) {
		if ($v == 'seguridad_social_empleador') {
			$data[$key]['para_datos'] = json_decode($data[$key]['para_datos'],true);
			$sce = $data[$key]['para_datos'];
		}

		if ($v == 'parafiscales') {
			$data[$key]['para_datos'] = json_decode($data[$key]['para_datos'],true);
			$pe = $data[$key]['para_datos'];
		}

		if ($v == 'seguridad_social_trabajador') {
			$data[$key]['para_datos'] = json_decode($data[$key]['para_datos'],true);
			$sst = $data[$key]['para_datos'];
		}

		if ($v == 'apropiaciones') {
			$data[$key]['para_datos'] = json_decode($data[$key]['para_datos'],true);
			$apro = $data[$key]['para_datos'];
		}

		if ($v == 'valores_vigentes') {
			$data[$key]['para_datos'] = json_decode($data[$key]['para_datos'],true);
			$vv = $data[$key]['para_datos'];
		}
	}
	
}

echo '';
?>

<div class="right_col" role="main">
<?php //echo var_dump($pe); echo var_dump($sce);
			//echo json_encode($data); ?>
	<div class="row">
	  <div class="col-md-12 col-sm-4 col-xs-12">
	    <div class="x_panel">
	      <div class="x_title">
	        <h2>Parámetros de Nómina <small>Sessions</small></h2>
         <div class="clearfix"></div>
	      </div>
	      <div class="x_content">

	      	<div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
              <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Home</a>
              </li>
              <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Conceptos</a>
              </li>
              <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Normatividad</a>
              </li>
              <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Opciones Avanzadas</a>
              </li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
                  synth. Cosby sweater eu banh mi, qui irure terr.</p>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
              	
              	<div class="row">
              		<div class="col-md-4 col-sm-4 col-xs-12">
		                <div class="x_panel">
		                <!--
		                  <div class="x_title">
		                    <h2><i class="fa fa-bars"></i> Tabs <small>Float left</small></h2>
		                    <div class="clearfix"></div>
		                  </div>
		                -->
		                  <div class="x_content">
		                  <form>
		                  	<div class="row">
		                  		<div class="form-group col-md-12 col-sm-12 col-xs-12">
						                <label class="control-label" for="identificacion">Número identificación </label>
						                <input type="text" id="identificacion" required="required" class="form-control" <?php echo 'value="'.( isset($data['empl_identificacion'])? $data['empl_identificacion'] : '').'"'; ?> placeholder="IDENTIFICACIÓN">
						              </div>
						              <div class="form-group col-md-12 col-sm-12 col-xs-12">
						                <label class="control-label" for="identificacion">Número identificación </label>
						                <input type="text" id="identificacion" required="required" class="form-control" <?php echo 'value="'.( isset($data['empl_identificacion'])? $data['empl_identificacion'] : '').'"'; ?> placeholder="IDENTIFICACIÓN">
						              </div>
		                  	</div>	
		                  </form>



		                  </div>
		                </div>
		              </div>
		              <div class="col-md-8 col-sm-8 col-xs-12">
		                <div class="x_panel">
		                  <div class="x_title">
		                    <h2><i class="fa fa-bars"></i> Tabs <small>Float left</small></h2>
		                    <div class="clearfix"></div>
		                  </div>
		                  <div class="x_content">




		                  </div>
		                </div>
		              </div>
              	</div>

              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                
              	<div class="row">
              		<div class="col-md-3 col-sm-3 col-xs-12">
		                <div class="x_panel">
		                  <div class="x_title">
		                    <h2><i class="fa fa-bars"></i> Aportes Seguridad Social <small>Empleador</small></h2>
		                    <div class="clearfix"></div>
		                  </div>
		                  <div class="x_content">
		                  <form id="normatividad_1">
			                 	<div class="form-group">
			                  	<label class="control-label" for="saludempleador">Aporte a la Salud %</label>	
			                  	<div class="input-group">

	                         <input type="text" id="saludempleador" name="saludempleador" required="required" class="form-control" <?php echo 'value="'.( isset($sce['saludempleador'])? $sce['saludempleador'] : '0.00').'"'; ?> placeholder="0,00%">
	                         <span class="input-group-btn"><button type="button" onclick="guardar('seguridad_social_empleador', $('#saludempleador').val(),'saludempleador')" class="btn btn-primary btnguardar"><i class="fa fa-save"></i> Guardar</button></span>
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label class="control-label" for="pensionempleador">Aporte a la Pensión </label>
			                  	<div class="input-group">
	                         <input type="text" id="pensionempleador" name="pensionempleador" required="required" class="form-control" <?php echo 'value="'.( isset($sce['pensionempleador'])? $sce['pensionempleador'] : '0.00').'"'; ?> placeholder="0,00%">
	                         <span class="input-group-btn"><button type="button" onclick="guardar('seguridad_social_empleador', $('#pensionempleador').val(),'pensionempleador')" class="btn btn-primary btnguardar"><i class="fa fa-save"></i> Guardar</button></span>
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label class="control-label" for="riesgosempleador">Aporte a Riesgos </label>
			                  	<div class="input-group">
	                         <input type="text"  id="riesgosempleador" name="riesgosempleador" required="required" class="form-control" <?php echo 'value="'.( isset($sce['riesgosempleador'])? $sce['riesgosempleador'] : '0.00').'"'; ?> placeholder="0,00%">
	                         <span class="input-group-btn"><button type="button" onclick="guardar('seguridad_social_empleador', $('#riesgosempleador').val(),'riesgosempleador')" class="btn btn-primary btnguardar"><i class="fa fa-save"></i> Guardar</button></span>
	                        </div>
	                      </div>
		                  </form>



		                  </div>
		                </div>
		              </div>
		              <div class="col-md-3 col-sm-3 col-xs-12">
		                <div class="x_panel">
		                  <div class="x_title">
		                    <h2><i class="fa fa-bars"></i> Aportes Parafiscales <small>Empleador</small></h2>
		                    <div class="clearfix"></div>
		                  </div>
		                  <div class="x_content">
			                  <form id="normatividad_2">
				                  <div class="form-group">
				                  	<label class="control-label" for="senaempleador">Aporte al SENA </label>	
				                  	<div class="input-group">
		                         <input type="text" id="senaempleador" name="senaempleador" required="required" class="form-control" <?php echo 'value="'.( isset($pe['senaempleador'])? $pe['senaempleador'] : '0').'"'; ?> placeholder="0%">
		                         <span class="input-group-btn"><button type="button" onclick="guardar('parafiscales', $('#senaempleador').val(),'senaempleador')" class="btn btn-primary btnguardar"><i class="fa fa-save"></i> Guardar</button></span>
		                        </div>
		                      </div>
		                      <div class="form-group">
		                        <label class="control-label" for="icbfempleador">Aporte al ICBF </label>
				                  	<div class="input-group">
		                         <input type="text" id="icbfempleador" name="icbfempleador" required="required" class="form-control" <?php echo 'value="'.( isset($pe['icbfempleador'])? $pe['icbfempleador'] : '0').'"'; ?> placeholder="0%">
		                         <span class="input-group-btn"><button type="button" onclick="guardar('parafiscales', $('#icbfempleador').val(),'icbfempleador')" class="btn btn-primary btnguardar"><i class="fa fa-save"></i> Guardar</button></span>
		                        </div>
		                      </div>
		                      <div class="form-group">
		                        <label class="control-label" for="cajaempleador">Aporte a la CAJA  </label>
				                  	<div class="input-group">
		                         <input type="text" id="cajaempleador" name="cajaempleador" required="required" class="form-control" <?php echo 'value="'.( isset($pe['cajaempleador'])? $pe['cajaempleador'] : '0').'"'; ?> placeholder="0%">
		                         <span class="input-group-btn"><button type="button" onclick="guardar('parafiscales', $('#cajaempleador').val(),'cajaempleador')" class="btn btn-primary btnguardar"><i class="fa fa-save"></i> Guardar</button></span>
		                        </div>
		                      </div>
			                  </form>



		                  </div>
		                </div>
		              </div>
		              <div class="col-md-3 col-sm-3 col-xs-12">
		                <div class="x_panel">
		                  <div class="x_title">
		                    <h2><i class="fa fa-bars"></i> Aportes Seguridad Social <small>Trabajador</small></h2>
		                    <div class="clearfix"></div>
		                  </div>
		                  <div class="x_content">
		                  	<form id="normatividad_3">
			                  	<div class="form-group">
			                  		<label class="control-label" for="saludtrabajador">Aporte a la Salud %  </label>
				                  	<div class="input-group">
		                         <input type="text" id="saludtrabajador" name="saludtrabajador" required="required" class="form-control" <?php echo 'value="'.( isset($sst['saludtrabajador'])? $sst['saludtrabajador'] : '0').'"'; ?> placeholder="0%">
		                         <span class="input-group-btn"><button type="button" onclick="guardar('seguridad_social_trabajador', $('#saludtrabajador').val(),'saludtrabajador')" class="btn btn-primary btnguardar"><i class="fa fa-save"></i> Guardar</button></span>
		                        </div>
		                      </div>
		                      <div class="form-group">
		                        <label class="control-label" for="pensiontrabajador">Aporte a la Pension %  </label>
				                  	<div class="input-group">
		                         <input type="text"  id="pensiontrabajador" name="pensiontrabajador" required="required" class="form-control" <?php echo 'value="'.( isset($sst['pensiontrabajador'])? $sst['pensiontrabajador'] : '0').'"'; ?> placeholder="0%">
		                         <span class="input-group-btn"><button type="button" onclick="guardar('seguridad_social_trabajador', $('#pensiontrabajador').val(),'pensiontrabajador')" class="btn btn-primary btnguardar"><i class="fa fa-save"></i> Guardar</button></span>
		                        </div>
		                      </div>
		                      <div class="form-group">
		                        <label class="control-label" for="fsptrabajador">Aporte al fondo solidaridad pensional %  </label>
				                  	<div class="input-group">
		                         <input type="text"  id="fsptrabajador" name="fsptrabajador" required="required" class="form-control" <?php echo 'value="'.( isset($sst['fsptrabajador'])? $sst['fsptrabajador'] : '0').'"'; ?> placeholder="0%">
		                         <span class="input-group-btn"><button type="button" onclick="guardar('seguridad_social_trabajador', $('#fsptrabajador').val(),'fsptrabajador')" class="btn btn-primary btnguardar"><i class="fa fa-save"></i> Guardar</button></span>
		                        </div>
		                      </div>
			                  </form>



		                  </div>
		                </div>
		              </div>
		              <div class="col-md-3 col-sm-3 col-xs-12">
		                <div class="x_panel">
		                  <div class="x_title">
		                    <h2><i class="fa fa-bars"></i> Apropiaciones <small></small></h2>
		                    <div class="clearfix"></div>
		                  </div>
		                  <div class="x_content">
		                  	<form id="normatividad_4">
			                  	<div class="form-group">
				                  	<label class="control-label" for="cesantias">Cesantías %  </label>
				                  	<div class="input-group">
		                         <input type="text" id="cesantias" name="cesantias" required="required" class="form-control" <?php echo 'value="'.( isset($apro['cesantias'])? $apro['cesantias'] : '0').'"'; ?> placeholder="0%">
		                         <span class="input-group-btn"><button type="button" onclick="guardar('apropiaciones', $('#cesantias').val(),'cesantias')" class="btn btn-primary btnguardar"><i class="fa fa-save"></i> Guardar</button></span>
		                        </div>
		                      </div>
		                      <div class="form-group">
		                        <label class="control-label" for="interescesantias">Interés a Cesantías %  </label>
				                  	<div class="input-group">
		                         <input type="text" id="interescesantias" name="interescesantias" required="required" class="form-control" <?php echo 'value="'.( isset($apro['interescesantias'])? $apro['interescesantias'] : '0').'"'; ?> placeholder="0%">
		                         <span class="input-group-btn"><button type="button" onclick="guardar('apropiaciones', $('#interescesantias').val(),'interescesantias')" class="btn btn-primary btnguardar"><i class="fa fa-save"></i> Guardar</button></span>
		                        </div>
		                      </div>
		                      <div class="form-group">
		                        <label class="control-label" for="primabasica">Prima de servicios %  </label>
				                  	<div class="input-group">
		                         <input type="text" id="primabasica" name="primabasica" required="required" class="form-control" <?php echo 'value="'.( isset($apro['primabasica'])? $apro['primabasica'] : '0').'"'; ?> placeholder="0%">
		                         <span class="input-group-btn"><button type="button" onclick="guardar('apropiaciones', $('#primabasica').val(),'primabasica')" class="btn btn-primary btnguardar"><i class="fa fa-save"></i> Guardar</button></span>
		                        </div>
		                      </div>
		                      <div class="form-group">
		                        <label class="control-label" for="vacaciones">Vacaciones %  </label>
				                  	<div class="input-group">
		                         <input type="text" id="vacaciones" name="vacaciones" required="required" class="form-control" <?php echo 'value="'.( isset($apro['vacaciones'])? $apro['vacaciones'] : '0').'"'; ?> placeholder="0%">
		                         <span class="input-group-btn"><button type="button" onclick="guardar('apropiaciones', $('#vacaciones').val(),'vacaciones')" class="btn btn-primary btnguardar"><i class="fa fa-save"></i> Guardar</button></span>
		                        </div>
		                      </div>
			                  </form>



		                  </div>
		                </div>
		              </div>
              	</div>

              	<div class="row">
              		<div class="col-md-3 col-sm-3 col-xs-12">
		                <div class="x_panel">
		                  <div class="x_title">
		                    <h2><i class="fa fa-bars"></i> Valores vigentes <small></small></h2>
		                    <div class="clearfix"></div>
		                  </div>
		                  <div class="x_content">
		                  	<form id="normatividad_5">
			                  	<div class="form-group">
				                  	<label class="control-label" for="salariominimo">Salario mímino legal vigente  </label>
				                  	<div class="input-group">
		                         <input type="text" id="salariominimo" name="salariominimo" required="required" class="form-control" <?php echo 'value="'.( isset($vv['salariominimo'])? $vv['salariominimo'] : '0').'"'; ?> placeholder="0%">
		                         <span class="input-group-btn"><button type="button" onclick="guardar('valores_vigentes', $('#salariominimo').val(),'salariominimo')" class="btn btn-primary btnguardar"><i class="fa fa-save"></i> Guardar</button></span>
		                        </div>
		                      </div>
		                      <div class="form-group">
		                        <label class="control-label" for="auxiliotransporte">Auxilio de transporte  </label>
				                  	<div class="input-group">
		                         <input type="text" id="auxiliotransporte" name="auxiliotransporte" required="required" class="form-control" <?php echo 'value="'.( isset($vv['auxiliotransporte'])? $vv['auxiliotransporte'] : '0').'"'; ?> placeholder="0%">
		                         <span class="input-group-btn"><button type="button" onclick="guardar('valores_vigentes', $('#auxiliotransporte').val(),'auxiliotransporte')" class="btn btn-primary btnguardar"><i class="fa fa-save"></i> Guardar</button></span>
		                        </div>
	                        </div>
			                  </form>



		                  </div>
		                </div>
		              </div>



              	</div>

              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                  booth letterpress, commodo enim craft beer mlkshk </p>
              </div>
            </div>
          </div>






	      </div>
	    </div>
	  </div>
	</div>

</div>



			<!-- footer content -->
        <?php include_once '../pages/footer.php' ?>
      <!-- /footer content -->
    </div>
  </div>


  <!-- Formvalidation -->
  <script src="../plugins/formvalidation/formValidation.min.js"></script>
	<script src="../plugins/formvalidation/framework/bootstrap.min.js"></script>
	<?php echo '<script src="../plugins/formvalidation/validaciones.js?ver='.substr(md5(rand()), 0, 6).'"></script>' ?>
	
  <!-- FastClick -->
  <script src="../plugins/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../plugins/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="../plugins/Chart.js/dist/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="../plugins/gauge.js/dist/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="../plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="../plugins/iCheck/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="../plugins/skycons/skycons.js"></script>
  <!-- Flot -->
  <script src="../plugins/Flot/jquery.flot.js"></script>
  <script src="../plugins/Flot/jquery.flot.pie.js"></script>
  <script src="../plugins/Flot/jquery.flot.time.js"></script>
  <script src="../plugins/Flot/jquery.flot.stack.js"></script>
  <script src="../plugins/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="../plugins/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="../plugins/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="../plugins/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="../plugins/DateJS/build/date.js"></script>
  <!-- JQVMap -->
  <script src="../plugins/jqvmap/dist/jquery.vmap.js"></script>
  <script src="../plugins/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="../plugins/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>

  <!-- bootstrap-daterangepicker -->
  <script src="../plugins/moment/moment.min.js"></script>
  <script src="../plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- bootstrap-wysiwyg -->
  <script src="../plugins/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
  <script src="../plugins/jquery.hotkeys/jquery.hotkeys.js"></script>
  <script src="../plugins/google-code-prettify/src/prettify.js"></script>
  <!-- jQuery Tags Input -->
  <script src="../plugins/jquery.tagsinput/src/jquery.tagsinput.js"></script>
  <!-- Switchery -->
  <script src="../plugins/switchery/dist/switchery.min.js"></script>
  <!-- Select2 -->
  <script src="../plugins/select2/dist/js/select2.full.min.js"></script>
  <!-- Parsley -->
  <script src="../plugins/parsleyjs/dist/parsley.min.js"></script>
  <!-- Autosize -->
  <script src="../plugins/autosize/dist/autosize.min.js"></script>
  <!-- jQuery autocomplete -->
  <script src="../plugins/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
  <!-- starrr -->
  <script src="../plugins/starrr/dist/starrr.js"></script>



  <!-- bootstrap-daterangepicker -->
  <script>
  	document.title = document.title+" Parámetros de nómina.";

  	function guardar(key, val, subkey){
  		if ($.isNumeric(val) && val != '') {
	  		$.ajax({
				  type: 'POST',
				  url: '../data/data.php',
				  data: {data:'parametrosnomina', llave:key, valor:val, subllave:subkey},
				  dataType: 'html',
				  success: function (data) {
				    if (parseInt(data)>0) {
				    	alert('Se ha actualizado el campo '+subkey+'.');
				    }	
				  }
				});
  		}  		
  	}


  	$('#dias').change(function(){
  		recalcular();
  	});

  	$('.btnadd').on('click',function(){
  		var diasliquidar = $('#dias').val();
  		if (diasliquidar > 0 && diasliquidar != '') {
  			recalcular();
  		}
  		
  	});

  	$('.btnclean').on('click',function(){
  			$.ajax({
				  type: 'POST',
				  url: '../data/data.php',
				  data: {data:'limpiarliquidador'},
				  dataType: 'json',
				  success: function (data) {
				    location.reload(true);	
				  }
				});
  	});

  	$('#buscarempleado').change(function(){
  			var oidempleado = $('#buscarempleado').select2().val();
  			$.ajax({
				  type: 'POST',
				  url: '../data/data.php',
				  data: {data:'buscarempleado',oidempleado:oidempleado},
				  dataType: 'json',
				  success: function (data) {
				    location.reload(true);
				  }
				});
  	});





    $(document).ready(function() {

      $('#birthday').daterangepicker({
        singleDatePicker: true,
        calender_style: "picker_4"
      }, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
      });
    });
  </script>
  <!-- /bootstrap-daterangepicker -->

  <!-- bootstrap-wysiwyg -->
  <script>
    $(document).ready(function() {
      function initToolbarBootstrapBindings() {
        var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
            'Times New Roman', 'Verdana'
          ],
          fontTarget = $('[title=Font]').siblings('.dropdown-menu');
        $.each(fonts, function(idx, fontName) {
          fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
        });
        $('a[title]').tooltip({
          container: 'body'
        });
        $('.dropdown-menu input').click(function() {
            return false;
          })
          .change(function() {
            $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
          })
          .keydown('esc', function() {
            this.value = '';
            $(this).change();
          });

        $('[data-role=magic-overlay]').each(function() {
          var overlay = $(this),
            target = $(overlay.data('target'));
          overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
        });

        if ("onwebkitspeechchange" in document.createElement("input")) {
          var editorOffset = $('#editor').offset();

          $('.voiceBtn').css('position', 'absolute').offset({
            top: editorOffset.top,
            left: editorOffset.left + $('#editor').innerWidth() - 35
          });
        } else {
          $('.voiceBtn').hide();
        }
      }

      function showErrorAlert(reason, detail) {
        var msg = '';
        if (reason === 'unsupported-file-type') {
          msg = "Unsupported format " + detail;
        } else {
          console.log("error uploading file", reason, detail);
        }
        $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
          '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
      }

      initToolbarBootstrapBindings();

      $('#editor').wysiwyg({
        fileUploadError: showErrorAlert
      });

      window.prettyPrint;
      prettyPrint();
    });
  </script>
  <!-- /bootstrap-wysiwyg -->

  <!-- Select2 -->
  <script>
    $(document).ready(function() {
      $(".concepto").select2({
        placeholder: "SELECCIONE EL CONCEPTO",
        allowClear: true
      });

      $(".buscarempleado").select2({
        placeholder: "BUSCAR EMPLEADO",
        allowClear: true
      });

      $(".tipocargo").select2({
        placeholder: "SELECCIONE EL GRUPO",
        allowClear: true
      });

      $(".select2_group").select2({});
      $(".select2_multiple").select2({
        maximumSelectionLength: 4,
        placeholder: "With Max Selection limit 4",
        allowClear: true
      });
    });
  </script>
  <!-- /Select2 -->

  <!-- jQuery Tags Input -->
  <script>
    function onAddTag(tag) {
      alert("Added a tag: " + tag);
    }

    function onRemoveTag(tag) {
      alert("Removed a tag: " + tag);
    }

    function onChangeTag(input, tag) {
      alert("Changed a tag: " + tag);
    }

    $(document).ready(function() {
      $('#tags_1').tagsInput({
        width: 'auto'
      });
    });
  </script>
  <!-- /jQuery Tags Input -->

  <!-- Parsley -->
  <script>
    $(document).ready(function() {
      $.listen('parsley:field:validate', function() {
        validateFront();
      });
      $('#demo-form .btn').on('click', function() {
        $('#demo-form').parsley().validate();
        validateFront();
      });
      var validateFront = function() {
        if (true === $('#demo-form').parsley().isValid()) {
          $('.bs-callout-info').removeClass('hidden');
          $('.bs-callout-warning').addClass('hidden');
        } else {
          $('.bs-callout-info').addClass('hidden');
          $('.bs-callout-warning').removeClass('hidden');
        }
      };
    });

    $(document).ready(function() {
      $.listen('parsley:field:validate', function() {
        validateFront();
      });
      $('#demo-form2 .btn').on('click', function() {
        $('#demo-form2').parsley().validate();
        validateFront();
      });
      var validateFront = function() {
        if (true === $('#demo-form2').parsley().isValid()) {
          $('.bs-callout-info').removeClass('hidden');
          $('.bs-callout-warning').addClass('hidden');
        } else {
          $('.bs-callout-info').addClass('hidden');
          $('.bs-callout-warning').removeClass('hidden');
        }
      };
    });
    try {
      hljs.initHighlightingOnLoad();
    } catch (err) {}
  </script>
  <!-- /Parsley -->

  <!-- Autosize -->
  <script>
    $(document).ready(function() {
      autosize($('.resizable_textarea'));
    });
  </script>
  <!-- /Autosize -->

  <!-- jQuery autocomplete -->
  <script>
    $(document).ready(function() {
      var countries = { AD:"Andorra",A2:"Andorra Test",AE:"United Arab Emirates",AF:"Afghanistan",AG:"Antigua and Barbuda",AI:"Anguilla",AL:"Albania",AM:"Armenia",AN:"Netherlands Antilles",AO:"Angola",AQ:"Antarctica",AR:"Argentina",AS:"American Samoa",AT:"Austria",AU:"Australia",AW:"Aruba",AX:"Åland Islands",AZ:"Azerbaijan",BA:"Bosnia and Herzegovina",BB:"Barbados",BD:"Bangladesh",BE:"Belgium",BF:"Burkina Faso",BG:"Bulgaria",BH:"Bahrain",BI:"Burundi",BJ:"Benin",BL:"Saint Barthélemy",BM:"Bermuda",BN:"Brunei",BO:"Bolivia",BQ:"British Antarctic Territory",BR:"Brazil",BS:"Bahamas",BT:"Bhutan",BV:"Bouvet Island",BW:"Botswana",BY:"Belarus",BZ:"Belize",CA:"Canada",CC:"Cocos [Keeling] Islands",CD:"Congo - Kinshasa",CF:"Central African Republic",CG:"Congo - Brazzaville",CH:"Switzerland",CI:"Côte d’Ivoire",CK:"Cook Islands",CL:"Chile",CM:"Cameroon",CN:"China",CO:"Colombia",CR:"Costa Rica",CS:"Serbia and Montenegro",CT:"Canton and Enderbury Islands",CU:"Cuba",CV:"Cape Verde",CX:"Christmas Island",CY:"Cyprus",CZ:"Czech Republic",DD:"East Germany",DE:"Germany",DJ:"Djibouti",DK:"Denmark",DM:"Dominica",DO:"Dominican Republic",DZ:"Algeria",EC:"Ecuador",EE:"Estonia",EG:"Egypt",EH:"Western Sahara",ER:"Eritrea",ES:"Spain",ET:"Ethiopia",FI:"Finland",FJ:"Fiji",FK:"Falkland Islands",FM:"Micronesia",FO:"Faroe Islands",FQ:"French Southern and Antarctic Territories",FR:"France",FX:"Metropolitan France",GA:"Gabon",GB:"United Kingdom",GD:"Grenada",GE:"Georgia",GF:"French Guiana",GG:"Guernsey",GH:"Ghana",GI:"Gibraltar",GL:"Greenland",GM:"Gambia",GN:"Guinea",GP:"Guadeloupe",GQ:"Equatorial Guinea",GR:"Greece",GS:"South Georgia and the South Sandwich Islands",GT:"Guatemala",GU:"Guam",GW:"Guinea-Bissau",GY:"Guyana",HK:"Hong Kong SAR China",HM:"Heard Island and McDonald Islands",HN:"Honduras",HR:"Croatia",HT:"Haiti",HU:"Hungary",ID:"Indonesia",IE:"Ireland",IL:"Israel",IM:"Isle of Man",IN:"India",IO:"British Indian Ocean Territory",IQ:"Iraq",IR:"Iran",IS:"Iceland",IT:"Italy",JE:"Jersey",JM:"Jamaica",JO:"Jordan",JP:"Japan",JT:"Johnston Island",KE:"Kenya",KG:"Kyrgyzstan",KH:"Cambodia",KI:"Kiribati",KM:"Comoros",KN:"Saint Kitts and Nevis",KP:"North Korea",KR:"South Korea",KW:"Kuwait",KY:"Cayman Islands",KZ:"Kazakhstan",LA:"Laos",LB:"Lebanon",LC:"Saint Lucia",LI:"Liechtenstein",LK:"Sri Lanka",LR:"Liberia",LS:"Lesotho",LT:"Lithuania",LU:"Luxembourg",LV:"Latvia",LY:"Libya",MA:"Morocco",MC:"Monaco",MD:"Moldova",ME:"Montenegro",MF:"Saint Martin",MG:"Madagascar",MH:"Marshall Islands",MI:"Midway Islands",MK:"Macedonia",ML:"Mali",MM:"Myanmar [Burma]",MN:"Mongolia",MO:"Macau SAR China",MP:"Northern Mariana Islands",MQ:"Martinique",MR:"Mauritania",MS:"Montserrat",MT:"Malta",MU:"Mauritius",MV:"Maldives",MW:"Malawi",MX:"Mexico",MY:"Malaysia",MZ:"Mozambique",NA:"Namibia",NC:"New Caledonia",NE:"Niger",NF:"Norfolk Island",NG:"Nigeria",NI:"Nicaragua",NL:"Netherlands",NO:"Norway",NP:"Nepal",NQ:"Dronning Maud Land",NR:"Nauru",NT:"Neutral Zone",NU:"Niue",NZ:"New Zealand",OM:"Oman",PA:"Panama",PC:"Pacific Islands Trust Territory",PE:"Peru",PF:"French Polynesia",PG:"Papua New Guinea",PH:"Philippines",PK:"Pakistan",PL:"Poland",PM:"Saint Pierre and Miquelon",PN:"Pitcairn Islands",PR:"Puerto Rico",PS:"Palestinian Territories",PT:"Portugal",PU:"U.S. Miscellaneous Pacific Islands",PW:"Palau",PY:"Paraguay",PZ:"Panama Canal Zone",QA:"Qatar",RE:"Réunion",RO:"Romania",RS:"Serbia",RU:"Russia",RW:"Rwanda",SA:"Saudi Arabia",SB:"Solomon Islands",SC:"Seychelles",SD:"Sudan",SE:"Sweden",SG:"Singapore",SH:"Saint Helena",SI:"Slovenia",SJ:"Svalbard and Jan Mayen",SK:"Slovakia",SL:"Sierra Leone",SM:"San Marino",SN:"Senegal",SO:"Somalia",SR:"Suriname",ST:"São Tomé and Príncipe",SU:"Union of Soviet Socialist Republics",SV:"El Salvador",SY:"Syria",SZ:"Swaziland",TC:"Turks and Caicos Islands",TD:"Chad",TF:"French Southern Territories",TG:"Togo",TH:"Thailand",TJ:"Tajikistan",TK:"Tokelau",TL:"Timor-Leste",TM:"Turkmenistan",TN:"Tunisia",TO:"Tonga",TR:"Turkey",TT:"Trinidad and Tobago",TV:"Tuvalu",TW:"Taiwan",TZ:"Tanzania",UA:"Ukraine",UG:"Uganda",UM:"U.S. Minor Outlying Islands",US:"United States",UY:"Uruguay",UZ:"Uzbekistan",VA:"Vatican City",VC:"Saint Vincent and the Grenadines",VD:"North Vietnam",VE:"Venezuela",VG:"British Virgin Islands",VI:"U.S. Virgin Islands",VN:"Vietnam",VU:"Vanuatu",WF:"Wallis and Futuna",WK:"Wake Island",WS:"Samoa",YD:"People's Democratic Republic of Yemen",YE:"Yemen",YT:"Mayotte",ZA:"South Africa",ZM:"Zambia",ZW:"Zimbabwe",ZZ:"Unknown or Invalid Region" };

      var countriesArray = $.map(countries, function(value, key) {
        return {
          value: value,
          data: key
        };
      });

      // initialize autocomplete with custom appendTo
      $('#autocomplete-custom-append').autocomplete({
        lookup: countriesArray
      });
    });
  </script>
  <!-- /jQuery autocomplete -->

  <!-- Starrr -->
  <script>

    $(document).ready(function() {


      $(".stars").starrr();

      $('.stars-existing').starrr({
        rating: 4
      });

      $('.stars').on('starrr:change', function (e, value) {
        $('.stars-count').html(value);
      });

      $('.stars-existing').on('starrr:change', function (e, value) {
        $('.stars-count-existing').html(value);
      });
    });
  </script>
  <!-- /Starrr -->
  
  <?php 
}else{
  $html_negate =  '<div style="padding: 100px 0px 50px 0px;" class="right_col" role="main">';
  $html_negate .= '<center><h1><i class="fa fa-warning"></i>Usted no tiene permisos para ver esta sessión!</h1></center></div>';
  echo $html_negate;
}
}

?>