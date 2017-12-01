<?php  

if (session_status() != PHP_SESSION_NONE) {
if (isset($pu['agregar_editar_usuarios'])) {
  
$get_all = $misc->get_all('tbl_roles');
$_rol = ($get_all['bool']?$get_all['data']:array());


?>
	<div class="right_col" role="main">


    <div class="row">
      <div class="col-md-12 col-sm-4 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Crear Usuario <small>Nuevo</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form id="formusuario" data-parsley-validate class="form-vertical form-label-left">
              <h4>Información Inicial</h4>
              <div class="ln_solid"></div>

              <div class="row">
                <div class="col-md-10 col-sm-10 col-xs-12">
                  <div class="row">
                    <div class="form-group has-feedback col-md-3 col-sm-3 col-xs-12">
                      <label class="control-label" for="usu_identificacion">Num. Identificación </label>
                      <input type="text" id="usu_identificacion" name="usu_identificacion" required="required" class="form-control" placeholder="CC/TI/CE" title="Número identificación">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-5 col-sm-5 col-xs-12">
                      <label class="control-label" for="usu_nombres">Nombres </label>
                      <input type="text" id="usu_nombres" name="usu_nombres" required="required" class="form-control" placeholder="NOMBRES COMPLETOS" title="Nombres completos">
                    </div>
                    <div class="form-group col-md-5 col-sm-5 col-xs-12">
                      <label class="control-label" for="usu_apellidos">Apellidos </label>
                      <input type="text" id="usu_apellidos" name="usu_apellidos" required="required" class="form-control" placeholder="APELLIDOS COMPLETOS" title="Apellidos completos">
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
                <div class="form-group col-md-3 col-sm-4 col-xs-12">
                  <label class="control-label" for="usu_id">Usuario </label>
                  <input type="text" id="usu_id" name="usu_id" required="required" class="form-control" placeholder="USERNAME" title="Usuario">
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="usu_pass">Contraseña </label>
                  <input type="password" id="usu_pass" name="usu_pass" required="required" class="form-control" placeholder="DIGITE CONTRASEÑA" title="Contraseña">
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="pass">Confirmar contraseña </label>
                  <input type="password" id="pass" required="required" class="form-control" placeholder="DIGITE CONTRASEÑA" title="Confirmar contraseña">
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12 col-md-offset-1">
                  <label class="control-label" for="usu_estado">Estado </label>
                  <div class="checkbox">
                      <label>
                        <input id="usu_estado" name="usu_estado" type="checkbox" value="0" class="flat"> Inactivo
                      </label>
                  </div>
                </div>
              </div> 

              <div class="row">
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="usu_rol_oid">Rol </label>
                  <select class="form-control" id="usu_rol_oid" name="usu_rol_oid" required="required" data-placeholder="SELECCIONE EL ROL" tabindex="-1" style="width: 100%" title="Rol">
                    <option></option>
                    <?php                      

                      foreach ($_rol as $value) {
                        echo '<option value="'.$value['oid'].'">'.mb_strtoupper($value['rol_nombre'], 'UTF-8').'</option>';
                      }

                    ?>
                  </select>
                </div>
              </div>

              <hr>


              <div class="row">
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <button id="btnguardar" type="button" onclick="guardar()" class="btn btn-success pull-right"><i class="fa fa-save"></i> Guardar</button>
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
    document.title = document.title+" Crear nuevo usuario"; //set Titulo de la pagina
    //cargarQuery();
    var form = document.getElementById("formusuario"); //Get
    var url = "?mod=sistema&sub=nuevousuario";
    var get_oid = null;
    load_data();
    
    form["btnclean"].onclick = function(){ window.location.href = "?mod=sistema&sub=usuarios"; };
    //form["btnguardar"].onclick = function(){ guardar(); };
    form["usu_identificacion"].onblur = function(){ verificarDuplicados(this,"tbl_usuarios","usu_identificacion"); };
    form["usu_id"].onblur = function(){ verificarDuplicados(this,"tbl_usuarios","usu_id"); };
    form["usu_pass"].onblur = function(){ validarContrasena(this); };
    form["pass"].onblur = function(){ validarContrasena(this); };


    
    function validarContrasena(param){
      if (form["usu_pass"].value !== "" && form["pass"].value !== "") {
        if(form["usu_pass"].value !== form["pass"].value){
          notify('Advertencia!','Las Contraseñas no son iguales!\nCompruebe de nuevo.','warning');
          param.focus();
          return false;
        }else{
          return true;
        }
      }else{
        return false;
      }
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

    function actualizar(){
      
      if ( validarform() ) {
        var arr = send_xhr(form,{oid:get_oid,type_xhr:"set_form_update",fn:"actualizarusuario"});
        
        if (arr["bool"]) {
          notify('Mensaje!','La operación fue realizada satisfactoriamente.','success');
          window.location.href = url;
        }else{
          notify('Error!',arr["mensaje"],'error');
        }
      }
      
    }

    function guardar(){
      
      if ( validarform() ) {
        var arr = send_xhr(form,{type_xhr:"set_form",fn:"guardarnuevousuario"});
        
        if (arr["bool"]) {
          notify('Mensaje!','La operación fue realizada satisfactoriamente.','success');
          window.location.href = url;
        }else{
          notify('Error!',arr["mensaje"],'error');
        }
      }
      
    }
    
    function send_xhr(formElement,arrElement){
      
      var fm = (!formElement?[]:formElement);
      var formData = new FormData(fm);
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
          return {bool:false};
          notify('Error!',result["mensaje"],'error');
        }
        
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
        get_oid = _get;
        var data = send_xhr(null,{type_xhr:"get_result_one",table:"tbl_usuarios",key:"oid",value:_get,key_return:null});
        if(data["bool"] && data["data"]){
          var d = data["data"];
          for(var i in d){
            if (i == "oid" || i == "usu_pass") {
              
            }else{
              form[i].value = d[i];
              if (i == "usu_estado" && d[i] == 0) {
                $("#"+i).iCheck("check");
                form[i].checked = true;               
              }else if(i == "usu_rol_oid"){
                $("#"+i).select2().val(d[i]).trigger("select2:change")
              }
            }

          }
          form["btnguardar"].setAttribute("onclick","actualizar()");
          form["btnguardar"].removeAttribute("id");
          form["usu_identificacion"].setAttribute("disabled","disabled");
          form["usu_id"].setAttribute("disabled","disabled");
          form["usu_pass"].setAttribute("disabled","disabled");
          form["usu_pass"].removeAttribute("title");
          form["pass"].setAttribute("disabled","disabled");
          form["pass"].removeAttribute("title");
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
  <!-- /bootstrap-daterangepicker -->


  <!-- Select2 -->

  <!-- /Select2 -->

<?php 
}else{
  $html_negate =  '<div style="padding: 100px 0px 50px 0px;" class="right_col" role="main">';
  $html_negate .= '<center><h1><i class="fa fa-warning"></i>Usted no tiene permisos para ver esta sessión!</h1></center></div>';
  echo $html_negate;
}
}

?>



