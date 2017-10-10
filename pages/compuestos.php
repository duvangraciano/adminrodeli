<?php

$arrCategoria = $misc->listarCategorias()->fetchAll(PDO::FETCH_ASSOC); 
$arrLinea = $misc->listarTipoMaterial()->fetchAll(PDO::FETCH_ASSOC);
$arrComponente = $misc->listarComponentes()->fetchAll(PDO::FETCH_ASSOC);
$arrMPrima = $misc->listarMateriaPrima()->fetchAll(PDO::FETCH_ASSOC);

?>
	<div class="right_col" role="main">


    <div class="row">
      <div class="col-md-12 col-sm-4 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Elaboración del Compuesto <small>Nuevo</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form id="formcompuestos" data-parsley-validate class="form-vertical form-label-left">

              <div class="row">
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="com_codigo">Código </label>
                  <input type="text" id="com_codigo" name="com_codigo" required="required" class="form-control" placeholder="CÓDIGO DEL COMPUESTO" title="CÓDIGO DEL COMPUESTO">
                </div>

                <div class="form-group col-md-10 col-sm-10 col-xs-12">
                  <label class="control-label" for="com_descripcion">Nombre o descripción </label>
                  <input type="text" id="com_descripcion" name="com_descripcion" required="required" class="form-control" placeholder="NOMBRE O DESCRIPCIÓN DEL COMPUESTO" title="NOMBRE O DESCRIPCIÓN DEL COMPUESTO">
                </div>

              </div>

              <div class="row">
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="com_altominimo">Alto mínimo </label>
                  <input type="number" id="com_altominimo" min="1" name="com_altominimo" required="required"  class="form-control" placeholder="CM" title="ALTO MINIMO">
                  <code>Centímetros</code>
                </div>

                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="com_anchominimo">Ancho mínimo </label>
                  <input type="number" id="com_anchominimo" min="1" name="com_anchominimo" required="required"  class="form-control" placeholder="CM" title="ANCHO MINIMO">
                  <code>Centímetros</code>
                </div>

                <div class="form-group col-md-1 col-sm-1 col-xs-12">
                  <label class="control-label" for="com_esmedible">Es Medible? </label>
                  <select class="form-control" id="com_esmedible" name="com_esmedible" required="required">
                    <option value="0">NO</option>
                    <option value="1">SI</option>
                  </select>
                </div>

                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="com_imagen">Imagen del componente </label>
                  <input type="file" class="form-control" id="com_imagen" name="com_imagen">
                  <code>Subir archivo .jpg | .png  | .gif</code>
                </div>

                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="com_categoria">Categoria </label>
                  <select class="form-control" id="com_categoria" name="com_categoria" required="required" tabindex="-1" title="CATEGORÍA">
                    <?php 
                      echo '<option></option>';
                      foreach ($arrCategoria as $value) {
                        echo '<option data-toggle="tooltip" title="'.$value['cat_descripcion'].'" value="'.$value['oid'].'">'. strtoupper($value['oid'].' - '.$value['cat_descripcion']).'</option>';
                      }
                     ?>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="com_color">Acabado </label>
                  <select class="select2_multiple form-control" id="com_color" name="com_color" required="required" tabindex="-1" multiple="multiple" title="ACABADO">
                    <?php 
                      echo '<option value="1">ANOLOK</option>
                            <option value="2">CRUDO</option>
                            <option value="3">BLANCO</option>
                            <option value="4">GRIS PLATA</option>
                            <option value="5">NATURAL MATE</option>';
                      
                     ?>
                  </select>
                </div>

                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="com_iva">Iva % </label>
                  <input type="number" id="com_iva" min="1" name="com_iva" required="required"  class="form-control" placeholder="IVA" title="IVA">
                  <code>Número sin %</code>
                </div>

              </div>
              
              <h4>Conceptos de producción</h4>
              <div class="ln_solid"></div>

              <div class="row">
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="com_linea">Línea </label>
                  <select class="form-control" id="com_linea" name="com_linea">
                    <?php 
                      echo '<option></option>';
                      foreach ($arrLinea as $value) {
                        echo '<option data-toggle="tooltip" title="'.$value['tpma_descripcion'].'" value="'.$value['oid'].'">'. strtoupper($value['oid'].' - '.$value['tpma_descripcion']).'</option>';
                      }
                     ?>
                  </select>
                </div>              
              </div>

              <div class="row">
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="com_componente">Componente </label>
                  <select class="form-control" id="com_componente" name="com_componente" tabindex="-1" title="COMPONENTE">
                    <?php 
                      echo '<option></option>';
                      foreach ($arrComponente as $value) {
                        echo '<option data-toggle="tooltip" title="'.$value['cop_descripcion'].'" value="'.$value['oid'].'">'. strtoupper($value['oid'].' - '.$value['cop_descripcion']).'</option>';
                      }
                     ?>
                  </select>
                </div>
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="com_materiaprima">Elementos </label>
                  <select class="form-control" id="com_materiaprima" name="com_materiaprima"  tabindex="-1" title="ELEMENTOS">
                  <?php 
                    echo '<option></option>';
                    foreach ($arrMPrima as $value) {
                      $descripcion = $value['mate_referencia'].' - '.$value['mate_descripcion'].' '.$value['mate_acabado'];
                      echo '<option data-toggle="tooltip" title="'.$value['mate_descripcion'].'" value="'.$value['oid'].'">'. strtoupper($descripcion).'</option>';
                    }

                  ?>
                  </select>
                </div>

                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="com_factor">Factor diferencia </label>
                  <input type="number" id="com_factor"  name="com_factor"  class="form-control" value="0" placeholder="CM">
                  <code>Centímetros</code>
                </div>

                <div class="form-group col-md-1 col-sm-1 col-xs-12">
                  <label class="control-label" for="com_comppal">CompoPPAL </label>
                  <select class="form-control" id="com_comppal" name="com_comppal"  tabindex="-1" title="Componente Principal" disabled="disabled">
                    <option></option>
                    <option value="0">NO</option>
                    <option value="1">SI</option>
                  </select>
                </div>

                <div class="form-group col-md-2 col-sm-2 col-xs-12 col-md-offset-1 col-sm-offset-1">
                  <label class="control-label" for="com_costo">Costo $</label>
                  <input type="text" id="com_costo" name="com_costo"  class="form-control" placeholder="COSTO" title="COSTO">
                  <code>Unid/Metro Lineal</code>
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
                          <th>Codigo </th>
                          <th style="width: 50%;">Descripcion </th>
                          <th>Componente </th>
                          <th>Linea </th>
                          <th>Costo M.L </th>
                        </tr>
                      </thead>

                      <tbody id="tbody">
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row ">
                <div class="form-group  col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label " for="precio_1">Precio 1</label>
                  <input type="text" id="precio_1" name="precio_1"  class="form-control" placeholder="PRECIO 1" title="PRECIO 1">
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
  <script src="../plugins/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="../plugins/jszip/dist/jszip.min.js"></script>
  <script src="../plugins/pdfmake/build/pdfmake.min.js"></script>
  <script src="../plugins/pdfmake/build/vfs_fonts.js"></script>

  <script>
    document.title = document.title+" Orden de producción"; //set Titulo de la pagina

    var form = document.getElementById("formcompuestos");
    var globalArrCompo = [], esMedida = 0;
    
    //form["com_type"].innerHTML = listarTipos();
    form["com_materiaprima"].onchange = function(){ alcambiarmateriaprima() };
    form["com_componente"].onchange = function(){ listarmateriaprima() };
    form["btnadd"].onclick = function(){ addItemTable() };
    form["btnguardar"].onclick = function(){ guardar() };
    form["com_linea"].onchange = function(){ listarmateriaprima() };
    form["com_codigo"].onblur = function() { verificarcodigo() };
    form["btnclean"].onclick = function(){ window.location.reload(true); };



    function addItemTable(){
      
      var com_categoria = form["com_categoria"], oidcatego = com_categoria.options[com_categoria.selectedIndex];
      var com_linea = form["com_linea"], linea = com_linea.options[com_linea.selectedIndex];
      var com_componente = form["com_componente"], componente = com_componente.options[com_componente.selectedIndex];
      var com_materiaprima = form["com_materiaprima"], materiaprima = com_materiaprima.options[com_materiaprima.selectedIndex];
      var com_factor = form["com_factor"];
      var com_type = form["com_type"];
      var com_comppal = form["com_comppal"];
      var com_costo = form["com_costo"];
      var splitmp = materiaprima.text.split("-");


      if ( emptya(com_componente) && emptya(com_materiaprima) && emptya(com_costo) ) {

          var formData = new FormData();

          var item = {oid:materiaprima.value, codigo:splitmp[0], nommateprima:splitmp[1], linea:linea.value, nomlinea:linea.text, componente:componente.value, nomcomponente:componente.text, factor:com_factor.value, comppal:com_comppal.value, costo:com_costo.value, type:null};

      
        globalArrCompo.push(item);           

        funcionListarTabla();        

      }
    }

    function funcionListarTabla() {

      var html = '';

        for (var i = 0; i < globalArrCompo.length; i++) {
   
          html += '<tr class="even pointer">';
          html += '<td class="a-center "><input type="checkbox" class="flat" name="table_records"></td>';
          html += '<td class="a-right a-right ">'+globalArrCompo[i]['codigo']+'</td>';
          html += '<td class=" ">'+globalArrCompo[i]['nommateprima']+'</td>';
          html += '<td class=" ">'+globalArrCompo[i]['nomcomponente']+'</td>';
          html += '<td class=" ">'+globalArrCompo[i]['nomlinea']+'</td>';
          html += '<td class=" ">'+globalArrCompo[i]['costo']+'</td>';
          html += '</tr>';
          
        }
          document.getElementById("tbody").innerHTML = html;
          calularCostos();
    }

    function listarmateriaprima() {
      
      var materiaprima = <?php echo json_encode($misc->listarMateriaPrima()->fetchAll(PDO::FETCH_ASSOC),false) ; ?>;
      var mp = materiaprima, option = "<option></option>";
      
      var oid = form["com_linea"].options[form["com_linea"].selectedIndex].value;

      for (var i = 0; i < mp.length; i++) {

        if (form["com_componente"].value == "") {
          if (oid != "") {
            if (mp[i]["mate_tipomaterial_oid"] == oid) {
              var descripcion = mp[i]["mate_referencia"]+" - "+mp[i]["mate_descripcion"]+" "+mp[i]["mate_acabado"];
              option += "<option value=\""+mp[i]["oid"]+"\">"+descripcion+"</option>";
            }            
          }else{
            var descripcion = mp[i]["mate_referencia"]+" - "+mp[i]["mate_descripcion"]+" "+mp[i]["mate_acabado"];
              option += "<option value=\""+mp[i]["oid"]+"\">"+descripcion+"</option>";
          }
        }else{
          
          if (mp[i]["mate_tipocomponente"] == form["com_componente"].value) {

            var descripcion = mp[i]["mate_referencia"]+" - "+mp[i]["mate_descripcion"]+" "+mp[i]["mate_acabado"];
            option += "<option value=\""+mp[i]["oid"]+"\">"+descripcion+"</option>";
          }
        }
                
      }
      form["com_materiaprima"].innerHTML = option;
      form["com_factor"].value = "";
      form["com_comppal"].value = "";
      form["com_costo"].value = "";
    }

    function calularCostos() {
      var formData = new FormData();

      formData.append("com_categoria", form["com_categoria"].value);
      formData.append("com_codigo", form["com_codigo"].value);
      formData.append("globalArrCompo", JSON.stringify(globalArrCompo));
      formData.append("data", "calcularcostos");

      var xhr = new XMLHttpRequest();
      xhr.open("POST", "../data/data.php",false);
      xhr.send(formData);

      if (xhr.status == 200) {
        form["precio_1"].value = xhr.responseText;
        /*
        var result = JSON.parse(xhr.responseText);
        if (result["bool"]) {
          alert(result["mensaje"]);
          //window.location.reload(true);
        }else{
          alert(result["mensaje"]);
        }
        */
      } else {
        alert('No se enviaron datos!');
      }
    }

    function listarTipos() {
      var html = '<option></option><option value="a">TIPO A</option><option value="b">TIPO B</option><option value="c">TIPO C</option><option value="d">TIPO D</option><option value="e">TIPO E</option>';

      return html;
    }

    function alcambiarmateriaprima(){
      var arrMPrima = <?php echo json_encode($arrMPrima);  ?>;
      for (var i = 0; i < arrMPrima.length; i++) {

        if (arrMPrima[i]["oid"] == form["com_materiaprima"].value) {
          form["com_costo"].value = arrMPrima[i]["mate_costocompra"];
          form["com_comppal"].value = arrMPrima[i]["mate_proppal"];
        }

      }
    }


    function removeritem(){
      var arrTbody = document.getElementById("tablaitems");
      var items = arrTbody.getElementsByTagName('input');

      var index = [];

      for (var i = 1; i < items.length; i++) {        
        if (items[i].type === "checkbox") {
          if (items[i].checked === false) {
            index.push(globalArrCompo[i-1]);
          }
        }   
      }

      globalArrCompo = index;
      funcionListarTabla();
    }


    function guardar(){

      var c=0;
      for(var i =0; i < form.length ; i++){
        
        if (form[i].required === true) {          
          if (emptya(form[i])) {
            c++;
            if (c >= 8) {
              if (globalArrCompo.length > 0) {

                var formData = new FormData(form);

                formData.append("globalArrCompo", JSON.stringify(globalArrCompo));
                formData.append("data", "guardarcompuesto");

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "../data/data.php",false);
                xhr.send(formData);

                if (xhr.status == 200) {
                  var result = JSON.parse(xhr.responseText);
                  if (result["bool"]) {
                    alert(result["mensaje"]);
                    window.location.reload(true);
                  }else{
                    alert(result["mensaje"]);
                  }

                } else {
                  alert('No se enviaron datos!');
                }


                break;
              }else{
                alert("No se puede guardar el compuesto porque no existe ningún elemento añadido.");
                break;
              }
            }
            
          }else{
            break;
          }
        }
      }

    }

    function verificarcodigo() {
      if ( form["com_codigo"].value != "" ) {
        if ( emptya(form["com_codigo"]) ) {
          var codigo = form["com_codigo"].value;

          var formData = new FormData();

          formData.append("com_codigo", codigo);
          formData.append("data", "consultarcodigo");

          var xhr = new XMLHttpRequest();
          xhr.open("POST", "../data/data.php",false);
          xhr.send(formData);

          if (xhr.status == 200) {
            var result = JSON.parse(xhr.responseText);
            if (result["bool"]) {
              if (result["rowcount"] > 0) {
                alert("El Código digitado ya existe.\nDigite otro código.");
                form["com_codigo"].value = "";
              }
            }else{
              alert(result["mensaje"]);
            }

          } else {
            alert('No se enviaron datos!');
          }

        }else{
          form["com_codigo"].value = "";
        }
      }
    }

    function emptya(arrElem){
      if (/^\s+/g.test(arrElem.value) === false) {
        if (arrElem.value !== "") {
          return true;
        }else{
          alert("El Campo "+arrElem.title+" no puede estar vacio.");
          return false;
        }
        
      }else{
        alert("El Campo "+arrElem.title+" contiene carácteres no válidos.");
        return false;
      }
    }

    function empty(string){
      if (/^\s+/g.test(string) === false) {
        if (string !== "") {
          return true;
        }else{
          alert("El Campo no puede estar vacio.");
          return false;
        }
        
      }else{
        alert("El Campo contiene carácteres no válidos.");
        return false;
      }
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
      $("#categoria, #com_categoria").select2({
        placeholder: "SELECCIONE LA CATEGORÍA",
        allowClear: false
      });

      $("#com_componente").select2({
        placeholder: "SELECCIONE UN COMPONENTE",
        allowClear: true
      });

      $("#com_materiaprima").select2({
        placeholder: "SELECCIONE UN ELEMENTO",
        allowClear: true
      });

      $("#com_linea").select2({
        placeholder: "TODOS",
        allowClear: true
      });

      $("#com_type").select2({
        placeholder: "TIPO CUADRADO",
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



