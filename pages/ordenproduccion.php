<?php  
//$lc = $misc->listarConceptos();
$arrCategoria = $misc->listarCategorias()->fetchAll(PDO::FETCH_ASSOC); // json_decode para Objetos se denife True, para Arreglos simples False.
$arrConceptos = $misc->listarCompuestos()->fetchAll(PDO::FETCH_ASSOC);



?>
	<div class="right_col" role="main">


    <div class="row">
      <div class="col-md-12 col-sm-4 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Orden de producción <small>Sessions</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form id="formordenproduccion" data-parsley-validate class="form-vertical form-label-left">

              <div class="row">
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="prov_identificacion">Identificación del tercero </label>
                  <div class="input-group">
                    <input type="text" id="prov_identificacion" name="prov_identificacion" required="required" class="form-control" placeholder="NIT/CC/NUIP">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-primary" title="Crear nuevo tercero"><i class="fa fa-plus"></i></button>
                    </span>
                  </div>
                  
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" for="prov_nombre">Nombre del tercero </label>
                  <input type="text" id="prov_nombre" name="prov_nombre" required="required" class="form-control" placeholder="NOMBRE PERSONA NATURAL O JURIDICA" readonly>
                </div>
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="pro_nombre_responsable">Responsable </label>
                  <input type="text" id="pro_nombre_responsable" name="pro_nombre_responsable" required="required" class="form-control" placeholder="NOMBRES Y APELLIDOS">
                </div>
              </div>              
              
              <h4>Conceptos de producción</h4>
              <div class="ln_solid"></div>

              <div class="row">
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="categoria">Categoria </label>
                  <select class="form-control" id="categoria" name="categoria" required="required" tabindex="-1">
                    <option></option>
                    <?php 
                      foreach ($arrCategoria as $value) {
                        echo '<option data-toggle="tooltip" title="'.$value['cat_descripcion'].'" value="'.$value['oid'].'">'. strtoupper($value['oid'].' - '.$value['cat_descripcion']).'</option>';
                      }
                     ?>
                  </select>
                </div>
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="conceptos">Concepto </label>
                  <select class="form-control" id="conceptos" name="conceptos" required="required" tabindex="-1">
                  </select>
                </div>                
                <div class="form-group col-md-1 col-sm-1 col-xs-12">
                  <label class="control-label" for="ancho">Ancho </label>
                  <input type="number" id="ancho" min="1" name="ancho" required="required" class="form-control" placeholder="CM">
                </div>
                <div class="form-group col-md-1 col-sm-1 col-xs-12">
                  <label class="control-label" for="alto">Alto </label>
                  <input type="number" id="alto" min="1" name="alto" required="required" class="form-control" placeholder="CM">
                </div>
                <div class="form-group col-md-1 col-sm-1 col-xs-12">
                  <label class="control-label" for="cantidad">Cantidad </label>
                  <input type="number" id="cantidad" min="1" name="cantidad" required="required" class="form-control" value="1" placeholder="UNIDAD">
                </div>
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="observacion">Observaciones </label>
                  <input type="text" id="observacion" name="observacion" required="required" class="form-control" placeholder="OBSERVACIONES">
                </div>
                
              </div>

              <div class="row">
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <button id="btnadd" type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Añadir</button>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="table-responsive">
                    <table id="tablaitems" class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>
                          <th><input type="checkbox" id="check-all" class="flat"></th>
                          <th>Cantidad </th>
                          <th>Codigo </th>
                          <th style="width: 60%;">Items </th>
                          <th>Dimensión <code>(Ancho:Alto)</code></th>
                        </tr>
                      </thead>

                      <tbody id="tbody">
                      </tbody>
                    </table>
                  </div>
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
      </div>
    </div>
  <div id="reloadscript"></div>
  <!-- jQuery -->
  <script src="../plugins/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
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

  <!-- Custom Theme Scripts -->
  <script src="../plugins/build/js/custom.min.js"></script>

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

    var $tablaitems;
    var globalArrOrdPro = [], esMedida = 0;
    var arrConceptos = <?php echo json_encode($arrConceptos, false);  ?>;
    var form = document.getElementById("formordenproduccion");


    document.title = document.title+" Orden de producción"; //set Titulo de la pagina
    var categoria = document.getElementById("categoria"); //Get selector categoria
    var indentificacion = document.getElementById("prov_identificacion");
    categoria.onchange = function() { setConcepto() }; //Evento al cambiar del selector de categoria.
    document.getElementById("btnadd").onclick = function(){ addItemTable() };
    form["btnclean"].onclick = function(){ window.location.reload(true); };
    document.getElementById("btnguardar").onclick = function(){ guardarOrden() };

    function setConcepto() { //Carga el selector de conceptos
      
      var html = '<option></option>';
      for (var i = 0; i < arrConceptos.length; i++) {
        if (arrConceptos[i]["com_categoria"] == categoria.options[categoria.selectedIndex].value) {
          html += '<option data-toggle="tooltip" title="'+arrConceptos[i]['com_descripcion']+'" value="'+arrConceptos[i]['oid']+'">'+arrConceptos[i]['com_codigo'].toUpperCase()+' - '+arrConceptos[i]['com_descripcion'].toUpperCase()+'</option>';          
        }
      }

      document.getElementById("conceptos").innerHTML = html;
      
    }

    // Función que realiza una busqueda por numero de indentificacion del proveedor y/o tercero.
    indentificacion.onblur = function(){  
      if (/^\s+/g.test(indentificacion.value) != true) { 
        if (indentificacion.value != "") {
          var xhr = new XMLHttpRequest();
          var formData = new FormData();

          formData.append("prov_identificacion", indentificacion.value);
          formData.append("data", "consultarproveedor");
          
          xhr.open("POST", "../data/data.php",false);
          xhr.send(formData);

          if (xhr.status == 200) {
            var result = JSON.parse(xhr.responseText);
            if (result["bool"] && result["data"] != false) {
              
              form["prov_nombre"].value = result["data"]["prov_nombre"];
              form["pro_nombre_responsable"].value = result["data"]["prov_otrosdatos"];
              //window.location.reload(true);
            }else{
              alert("Atención!\n\nNo existe ningun tercero con esa Identificación. Compruebe de nuevo.\nDe lo contrario registrelo.");
              form["prov_nombre"].value = "";
              form["pro_nombre_responsable"].value = "";
              form["prov_identificacion"].value = "";
            }

          } else {
            alert('No se enviaron datos!');
          }
        }
      }else{
        alert("Atención!\n\nEl Campo Identificación no es válido, compruebe de nuevo.");
        indentificacion.value = "";
      }
    };

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
      $("#categoria").select2().val(null).trigger('change.select2');
    }

    function addItemTable(){
      
      var categoria =  document.getElementById("categoria");
      var concepto = document.getElementById("conceptos");
      var item = (concepto.value != '' ? concepto.options[concepto.selectedIndex].text : null);
      var oid = (concepto.value != '' ? concepto.options[concepto.selectedIndex].value : null);
      var codigo = (concepto.value != '' ? item.split("-") : []);
      var cantidad = form["cantidad"].value;
      var ancho = (form["ancho"].value == "" ? null : form["ancho"].value );
      var alto = (form["alto"].value == "" ? null : form["alto"].value );
      var observacion = form["observacion"].value;

      if ( validarItem(categoria, concepto, cantidad, ancho, alto) ) {
      
        globalArrOrdPro.push({oid:oid, cantidad:cantidad, codigo:codigo[0], item:codigo[1], ancho:ancho, alto:alto, observacion:observacion});           

        funcionListarTabla();
        

        limpiarCampos(excluirCampos = ["prov_identificacion","prov_nombre","pro_nombre_responsable"],"formordenproduccion");
      }

    }

    function guardarOrden(){
      var prov_identificacion = document.getElementById("prov_identificacion").value;
      var pro_nombre_responsable = document.getElementById("pro_nombre_responsable").value;

      if (prov_identificacion != '' && pro_nombre_responsable != '') {
        if (globalArrOrdPro.length > 0) {
          
          var xhr = new XMLHttpRequest();
          var formData = new FormData();

          formData.append("globalArrOrdPro", JSON.stringify(globalArrOrdPro));
          formData.append("prov_nombre_responsable", pro_nombre_responsable);
          formData.append("prov_identificacion", prov_identificacion);
          formData.append("data", "guardarorden");
          
          xhr.open("POST", "../data/data.php",false);
          xhr.send(formData);

          if (xhr.status == 200) {
            /*
            var result = JSON.parse(xhr.responseText);
            if (result["bool"]) {
              alert(result["mensaje"]);
              window.location.reload(true);
            }else{
              alert(result["mensaje"]);
            }
            */
          } else {
            alert('No se enviaron datos!');
          }
        }else{
          alert("No hay ningun concepto en la orden.");
        }
      }else{
        alert("Campo Identificación o Nombre Responsable están vacios.");
      }
    }

    function funcionListarTabla() {

      var html = '';

        for (var i = 0; i < globalArrOrdPro.length; i++) {
   
          html += '<tr class="even pointer">';
          html += '<td class="a-center "><input type="checkbox" class="flat" name="table_records"></td>';
          html += '<td class="a-right a-right ">'+globalArrOrdPro[i]['cantidad']+'</td>';
          html += '<td class=" ">'+globalArrOrdPro[i]['codigo']+'</td>';
          html += '<td class=" ">'+globalArrOrdPro[i]['item']+' <small><code>'+globalArrOrdPro[i]['observacion']+'</code></small></td>';
          html += '<td class=" ">'+globalArrOrdPro[i]['ancho']+':'+globalArrOrdPro[i]['alto']+'</td>';
          html += '</tr>';
          
        }
          document.getElementById("tbody").innerHTML = html;
    }

    function validarItem(categoria, concepto, cantidad, ancho, alto) {
          
      if (categoria.value != "" && concepto.value != "" && cantidad.value != "") {
        for (var i = 0; i < arrConceptos.length; i++) {
          if (parseInt(arrConceptos[i]["oid"]) == parseInt(concepto.value)) {
            
            if (arrConceptos[i]["com_esmedible"] == 1) {
              if (ancho.value != '' && alto.value != "") {
                return true;
              }else{
                alert("Los campos Ancho y Alto son obligatorios!");
                return false;
              }
            }else{
              return true;
            }
                  
          }
        }
      }else{
        alert("Mensaje de validación!");
        return false;
      }
    }

    function removeritem(){
      var arrTbody = document.getElementById("tablaitems");
      var items = arrTbody.getElementsByTagName('input');

      var index = [];

      for (var i = 1; i < items.length; i++) {        
        if (items[i].type === "checkbox") {
          if (items[i].checked === false) {
            index.push(globalArrOrdPro[i-1]);
          }
        }   
      }

      globalArrOrdPro = index;
      funcionListarTabla();
    }




    $(document).ready(function() {

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
      $("#categoria").select2({
        placeholder: "SELECCIONE LA CATEGORÍA",
        allowClear: false
      });

      $("#conceptos").select2({
        placeholder: "SELECCIONE UN CONCEPTO",
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



