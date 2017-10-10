<?php  
$compuestos = $misc->listarCompuestos()->fetchAll(PDO::FETCH_ASSOC);

$arrEstado = json_decode('[{"id":"1","estado":"Confirmado","label":"success"},{"id":"2","estado":"Anulado","label":"warning"},{"id":"3","estado":"Registrado","label":"default"}]', true); // json_decode para Objetos se denife True, para Arreglos simples False.
$arrConceptos = json_decode('[{"oid":"1","codigo":"H2050A","concepto":"Ventana en hierro sistema 2050A","tipo":"Hierro","sistema":"2050A","categoria":"1","esmedida":"1"},{"oid":"2","codigo":"H10A","concepto":"Puerta en hierro sistema 10A","tipo":"Hierro","sistema":"10A","categoria":"2","esmedida":"1"},{"oid":"3","codigo":"H2050B","concepto":"Ventana en hierro sistema 2050B","tipo":"Hierro","sistema":"2050B","categoria":"1","esmedida":"1"},{"oid":"4","codigo":"CR33","concepto":"Chapa en hierro tipo L R33","tipo":"Hierro","sistema":"","categoria":"3","esmedida":"0"}]', true);



?>
	<div class="right_col" role="main">


    <div class="row">
      <div class="col-md-12 col-sm-4 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Productos y Servicios <small>Gestión</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <a href="?mod=cotizaciones&sub=compuestos" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Añadir Compuestos</a>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                  <table id="tablaproductos" class="table table-striped table-bordered bulk_action">
                    <thead>
                      <tr>
                        <th style="width:1%;"><input type="checkbox" id="check-all" class="flat"></th>
                        <th style="width:1%;">Referencia </th>
                        <th style="width:60%;">Descripcion </th>
                        <th style="width:1%;"></th>
                      </tr>
                    </thead>

                    <tbody id="tbody">
                      <?php  

                        foreach ($compuestos as $value) {
                          echo '
                                  <tr class="even pointer">
                                    <td class="a-center "><input type="checkbox" class="flat" name="table_records"></td>
                                    <td>'.strtoupper($value['com_codigo']).'</td>
                                    <td>'.strtoupper($value['com_descripcion']).'</td>
                                    <td><button type="button" class="btn btn-default btn-xs" data-id="'.$value['oid'].'" data-toggle="modal" data-target="#modalproductosservicios"><i class="fa fa-eye"></i> ver</button></td>
                                  </tr>
                          ';
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div id="modalproductosservicios" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"  data-keyboard="false" data-backdrop="static"  aria-labelledby="myLargeModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modal title</h4>
                  </div>
                  <div  class="modal-body">
                    <div id="modal-body" class="row">

                    </div>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
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

    document.title = document.title+" Ordenes de producción"; //set Titulo de la pagina



    $(document).ready(function() {

      $tablaitems = $('#tablaproductos');

      $tablaitems.dataTable({
        language : {
            search: "Buscar registro:",
            searchPlaceholder: "Search records",
            paginate: {
              first : "Primero",
              last: "Último",
              next: "Siguiente",
              previous: "Atrás"
            },
            zeroRecords: "No hay ningún registro.",
            info: "Visualizando _START_ a _END_ de _TOTAL_ registros"
        },
        responsive: true,
        ordering: false,
        lengthChange: false,
        
      });

      $('#modalproductosservicios').on('show.bs.modal', function (e) {
        // show.bs.modal = evento antes de abrir
        // shown.bs.modal = evento despues de abrir
        var arrProductos = <?php echo json_encode($misc->listarCompuestos()->fetchAll(PDO::FETCH_ASSOC),false); ?>;
        var id = $(e.relatedTarget).data("id");

        //console.log(arrProductos);

        for (var i = 0; i < arrProductos.length; i++) {
          var com_componentes = window.atob(arrProductos[i]["com_componentes"]);
          
          if (arrProductos[i]["oid"] == id) {
            document.getElementById("modal-body").innerHTML = "";
            for (var j in arrProductos[i]) {
              var input = document.createElement("INPUT");
              input.className = "form-control";
              input.value = arrProductos[i][j];

              var div = document.createElement("DIV");
              div.className = "form-group col-md-6 col-sm-6 col-xs-12";
              div.appendChild(input);

              document.getElementById("modal-body").appendChild(div);
              
              //console.log(arrProductos[i][j]);
            }
          }
        }
        /*
        var json;
        var formData = new FormData();
        formData.append("usuarioid",id);
        formData.append("consulta","usuarioid");

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "build/data.php",false);
        xhr.send(formData);
        json = JSON.parse(xhr.responseText);

        document.getElementById("editid").value = json['usrs_identificacion'];
        document.getElementById("editnombres").value = json['usrs_nombres'];
        document.getElementById("editrol").value = json['usrs_rol_modu'];
        document.getElementById("editcargo").value = json['usrs_cargo'];
        */
      });

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


  <!-- Autosize -->
  <script>
    $(document).ready(function() {
      autosize($('.resizable_textarea'));
    });
  </script>
  <!-- /Autosize -->



