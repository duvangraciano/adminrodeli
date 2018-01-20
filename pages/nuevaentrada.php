<?php

if (session_status() != PHP_SESSION_NONE) {
if (isset($pu['agregar_editar_entrada_almacen'])) {

//$lc = $misc->listarConceptos();
$arrCategoria = $misc->listarCategorias()->fetchAll(PDO::FETCH_ASSOC); // json_decode para Objetos se denife True, para Arreglos simples False.
$arrConceptos = $misc->listarCompuestos()->fetchAll(PDO::FETCH_ASSOC);

$arrTdocumentos = json_decode(base64_decode($misc->consultaDesplegables('tipos_documentos')->fetch(PDO::FETCH_ASSOC)['des_data']),true);
$arrTmovimientos = json_decode(base64_decode($misc->consultaDesplegables('tipos_movimientos')->fetch(PDO::FETCH_ASSOC)['des_data']),true);

?>
	<div class="right_col" role="main">


    <div class="row">
      <div class="col-md-12 col-sm-4 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Entrada de almacén <small>Nuevo</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form id="formnuevaentrada" data-parsley-validate class="form-vertical form-label-left">

              <div class="row">
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="enal_date_documento">Fecha documento </label>
                  <input id="enal_date_documento" type="text" class="form-control fecha" name="enal_date_documento" placeholder="DD-MM-YYYY" title="Fecha documento" required>
                </div>
                <div class="form-group col-md-2 col-sm-2 col-md-offset-6 col-xs-12">
                  <label class="control-label" for="enal_tipo_documento">Tipo Documento </label>
                  <select class="form-control" id="enal_tipo_documento" data-placeholder="SELECCIONE" name="enal_tipo_documento"  tabindex="-1" title="Tipo documento" required>
                    <option></option>
                    <?php foreach ($arrTdocumentos as $val) {
                            echo '<option value="'.$val['oid'].'">'.strtoupper($val['descripcion']).'</option>';
                    } ?>
                  </select>
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="enal_num_documento">No. Documento </label>
                  <input id="enal_num_documento" type="text" class="form-control" name="enal_num_documento" placeholder="" title="Número documento" required>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="enal_id_tercero"><small>Identificador</small> </label>
                  <div class="input-group">
                    <input type="text" id="enal_id_tercero" name="enal_id_tercero" class="form-control" placeholder="NIT/CC/NUIP" title="Identificador" required>
                    <span class="input-group-btn">
                        <a href="?mod=cotizaciones&sub=tercero" target="_Blank"  type="button" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                    </span>
                  </div>                  
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" for="tercero"><small>Proveedor</small> </label>
                  <input type="text" id="tercero" class="form-control" placeholder="" readonly>
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="enal_tipo_movimiento">Tipo movimiento </label>
                  <select class="form-control" id="enal_tipo_movimiento" data-placeholder="SELECCIONE" name="enal_tipo_movimiento" title="Tipo movimiento"  tabindex="-1" required>
                    <option></option>
                    <?php foreach ($arrTmovimientos as $val) {
                            echo '<option value="'.$val['oid'].'">'.strtoupper($val['descripcion']).'</option>';
                    } ?>
                  </select>
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="">Total Factura </label>
                  <input type="number" id="total_factura" min="1" name="enal_total" class="form-control" value="0"  placeholder="Total Factura" required>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-8 col-sm-8 col-xs-12">
                  <textarea id="enal_observaciones" name="enal_observaciones" class="form-control" placeholder="OBSERVACIONES"></textarea>
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="">Total Descuentos</label>
                  <input type="number" id="total_descuentos" min="1" name="enal_descuentos" class="form-control" value="0" placeholder="Total Descuentos" required>
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="">Total Iva </label>
                  <input type="number" id="total_iva" min="1" name="enal_iva" class="form-control" value="0" placeholder="Total Iva">
                </div>
              </div>              
              
              <hr>

              <div class="row">
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="concepto">Producto/Concepto </label>
                  <select class="form-control" id="concepto" name="" tabindex="-1" data-placeholder="SELECCIONAR">
                    <option></option>
                  </select>
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="">Unidad Medida </label>
                  <input type="text" id="unidad_medida" class="form-control"  placeholder="Unidad Medida" readonly>
                </div>              
                <div class="form-group col-md-1 col-sm-1 col-xs-12">
                  <label class="control-label" for="">Cantidad </label>
                  <input type="number" id="cantidad" min="1" name="" class="form-control"  placeholder="Cantidad">
                </div>                

                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="">Total neto </label>
                  <input type="number" id="total_neto" min="1" name="" class="form-control"  placeholder="Total Neto">
                </div>
              </div>
 
              <div class="row">
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="observaciones" name="" class="form-control"  placeholder="OBSERVACIONES">
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <input type="number" id="costo_unitario" min="1" class="form-control"  placeholder="Costo Unitario" disabled>
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <input type="number" id="valor_total" min="1" class="form-control"  placeholder="Valor Total" disabled>
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <button id="btnadd" type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Añadir</button>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="table-responsive">
                    <button onclick="removeritem()" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Remover</button>
                    <table id="tablaitems" class="table table-striped table-bordered bulk_action" style="width: 100%">
                      <thead>
                        <tr>
                          <th><input type="checkbox" id="check-all" class="flat"></th>                          
                          <th>Codigo </th>
                          <th style="width: 60%;">Producto/Concepto </th>
                          <th>Cantidad </th>
                          <th>Costo_Unitario </th>
                          <th>Subtotal </th>
                        </tr>
                      </thead>

                      <tbody id="tbody">
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="4"></td>
                          <td>SUBTOTAL: $</td>
                          <td id="subtotal">0</td>
                        </tr>
                      </tfoot>
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

  <!-- FastClick -->
  <script src="../plugins/fastclick/lib/fastclick.js"></script>
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

    var tablaitems, subtotal = 0;
    var arrConcepto = [];
    var arrItems = [], esMedida = 0;
    var form = document.getElementById("formnuevaentrada");
    var tercero = document.getElementById("enal_id_tercero");
    var url = "?mod=almacen&sub=nuevaentrada";
    var consecutivo = genConsecutivo();
    
    document.title = document.title+" Orden de producción"; //set Titulo de la pagina
    document.getElementById("total_iva").onchange = function(){ recalcularTotalItem(); };
    document.getElementById("total_neto").onchange = function(){ recalcularTotalItem(); };
    document.getElementById("cantidad").onchange = function(){ recalcularTotalItem(); };
    $("#concepto").on("select2:open", function (e) { listar_conceptos(); });
    $("#concepto").on("select2:select", function (e) { setUnidadMedida(e.params.data); });
    
    document.getElementById("btnadd").onclick = function(){ addItemTable() };
    form["btnclean"].onclick = function(){ window.location.reload(true); };
    document.getElementById("btnguardar").onclick = function(){ guardar() };
    
    function Abrir_ventana (pagina) {
      var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=508, height=365, top=85, left=140";
      window.open(pagina,"",opciones);
    }

    function recalcularTotalItem(){
      var total_neto = parseFloat(document.getElementById("total_neto").value);
      var cantidad = parseFloat(document.getElementById("cantidad").value);
      
      document.getElementById("valor_total").value = total_neto;
      document.getElementById("costo_unitario").value = (total_neto/cantidad ).toFixed(2);
    }
    
    function validar_total_factura(){
      var descuentos = form["total_descuentos"].value;
      var total = parseFloat(form["total_factura"].value).toFixed(2);
      var iva = form["total_iva"].value;
      var subtotal = sessionStorage.getItem("subtotal_factura");
      var total_items = ((parseFloat(subtotal)+parseFloat(iva))-parseFloat(descuentos)).toFixed(2);
      console.log(total_items);
      
      if( total_items == total){
        return true;
      }else{
        notify('Advertencia!','Los valores totales no coinciden, con la relación de items. Verifique por favor.','warning');
        return false;
      }
      
      
    }

    function setUnidadMedida(value) {
      var data = value;
      var getData = arrConcepto.find(x => x.oid === data.id);
      
      var um = send_xhr(null,{type_xhr:"get_result_one",table:"tbl_tipomedidas",key:"oid",value:getData["mate_tipomedida_oid"],key_return:null});
      document.getElementById("unidad_medida").value = um["data"]["tpme_descripcion"];
    }
    


    // Función que realiza una busqueda por numero de indentificacion del proveedor y/o tercero.
    tercero.onblur = function(){  
      if (/^\s+/g.test(tercero.value) != true) { 
        if (tercero.value != "") {
          var xhr = new XMLHttpRequest();
          var formData = new FormData();

          formData.append("prov_identificacion", tercero.value);
          formData.append("data", "consultarproveedor");
          
          xhr.open("POST", "../data/data.php",false);
          xhr.send(formData);

          if (xhr.status == 200) {
            var result = JSON.parse(xhr.responseText);
            if (result["bool"] && result["data"] != false) {
              document.getElementById("tercero").value = result["data"]["prov_nombre"];
            }else{
              alert("Atención!\n\nNo existe ningun tercero con esa Identificación. Compruebe de nuevo.\nDe lo contrario registrelo.");
              tercero.value = "";
              document.getElementById("tercero").value = "";
            }

          } else {
            alert('No se enviaron datos!');
          }
        }
      }else{
        alert("Atención!\n\nEl Campo Identificación no es válido, compruebe de nuevo.");
        tercero.value = "";
        document.getElementById("tercero").value = "";
      }
    };
    
    function listar_conceptos(){
      var xhr = new XMLHttpRequest();
      var formData = new FormData();

      formData.append("data", "get_materiaprima");
      
      xhr.open("POST", "../data/data.php",false);
      xhr.send(formData);

      if (xhr.status == 200) {
        var result = JSON.parse(xhr.responseText);
        
        arrConcepto = result;
        var op = '<option></option>';
        for(var i in result){
          op += '<option value="'+result[i]['oid']+'">'+result[i]['mate_referencia']+' - '+result[i]['mate_descripcion'].toUpperCase()+'</option>'
        }
        document.getElementById("concepto").innerHTML = op;

      } else {
        alert('No se enviaron datos!');
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

    function limpiarCampos(arrValues){
      for(var i in arrValues){
        if(arrValues[i].tagName == "SELECT"){
          $("#"+arrValues[i].id).select2().val(null).trigger('change.select2');
        }else if(arrValues[i].tagName == "INPUT"){
          document.getElementById(arrValues[i].id).value = "";
        }
      }
    }

    function addItemTable(){
      
      var concepto =  document.getElementById("concepto");
      var unidad_medida = document.getElementById("unidad_medida");
      var cantidad = document.getElementById("cantidad");
      var total_neto = document.getElementById("total_neto");
      var valor_total = document.getElementById("valor_total");
      var costo_unitario = document.getElementById("costo_unitario");
      var observaciones = document.getElementById("observaciones");
      var textConcepto = (concepto.value != '' ? concepto.options[concepto.selectedIndex].text.split("-") : []);
      var valConcepto = (concepto.value != '' ? concepto.options[concepto.selectedIndex].value : null);

      if ( validarItem([concepto, cantidad, total_neto, valor_total, costo_unitario]) ) {
      
        arrItems.push({
                    oid:valConcepto,
                    codigo:textConcepto[0],
                    concepto:textConcepto[1],
                    umedida:unidad_medida.value,
                    cantidad:(cantidad.value == ""?0:parseFloat(cantidad.value)),
                    totalneto:(total_neto.value == ""?0:parseFloat(total_neto.value)),
                    costounitario:(costo_unitario.value == ""?0:parseFloat(costo_unitario.value)),
                    valortotal:(valor_total.value == ""?0:parseFloat(valor_total.value)),
                    observaciones:observaciones.value,
                  });

        //calularCostos();
        funcionListarTabla();

        limpiarCampos([concepto,unidad_medida,cantidad,total_neto,valor_total,costo_unitario,observaciones]);
      }

    }
    
    function genConsecutivo(){
      var now = Date.now();
      var base64 = window.btoa(now);
      
      return base64;
    }
 
    function guardar(){
      
      if ( validarform() && arrItems.length > 0 && validar_total_factura()) {
        var arr = send_xhr(form,{items:JSON.stringify(arrItems),enal_consecutivo:consecutivo,enal_subtotal:sessionStorage.getItem("subtotal_factura"),type_xhr:"set_form",fn:"guardar_entrada_almacen"});
        
        if (arr["bool"]) {
            console.log(arr["data"]);
            notify('Mensaje!','La operación fue realizada satisfactoriamente.','success');
            var confimar = confirm("Desea imprimir el comprobante de entrada?");
            
            if(confimar){
              Abrir_ventana('/pages/imprimir.php?f=comproentrada&d='+ consecutivo );
              window.setTimeout( window.location.href = url , 3000);                    
            }else{
              window.location.href = url;
            }

          
        }else{
          notify('Error!',arr["mensaje"],'error');
        }
        
      }else{
        notify('Advertencia!','No se puede procesar la información, puede que tenga items vacios!','warning');
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
    
    function countInputs(){
      var c = 0;
      for (var i = 0; i < form.length; i++) {
        if (form[i].attributes["title"]) {
          c++;
        }
      }
      return c;
    }
    
    function funcionListarTabla() {
      subtotal = 0;
      var html = '';

        for (var i = 0; i < arrItems.length; i++) {
          var observaciones = (arrItems[i]['observaciones'] == ""? "":"<code>"+arrItems[i]['observaciones']+"</code>");
          html += '<tr class="even pointer">';
          html += '<td class="a-center "><input type="checkbox" class="flat" name="table_records"></td>';          
          html += '<td class=" ">'+arrItems[i]['codigo']+'</td>';
          html += '<td class=" ">'+arrItems[i]['concepto']+' <small>'+observaciones+'</small></td>';
          html += '<td class=" ">'+arrItems[i]['cantidad']+'</td>';
          html += '<td class="a-right a-right ">'+arrItems[i]['costounitario']+'</td>';
          html += '<td class="a-right a-right ">'+arrItems[i]['valortotal']+'</td>';
          html += '</tr>';
          
          subtotal = arrItems[i]['valortotal']+subtotal;
          sessionStorage.setItem("subtotal_factura", subtotal);
          
        }
          document.getElementById("tbody").innerHTML = html;
          document.getElementById("subtotal").innerHTML = subtotal;
          //asociarItem();
    }

    
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

    function removeritem(){
      var arrTbody = document.getElementById("tablaitems");
      var items = arrTbody.getElementsByTagName('input');
      
      var index = [];

      for (var i = 1; i < items.length; i++) {        
        if (items[i].type === "checkbox") {
          if (items[i].checked === false) {
            index.push(arrItems[i-1]);
          }
        }   
      }

      arrItems = index;
      funcionListarTabla();
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

      $tablaitems = $('#tablaitems');

      $tablaitems.dataTable({
        searching: false,
        responsive: true,
        paging:   false,
        ordering: false
      });
      

    });
  </script>
  <!-- /bootstrap-daterangepicker -->


  <!-- Select2 -->
  <script>
    $(document).ready(function() {
      $('#').tooltip({
        placement : "top",
        title : function placeholder(){ return this.placeholder }
      });
      
      
      $("select").select2();
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

      $("#asociar_item").select2({
        placeholder: "SELECCIONAR",
        allowClear: true
      });

      $(".select2_group").select2({});
      $(".select2_multiple").select2({
        maximumSelectionLength: 4,
        placeholder: "With Max Selection limit 4",
        allowClear: true
      });
      
      $('.fecha').daterangepicker({
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
  <!-- /Select2 -->




<?php 
}else{
  $html_negate =  '<div style="padding: 100px 0px 50px 0px;" class="right_col" role="main">';
  $html_negate .= '<center><h1><i class="fa fa-warning"></i>Usted no tiene permisos para ver esta sessión!</h1></center></div>';
  echo $html_negate;
}
}

?>
