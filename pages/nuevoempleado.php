<?php 

if (session_status() != PHP_SESSION_NONE) {
if (isset($pu['agregar_editar_empleado'])) {
  
$arrCategoria = $misc->listarCategorias()->fetchAll(PDO::FETCH_ASSOC); // json_decode para Objetos se denife True, para Arreglos simples False.
$arrConceptos = $misc->listarCompuestos()->fetchAll(PDO::FETCH_ASSOC);

$verIdenti = json_encode($misc->listarEmpleados()->fetchAll(PDO::FETCH_ASSOC),true);

$tpi = $misc->listartipoid()->fetchAll(PDO::FETCH_ASSOC);

$cargos = $misc->listarcargos()->fetchAll(PDO::FETCH_ASSOC);

$vincu = $misc->listarcontratos()->fetchAll(PDO::FETCH_ASSOC);

$_dc = $misc->consultaDesplegables('ciudades')->fetch(PDO::FETCH_ASSOC);
$listadc = json_decode(base64_decode($_dc['des_data']),true);


if (isset($_GET['query'])) {
  $query = base64_decode($_GET['query']);  
}else{
  $query = false;
}

?>
	<div class="right_col" role="main">


    <div class="row">
      <div class="col-md-12 col-sm-4 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Crear empleado <small>Nuevo</small><code>NOTA: está pendiente la codificación de la carga de foto.</code></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form id="formempleado" data-parsley-validate class="form-vertical form-label-left">
              <h4>Información Inicial</h4>
              <div class="ln_solid"></div>

              <div class="row">
                <div class="col-md-10 col-sm-10 col-xs-12">
                  <div class="row">
                    <div class="form-group col-md-3 col-sm-3 col-xs-12">
                      <label class="control-label" for="empl_identificacion">Num. Identificación </label>
                      <input type="text" id="empl_identificacion" name="empl_identificacion" required="required" class="form-control" placeholder="NIT/CC/NUIP" title="Número identificación">
                    </div>
                    <div class="form-group col-md-3 col-sm-3 col-xs-12">
                      <label class="control-label" for="empl_tipoidentificacion_oid">Tipo identificación </label>
                      <select class="form-control" id="empl_tipoidentificacion_oid" name="empl_tipoidentificacion_oid" required="required" data-placeholder="SELECCIONE" style="width: 100%" title="Tipo identificación">
                        <option></option>
                        <?php  
                          
                          foreach ($tpi as $value) {
                            echo '<option value="'.$value['oid'].'">'.$value['tpid_descripcion'].' - '.$value['tpid_observacion'].'</option>';
                          }
                          
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-5 col-sm-5 col-xs-12">
                      <label class="control-label" for="empl_nombres">Nombres </label>
                      <input type="text" id="empl_nombres" name="empl_nombres" required="required" class="form-control" placeholder="NOMBRES COMPLETOS" title="Nombres completos">
                    </div>
                    <div class="form-group col-md-5 col-sm-5 col-xs-12">
                      <label class="control-label" for="empl_apellidos">Apellidos </label>
                      <input type="text" id="empl_apellidos" name="empl_apellidos" required="required" class="form-control" placeholder="APELLIDOS COMPLETOS" title="Apellidos completos">
                    </div>                
                  </div>
                </div>

                <div class="col-md-2 col-sm-2 col-xs-12">
                  <div class="profile_img">
                    <div id="crop-avatar">
                      <!-- Current avatar -->
                      <img class="img-responsive avatar-view" src="../images/user.png" width="80%" alt="Avatar" title="Foto del empleado">
                    </div>
                  </div>
                </div>           
              </div>
              

              <div class="row">
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="empl_datosrecidencia">Dirección domicilio </label>
                  <input type="text" id="empl_datosrecidencia" name="empl_datosrecidencia" required="required" class="form-control" placeholder="Calle/Carrera # Barrio" title="Dirección domicilio">
                </div>
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="empl_ciudad">Departamento/Ciudad </label>
                  <select class="form-control" id="empl_ciudad" name="empl_ciudad" required="required" tabindex="-1" style="width: 100%" data-placeholder="SELECCIONE" title="Departamento / Ciudad">
                    <option></option>
                    <?php                      

                      foreach ($listadc as $value) {
                        echo '<option value="'.$value['oid'].'">'.$value['departamento'].'/'.$value['ciudad'].'</option>';
                      }

                    ?>
                  </select>
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="telfijo">Telefono (fijo) </label>
                  <input type="text" id="telfijo" name="telfijo" required="required" class="form-control" placeholder="FIJO" title="Teléfono fijo">
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="telcelular">Telefono (Celular) </label>
                  <input type="text" id="telcelular" name="telcelular" required="required" class="form-control" placeholder="CELULAR" title="Teléfono celular">
                </div>
              </div> 

              <div class="row">
                <div class="  col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="empl_fechanacimiento">Fecha de nacimiento </label>
                  <div class="control-group">
                    <div class="controls">
                        <input type="text" class="form-control" id="empl_fechanacimiento" name="empl_fechanacimiento" placeholder="FECHA NACIMIENTO" aria-describedby="inputSuccess2Status4" required="required" title="Fecha de nacimiento">
                    </div>
                  </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="empl_email">Correo electronico </label>
                  <input type="email" id="empl_email" name="empl_email" class="form-control" placeholder="micorreo@midominio.com">
                </div>                
              </div>            
              
              <h4>Información Adiccional</h4>
              <div class="ln_solid"></div>

              <div class="row">
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="empl_cargo_oid">Cargo </label>
                  <select class="form-control" id="empl_cargo_oid" name="empl_cargo_oid" required="required" tabindex="-1" data-placeholder="SELECCIONE" style="width: 100%" title="Cargo">
                    <option></option>
                    <?php                      

                      foreach ($cargos as $value) {
                        echo '<option value="'.$value['oid'].'">'.$value['carg_descripcion'].'</option>';
                      }

                    ?>
                  </select>
                </div>
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="empl_contrato_oid">Tipo de vinculación </label>
                  <select class="form-control" id="empl_contrato_oid" name="empl_contrato_oid" required="required" tabindex="-1" data-placeholder="SELECCIONE" style="width: 100%" required="required" title="Tipo de vinculación">
                  <option></option>
                    <?php                      

                      foreach ($vincu as $value) {
                        echo '<option value="'.$value['oid'].'">'.$value['cont_descripcion'].'</option>';
                      }

                    ?>
                  </select>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="empl_fechavinculacion">Fecha de vinculación </label>
                  <div class="control-group">
                    <div class="controls">
                        <input type="text" class="form-control" id="empl_fechavinculacion" name="empl_fechavinculacion" placeholder="FECHA VINCULACION" aria-describedby="inputSuccess2Status4" required="required" title="Fecha de vinculación">
                    </div>
                  </div>
                </div>
                <div class="form-group col-md-1 col-sm-1 col-xs-12">
                  <label class="control-label" for="empl_duracioncontrato">Duración </label>
                  <input type="text" id="empl_duracioncontrato" name="empl_duracioncontrato" required="required" class="form-control" placeholder="0" value="0" title="Duración del contrato (0 = Indefinido)">
                  <code>Meses</code>
                </div>                
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="empl_sueldo">Sueldo </label>
                  <input type="text" id="empl_sueldo" name="empl_sueldo" required="required" class="form-control" placeholder="$0.0" title="Sueldo">
                </div> 
              </div>

              <div class="row">
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label" for="empl_funciones">Observaciones </label>
                  <textarea id="empl_funciones" name="empl_funciones" class="form-control" placeholder=""></textarea>
                </div>
              </div>


              <div class="row">
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <button id="btnguardar" type="button" class="btn btn-success pull-right"><i class="fa fa-save"></i> Guardar</button>
                  <button id="btnclean" type="button" class="btn btn-default pull-right"><i class="fa fa-eraser"></i> Limpiar</button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>

    </div>
  </div>



<!-- footer content -->
  <?php include_once '../pages/footer.php' ?>
<!-- /footer content -->

  <div id="reloadscript"></div>

  <!-- FastClick -->
  <script src="../plugins/fastclick/lib/fastclick.js"></script>
  <!-- PNotify -->
  <script src="../plugins/pnotify/dist/pnotify.js"></script>
  <script src="../plugins/pnotify/dist/pnotify.buttons.js"></script>
  <script src="../plugins/pnotify/dist/pnotify.nonblock.js"></script>
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
  <!-- Select2 
  <script src="../plugins/sumoselect/sumoselect.min.js"></script>-->
  <script src="../plugins/select2/dist/js/select2.full.min.js"></script>

  <!-- Parsley -->
  <script src="../plugins/parsleyjs/dist/parsley.min.js"></script>
  <!-- Autosize -->
  <script src="../plugins/autosize/dist/autosize.min.js"></script>
  <!-- jQuery autocomplete -->
  <script src="../plugins/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
  <!-- starrr -->
  <script src="../plugins/starrr/dist/starrr.js"></script>
  <!-- Datatables -->
  <script src="../plugins/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="../plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../plugins/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="../plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="../plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="../plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="../plugins/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="../plugins/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="../plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../plugins/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="../plugins/datatables.net-scroller/js/datatables.scroller.min.js"></script>
  <script src="../plugins/jszip/dist/jszip.min.js"></script>
  <script src="../plugins/pdfmake/build/pdfmake.min.js"></script>
  <script src="../plugins/pdfmake/build/vfs_fonts.js"></script>

  <script>
    $(document).ready(function() {
      $('#empl_fechanacimiento, #empl_fechavinculacion').daterangepicker({
        showDropdowns : true,
        singleDatePicker: true,
        locale : {
          format : "DD-MM-YYYY",
          daysOfWeek : [
            "D",
            "L",
            "M",
            "M",
            "J",
            "V",
            "S"
          ],
          monthNames : [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
          ],
          firstDay : 1
        }
      });
    });
  </script>

  <script>
    document.title = document.title+" Crear nuevo empleado"; //set Titulo de la pagina
    cargarQuery();
    var form = document.getElementById("formempleado"); //Get selector categor


    form["btnclean"].onclick = function(){ window.location.reload(true); };
    form["btnguardar"].onclick = function(){ guardar(); };
    form["empl_identificacion"].onblur = function(){ verificarIdentificacion(); };



    function cargarQuery() {
      var url_string = window.location.href ;
      var url = new URL(url_string);
      var _query = url.searchParams.get("query");
      
      if (_query !== null) {
        var query  = JSON.parse(atob(_query) );
        var excluir = ["oid","empl_datecreate","empl_dateupdate","empl_fotoperfil","empl_grupo_oid"];        
        for(var i in query) {
                
          if (!excluir.includes(i)) {
            if ("empl_telefonos" == i) {
              var base = atob(query[i]);
              var arrTel = JSON.parse(base);
              document.getElementById("telfijo").value = arrTel["telfijo"];
              document.getElementById("telcelular").value = arrTel["telcelular"];
            }else{
              var e = document.getElementById(i);
              if (e.tagName === "INPUT" || e.tagName === "TEXTAREA") {
                e.value = query[i];
              }

              if (e.tagName === "SELECT") {
                $("#"+e.id+"").val(query[i]).trigger('change.select2');
              }
            }

          }
        }
      }

    
    }


    // Función que realiza una busqueda por numero de indentificacion del proveedor y/o tercero.
    function verificarIdentificacion() {
      if (/^\s+|[A-Za-z]|\W/g.test(form["empl_identificacion"].value) !== true) {
        var empl_id = <?php echo $verIdenti; ?>;
        console.log(empl_id);
        for(var i in empl_id){
          if (empl_id[i]["empl_identificacion"] === form["empl_identificacion"].value) {
            notify('Advertencia!','Ya existe un registro de empleado con esa identificación.\nCompruebe de nuevo.','warning');
            form["empl_identificacion"].value = "";
            form["empl_identificacion"].focus();
          }
        }

      }else{
        notify('Advertencia!','El campo número de identificación contiene carácteres inválidos.\nSolo se permiten números.','warning');
        form["empl_identificacion"].value = "";
      }
    }


    function validarform() {
      console.log(form.title);
      var c = 0; var nc = 14;
      for (var i = 0; i < form.length; i++) {
        if (form[i].attributes["title"]) {
          
          if (/^\s+/g.test(form[i].value) === true) {
            //alert("El campo "+form[i].title+" contiene carácteres inválidos!");
            notify('Advertencia!','El campo '+form[i].title+' contiene carácteres inválidos!','warning');
            return false;
            break;
          }else{
            if (form[i].value != "") {
              c++;
              if (c >= nc) {
                return true;
                break;
              }
            }else{
              //alert("El campo "+form[i].title+" no puede estar vacio!");
              notify('Advertencia!','El campo '+form[i].title+' no puede estar vacio!','warning');
              return false;
              break;
            }
          }

        }
      }
    }


    function guardar(){
      
      if ( validarform() ) {

        var formElement = document.getElementById("formempleado");
        var formData = new FormData(formElement);     
        formData.append("data", "guardarempleado");

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../data/data.php",false);
        xhr.send(formData);

        if (xhr.status == 200) {
          
          var result = JSON.parse(xhr.responseText);
          if (result["bool"]) {
            //alert(result["mensaje"]);
            notify('Mensaje!','La operación fue realizada satisfactoriamente.','success');
            window.location.reload(true);
          }else{
            //alert(result["mensaje"]);
            notify('Error!',result["mensaje"],'error');
          }
          
        } else {
          //alert('No se enviaron datos!');
          notify('Error!','No se enviaron datos!','error');
        }
      
      }
    }

    function notify(titulo,texto,tipo) {
      new PNotify({
          title: titulo,
          text: texto,
          type: tipo, // warning, success, error, info
          styling: 'bootstrap3'
      });
    }

  </script>
  <!-- /bootstrap-daterangepicker -->


  <!-- Select2 -->
  <script>
    $(document).ready(function() {

      var tipoid = $("#empl_tipoidentificacion_oid");
      tipoid.select2({
        placeholder: "TIPO ID",
        allowClear: false
      });

      

      $("#empl_ciudad").select2({
        placeholder: "SELECCIONE LA CIUDAD",
        allowClear: false
      });

      

      

      $("#empl_cargo_oid").select2({
        placeholder: "CARGO LABORAL",
        allowClear: true
      });

      $("#empl_contrato_oid").select2({
        placeholder: "TIPO CONTRATO",
        allowClear: true
      });


      $(".select2_multiple").select2({
        maximumSelectionLength: 4,
        placeholder: "With Max Selection limit 4",
        allowClear: true
      });

      
    });
  </script>
  <!-- /Select2 -->



<?php 
}else{
  $html_negate =  '<div style="padding: 100px 0px 50px 0px;" class="right_col" role="main">';
  $html_negate .= '<center><h1><i class="fa fa-warning"></i>Usted no tiene permisos para ver esta sessión!</h1></center></div>';
  echo $html_negate;
}
}

?>

