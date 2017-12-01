<?php
if (session_status() != PHP_SESSION_NONE) {
if (isset($pu['agregar_editar_concepto_almacen'])) {
  
$get_all = $misc->get_all('tbl_roles');
$_rol = ($get_all['bool']?$get_all['data']:array());

//$lc = $misc->listarConceptos();
$arrCategoria = $misc->listarCategorias()->fetchAll(PDO::FETCH_ASSOC); // json_decode para Objetos se denife True, para Arreglos simples False.
$arrConceptos = $misc->listarCompuestos()->fetchAll(PDO::FETCH_ASSOC);
$arrComponentes = $misc->listarComponentes()->fetchAll(PDO::FETCH_ASSOC);
$arrTMaterial = $misc->listarTipoMaterial()->fetchAll(PDO::FETCH_ASSOC);
$arrTMedida = $misc->listartipomedida()->fetchAll(PDO::FETCH_ASSOC);

$arrFabricantes = json_decode(base64_decode($misc->consultaDesplegables('fabricantes')->fetch(PDO::FETCH_ASSOC)['des_data']),true);
$arrAcabados = json_decode(base64_decode($misc->consultaDesplegables('acabados')->fetch(PDO::FETCH_ASSOC)['des_data']),true);



?>
	<div class="right_col" role="main">


    <div class="row">
      <div class="col-md-12 col-sm-4 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Crear concepto de almacen <small>Nuevo</small></h2><span class="pull-right" id="addbtnedit"></span>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form id="formnuevoconcepto" data-parsley-validate class="form-vertical form-label-left">

              <div class="row">
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="mate_referencia">Código </label>
                  <input type="text" id="mate_referencia" name="mate_referencia" class="form-control" placeholder="CÓDIGO CONCEPTO" title="Código concepto" required>
                </div>                
                <div class="form-group col-md-7 col-sm-7 col-xs-12">
                  <label class="control-label" for="mate_descripcion">Descripcion del concepto </label>
                  <input type="text" id="mate_descripcion" name="mate_descripcion" class="form-control" placeholder="DESCIPCIÓN DEL CONCEPTO" title="Descripción del concepto" required>
                </div>
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="mate_tipomaterial_oid">Línea </label>
                  <select class="form-control" id="mate_tipomaterial_oid" name="mate_tipomaterial_oid" data-placeholder="LINEA" tabindex="-1" style="width: 100%" title="Línea del producto" required>
                  <option></option>
                    <?php foreach ($arrTMaterial as $val) {
                            echo '<option value="'.$val['oid'].'">'.strtoupper($val['tpma_descripcion']).'</option>';
                    } ?>
                  </select>
                </div>                
              </div>

              <div class="row">
                <div class="form-group col-md-1 col-sm-2 col-xs-12">
                  <label class="control-label" for="mate_calibre">Calibre </label>
                  <input type="text" id="mate_calibre" name="mate_calibre" class="form-control" placeholder="CALIBRE" title="Calibre">
                </div>
                <div class="form-group col-md-1 col-sm-2 col-xs-12">
                  <label class="control-label" for="mate_logitud">Longitud </label>
                  <input type="text" id="mate_logitud" name="mate_logitud" class="form-control" placeholder="LONGITUD" title="Longitud">
                </div>
                <div class="form-group col-md-1 col-sm-2 col-xs-12">
                  <label class="control-label" for="mate_peso">Peso (kg) </label>
                  <input type="text" id="mate_peso" name="mate_peso" class="form-control" placeholder="Kg" title="Peso (Kg)">
                </div>
                <div class="form-group col-md-1 col-sm-2 col-xs-12">
                  <label class="control-label" for="mate_diametro">Diámetro </label>
                  <input type="text" id="mate_diametro" name="mate_diametro" class="form-control" placeholder="DIAMETRO" title="Diámetro">
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="mate_acabado">Acabado </label>
                  <select class="form-control" id="mate_acabado" name="mate_acabado" data-placeholder="COLOR" tabindex="-1" style="width: 100%" title="Acabado" required>
                  <option></option>
                    <?php foreach ($arrAcabados as $val) {
                            echo '<option value="'.$val['oid'].'">'.strtoupper($val['acab_descripcion']).'</option>';
                    } ?>
                  </select>
                </div>
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="mate_idfabricante">Fabricante </label>
                  <select class="form-control" id="mate_idfabricante" name="mate_idfabricante" tabindex="-1" style="width: 100%" title="Fabricante" data-placeholder="FABRICANTE">
                  <option></option>
                    <?php foreach ($arrFabricantes as $val) {
                            echo '<option value="'.$val['oid'].'">'.strtoupper($val['fab_descripcion']).'</option>';
                    } ?>
                  </select>
                </div>
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="mate_clasificacion">Clasificación </label>
                  <select class="form-control" id="mate_clasificacion" name="mate_clasificacion" tabindex="-1" style="width: 100%" title="Clasificación" data-placeholder="CLASIFICACIÓN">
                  <option></option>
                  <option value="ARTICULO">Artículo</option>
                  <option value="SERVICIO">Servicio</option>
                  </select>
                </div>
              </div> 

              <div class="row">
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="mate_tipocomponente">Tipo Componente </label>
                  <select class="form-control" id="mate_tipocomponente" name="mate_tipocomponente" data-placeholder="COMPONENTE" tabindex="-1" style="width: 100%" title="Tipo componente" required>
                    <option></option>
                    <?php foreach ($arrComponentes as $val) {
                            echo '<option value="'.$val['oid'].'">'.strtoupper($val['cop_descripcion']).'</option>';
                    } ?>
                  </select>
                </div>
                <div class="form-group col-md-2 col-sm- col-xs-12">
                  <label class="control-label" for="mate_unidadmedida">Medida unitaria </label>
                  <input type="number" id="mate_unidadmedida" min="0" name="mate_unidadmedida" class="form-control" placeholder="MEDIDA" title="Medida unitaria" required>
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="mate_tipomedida_oid">Tipo medida </label>
                  <select class="form-control" id="mate_tipomedida_oid" name="mate_tipomedida_oid" data-placeholder="MEDIDA" tabindex="-1" style="width: 100%" title="Tipo medida" required>
                  <option></option>
                    <?php foreach ($arrTMedida as $val) {
                            echo '<option value="'.$val['oid'].'">'.strtoupper($val['tpme_descripcion']).'</option>';
                    } ?>
                  </select>
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="mate_costounidad">Costo medida unitaria </label>
                  <input type="text" id="mate_costounidad" name="mate_costounidad" class="form-control" placeholder="COSTO UNIDAD" title="Costo medida unitaria" required>
                </div>
                <div class="form-group col-md-1 col-sm-1 col-xs-12">
                  <label class="control-label" for="mate_iva">Aplica IVA: </label><br>
                  <label>
                    SI <input id="mate_iva" name="mate_iva" value="1" type="checkbox" class="flat" />
                  </label>                  
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="mate_proppal">Componete principal <i class="fa fa-info-circle" title="Solo aplica para definir el calculo de un compuesto."></i></label><br>                 
                  <label>
                    SI <input id="mate_proppal" name="mate_proppal" value="1" type="checkbox" class="flat" />
                  </label>                  
                </div>                
              </div>

              <div class="row">
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label" for="mate_observaciones">Observaciones </label>
                  <textarea id="mate_observaciones" name="mate_observaciones" class="form-control" placeholder="" title="Observaciones"></textarea>
                </div>
              </div>       
              
              <h4></h4>
              <div class="ln_solid"></div>
              <div class="row hide">
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="">% Utilidad 1</label>
                  <input type="text" id="" name="" class="form-control" placeholder="" title="">
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="">% Utilidad 2</label>
                  <input type="text" id="" name="" class="form-control" placeholder="" title="">
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="">% Utilidad 3</label>
                  <input type="text" id="" name="" class="form-control" placeholder="" title="">
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
    document.title = document.title+" Crear nuevo concepto almacen"; //set Titulo de la pagina
    var url = '?mod=almacen&sub=nuevoconcepto';
    var oid;
    form = document.getElementById("formnuevoconcepto");

    form["btnguardar"].onclick = function() {  guardar();  };
    form["btnclean"].onclick = function() { window.location.href = url; };
    setInputs();


    function setInputs() {
      var url_string = window.location.href;
      var url = new URL(url_string);
      var get = url.searchParams.get("view");
      
      if (get !== null) {
        var v = JSON.parse(atob(get));
        oid = v["oid"];
        document.getElementById("addbtnedit").innerHTML = '<button onclick="editar()" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</button>';
        for (var i = 0; i < form.length; i++) {
          if (form[i].tagName == "SELECT") {
            $("#"+form[i].id).select2().val(v[form[i].id]).trigger("change.select2");
            
          }else if(form[i].type == "checkbox" && v[form[i].id] == 1){
            $("#"+form[i].id).iCheck("check");            
          }else{
            form[i].value = v[form[i].id];
          }
          form[i].setAttribute("disabled","disabled");
        }
        
        form["btnguardar"].setAttribute("onclick","update()");
        form["btnguardar"].removeAttribute("id");
      }else{
        console.log(get);
      }
    }


    function guardar() {
      if (validarcampos(form)) {
        if (codigoComponente()) {
          var formData = new FormData(form);
          formData.append("data", "guardarnuevoconcepto");
          
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "../data/data.php",false);
          xhr.send(formData);

          if (xhr.status == 200) {          
            var result = JSON.parse(xhr.responseText);
            if (result["bool"]) {
              alert(result["mensaje"]);
              window.location.href = url;
            }else{
              alert(result["mensaje"]);
            }          
          } else {
            alert('No se enviaron datos!');
          }
        }        
      }
    }

    function editar() {
      var exclude = ["mate_referencia"];
      for (var i = 0; i < form.length; i++) {
        console.log();
        if ( exclude.find(function(element){ return element == form[i].id; }) == undefined ) {
          form[i].removeAttribute("disabled");
        }
      }
    }

    function codigoComponente() {
        var formData = new FormData();

        formData.append("codigo", form["mate_referencia"].value);
        formData.append("data", "consultarcodigoconcepto");
        
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../data/data.php",false);
        xhr.send(formData);

        if (xhr.status == 200) {          
          var result = JSON.parse(xhr.responseText);
          if (result["bool"]) {            
            return true;
          }else{
            alert(result["mensaje"]);
            form["mate_referencia"].focus();
            form["mate_referencia"].value = "";
            return false;
          }          
        } else {
          alert('No se enviaron datos!');
          return false;
        }
    }


    function validarcampos(input) {
      var bool;

      for(var i = 0; i < input.length; i++){
        if (input[i].attributes["required"]) {
          if (/^\s+/g.test(input[i].value) !== true) {
            if (input[i].value !== "") {
              bool = true;            
            }else{
              alert("El Campo "+input[i].title+" es requerido y no puede ser vacio!");
              bool = false;
              break;            
            }
          }else{
            alert("El Campo "+input[i].title+" contiene carácteres inválidos!");
            bool = false;
            break;
          }
        }
      }
      return bool;
    }

    function update(){
      if (validarcampos(form)) {
        if (true) {
          var formData = new FormData(form);
          formData.append("oid",oid);
          formData.append("data", "updatenuevoconcepto");
          
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "../data/data.php",false);
          xhr.send(formData);

          if (xhr.status == 200) {          
            var result = JSON.parse(xhr.responseText);
            if (result["bool"]) {
              alert(result["mensaje"]);
              window.location.href = url;
            }else{
              alert(result["mensaje"]);
            }          
          } else {
            alert('No se enviaron datos!');
          }
        }        
      }
    }





    $(document).ready(function() {

      $('input').iCheck();

      //var t = $('#tablaitems').dataTable();

      $tablaitems = $('#tablaitems');

      $tablaitems.dataTable({
        searching: false,
        responsive: true,
        paging:   false,
        ordering: false,
        dom: '<"toolbar">frtip'
      });
      

      $("div.toolbar").html('<button onclick="removeritem()" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Remover item</button>');

    });
  </script>
  <!-- /bootstrap-daterangepicker -->


  <!-- Select2 -->
  <script>
    $(document).ready(function() {
      $("#mate_tipocomponente, #mate_tipomaterial_oid, #mate_tipomedida_oid, #mate_idfabricante, #mate_acabado").select2({
        allowClear: false
      });

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
