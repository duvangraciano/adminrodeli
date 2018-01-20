<?php
session_start();
  
date_default_timezone_set('America/Bogota');
// include autoloader
require_once '../plugins/dompdf/autoload.inc.php';
include_once '../class/class.miscelanea.php';
include_once '../class/class.database.php';

$db = new Database();
$con = $db->conexion();
$misc = new Miscelanea($con);
// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

$cfg = $_SESSION['cfg'];
$empresa = unserialize($cfg['data']['conf_empresa']);
$app = unserialize($cfg['data']['conf_app']);
$user = $_SESSION['login'];



$options = new Options();
$options->set('defaultFont', 'helvetica');
$options->set('isHtml5ParserEnabled', true);

// instantiate and use the dompdf class
$dompdf = new Dompdf($options);

if(isset($_GET['f']) && $_GET['f'] == 'factura'){

$data = json_decode(base64_decode($_GET['d']), true);

$tbody = '';
$tfoot = '';
if(is_array($data)){
  foreach ($data['items'] as $v) {
    $tbody .= ' <tr>
                  <td>'.$v['cod'].' '.urldecode($v['desc']).'</td>
                  <td class="text-right">'.$v['cant'].'</td>
                  <td class="text-right">$'.number_format((float)$v['valorunitario'], 2, '.', ',').'</td>
                  <td class="text-right">$'.number_format((float)$v['subtotal'], 2, '.', ',').'</td>
                </tr>';
  }
  
  $tfoot = '<tr>
              <td rowspan="4" colspan="2"></td>
              <td class="text-right">SUBTOTAL : </td>
              <td class="text-right">$'.number_format((float)$data['subtotal'], 2, '.', ',').'</td>
            </tr>
            <tr>
              <td class="text-right">IVA : </td>
              <td class="text-right">$'.number_format((float)$data['iva'], 2, '.', ',').'</td>
            </tr>
            <tr>
              <td class="text-right">DESCUENTOS : </td>
              <td class="text-right">$'.number_format((float)$data['descuento'], 2, '.', ',').'</td>
            </tr>
            <tr>
              <td class="text-right"><b>TOTAL :</b> </td>
              <td class="text-right"><b>$'.number_format((float)$data['total'], 2, '.', ',').'</b></td>
            </tr>';
}


$html = '
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <!-- Bootstrap -->
    <link href="../plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <style type="text/css">
      th {
        padding: 3px 0px 3px 0px;
      }
      
      .table-t1 th{
        border-bottom: 1px solid #ddd;
      }
      
      .table-t1 td{
        border-bottom: 1px solid #ddd;
      }
    </style>
  </head>
  <body style="font-family: sans-serif; padding: 5px 10px 50px 10px;">
    <section class="">
      <div class="row">
        <div class="col-md-12">
          <table style="line-height: 90%; width:100%">
            <tr>
              <td style="width:20%">
                <center>
                  <img src="'.$empresa['logo_empresa'].'" alt="'.$empresa['nombre_empresa'].'" title="'.$empresa['nombre_empresa'].' - '.$empresa['slogan_empresa'].'"/>
                </center>
              </td>
              <td style="width:50%">
                <center>
                  <h4>'.$empresa['razon_empresa'].'</h4>
                  <h4>NIT: '.$empresa['nit_empresa'].'</h4>
                  <p>'.$empresa['dir_empresa'].'</br>
                  '.$empresa['tel_empresa'].'</p>
                </center>
              </td>
              <td style="width:30%">
                
                <center>
                  <strong>FACTURA DE VENTA No. 000000000</strong></br>
                  <small>DIAN Resolución No. 000000000000000</br>
                  Fecha expedición Año / Mes / Día</br>
                  Numeración del X al X</small>
                </center>                  
                
              </td>
            </tr>
          </table>
          
          </br>
          
          <table style="width:100%; border-style: solid;">
            <tr>
              <td><b>CLIENTE: </b></td>
              <td style="width:40%;">'.$data['cliente']['nombres'].'</td>
              <td><b>FECHA FACTURA: </b></td>
              <td>'.date('d/m/Y_H:i:s').'</td>
            </tr>
            <tr>
              <td><b>CC/NIT: </b></td>
              <td>'.$data['cliente']['prov_identificacion'].'</td>
              <td><b>FECHA VENCIMIENTO: </b></td>
              <td>'.($data['forma_pago'] == 'CREDITO' ? $data['cliente']['fechavencimiento'].' a '.$data['cliente']['diasvencimiento'].' Días.' : date('d/m/Y') ).'</td>
            </tr>
            <tr>
              <td><b>DIRECCIÓN: </b></td>
              <td>'.$data['cliente']['domicilio'].'</td>
              <td><b>FORMA DE PAGO: </b></td>
              <td>'.$data['forma_pago'].'</td>
            </tr>
            <tr>
              <td><b>CIUDAD: </b></td>
              <td>'.$data['cliente']['ciudad'].'</td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td><b>TELÉFONOS: </b></td>
              <td>'.$data['cliente']['telefonos'].'</td>
              <td></td>
              <td></td>
            </tr>
          </table>
        </div>
      </div>
      
      </br>
      
      <div class="row">
        <div class="col-md-12">
          <center>
            <table style="width: 100%;" class="table-t1">
              <thead  style="background-color: #e4e4e4;">
                <tr>
                  <th class="text-center" style="width:60%">DESCRIPCIÓN</th>
                  <th class="text-right" style="width:10%">CANTIDAD</th>
                  <th class="text-right" style="width:15%">Vr. UNITARIO</th>
                  <th class="text-right" style="width:15%">Vr. TOTAL</th>
                </tr>
              </thead>
              <tbody>
                '.$tbody.'
              </tbody>
                '.$tfoot.'
              <tfoot>
              </tfoot>
            </table>      
          </center>
        </div>
      </div>
      
      
    </section>
  </body>
  <script>
    var toPrint;
    toPrint = window.print();
    window.close();
  </script>
</html>
';

$dompdf->loadHtml($html);
//$dompdf->loadHtml(utf8_decode($html));
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');


// Render the HTML as PDF
//$dompdf->render();

// Output the generated PDF to Browser
//$dompdf->stream('FV0000000');

}elseif(isset($_GET['f']) && $_GET['f'] == 'comproentrada') {
  $data = $misc->get_one('tbl_entradaalmacen',null,'enal_consecutivo',$_GET['d'])['data'];
  $tercero = $misc->get_one('tbl_proveedores',null,'prov_identificacion',$data['enal_id_tercero'])['data'];
  $elaboro = $misc->get_one('tbl_usuarios',null,'oid',$data['enal_usuario_id'])['data'];

  foreach (unserialize($data['enal_data_items']) as $v) {
    $tbody1 .= ' <tr>
                  <td>'.$v['codigo'].' '.urldecode($v['concepto']).'</td>
                  <td class="text-right">'.$v['cantidad'].' <small>'.$v['umedida'].'(s)</small></td>
                  <td class="text-right">$'.number_format((float)$v['costounitario'], 2, '.', ',').'</td>
                  <td class="text-right">$'.number_format((float)$v['valortotal'], 2, '.', ',').'</td>
                </tr>';
  }
  
  
  $html = '
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="UTF-8">
      
      <link href="../plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      
      <link href="../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <style type="text/css">
        th {
          padding: 3px 0px 3px 0px;
        }
        
        .table-t1 th{
          border-bottom: 1px solid #ddd;
        }
        
        .table-t1 td{
          border-bottom: 1px solid #ddd;
        }
      </style>
    </head>
    <body style="font-family: sans-serif; padding: 5px 10px 50px 10px;">
      <section class="">
        <div class="row">
          <div class="col-md-12">
            <table style="line-height: 100%; width:100%">
              <tr>
                <td style="width:20%">
                <center>
                  <img src="'.$empresa['logo_empresa'].'" alt="'.$empresa['nombre_empresa'].'" title="'.$empresa['nombre_empresa'].' - '.$empresa['slogan_empresa'].'"/>
                </center>
              </td>
              <td style="width:50%">
                <center>
                  <h4>'.$empresa['razon_empresa'].'</h4>
                  <h4>NIT: '.$empresa['nit_empresa'].'</h4>
                  <p>'.$empresa['dir_empresa'].'</br>
                  '.$empresa['tel_empresa'].'</p>
                </center>
              </td>
                <td style="width:30%">
                  
                  <center>
                    <strong>ENTRADA DE ALMACEN</strong>
                    <p>'.$data['oid'].'</p>
                    <p><b>FECHA/HORA:</b> '.$data['enal_datecreate'].'</p>
                  </center>                  
                  
                </td>
              </tr>
            </table>
            
            </br>
            
            <table style="width:100%; border-style: solid;">
              <tr>
                <td><b>PROVEEDOR: </b></td>
                <td>'.mb_strtoupper($tercero['prov_nombre'],'utf-8').'</td>
                <td><b>FECHA DOCUMENTO: </b></td>
                <td>'.date_format(date_create($data['enal_date_documento']),'d/m/Y').'</td>
              </tr>
              <tr>
                <td><b>CC/NIT: </b></td>
                <td>'.$data['enal_id_tercero'].'</td>
                <td><b>DOCUMENTO No.: </b></td>
                <td>'.$data['enal_num_documento'].'</td>
              </tr>
              <tr>
                <td><b>DIRECCIÓN: </b></td>
                <td>'.mb_strtoupper($tercero['prov_direccion'],'utf-8').'</td>
                <td><b>TIPO DOCUMENTO: </b></td>
                <td>FACTURA</td>
              </tr>
              <tr>
                <td><b>TELÉFONOS: </b></td>
                <td>'.mb_strtoupper($tercero['prov_telfijo'].' '.$tercero['prov_telcelular'],'utf-8').'</td>
                <td><b>ESTADO: </b></td>
                <td>'.($data['enal_estado'] = 1 ? 'CONFIRMADO' : '').'</td>
              </tr>
            </table>
          </div>
        </div>
        
        </br>
        
        <div class="row">
          <div class="col-md-12">
            <center>
              <table style="width: 100%;" class="table-t1">
                <thead  style="background-color: #e4e4e4;">
                  <tr>
                    <th class="text-center" style="width:60%">DESCRIPCIÓN</th>
                    <th class="text-center" style="width:10%">CANTIDAD</th>
                    <th class="text-center" style="width:15%">Vr. UNITARIO</th>
                    <th class="text-center" style="width:15%">Vr. TOTAL</th>
                  </tr>
                </thead>
                <tbody>
                  '.$tbody1.'
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="3" class="text-right">Subtotal:</td>
                    <td class="text-right">$'.number_format((float)$data['enal_subtotal'], 2, '.', ',').'</td>
                  </tr>
                  <tr>
                    <td colspan="3" class="text-right">Iva:</td>
                    <td class="text-right">$'.number_format((float)$data['enal_iva'], 2, '.', ',').'</td>
                  </tr>
                  <tr>
                    <td colspan="3" class="text-right">Descuento:</td>
                    <td class="text-right">$'.number_format((float)$data['enal_descuentos'], 2, '.', ',').'</td>
                  </tr>
                  <tr>
                    <td colspan="3" class="text-right"><strong>TOTAL:</strong></td>
                    <td class="text-right"><strong>$'.number_format((float)$data['enal_total'], 2, '.', ',').'</strong></td>
                  </tr>
                </tfoot>
              </table>
              
              
            </center>
            </br>
            <p><strong>OBSERVACIONES: </strong></br>'.mb_strtoupper($data['enal_observaciones'],'utf-8').'</p>
            </br></br>
            <p><strong>Elaboró: </strong>'.$elaboro['usu_nombres'].' '.$elaboro['usu_apellidos'].'</p>
          </div>
        </div>
        
      </section>
    </body>
  </html>
  ';
}

?>
<!--
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    
    <link href="../plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <style type="text/css">
      th {
        padding: 3px 0px 3px 0px;
      }
      
      .table-t1 th{
        border-bottom: 1px solid #ddd;
      }
      
      .table-t1 td{
        border-bottom: 1px solid #ddd;
      }
    </style>
  </head>
  <body style="font-family: sans-serif; padding: 5px 10px 50px 10px;">
    <section class="">
      <div class="row">
        <div class="col-md-12">
          <table style="line-height: 100%; width:100%">
            <tr>
              <td style="width:20%">
                <center>
                  <h3>{Logo}</h3>
                </center>
              </td>
              <td style="width:50%">
                <center>
                  <h4>NOMBRE RAZON SOCIAL</br>Nit_0000000000</h4>
                  <p>Dirección de la razón social</br>
                  Teléfonos y ciudad</p>
                </center>
              </td>
              <td style="width:30%">
                
                <center>
                  <strong>ENTRADA DE ALMACEN</strong>
                  <p>000000000</p>
                  <p><b>FECHA/HORA:</b> 00-00-0000 00:00:00</p>
                </center>                  
                
              </td>
            </tr>
          </table>
          
          </br>
          
          <table style="width:100%; border-style: solid;">
            <tr>
              <td><b>PROVEEDOR: </b></td>
              <td>NOMBRE DE CLIENTE MUY LARGO PERO LARGO CONTINUO</td>
              <td><b>FECHA DOCUMENTO: </b></td>
              <td>DD/MM/AAAA</td>
            </tr>
            <tr>
              <td><b>CC/NIT: </b></td>
              <td>0000000000</td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td><b>DIRECCIÓN: </b></td>
              <td>DIRECCION DEL DOMICILIO</td>
              <td><b>TIPO DOCUMENTO: </b></td>
              <td>FACTURA</td>
            </tr>
            <tr>
              <td><b>CIUDAD: </b></td>
              <td>CIUDAD DOMICILIO</td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td><b>TELÉFONOS: </b></td>
              <td>0000000 0000000000</td>
              <td></td>
              <td></td>
            </tr>
          </table>
        </div>
      </div>
      
      </br>
      
      <div class="row">
        <div class="col-md-12">
          <center>
            <table style="width: 100%;" class="table-t1">
              <thead  style="background-color: #e4e4e4;">
                <tr>
                  <th class="text-center" style="width:60%">DESCRIPCIÓN</th>
                  <th class="text-center" style="width:10%">CANTIDAD</th>
                  <th class="text-center" style="width:15%">Vr. UNITARIO</th>
                  <th class="text-center" style="width:15%">Vr. TOTAL</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>F1 COL1</td>
                  <td class="text-right">F1 COL2</td>
                  <td class="text-right">F1 COL3</td>
                  <td class="text-right">F1 COL3</td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="3" class="text-right">Subtotal:</td>
                  <td class="text-right">$</td>
                </tr>
                <tr>
                  <td colspan="3" class="text-right">Iva:</td>
                  <td class="text-right">$</td>
                </tr>
                <tr>
                  <td colspan="3" class="text-right">Descuento:</td>
                  <td class="text-right">$</td>
                </tr>
                <tr>
                  <td colspan="3" class="text-right"><strong>TOTAL:</strong></td>
                  <td class="text-right"><strong>$</strong></td>
                </tr>
              </tfoot>
            </table>
            
            
          </center>
          </br>
          </br>
          <p><strong>Elaboró: </strong>EMPLEADO 1</p>
        </div>
      </div>
      
    </section>
  </body>
</html>
-->

<?php
echo $html;
echo base64_decode('W3sib2lkIjoiNSIsImNvZGlnbyI6IlU3OEdQICIsIm5vbW1hdGVwcmltYSI6IiBNYXJjbyBwdWVydGEgMyB4IDEgY29uIHBlc3Rhw7FhIEdyaXMgcGxhdGEiLCJsaW5lYSI6IiIsIm5vbWxpbmVhIjoiIiwiY29tcG9uZW50ZSI6IjkiLCJub21jb21wb25lbnRlIjoiOSAtIE1BUkNPIFBVRVJUQSIsImZhY3RvciI6IjAiLCJjb21wcGFsIjoiMCIsImNvc3RvIjoiNDgwNjAiLCJ0eXBlIjoiIn0seyJvaWQiOiI0IiwiY29kaWdvIjoiVDEwM0IgIiwibm9tbWF0ZXByaW1hIjoiIFJFVEFOR1VMQVIgREUgKDc2LDIgeCAzOCwxKSBCUk9OQ0UiLCJsaW5lYSI6IiIsIm5vbWxpbmVhIjoiIiwiY29tcG9uZW50ZSI6IjEwIiwibm9tY29tcG9uZW50ZSI6IjEwIC0gUkVUQU5HVUxBUiIsImZhY3RvciI6IjAiLCJjb21wcGFsIjoiMCIsImNvc3RvIjoiODM2MTAiLCJ0eXBlIjoiIn0seyJvaWQiOiI3IiwiY29kaWdvIjoiRjA4R1AgIiwibm9tbWF0ZXByaW1hIjoiIFRhYmxpbGxhIGVzdGVyaWxsYSBhbmdvc3RhIEdSSVMgUExBVEEiLCJsaW5lYSI6IiIsIm5vbWxpbmVhIjoiIiwiY29tcG9uZW50ZSI6IjEyIiwibm9tY29tcG9uZW50ZSI6IjEyIC0gVEFCTElMTEEiLCJmYWN0b3IiOiIwIiwiY29tcHBhbCI6IjEiLCJjb3N0byI6IjQ0NTUwIiwidHlwZSI6IiJ9LHsib2lkIjoiMTIiLCJjb2RpZ28iOiIxNzdHUCAiLCJub21tYXRlcHJpbWEiOiIgUGlzYSB2aWRyaW8gMzgzMSBHUklTIFBMQVRBIiwibGluZWEiOiIiLCJub21saW5lYSI6IiIsImNvbXBvbmVudGUiOiIxNSIsIm5vbWNvbXBvbmVudGUiOiIxNSAtIFBJU0EiLCJmYWN0b3IiOiIwIiwiY29tcHBhbCI6IjAiLCJjb3N0byI6IjE0NTgwIiwidHlwZSI6IiJ9LHsib2lkIjoiNiIsImNvZGlnbyI6IlQyMTVHUCAiLCJub21tYXRlcHJpbWEiOiIgQ1VBRFJBRE8gMS4gMS8yIEdSSVMgUExBVEEiLCJsaW5lYSI6IiIsIm5vbWxpbmVhIjoiIiwiY29tcG9uZW50ZSI6IjExIiwibm9tY29tcG9uZW50ZSI6IjExIC0gQ1VBRFJBRE8iLCJmYWN0b3IiOiIwIiwiY29tcHBhbCI6IjAiLCJjb3N0byI6IjM4MDcwIiwidHlwZSI6ImEifSx7Im9pZCI6IjExIiwiY29kaWdvIjoiMTc1R1AgIiwibm9tbWF0ZXByaW1hIjoiIEFkYXB0YWRvciAzODMxIEdSSVMgUExBVEEiLCJsaW5lYSI6IiIsIm5vbWxpbmVhIjoiIiwiY29tcG9uZW50ZSI6IjE0Iiwibm9tY29tcG9uZW50ZSI6IjE0IC0gQURBUFRBRE9SIiwiZmFjdG9yIjoiMCIsImNvbXBwYWwiOiIwIiwiY29zdG8iOiIyMTQyMCIsInR5cGUiOiIifSx7Im9pZCI6IjkiLCJjb2RpZ28iOiJUMjE2R1AgIiwibm9tbWF0ZXByaW1hIjoiIEN1YWRyYWRvIDEgeCAxIEdSSVMgUExBVEEiLCJsaW5lYSI6IiIsIm5vbWxpbmVhIjoiIiwiY29tcG9uZW50ZSI6IjExIiwibm9tY29tcG9uZW50ZSI6IjExIC0gQ1VBRFJBRE8iLCJmYWN0b3IiOiIzLjUiLCJjb21wcGFsIjoiMCIsImNvc3RvIjoiMjE2OTAiLCJ0eXBlIjoiIn0seyJvaWQiOiIxMCIsImNvZGlnbyI6IkExNUMgIiwibm9tbWF0ZXByaW1hIjoiIEFuZ3VsbyBwL2NoYXBldGEgMS4xLzQgeCAxLzggQ1JVRE8iLCJsaW5lYSI6IiIsIm5vbWxpbmVhIjoiIiwiY29tcG9uZW50ZSI6IjEzIiwibm9tY29tcG9uZW50ZSI6IjEzIC0gQU5HVUxPIiwiZmFjdG9yIjoiMC43IiwiY29tcHBhbCI6IjAiLCJjb3N0byI6IjQxNjcwIiwidHlwZSI6IiJ9XQ==');
?>
