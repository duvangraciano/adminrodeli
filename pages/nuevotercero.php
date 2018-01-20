<?php 

if (session_status() != PHP_SESSION_NONE) {
if (isset($pu['agregar_editar_cliente'])) {
  

$listaTipoId = $misc->listartipoid()->fetchAll(PDO::FETCH_ASSOC);



?>
	<div class="right_col" role="main">


    <div class="row">
      <div class="col-md-12 col-sm-4 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Crear tercero <small>Nuevo</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form id="formtercero" data-parsley-validate class="form-vertical form-label-left">
              <h4>Información Inicial</h4>
              <div class="ln_solid"></div>

              <div class="row">
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="pro_nombre_responsable">Identificación del tercero </label>
                  <input type="text" id="prov_identificacion" name="prov_identificacion" required="required" class="form-control" title="Identificación del tercero" placeholder="NIT/CC/NUIP">
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="prov_tipoidentificacion_oid">Tipo identificación </label>
                  <select class="form-control" id="prov_tipoidentificacion_oid" name="prov_tipoidentificacion_oid" required="required" data-placeholder="SELECCIONE" title="Tipo identificación" tabindex="-1" style="width: 100%">
                    <option></option>
                    <?php
                      foreach ($listaTipoId as $val) {
                        echo '<option value="'.$val["oid"].'">'.$val["tpid_descripcion"].' - '.$val["tpid_observacion"].'</option>';
                      }
                    
                    ?>
                  </select>
                </div>
                <div class="form-group col-md-7 col-sm-7 col-xs-12">
                  <label class="control-label" for="prov_nombre">Nombre del tercero </label>
                  <input type="text" id="prov_nombre" name="prov_nombre" required="required" class="form-control" title="Nombre del tercero" placeholder="NOMBRE PERSONA NATURAL O JURIDICA">
                </div>                
              </div>

              <div class="row">
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="prov_direccion">Dirección domicilio </label>
                  <input type="text" id="prov_direccion" name="prov_direccion" required="required" class="form-control" placeholder="Calle/Carrera # Barrio">
                </div>
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="prov_ciudad">Departamento/Ciudad </label>
                  <select class="form-control" id="prov_ciudad" name="prov_ciudad" required="required" data-placeholder="SELECCIONE" tabindex="-1" style="width: 100%">
                  </select>
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="prov_telfijo">Telefono (fijo) </label>
                  <input type="text" id="prov_telfijo" name="prov_telfijo" required="required" class="form-control" placeholder="FIJO">
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="prov_telcelular">Telefono (Celular) </label>
                  <input type="text" id="prov_telcelular" name="prov_telcelular" required="required" class="form-control" placeholder="CELULAR">
                </div>
              </div> 

              <div class="row">
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="prov_contacto">Contacto/Responsable </label>
                  <input type="text" id="prov_contacto" name="prov_contacto" required="required" class="form-control" title="Contacto/Responsable" placeholder="NOMBRE DEL CONTACTO O RESPONSABLE">
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="prov_email">Correo electronico </label>
                  <input type="email" id="prov_email" name="prov_email" required="required" class="form-control" placeholder="micorreo@midominio.com">
                </div>                
              </div>            
              
              <h4>Información Adiccional</h4>
              <div class="ln_solid"></div>

              <div class="row">
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="prov_natu_tributaria">Naturaleza tributaria </label>
                  <select class="form-control" id="prov_natu_tributaria" name="prov_natu_tributaria" required="required" data-placeholder="SELECCIONE" title="Naturaleza tributaria" tabindex="-1" style="width: 100%">
                  </select>
                </div>
                <div class="form-group col-md-3 col-sm-3 col-xs-12 col-md-offset-1">
                  <label class="control-label" for="modalidad">Modalidad </label>
                  <div class="checkbox">
                      <label>
                        <input id="modalidad" name="prov_escliente" type="checkbox" value="1" class="flat"> Cliente
                        <input id="modalidad" name="prov_esproveedor" type="checkbox" value="1" class="flat"> Proveedor
                      </label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label" for="prov_descripcion">Observaciones </label>
                  <textarea id="prov_descripcion" name="prov_descripcion" required="required" class="form-control" placeholder=""></textarea>
                </div>
              </div>


              <div class="row">
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <button id="btnguardar" type="button" onclick="guardar()" class="btn btn-success pull-right"><i class="fa fa-save"></i> Guardar</button>
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
    document.title = document.title+" Crear nuevo tercero"; //set Titulo de la pagina
    var form = document.getElementById("formtercero"); //Get selector categor
    var url = "?mod=produccion&sub=tercero";
    var get_oid = null;
    

    form["prov_identificacion"].onblur = function(){ verificarDuplicados(this,"tbl_proveedores","prov_identificacion"); };
    
    form["btnclean"].onclick = function(){ window.location.reload(true); };



    listarCiudades();
    function listarCiudades() {
      
      var arr = send_xhr(null,{val:"ciudades",fn:"consultaDesplegables",type_xhr:"get_func"});

      var lista = JSON.parse(atob(arr["data"][0]["des_data"]));
      var options = '<option></option>';
      for(var l in lista){
        var ciudad = lista[l]["departamento"]+'/'+lista[l]["ciudad"];
        options += '<option value="'+lista[l]["oid"]+'">'+ciudad+'</option>';
      }
      
      form["prov_ciudad"].innerHTML = options;
      
    }

    listarNaturaleza();
    function listarNaturaleza() {
      
      var arr = send_xhr(null,{val:"naturaleza",fn:"consultaDesplegables",type_xhr:"get_func"});

      var lista = JSON.parse(atob(arr["data"][0]["des_data"]));
      var options = '<option></option>';
      for(var l in lista){
        options += '<option value="'+lista[l]["descripcion"]+'">'+lista[l]["descripcion"]+'</option>';
      }
      form["prov_natu_tributaria"].innerHTML = options;
      
    }

    // Función que realiza 
    function verificarDuplicados(fm,table,key,value) {
      var value = fm.value;
      if(value !== ""){
        if (/^\s+$|\W/g.test(value) !== true) {
          
          var arr = send_xhr(null,{type_xhr:"get_result_one",table:table,key:key,value:value,key_return:null});
          
          if(arr["data"]){
            notify('Advertencia!','El '+fm.title+' ya se encuentra registrado.\nVerifique de nuevo.','warning');
            fm.value = "";
            fm.focus();
          }
        }else{
          notify('Advertencia!','El campo '+fm.title+' contiene carácteres inválidos.\nSolo se permiten números.','warning');
          fm.value = "";
          fm.focus();
        }        
      }
    }
    
    function guardar(){
      
      if ( validarform() && validarmodalidad() ) {
        var arr = send_xhr(form,{type_xhr:"set_form",fn:"guardarnuevotercero"});
        
        if (arr["bool"]) {
          notify('Mensaje!','La operación fue realizada satisfactoriamente.','success');
          window.location.href = url;
        }else{
          notify('Error!',arr["mensaje"],'error');
        }
      }
      
    }
    
    function actualizar(){
      
      if ( validarform() && validarmodalidad() ) {
        var arr = send_xhr(form,{oid:get_oid,type_xhr:"set_form_update",fn:"actualizartercero"});
        
        if (arr["bool"]) {
          notify('Mensaje!','La operación fue realizada satisfactoriamente.','success');
          window.location.href = url;
        }else{
          notify('Error!',arr["mensaje"],'error');
        }
      }
      
    }
    
   
    function validarmodalidad(){
      var mod = form["modalidad"];
      console.log(mod[1]);
      if(mod[0].checked || mod[1].checked){
        return true;
      }else{
        notify('Advertencia!','Debe definir la Modalidad del Tercero.','warning');
        return false;
      }
    }

    function clearField(excluir, form){
      var arrElementos = document.getElementById(form);
      for (var i = 0; i < arrElementos.length; i++) {
        if (! excluir.some(ex => arrElementos[i].name === ex) ) {
          arrElementos[i].value = '';
          //$.fn.select2.defaults.reset();
        }
      }      
    }

    function limpiarCampos(){
      form["cantidad"].value = 1;
      form["ancho"].value = "";
      form["alto"].value = "";
      $("#categoria").select2().val(null).trigger('change');
    }



    function send_xhr(formElement,arrElement){
      
      
      var formData = (!formElement? new FormData() : new FormData(formElement) );
      for(var i in arrElement){
        formData.append(i, arrElement[i]);
      }
      
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "../data/data.php",false);
      xhr.send(formData);
      
      if (xhr.status == 200) {
        
        var result = JSON.parse(xhr.responseText);
        
        if (result["bool"]) {
          return {bool:true,mensaje:result["mensaje"],data:result["data"],result:result};
        }else{
          return {bool:false,mensaje:result["mensaje"]};
          notify('Error!',result["mensaje"],'error');
        }
        
      } else {
        return {bool:false};
        notify('Error!','No se enviaron datos!','error');
      }
      
    }

    load_data();
    function load_data(){
      var url_string = window.location.href;
      var url = new URL(url_string);
      var _get = url.searchParams.get("oid");
           
      if (_get !== "") {
        get_oid = _get;
        var data = send_xhr(null,{type_xhr:"get_result_one",table:"tbl_proveedores",key:"oid",value:_get,key_return:null});
        if(data["bool"] && data["data"]){
          var d = data["data"];
          for(var i in d){
            
            if (form[i]) {
              if ( (i === "prov_escliente" || i === "prov_esproveedor") && d[i] == 1) {
                $("#"+i).iCheck("check");
                form[i].checked = true;               
              }else if(form[i].tagName === "SELECT"){
                $("#"+i).select2().val(d[i]).trigger("select2:change")
              }else if(i === form[i].name){
                form[i].value = d[i];
              }              
            }
          }
          
          form["btnguardar"].setAttribute("onclick","actualizar()");
          form["btnguardar"].removeAttribute("id");
          form["prov_identificacion"].setAttribute("disabled","disabled");
          form["prov_esproveedor"].value = 1;
          form["prov_escliente"].value = 1;
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
    
    function validarform() {
      
      var c = 0; var nc = countInputs();
      for (var i = 0; i < form.length; i++) {
        if (form[i].attributes["title"]) {
          
          if (/^\s+/g.test(form[i].value) === true) {
            //alert("El campo "+form[i].title+" contiene carácteres inválidos!");
            notify('Advertencia!','El campo '+form[i].title+' contiene carácteres inválidos!','warning');
            return false;
            break;
          }else{
            if (form[i].value != ""){
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
    
    function countInputs(){
      var c = 0;
      for (var i = 0; i < form.length; i++) {
        if (form[i].attributes["title"]) {
          c++;
        }
      }
      return c;
    }
    
  </script>



  <!-- Select2 -->
  <script>
    $(document).ready(function() {
      $("#prov_ciudad").select2({
        placeholder: "SELECCIONE LA CIUDAD",
        allowClear: false
      });

      $("#prov_tipoid").select2({
        placeholder: "TIPO ID",
        allowClear: false
      });

      $("#prov_naturaleza").select2({
        placeholder: "TIPO DE NATURALEZA",
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



<?php 
}else{
  $html_negate =  '<div style="padding: 100px 0px 50px 0px;" class="right_col" role="main">';
  $html_negate .= '<center><h1><i class="fa fa-warning"></i>Usted no tiene permisos para ver esta sessión!</h1></center></div>';
  echo $html_negate;
}
}

?>
