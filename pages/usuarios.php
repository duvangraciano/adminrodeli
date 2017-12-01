<?php

if (session_status() != PHP_SESSION_NONE) {
if (isset($pu['ver_usuarios'])) {

$get_all = $misc->get_all('tbl_usuarios');
$_usu = ($get_all['bool']?$get_all['data']:array());

?>
	<div class="right_col" role="main">


    <div class="row">
      <div class="col-md-12 col-sm-4 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Usuarios <small>Vista previa</small></h2>
            <a href="?mod=sistema&sub=nuevousuario" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Nuevo</a> 
            <!-- <button onclick="" type="button" class="btn btn-success pull-right"><i class="fa fa-check-circle"></i> Boton</button> -->
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                  <table id="tablausuarios" class="table table-striped table-bordered bulk_action">
                    <thead>
                      <tr>
                        <th><input type="checkbox" id="check-all" class="flat"></th>
                        <th>UsuarioID </th>
                        <th>Identificacion </th>
                        <th>Nombres </th>
                        <th>Apellidos </th>
                        <th>Rol</th>
                        <th>Última_Sesión</th>
                        <th>Estado</th>
                        <th></th>
                      </tr>
                    </thead>

                    <tbody id="tbody">
                      <?php
                        $label = array('0'=>'danger','1'=>'success');
                        foreach ($_usu as $value) {
                          
                          echo '
                                  <tr class="even pointer">
                                    <td class="a-center "><input type="checkbox" class="flat" name="table_records"></td>
                                    <td>'.$value['usu_id'].'</td>
                                    <td>'.$value['usu_identificacion'].'</td>
                                    <td>'.$value['usu_nombres'].'</td>
                                    <td>'.$value['usu_apellidos'].'</td>
                                    <td>'.$misc->get_one('tbl_roles',null,'oid',$value['usu_rol_oid'])['data']['rol_nombre'].'</td>
                                    <td>'.$misc->get_one('tbl_sesiones','MAX(ses_date_sesion) AS ses_date_sesion','ses_usuario_oid',$value['oid'])['data']['ses_date_sesion'].'</td>
                                    <td class="text-center"><span class="label label-'.$label[$value['usu_estado']].'">'.($value['usu_estado']==1?'Activo':'Inactivo').'</span></td>
                                    <td><div class="btn-group">
                                          <a href="?mod=sistema&sub=nuevousuario&id='.$value['oid'].'" type="button" class="btn btn-info btn-xs">Editar</a>
                                          <button type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                          </button>
                                          <ul class="dropdown-menu" role="menu">
                                            <li><a href="?mod=sistema&sub=nuevousuario&id='.$value['oid'].'">Editar</a>
                                            </li>
                                            <li><a onclick="setestado('.$value['oid'].','.$value['usu_estado'].',this)">'.($value['usu_estado']==1?'Suspender':'Activar').'</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li><a onclick="resetpwd('.$value['oid'].')">Reestablecer clave</a>
                                            </li>
                                          </ul>
                                        </div>
                                    </td>
                                  </tr>
                          ';
                        }
                      ?>
                    </tbody>
                  </table>
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
  <div id="reloadscript"></div>
  <!-- FastClick -->
  <script src="../plugins/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../plugins/nprogress/nprogress.js"></script>

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
  <!-- PNotify -->
  <script src="../plugins/pnotify/dist/pnotify.js"></script>
  <script src="../plugins/pnotify/dist/pnotify.buttons.js"></script>
  <script src="../plugins/pnotify/dist/pnotify.nonblock.js"></script>
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

    document.title = document.title+" Usuarios"; //set Titulo de la pagina
    var url = "?mod=sistema&sub=usuarios";

    function setestado(oid_,val,param){
      
      var arr = send_xhr(null,{oid:oid_,value:val,type_xhr:"set_form_update",fn:"cambiarestadousuario"});
        
      if (arr["bool"]) {
        notify('Mensaje!','La operación fue realizada satisfactoriamente.','success');
        window.location.href = url;
      }else{
        notify('Error!',arr["mensaje"],'error');
      }
    }
    
    function resetpwd(oid_){
      
      var arr = send_xhr(null,{oid:oid_,type_xhr:"set_form_update",fn:"reestablecercontrasena"});
        
      if (arr["bool"]) {
        notify('Mensaje!','La contraseña se reestablecio a: <b>123456</b>.','success');
      }else{
        notify('Error!',arr["mensaje"],'error');
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
    
    function notify(titulo,texto,tipo) {
      new PNotify({
          title: titulo,
          text: texto,
          type: tipo, // warning, success, error, info
          styling: 'bootstrap3'
      });
    }
    
    $(document).ready(function() {

      //var t = $('#tablaitems').dataTable();

      $tablaitems = $('#tablausuarios');

      $tablaitems.dataTable({
        responsive: true,
        ordering: false,
        dom: '<"toolbar">frtip'
      });
      

      $("div.toolbar").html('');

    });
  </script>
<?php 
}else{
  $html_negate =  '<div style="padding: 100px 0px 50px 0px;" class="right_col" role="main">';
  $html_negate .= '<center><h1><i class="fa fa-warning"></i>Usted no tiene permisos para ver esta sessión!</h1></center></div>';
  echo $html_negate;
}
}

?>




