<?php

if (session_status() != PHP_SESSION_NONE) {
if (isset($pu['agregar_editar_roles'])) {
$get_all = $misc->get_all('tbl_modulos',NULL,'mod_heredable','0');
$_mod = ($get_all['bool']?$get_all['data']:array());


?>
	<div class="right_col" role="main">


    <div class="row">
      <div class="col-md-12 col-sm-4 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Roles de usuario <small>Nuevo</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form id="formroles" class="form-vertical form-label-left">
              
              <div class="row">
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="nombre_rol">Nombre del rol </label>
                  <input type="text" id="nombre_rol" name="nombre_rol" title="Nombre del rol" required="required" class="form-control" placeholder="ROL">
                </div>
                <div class="form-group col-md-7 col-sm-7 col-xs-12">
                  <label class="control-label" for="descripcion_rol">Descripcion del rol </label>
                  <input type="text" id="descripcion_rol" name="descripcion_rol" class="form-control" placeholder="DESCRIPCION">
                </div>                
              </div>
              <hr>

              <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
              <?php
                $out = null;
                $mod_cout = 0;
                
                foreach($_mod as $mod){
                  $out .= '<div class="panel">';
                  $out .= '   <a class="panel-heading collapsed" role="tab" id="head'.$mod_cout.'" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$mod_cout.'" aria-expanded="false" aria-controls="collapse'.$mod_cout.'">
                                <h4 class="panel-title">'.$mod['mod_descripcion'].'</h4>
                              </a>';
                  $out .= '   <div id="collapse'.$mod_cout.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="head'.$mod_cout.'">';
                  $out .= '     <div class="panel-body">';
                  
                  $get_all2 = $get_all = $misc->get_all('tbl_modulos',NULL,'mod_heredable',$mod['oid']);
                  $_submod = ($get_all2['bool']?$get_all2['data']:array());
                  foreach ($_submod as $submod) {
                    $out .= '<div class="col-md-3">';
                    $out .= '<div class="checkbox">
                                <label>
                                  <input id="'. $submod['mod_llave'].'" name="'. $submod['mod_llave'].'" type="checkbox" class="flat"> '. $submod['mod_descripcion'].'
                                </label>
                              </div>';
                    $out .= '</div>';
                  }
                  
                  $out .= '';
                  $out .= '     </div>';
                  $out .= '   </div>';
                  $out .= '</div>';
                  $out .= '';
                  
                  $mod_cout++;
                }
                echo $out;
              ?>
              
              </div>
              <hr>
              <div class="row">
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <button id="btnguardar" type="button" class="btn btn-success pull-right"><i class="fa fa-save"></i> Guardar</button>
                  <button id="btnclean" type="button" class="btn btn-default pull-right"><i class="fa fa-times"></i> Cancelar</button>

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
  <!-- NProgress -->
  <script src="../plugins/nprogress/nprogress.js"></script>
  <!-- PNotify -->
  <script src="../plugins/pnotify/dist/pnotify.js"></script>
  <script src="../plugins/pnotify/dist/pnotify.buttons.js"></script>
  <script src="../plugins/pnotify/dist/pnotify.nonblock.js"></script>
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
    var form = document.getElementById("formroles");
    var url = '?mod=sistema&sub=roles';
    var get_oid;
    form["btnguardar"].onclick = function(){ guardar(); }
    form["btnclean"].onclick = function() { window.location.href = url; };
    load_data();
    
    function validarItem(arrValues) {
      var bool = true;
      for(var i in arrValues){
        if(arrValues[i].value == ""){
          bool = false;
          alert("El campo ["+arrValues[i].title+"] es obligatorio y no puede estar vacio.");
          break;
        }
      }
      console.log(bool);
      return bool;
    }

    function actualizar(){
      
      if ( /^\s+$/.test(form["nombre_rol"].value) == false && form["nombre_rol"].value !== "" ) {

        var formData = new FormData(form);     
        formData.append("data", "actualizarrol");
        formData.append("oid", get_oid);
        
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../data/data.php",false);
        xhr.send(formData);
        
        if (xhr.status == 200) {
          
          var result = JSON.parse(xhr.responseText);
          if (result["bool"]) {
            notify('Mensaje!','La operación fue realizada satisfactoriamente.','success');
          }else{
            notify('Error!',result["mensaje"],'error');
          }
          
        } else {
          notify('Error!','No se enviaron datos!','error');
        }
      
      }else{
        alert("El campo ["+form["nombre_rol"].title+"] es obligatorio y no puede estar vacio.");
      }
    }
    
    function guardar(){
      
      if ( /^\s+$/.test(form["nombre_rol"].value) == false && form["nombre_rol"].value !== "" ) {

        var formData = new FormData(form);     
        formData.append("data", "guardarrol");

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../data/data.php",false);
        xhr.send(formData);
        
        if (xhr.status == 200) {
          
          var result = JSON.parse(xhr.responseText);
          if (result["bool"]) {
            notify('Mensaje!','La operación fue realizada satisfactoriamente.','success');
            window.location.href = url;
          }else{
            notify('Error!',result["mensaje"],'error');
          }
          
        } else {
          notify('Error!','No se enviaron datos!','error');
        }
      
      }else{
        alert("El campo ["+form["nombre_rol"].title+"] es obligatorio y no puede estar vacio.");
      }
    }
    
    function consultar(oid){

        var formData = new FormData(form);     
        formData.append("data", "consultarrol");
        formData.append("oid", oid);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../data/data.php",false);
        xhr.send(formData);
        
        if (xhr.status == 200) {
          
          var result = JSON.parse(xhr.responseText);
          return result;
          
        } else {
          return {bool:false};
          notify('Error!','No se enviaron datos!','error');
        }
      
    }
    
    function load_data(){
      var url_string = window.location.href;
      var url = new URL(url_string);
      var _get = url.searchParams.get("id");
           
      if (_get !== "") {
        var data = consultar(_get);
        if(data["bool"] && data["roles"] != ""){
          get_oid = _get;
          form["btnguardar"].setAttribute("onclick","actualizar()");
          form["btnguardar"].removeAttribute("id");
          form["nombre_rol"].value = data["roles"]["rol_nombre"];
          form["nombre_rol"].setAttribute("disabled","disabled");
          form["descripcion_rol"].value = data["roles"]["rol_descripcion"];
          form["descripcion_rol"].setAttribute("disabled","disabled");
          
          for(var i in data["modulos"]){
            $("#"+i).iCheck("check");
            form[i].checked = true;
          }
          
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


  <!-- Autosize -->
  <script>
    $(document).ready(function() {
      autosize($('.resizable_textarea'));
    });
  </script>
  <!-- /Autosize -->
<?php 
}else{
  $html_negate =  '<div style="padding: 100px 0px 50px 0px;" class="right_col" role="main">';
  $html_negate .= '<center><h1><i class="fa fa-warning"></i>Usted no tiene permisos para ver esta sessión!</h1></center></div>';
  echo $html_negate;
}
}

?>

