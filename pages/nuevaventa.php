<?php  

if (session_status() != PHP_SESSION_NONE) {
if (isset($pu['agregar_venta'])) {
  
$get_all = $misc->get_all('tbl_roles');
$_rol = ($get_all['bool']?$get_all['data']:array());
$fac = unserialize($cfg['data']['conf_facturacion']);

?>
	<div class="right_col" role="main">


    <div class="row">
      <div class="col-md-12 col-sm-4 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Ventas <small>Nuevo</small></h2>
            <span class="pull-right"><a class="btn btn-info btn-sm"><i class="fa fa-calendar"></i> <strong id="datetime"></strong></a> Vendedor: <?php echo $user['usu_nombres'].' '.$user['usu_apellidos']; ?></span>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form id="formventa" class="form-vertical form-label-left">
              <div class="row">
                <div class="form-group col-md-2 col-sm-2 col-xs-12  pull-right">
                  <input type="text" id="_oid" class="form-control" placeholder="FACTURA No." disabled>
                </div>
              </div>
              
              <div class="row">
                <div class="form-group has-feedback col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="prov_identificacion">Num. Identificación </label>
                  <div class="controls">
                    <div class="input-prepend input-group">
                      <input type="text" id="prov_identificacion" name="prov_identificacion" required="required" class="form-control" placeholder="CC/NIT" title="Número identificación">
                      <span class="add-on input-group-addon btn btn-info" onclick="alert('clic')" title="Crear Nuevo Cliente"><i class="fa fa-plus"></i></span>
                    </div>
                  </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="nombres">__ </label>
                  <input type="text" id="nombres" class="form-control" placeholder="NOMBRE CLIENTE" disabled>
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="telefonos">__ </label>
                  <input type="text" id="telefonos" class="form-control" placeholder="TELEFONOS" disabled>
                </div>
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="domicilio">__ </label>
                  <input type="text" id="domicilio" class="form-control" placeholder="DIR. DOMICILIO" disabled>
                </div>
              </div>
              
              <div class="row">
                
              </div>




              
              <hr>
              <div class="row">
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <select class="form-control" id="tipo_busqueda" required="required" data-allow-clear="false" style="width: 100%" >
                    <option value="productos">Productos</option>
                    <option value="ordenes">Órdenes</option>
                  </select>
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <select class="form-control" id="tipo_precio" required="required" data-allow-clear="false" style="width: 100%" >
                    <option value="mate_ganancia1">Precio 1</option>
                    <option value="mate_ganancia2">Precio 2</option>
                    <option value="mate_ganancia3">Precio 3</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="">Buscar... </label>
                  <select class="form-control" id="buscar" required="required" data-allow-clear="false" data-placeholder="SELECCIONE UN PRODUCTO" tabindex="-1" style="width: 100%" >
                    <option></option>
                  </select>
                </div>
                <div class="form-group col-md-3 col-sm-4 col-xs-12 ">
                  <label class="control-label" for="">Descripción </label>
                  <input type="text" id="descripcion" required="required" class="form-control" placeholder=""  disabled>
                </div>
                <div class="form-group col-md-1 col-sm-1 col-xs-12">
                  <label class="control-label" for="">stock: </label>
                  <input type="text" id="stock" required="required" class="form-control" placeholder="" disabled>
                </div>
                <div class="form-group col-md-1 col-sm-1 col-xs-12">
                  <label class="control-label" for="">precio: </label>
                  <input type="text" id="precio" required="required" class="form-control" placeholder="" disabled>
                </div>
                <div class="form-group col-md-1 col-sm-1 col-xs-12">
                  <label class="control-label" for="">cantidad: </label>
                  <input type="number" id="cantidad" required="required" class="form-control" value="0" placeholder="" >
                </div>
                <div class="form-group col-md-1 col-sm-1 col-xs-12 col-md-offset">
                  <label class="control-label" for="">_ </label>
                  <button id="btnAdd" type="button" class="btn btn-info form-control"><i class="fa fa-plus"></i> Añadir</button>
                </div>
              </div> 
              <div class="row">

                  <!-- accepted payments column -->
                  <div class="col-xs-9 col-md-9">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Codigo</th>
                          <th style="width: 59%">Descripción</th>
                          <th>Cantidad</th>
                          <th>Subtotal</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody id="tbody"></tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                  <div class="col-xs-3 col-md-3">
                    <p class="lead">Total venta</p>
                    <div class="table-responsive">
                      <table class="table">
                        <tbody>
                          <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td id="subtotal">$</td>
                          </tr>
                          <tr>
                            <th>Iva (<?php echo $fac['iva_factura']; ?>%)</th>
                            <td id="iva">$</td>
                          </tr>
                          <tr>
                            <th>Descuento: $</th>
                            <td id="descuento"><input type="number" id="descuento_value" style="width:100%;" type="text"/></td>
                          </tr>
                          <tr>
                            <th class="h3">Total:</th>
                            <td id="total" class="h3">$</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- /.col -->

              </div>
              <hr>


              <div class="row">
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <button id="btnguardar" type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false"><i class="fa fa-check"></i> Procesar venta</button>
                  <button id="btnguardar" type="button" class="btn btn-primary pull-left"><i class="fa fa-save"></i> Guardar</button>
                  <button id="btnclean" type="button" class="btn btn-default pull-left"><i class="fa fa-times"></i> Cancelar</button>
                </div>
              </div>
            </form>
            
            <!-- Modal -->
            <div id="myModal" class="modal fade"  role="dialog"> <!-- class="modal fade" -->
              <div class="modal-dialog modal-lg"> <!-- class="modal-dialog" -->
            
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                    <h4 class="modal-title col-md-8">Procesar venta</h4>
                    <h2  class="modal-title col-md-4 pull-right">Total Factura: $<span id="lbtotalfactura"></span></h2>
                  </div>
                  <div class="modal-body">
                    <form id="form_modalidadventa" class="form-horizontal">
                      <div class="row">
                        <div class="col-md-12">
  
                        </div>                      
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="radio">
                            <label ><input type="radio" name="optventa" id="optcontado" checked="checked">Ventas de contado</label>
                          </div>
                          </br>
                          <div class="form-group row ">
                            <label for="" class="col-sm-2 col-form-label text-right">Cheques: </label>
                            <div class="col-sm-3">
                              <input type="number" id="cheques" onchange="procesar_venta_contado(this)" class="form-control input-sm" id="" value="0">
                            </div>
                            
                          </div>
                          <div class="form-group row ">
                            <label for="" class="col-sm-2 col-form-label text-right">Vía Electrónica: </label>
                            <div class="col-sm-3">
                              <input type="number" id="viaelectronica" onchange="procesar_venta_contado(this)" class="form-control input-sm" id="" value="0">
                            </div>
                          </div>
                          <div class="form-group row ">
                            <label for="" class="col-sm-2 col-form-label  text-right">Efectivo: </label>
                            <div class="col-sm-3">
                              <input type="number" id="efectivo" onchange="procesar_venta_contado(this)" class="form-control input-sm" id="" value="0">
                            </div>
                            <label for="" class="col-sm-2 col-sm-offset-1 col-form-label text-right">Total pagar: </label>
                            <div class="col-sm-2">
                              <input type="text" id="totalpagar" class="form-control input-sm" id="" value="0" disabled>
                            </div>
                            <div class="col-sm-2">
                              <input type="text" id="devolucion" class="form-control input-sm" id="" placeholder="DEVOLUCION" disabled>
                            </div>
                          </div>
                        </div>                      
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="radio">
                            <label ><input type="radio" name="optventa" id="optcredito">Ventas a crédito</label>
                          </div>
                          </br>
                          <div class="form-group row ">
                            <label for="" class="col-sm-2 col-form-label text-right">Días de vencimiento: </label>
                            <div class="col-sm-1">
                              <input type="number" id="diasvencimiento" class="form-control input-sm" id="" value="15" >
                            </div>
                            <div class="col-sm-2">
                              <input type="text" id="fechavencimiento" class="form-control input-sm" id="" value="00/00/0000" disabled>
                            </div>
                            <label for="" class="col-sm-2 col-form-label col-sm-offset text-right">Cliente: </label>
                            <div class="col-sm-5">
                              <input type="text" id="cliente"  class="form-control input-sm" id="" Placeholder="NOMBRE CLIENTE" disabled>
                            </div>
                          </div>
                        </div>                      
                      </div>
                      <!--
                      <hr>
                      <div class="row">
                        <div class="col-md-12">
                          <fieldset>
                            <label for="" class="col-sm-2 col-form-label text-right">Días de vencimiento: </label>
                            <input type="checkbox" name="animal" value="Cat" /> Cats 
                            <input type="checkbox" name="animal" value="Dog" /> Dogs
                            <input type="checkbox" name="animal" value="Bird" /> Birds

                          </fieldset>
                        </div>                      
                      </div>
                      -->
                    </form>  
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-reply"></i> Volver</button>
                    <button type="button" onclick="procesar_venta()" class="btn btn-success pull-right"><i class="fa fa-check"></i> Confirmar</button>
                  </div>
                </div>
            
              </div>
            </div>
            <!-- Modal -->
            
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
  
    document.title = document.title+" Ventas"; //set Titulo de la pagina
    
    var form = document.getElementById("formventa"), //Get
        form_ = document.getElementById("form_modalidadventa");
    var url = "?mod=facturacion&sub=nuevaventa";
    var get_oid = null;
    var additem = [], tempitem = [], saldos = {};
    var fact = send_xhr(null,{type_xhr:"get_result_one",table:"tbl_configuracion",key:"oid",value:"1",key_return:null});
    document.onload = function(){ load_data(); };
    
    setInterval(function(){document.getElementById("datetime").innerHTML = getTimestamp() },1000);
    form["btnclean"].onclick = function(){ window.location.href = "?mod=facturacion&sub=nuevaventa"; };
    form["btnguardar"].onclick = function(){ guardar(); };
    form["buscar"].onchange = function(){ set_campodescripcion(this.value); }
    form["tipo_busqueda"].onchange = function(){ set_buscar(this.value); }
    form["prov_identificacion"].onblur = function(){ get_tercero(this); };
    form["btnAdd"].onclick = function(){ add_item(); };
    form["descuento_value"].onblur = function(){ recalcular_totales(); };
    
    form_["diasvencimiento"].onchange = function(){ if(this.value <= 0){ this.value = 1; alert("Los días de vencimiento no puede ser 0!"); } set_fechavencimiento(this); }
    
    sessionStorage.setItem("total","0");
    
    function Abrir_ventana (pagina) {
      var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=508, height=365, top=85, left=140";
      window.open(pagina,"",opciones);
    }

    function getTimestamp() {
        var currentdate = new Date(); 
        var datetime = " " + currentdate.getDate() + "/"
                        + (currentdate.getMonth()+1)  + "/" 
                        + currentdate.getFullYear() + " @ "  
                        + currentdate.getHours() + ":"  
                        + currentdate.getMinutes() + ":" 
                        + currentdate.getSeconds();
        return datetime;
    }
    
    listar_productos();
    function listar_productos(){
      var arr = send_xhr(null,{precio:form["tipo_precio"].value,type_xhr:"get_result_all",table:"tbl_materiaprima"});
      localStorage.setItem("productos", JSON.stringify(arr["data"]));
      if (arr["data"]) {
        var result = arr["data"];
        
        arrConcepto = result;
        var op = '<option></option>';
        for(var i in result){
          op += '<option value="'+result[i]['oid']+'">'+result[i]['mate_referencia']+' - '+result[i]['mate_descripcion'].toUpperCase()+'</option>';
        }
        document.getElementById("buscar").innerHTML = op;

      } else {
        alert('No se enviaron datos!');
      }
      
    }
    
    function set_campodescripcion(value){
      
      var productos = JSON.parse(localStorage.getItem("productos"));
      
      for(var i in productos){
        if(productos[i]["oid"] == value){
          tempitem = {i_des:productos[i]["mate_descripcion"].toUpperCase(),i_stk:productos[i]["mate_existencias"],i_pre:productos[i]["mate_costocompra"]};
          form["descripcion"].value = tempitem["i_des"];
          form["stock"].value = tempitem["i_stk"];
          form["precio"].value = tempitem["i_pre"];
        }
      }
    }
    
    set_fechavencimiento(document.getElementById("diasvencimiento"));
    function set_fechavencimiento(param){
      var d = new Date();
      d.setDate(d.getDate() + parseInt(param.value));
      var fecha = " " + d.getDate() + "/"
                        + (d.getMonth()+1)  + "/" 
                        + d.getFullYear();
      sessionStorage.setItem("fechavencimiento",fecha);
      document.getElementById("fechavencimiento").value = fecha;
    }
    
    function set_buscar(val){
      
      if(val == "productos"){
        listar_productos();
      }
      
      if(val == "ordenes"){
        
      }
    }
    
    function validar_additem(){
      if(tempitem["i_des"] && tempitem["i_stk"] && tempitem["i_pre"] && form["cantidad"].value){
          if(parseFloat(tempitem["i_stk"]) > 0){
            if(parseFloat(form["cantidad"].value) > 0){
              if(parseFloat(tempitem["i_stk"]) >= parseFloat(form["cantidad"].value) && parseFloat(form["cantidad"].value) <= parseFloat(tempitem["i_stk"]) ){
                console.log("true");
                return true;
              }else{
                console.log("La cantidad no puede ser mayor al stock!");
                notify('Advertencia!','La cantidad no puede ser mayor al stock!','warning');
                return false;
              }              
            }else{
              console.log("La cantidad no puede ser menor de 0!");
              notify('Advertencia!','La cantidad no puede ser menor de 0!','warning');
              return false;
            }
          }else{
            console.log("No hay existencias");
            notify('Advertencia!','No hay existencias!','warning');
            return false;
          }
      }else{
        //return false;
        console.log("Campos vacios");
        notify('Advertencia!','Hay campos vacios','warning');
        return false;
      }
    }
    
    function remove_item(index){
      if(index !== ""){
        additem.splice(index, 1);
        actualizar_tabla();
        recalcular_totales();
      }
    }
    
    function add_item(){
      if(validar_additem()){
        var productos = JSON.parse(localStorage.getItem("productos"));
        
        for(var i in productos){
          if(productos[i]["oid"] == form["buscar"].value){
            var precio = parseFloat(productos[i]["mate_costocompra"]).toFixed( 2 );
            var ganancia = parseFloat(productos[i][form["tipo_precio"].value]).toFixed( 2 );
            var medida = parseFloat(productos[i]["mate_unidadmedida"]).toFixed( 2 );
            var cantidad = parseFloat(form["cantidad"].value).toFixed( 2 );
            var subtotal =  ((precio*(1+(ganancia/100)))/medida)*cantidad ;
            additem.push({"oid":productos[i]["oid"],"cod":productos[i]["mate_referencia"],"desc":form["descripcion"].value,"cant":cantidad,"subtotal":subtotal});
          }
        }
        
        localStorage.setItem("add_item",JSON.stringify(additem));
        actualizar_tabla();
        clear_();        
      }
    }
    
    function recalcular_totales(){
      var descuento_value = parseFloat(document.getElementById("descuento_value").value);
      var subtotal = 0;
      for(var i in additem){
        subtotal = parseFloat(additem[i]["subtotal"])+subtotal;
      }
      // var tax = (parseInt(fac["data"]["conf_facturacion"]));
      var iva = (subtotal>0?(subtotal*1.19)-subtotal:0);
      var descuento = ( isNaN(descuento_value)?0:descuento_value);
      var total = (subtotal+iva)-descuento;
      sessionStorage.setItem("total",total);
      saldos = {total:total,subtotal:subtotal,iva:iva,descuento:descuento};
      document.getElementById("total").innerHTML = "$"+new Intl.NumberFormat("en-UK").format( total.toFixed( 0 ) );
      document.getElementById("iva").innerHTML = "$"+new Intl.NumberFormat("en-UK").format( iva );
      document.getElementById("subtotal").innerHTML = "$"+new Intl.NumberFormat("en-UK").format( subtotal );
      document.getElementById("descuento_value").value =  descuento_value ;
    }
    
    function clear_(){
      
      listar_productos();
      form["descripcion"].value = "";
      form["stock"].value = "";
      form["cantidad"].value = "0";
      form["precio"].value = "";
    }
    
    function actualizar_tabla(){
      var tbody = '', c_i=0;
      for(var i in additem){
        tbody += '<tr><td>'+additem[i]["cod"]+'</td><td>'+additem[i]["desc"]+'</td><td>'+additem[i]["cant"]+'</td><td>$'+new Intl.NumberFormat("en-UK").format(additem[i]["subtotal"])+'</td><td><button onclick="remove_item('+c_i+')" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></td></tr>';
        c_i++;
      }
      document.getElementById("tbody").innerHTML = tbody;
      recalcular_totales();
    }
    
    function get_tercero(param){
      var val = param.value;
      if(val !== ""){
        if (/^\s+$|\W/g.test(val) !== true) {
          
          var arr = send_xhr(null,{type_xhr:"get_result_one",table:"tbl_proveedores",key:"prov_identificacion",value:val,key_return:null});
          
          if(arr["data"]){
            
            form["nombres"].value = arr["data"]["prov_nombre"];
            form["telefonos"].value = arr["data"]["prov_telfijo"]+" "+arr["data"]["prov_telcelular"];
            form["domicilio"].value = arr["data"]["prov_direccion"];
          }else{
            notify('Advertencia!','No hay ninguna información con esa identificación. Comprueba de nuevo.','warning');
            param.value = "";
            param.focus();
            form["nombres"].value = "";
            form["telefonos"].value = "";
            form["domicilio"].value = "";
          }
        }else{
          notify('Advertencia!','El campo '+param.title+' contiene carácteres inválidos.\nSolo se permiten números.','warning');
          param.value = "";
          param.focus();
          form["nombres"].value = "";
          form["telefonos"].value = "";
          form["domicilio"].value = "";
        }        
      }else{
        form["nombres"].value = "";
        form["telefonos"].value = "";
        form["domicilio"].value = "";
      }
    }
    
    function get_modal(){
      if(true){
        var total_factura = parseFloat(sessionStorage.getItem("total")).toFixed(0);
        
        document.getElementById("lbtotalfactura").innerHTML = new Intl.NumberFormat("en-UK").format( total_factura );
        form_["cliente"].value = form["prov_identificacion"].value+" - "+form["nombres"].value.toUpperCase();
      }
    }
    
    function procesar_venta(){
      var arrval;
      if(form_["optcontado"].checked){
        arrval = {
            "total_cheques":form_["cheques"].value,
            "total_efectivo":form_["efectivo"].value,
            "total_viaelectronica":form_["viaelectronica"].value
        };
        guardar_venta_contado(arrval);
      }else if(form_["optcredito"].checked){
        arrval = {
            "diasvencimiento":form_["diasvencimiento"].value,
            "fechavencimiento":form_["fechavencimiento"].value
        };
        guardar_venta_credito(arrval);
      }
    }
    
    function sumar_valores_contado(){
      var suma = (parseFloat(form_["cheques"].value)+parseFloat(form_["viaelectronica"].value)+parseFloat(form_["efectivo"].value));
      var total = parseFloat(sessionStorage.getItem("total"));
      if( suma >= total ){
        if(total > 1){
          return true;
        }else{
          notify('Advertencia!','No hay ningún producto registrado en la factura de venta!','warning');
          return false;
        }
      }else{
        notify('Advertencia!','No ha ingresado un valor de pago de factura válido!','warning');
        return false;
      }
    }
    
    function procesar_venta_contado(param){
      var val = param.value,
          cheques = parseFloat(form_["cheques"].value),
          viaelectronica = parseFloat(form_["viaelectronica"].value),
          efectivo = parseFloat(form_["efectivo"].value);
      var suma = (cheques + viaelectronica + efectivo)*1;
      form_["totalpagar"].value = suma.toFixed(0);
      form_["devolucion"].value = (suma-parseFloat(sessionStorage.getItem("total"))).toFixed(0);
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
    
    
    
    
    function guardar_venta_contado(arrval){
      
      if ( sumar_valores_contado() ) {
        var pago = {cheques:parseFloat(form_["cheques"].value),electronica:parseFloat(form_["viaelectronica"].value),efectivo:parseFloat(form_["efectivo"].value),devolucion:parseFloat(form_["devolucion"].value) };
        var arr = send_xhr(null,{items:JSON.stringify(additem),saldos:JSON.stringify(saldos),pago:JSON.stringify(pago),type_xhr:"set_form",fn:"guardar_venta_contado"});
        
        if (arr["bool"]) {
          if(form_["optcontado"].checked ){
            notify('Mensaje!','La operación fue realizada satisfactoriamente.','success');
            var confimar = confirm("Desea imprimir la factura?");
            if(confimar){
              Abrir_ventana('?mod=facturacion&sub=nuevaventa');
              window.location.href = url;                    
            }else{
              window.location.href = url;
            }

          }
        }else{
          notify('Error!',arr["mensaje"],'error');
        }
        
      }
      
    }

    function guardar_venta_credito(arrval){
      
      if ( validarform() ) {
        var arr = send_xhr(form,{items:JSON.stringify(additem),saldos:JSON.stringify(saldos),dv:form_["diasvencimiento"].value,fv:form_["fechavencimiento"].value,type_xhr:"set_form",fn:"guardar_venta_credito"});
        
        if (arr["bool"]) {
          if(form_["diasvencimiento"].value !== "" && form_["fechavencimiento"].value !== "" && form_["cliente"].value !== "" && form_["optcredito"].checked ){
            notify('Mensaje!','La operación fue realizada satisfactoriamente.','success');
            var confimar = confirm("Desea imprimir la factura?");
            
            if(confimar){
              Abrir_ventana('?mod=facturacion&sub=nuevaventa');
              window.location.href = url;                    
            }else{
              window.location.href = url;
            }

          }
        }else{
          notify('Error!',arr["mensaje"],'error');
        }
        
      }
      
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
    
    $(document).ready(function(){
      $('#myModal').on('show.bs.modal', function (e) {
        get_modal();
        
      });
    });
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



