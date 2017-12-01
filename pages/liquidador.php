<?php  
if (session_status() != PHP_SESSION_NONE) {
if (isset($pu['generar_liquidacion'])) {


	if (isset($_SESSION['strjson'])) {
		if (!is_null($_SESSION['strjson'])) {
			$data = json_decode($_SESSION['strjson'],true);
		}
		
	}else{
		$data = null;
	}



?>
<div class="right_col" role="main">
<?php //echo var_dump($data); 
			//echo json_encode($data); ?>
	<div class="row">
	  <div class="col-md-12 col-sm-4 col-xs-12">
	    <div class="x_panel">
	      <div class="x_title">
	        <h2>Liquidador de Nómina <small>Sessions</small></h2>
	        					<ul class="nav navbar-right">
                      <div class="form-group">
				                <select class="buscarempleado form-control" id="buscarempleado" name="buscarempleado" required="required" tabindex="-1" >
					                <?php 
					                	echo '<option></option>';

					                	$le = $misc->listarEmpleados();
					                	while ($row = $le->fetch(PDO::FETCH_ASSOC)){
			                        extract($row);
			                        echo '<option data-toggle="tooltip" title="'.$row['empl_funciones'].'" value="'.$row['oid'].'">'. strtoupper($row['empl_identificacion'].' - '.$row['empl_nombres'].' '.$row['empl_apellidos']).'</option>';
			                      }

					                 ?>
			                  </select>
				              </div>
                    </ul>
         <div class="clearfix"></div>
	      </div>
	      <div class="x_content">
	      	<div class="row">
	      		<form data-parsley-validate class="form-vertical form-label-left">

	      			<div class="row">
		      			<div class="form-group col-md-3 col-sm-3 col-xs-12">
	                <label class="control-label" for="identificacion">Número identificación </label>
	                <input type="text" id="identificacion" required="required" class="form-control" <?php echo 'value="'.( isset($data['empl_identificacion'])? $data['empl_identificacion'] : '').'"'; ?> placeholder="IDENTIFICACIÓN" readonly>
	              </div>
	              <div class="form-group col-md-6 col-sm-6 col-xs-12">
	                <label class="control-label" for="first-name">Nombre empleado </label>
	                <input type="text" id="first-name" required="required" class="form-control" <?php echo 'value="'.( isset($data['empl_nombres'])? $data['empl_nombres'].' '.$data['empl_apellidos'] : '').'"'; ?> placeholder="NOMBRES Y APELLIDOS" readonly>
	              </div>
	              <div class="form-group col-md-3 col-sm-3 col-xs-12">
	                <label class="control-label" for="first-name">Contrato de trabajo </label>
	                <input type="text" id="first-name" required="required" class="form-control" <?php echo 'value="'.( isset($data['cont_descripcion'])? $data['cont_descripcion'] : '').'"'; ?> placeholder="TIPO DE CONTRATO" readonly>
	              </div>
              </div>

              <div class="row">
		      			<div class="form-group col-md-3 col-sm-3 col-xs-12">
	                <label class="control-label" for="first-name">Grupo </label>
	                <input type="text" id="first-name" required="required" class="form-control" <?php echo 'value="'.( isset($data['grup_descripcion'])? $data['grup_descripcion'] : '').'"'; ?> placeholder="GRUPO " readonly>
	              </div>
	              <div class="form-group col-md-3 col-sm-3 col-xs-12">
	                <label class="control-label" for="first-name">Cargo </label>
	                <input type="text" id="first-name" required="required" class="form-control" <?php echo 'value="'.( isset($data['carg_descripcion'])? $data['carg_descripcion'] : '').'"'; ?> placeholder="CARGO" readonly>
	              </div>
	              <div class="form-group col-md-2 col-sm-2 col-xs-12">
	                <label class="control-label" for="sueldo">Sueldo </label>
	                <input type="text" id="sueldo" required="required" class="form-control text-right" <?php echo 'value="$ '.number_format(  ( isset($data['empl_sueldo'])? $data['empl_sueldo']  : '0') ,2,'.',',').'"'; ?> placeholder="$ 000,000.00 COP"  readonly>
	                
	              </div>
	              <div class="form-group col-md-1 col-sm-1  col-xs-12">
	                <label class="control-label" for="dias">Días laborados </label>
	                <input type="text" id="dias" required="required" class="form-control" <?php echo 'value="'.( isset($data['diaslabo'])? $data['diaslabo']  : '0').'"'; ?> placeholder="# DÍAS">
	              </div>
              </div>

              <div class="row">
              	
		      			<div class="form-group col-md-2 col-sm-2 col-xs-12">
	                <label class="control-label" for="first-name">Auxilio de transporte </label>
	                <input type="text" id="first-name" required="required" class="form-control text-right" <?php echo 'value="$ '.number_format(  ( isset($data['auxtransporte'])? $data['auxtransporte']  : '0') ,2,'.',',').'"'; ?> placeholder="$ 000,000.00" readonly>
	              </div>
	              <div class="form-group col-md-2 col-sm-2 col-xs-12">
	                <label class="control-label" for="first-name">Básico </label>
	                <input type="text" id="first-name" required="required" class="form-control text-right" <?php echo 'value="$ '.number_format(  ( isset($data['basico'])? $data['basico']  : '0') ,2,'.',',').'"'; ?> placeholder="$ 000,000.00" readonly>
	              </div>

              </div>

              <div class="row">
		      			<div class="form-group col-md-2 col-sm-2 col-xs-12">
	                <label class="control-label" for="salud">Salud </label>
	                <input type="text" id="salud" required="required" class="form-control text-right" <?php echo 'value="$ '.number_format(  ( isset($data['salud'])? $data['salud']  : '0') ,2,'.',',').'"'; ?> placeholder="$ 0.00" readonly>
	              </div>
	              <div class="form-group col-md-2 col-sm-2 col-xs-12">
	                <label class="control-label" for="pension">Pensión </label>
	                <input type="text" id="pension" required="required" class="form-control text-right" <?php echo 'value="$ '.number_format(  ( isset($data['pension'])? $data['pension']  : '0') ,2,'.',',').'"'; ?> placeholder="$ 0.00" readonly>
	              </div>
	              <div class="form-group col-md-2 col-sm-2 col-xs-12">
	                <label class="control-label" for="fsp">FSP </label>
	                <a title="Fondo de solidaridad pensional: (Ley 100 de 1993, Art. 25), aplicar 1,0% a sueldos >= 4 SMLV"> <i class="fa fa-info-circle blue"></i></a>
	                <input type="text" id="fsp" required="required" class="form-control text-right" <?php echo 'value="$ '.number_format(  ( isset($data['fsp'])? $data['fsp']  : '0') ,2,'.',',').'"'; ?> placeholder="$ 0.00" readonly>
	              </div>	              
              </div>

              <div class="ln_solid"></div>

              <div class="row">
              	<div class="form-group col-md-4 col-sm-4 col-xs-12">
	                <select class="concepto form-control" id="concepto" name="concepto" required="required" tabindex="-1">
		                <?php 
		                	echo '<option></option>';

		                	$lc = $misc->listarConceptos();
		                	while ($row = $lc->fetch(PDO::FETCH_ASSOC)){
                        extract($row);
                        echo '<option data-toggle="tooltip" title="'.$row['conc_observacion'].'" value="'.$row['oid'].'">'. strtoupper($row['conc_codigo'].' - '.$row['conc_descripcion']).'</option>';
                      }

		                 ?>
                  </select>
	              </div>
	              <div class="form-group col-md-2 col-sm-2 col-xs-12">
	                <input type="number" id="unidad" name="unidad" required="required" class="form-control" placeholder="UNIDAD">
	              </div>
	              <div class="form-group col-md-3 col-sm-3 col-xs-12">
	                <input type="text" id="observacion" name="observacion" required="required" class="form-control" placeholder="OBSERVACIONES">
	              </div>
	              <div class="form-group col-md-3 col-sm-3 col-xs-12">
	                <button type="button" class="btn btn-primary pull-right btnadd"><i class="fa fa-plus"></i> Añadir</button>
	              </div>
              </div>

              <div class="row">
              	<div class="col-md-12 col-sm-12 col-xs-12">
		              <div class="table-responsive">
		                <table id="tablaliquidacion" class="table table-striped jambo_table bulk_action">
		                  <thead>
		                    <tr class="headings">
		                      <th>
		                        <input type="checkbox" id="check-all" class="flat">
		                      </th>
		                      <th class="column-title">Concepto </th>
		                      <th class="column-title">Unidad </th>
		                      <th class="column-title text-right">Devengado </th>
		                      <th class="column-title text-right">Deducciones </th>
		                      <th class="column-title no-link last"><span class="nobr">Action</span></th>
		                      <th class="bulk-actions" colspan="7">
		                        <ul class="nav navbar-left panel_toolbox">
				                      <li class="dropdown">
				                        <a style="color:#1ABC9C; font-weight:500;" class="antoo" data-toggle="dropdown" role="button" aria-expanded="false"><b>Acciones ( <span class="action-cnt"> </span> )</b> <i class="fa fa-chevron-down"></i></a>
				                        <ul class="dropdown-menu" role="menu">
				                          <li><a onclick="removeritem()">Remover</a>
				                          </li>
				                      <!--  <li><a href="#">Settings 2</a>
				                          </li> -->
				                        </ul>
				                      </li>
				                    </ul>
		                      </th>
		                    </tr>
		                  </thead>

		                  <tbody id="tbody">
			                  <?php 
			                  	if (isset($data['conceptos'])) {
			                  		$i = 0;
					                	foreach($data['conceptos'] as $object1) {
					                		echo '<tr id="'.$i.'" class="even pointer">';
					                		echo '<td class="a-center ">
							                        <input type="checkbox" class="flat" name="table_records">
							                      </td>';
					                		echo '<td class=" ">'.$object1['descripcion'].'</td>';
					                		echo '<td class=" ">'.$object1['unidad'].'</td>';
					                		echo '<td class=" text-right ">$ '.number_format( (isset($object1['devengado'])? $object1['devengado'] : '0') ,2,'.',',').'</td>';
					                		echo '<td class=" text-right ">$ '.number_format( (isset($object1['deducciones'])? $object1['deducciones'] : '0') ,2,'.',',').'</td>';
					                		echo '<td class=" last"><a href="#">View</a></td>';
														  echo '</tr>';

														  $i++;
														}
													}
				                ?>
		                  </tbody>

		                  <tfoot>
		                  	<tr class="headings">
		                  		<th class="column-title"></th>
		                  		<th class="column-title"></th>
		                      <th class="column-title text-right">Subtotal: </th>
		                      <th class="column-title text-right"><?php echo '$ '.number_format( (isset($data['devengado'])? $data['devengado'] : '0') ,2,'.',',');  ?></th>
		                      <th class="column-title text-right"><?php echo '$ '.number_format( (isset($data['deduccion'])? $data['deduccion'] : '0') ,2,'.',',');  ?></th>
		                      <th class="column-title"></th>
		                  	</tr>
		                  </tfoot>
		                </table>
		              </div>
	              </div>
              </div>

              <div class="row">
		      			<div class="form-group col-md-2 col-sm-2 col-xs-12 col-md-offset-5">
	                <label class="control-label" for="salud">Total Devengado </label>
	                <input type="text" id="salud" required="required" class="form-control text-right" <?php echo 'value="$ '.number_format(  ( isset($data['totaldevengado'])? $data['totaldevengado']  : '0') ,2,'.',',').'"'; ?> placeholder="$ 0.00">
	              </div>
	              <div class="form-group col-md-2 col-sm-2 col-xs-12">
	                <label class="control-label" for="pension">Total Deducciones </label>
	                <input type="text" id="pension" required="required" class="form-control text-right" <?php echo 'value="$ '.number_format(  ( isset($data['totaldeducciones'])? $data['totaldeducciones']  : '0') ,2,'.',',').'"'; ?> placeholder="$ 0.00">
	              </div>
	              <div class="form-group col-md-2 col-sm-2 col-xs-12 col-md-offset-1">
	                <label class="control-label" for="pension">NETO A PAGAR </label>
	                <input type="text" id="pension" required="required" class="form-control text-right" <?php echo 'value="$ '.number_format(  ( isset($data['netoapagar'])? $data['netoapagar']  : '0') ,2,'.',',').'"'; ?> placeholder="$ 0.00">
	              </div>
              </div>
              <div class="row">
              	<div class="form-group col-md-12 col-sm-12 col-xs-12">
	                <button type="button" class="btn btn-default pull-right btnclean"><i class="fa fa-eraser"></i> Limpiar</button>
	              </div>
              </div>
	      		</form>
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
  	document.title = document.title+" Liquidador de nómina.";

  	function removeritem(){
  		var item = [];

	  	$('#tablaliquidacion > tbody  > tr').each(function() {
	  		if ($(this).find('[name="table_records"]').is(':checked')) {
	  			item.push($(this).attr('id'));
	  		}

	  	});

	  	$.ajax({
			  type: 'POST',
			  url: '../data/data.php',
			  data: {removerconcepto: item, data:'removerconcepto'},
			  dataType: 'json',
			  success: function (data) {
			    location.reload(true);	
			  }
			});

  	}

	  function recalcular(){
	  		var diasliquidar = $('#dias').val();
	  		//var auxtrans = 77700;
	  		var concepto = $('#concepto').val();
	  		var unidad = $('#unidad').val();
	  		var observacion = $('#observacion').val();
	  		$.ajax({
				  type: 'POST',
				  url: '../data/data.php',
				  data: {dias: diasliquidar, concepto:concepto, unidad:unidad, observacion:observacion, data:'liquidador'},
				  dataType: 'json',
				  success: function (data) {
				    location.reload(true);	
				  }
				});
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
