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
            <h2>Ventas <small>Nuevo</small></h2>
            <span class="pull-right"><a class="btn btn-info btn-sm"><i class="fa fa-calendar"></i> <strong id="datetime"></strong></a> Vendedor: <?php echo $user['usu_nombres'].' '.$user['usu_apellidos']; ?></span>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form id="formventa" data-parsley-validate class="form-vertical form-label-left">
              <div class="row">
                <div class="col-md-12">
                  
                </div>
              </div>
              
              <div class="row">
                <div class="form-group has-feedback col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="usu_identificacion">Num. Identificación </label>
                  <div class="controls">
                    <div class="input-prepend input-group">
                      <input type="text" id="usu_identificacion" name="usu_identificacion" required="required" class="form-control" placeholder="CC/NIT" title="Número identificación">
                      <span class="add-on input-group-addon btn btn-info" onclick="alert('clic')" title="Crear Nuevo Cliente"><i class="fa fa-plus"></i></span>
                    </div>
                  </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="usu_nombres">__ </label>
                  <input type="text" id="usu_nombres" class="form-control" placeholder="NOMBRES COMPLETOS" disabled>
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="usu_apellidos">__ </label>
                  <input type="text" id="usu_apellidos" class="form-control" placeholder="TELEFONOS" disabled>
                </div>
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="usu_apellidos">__ </label>
                  <input type="text" id="usu_apellidos" class="form-control" placeholder="DIR. DOMICILIO" disabled>
                </div>
              </div>
              
              <div class="row">
                
              </div>



              <div class="row">
                
              </div>
              
              <hr>
              <div class="row">
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="buscar">Buscar... </label>
                  <select class="form-control" id="buscar" required="required" data-allow-clear="true" data-placeholder="SELECCIONE UN PRODUCTO" tabindex="-1" style="width: 100%" >
                    <option></option>
                    <?php                      

                      foreach ($_rol as $value) {
                        echo '<option value="'.$value['oid'].'">'.mb_strtoupper($value['rol_nombre'], 'UTF-8').'</option>';
                      }

                    ?>
                  </select>
                </div>
                <div class="form-group col-md-3 col-sm-4 col-xs-12 ">
                  <label class="control-label" for="usu_id">Descripción </label>
                  <input type="text" id="descripcion" required="required" class="form-control" placeholder="" title="" disabled>
                </div>
                <div class="form-group col-md-1 col-sm-1 col-xs-12">
                  <label class="control-label" for="usu_pass">stock: </label>
                  <input type="text" id="stock" required="required" class="form-control" placeholder="" title="" disabled>
                </div>
                <div class="form-group col-md-1 col-sm-1 col-xs-12">
                  <label class="control-label" for="pass">cantidad: </label>
                  <input type="number" id="cantidad" required="required" class="form-control" placeholder="" title="">
                </div>
                <div class="form-group col-md-1 col-sm-1 col-xs-12 col-md-offset">
                  <label class="control-label" for="usu_estado">_ </label>
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
                            <th>Iva (19%)</th>
                            <td id="iva">$</td>
                          </tr>
                          <tr>
                            <th>Descuento:</th>
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
    
    var form = document.getElementById("formventa"); //Get
    var url = "?mod=facturacion&sub=nuevaventa";
    var get_oid = null;
    var additem = [];
    document.onload = function(){ load_data();  };
    setInterval(function(){document.getElementById("datetime").innerHTML = getTimestamp() },1000);
    form["btnclean"].onclick = function(){ window.location.href = "?mod=facturacion&sub=nuevaventa"; };
    form["btnguardar"].onclick = function(){ guardar(); };
    form["buscar"].onchange = function(){ set_campodescripcion(this.value); }
    //form["usu_identificacion"].onblur = function(){ verificarDuplicados(this,"tbl_usuarios","usu_identificacion"); };
    form["btnAdd"].onclick = function(){ add_item(); };
    form["descuento_value"].onblur = function(){ recalcular_totales(); };
    //form["pass"].onblur = function(){ validarContrasena(this); };

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
      var arr = send_xhr(null,{type_xhr:"get_result_all",table:"tbl_materiaprima"});
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
      console.log(localStorage.getItem("add_item"));
    }
    
    function set_campodescripcion(value){
      //$("#buscar").select2().val(2).trigger("change");
      var productos = JSON.parse(localStorage.getItem("productos"));
      
      for(var i in productos){
        
        if(productos[i]["oid"] == value){
          form["descripcion"].value = productos[i]["mate_descripcion"].toUpperCase();
          form["stock"].value = productos[i]["mate_existencias"];
        }
      }
    }
    
    function add_item(){
      var productos = JSON.parse(localStorage.getItem("productos"));
      
      for(var i in productos){
        if(productos[i]["oid"] == form["buscar"].value){
          var precio = parseFloat(productos[i]["mate_costocompra"]).toFixed( 2 );
          var ganancia = parseFloat(productos[i]["mate_ganancia1"]).toFixed( 2 );
          var medida = parseFloat(productos[i]["mate_unidadmedida"]).toFixed( 2 );
          var cantidad = parseFloat(form["cantidad"].value).toFixed( 2 );
          var subtotal =  ((precio*(1+(ganancia/100)))/medida)*cantidad ;
          additem.push({"oid":productos[i]["oid"],"desc":form["descripcion"].value,"cant":cantidad,"subtotal":subtotal});
        }
      }
      
      localStorage.setItem("add_item",JSON.stringify(additem));
      actualizar_tabla();
      clear_();
    }
    
    function recalcular_totales(){
      var descuento_value = parseFloat(document.getElementById("descuento_value").value);
      var subtotal = 0;
      for(var i in additem){
        subtotal = parseFloat(additem[i]["subtotal"])+subtotal;
      }
      var iva = (subtotal>0?(subtotal*1.19)-subtotal:0);
      var descuento = ( isNaN(descuento_value)?0:descuento_value);
      var total = (subtotal+iva)-descuento;
      document.getElementById("total").innerHTML = "$"+new Intl.NumberFormat("en-UK").format( total.toFixed( 0 ) );
      document.getElementById("iva").innerHTML = "$"+new Intl.NumberFormat("en-UK").format( iva );
      document.getElementById("subtotal").innerHTML = "$"+new Intl.NumberFormat("en-UK").format( subtotal );
      document.getElementById("descuento_value").value =  descuento_value ;
    }
    
    function clear_(){
      listar_productos();
      form["descripcion"].value = "";
      form["stock"].value = "";
      form["cantidad"].value = "";
    }
    
    function actualizar_tabla(){
      var tbody = '';
      for(var i in additem){
        tbody += '<tr><td>'+additem[i]["oid"]+'</td><td>'+additem[i]["desc"]+'</td><td>'+additem[i]["cant"]+'</td><td>$'+new Intl.NumberFormat("en-UK").format(additem[i]["subtotal"])+'</td><td><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></td></tr>';
      }
      document.getElementById("tbody").innerHTML = tbody;
      recalcular_totales();
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



