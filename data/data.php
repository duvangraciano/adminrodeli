<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();
include_once '../class/class.miscelanea.php';
include_once '../class/class.database.php';

$db = new Database();
$con = $db->conexion();
$misc = new Miscelanea($con);

$array_pn = array();
$pn = $misc->consultaParametros()->fetchAll(PDO::FETCH_ASSOC);
if (count($pn) > 0) {
	foreach ($pn as $key => $value) {
		foreach ($pn[$key] as $k => $v) {
			if ($k == 'para_submodulo') {
				$pn[$key]['para_datos'] = json_decode($pn[$key]['para_datos'],true);
				$array_pn += $pn[$key]['para_datos'] ;
			}
		}		
	}
}



$varsession = ( isset($_SESSION['strjson'])? $_SESSION['strjson'] : '[]' );
$strjson = json_decode($varsession,true);
$salamin = intval($array_pn['salariominimo']);
$auxtrans = intval($array_pn['auxiliotransporte']);
$salud = floatval($array_pn['saludtrabajador'])/100;
$pension = floatval($array_pn['pensiontrabajador'])/100;
$FSP = floatval($array_pn['fsptrabajador'])/100;

/////////////////// Inicio Liquidador nomina ///////////////////////////////////

if ($_POST['data'] == 'liquidador') {
	$dias = intval((isset($_POST['dias'])? $_POST['dias'] : $strjson['dias']));
	$sueldo = intval($strjson['empl_sueldo']);

	
	$basico = ($sueldo / 30) * $dias;
	$auxtransporte = ($sueldo > ($salamin * 2) ? 0 : ($auxtrans * $dias) / 30 );
	$devengado = (isset($strjson['devengado'])? $strjson['devengado'] : 0);
	$deduccion = (isset($strjson['deduccion'])? $strjson['deduccion'] : 0);
	$totaldevengado = $basico + $auxtransporte + $devengado;

	
	$totaldeducciones = 0;

	if (!empty($_POST['concepto']) && !empty($_POST['unidad'])) {

		$lc = $misc->consultaConceptos($_POST['concepto'])->fetch(PDO::FETCH_ASSOC);
		$conceptObser = $lc['conc_descripcion'].(!empty($_POST['observacion'])? ' ('.$_POST['observacion'].')' : '');

		$valor = 0;

		if ($lc['conc_categoria'] == 'horas_extras') {
			$valor = round( $sueldo * $_POST['unidad'] * ($lc['conc_tasa']+1) / 240 );
			$devengado = $devengado + $valor;
			$totaldevengado = $basico + $auxtransporte + $devengado; 
	
		}elseif ($lc['conc_categoria'] == 'comision') {
			$valor = $_POST['unidad'] * 20000;
			$devengado = $devengado + $valor;
			$totaldevengado = $basico + $auxtransporte + $devengado; 
		}else{
			if ($lc['conc_naturaleza'] == 'deducciones') {
				$valor = ((20000 * $lc['conc_tasa']) + 20000) * $_POST['unidad'];
				$deduccion = $deduccion + $valor;
				//$totaldevengado = $basico + $auxtransporte + $devengado;
			}else{
				$valor = $_POST['unidad'] * 20000;
				$devengado = $devengado + $valor;
				$totaldevengado = $basico + $auxtransporte + $devengado;
			}
		}

		$conceptos = array('descripcion'=> $conceptObser,'unidad'=>$_POST['unidad'], $lc['conc_naturaleza']=> $valor);

		if (isset($strjson['conceptos'])) {
			array_push($strjson['conceptos'], $conceptos);
		}else{
			$strjson['conceptos'] = array($conceptos);
		}
		
	}

	

	$dedu_salud = ($totaldevengado - $auxtransporte) * $salud;
	$dedu_pension = ($totaldevengado - $auxtransporte) * $pension;
	$dedu_fsp = ( ($basico + $sueldo - $totaldevengado) > ($salamin * 4) ? (($sueldo * $FSP) / 30) * $dias : 0);
	$totaldeducciones = $dedu_salud + $dedu_pension + $dedu_fsp + $deduccion;

	$strjson['diaslabo'] = $dias;
	$strjson['basico'] = round($basico);
	$strjson['auxtransporte'] = round($auxtransporte);
	$strjson['devengado'] = round($devengado);
	$strjson['totaldevengado'] = round($totaldevengado);
	
	

	$strjson['salud'] = round($dedu_salud);
	$strjson['pension'] = round($dedu_pension);
	$strjson['fsp'] = round($dedu_fsp);
	$strjson['deduccion'] = round($deduccion);
	$strjson['totaldeducciones'] = round($totaldeducciones);

	$strjson['netoapagar'] = round($totaldevengado - $totaldeducciones);

	$_SESSION['strjson'] = json_encode($strjson) ;
	echo json_encode($strjson);
}

// Remover concepto
if ($_POST['data'] == 'removerconcepto') {

	if (isset($_POST['removerconcepto'])) {

		foreach ($_POST['removerconcepto'] as $val) {
			
			foreach ($strjson['conceptos'][intval($val)] as $key => $value) {
				if ($key == 'devengado') {
					$strjson['devengado'] = $strjson['devengado'] - intval($value);
					$strjson['totaldevengado'] = round($strjson['totaldevengado'] - intval($value));
				}elseif($key == 'deducciones'){
					$strjson['deduccion'] = $strjson['deduccion'] - intval($value);
					$strjson['totaldeducciones'] = round($strjson['totaldeducciones'] - intval($value));
				}
			}
			array_splice($strjson['conceptos'], intval($val),1);
			
		}


	}
		$boolfsp = ( ($strjson['totaldevengado'] - $strjson['empl_sueldo'] + $strjson['basico']) > ($salmin * 4)? true : false );
		$strjson['pension'] = round( ($strjson['totaldevengado'] - $strjson['auxtransporte']) * $pension);
		$strjson['salud'] = round( ($strjson['totaldevengado'] - $strjson['auxtransporte']) * $salud);
		$strjson['fsp'] = ($boolfsp? round( (($strjson['empl_sueldo'] * $FSP) / 30) * $strjson['dias'] ) : 0 );
		$strjson['netoapagar'] = round($strjson['totaldevengado'] - $strjson['totaldeducciones']);


		echo json_encode($strjson['conceptos']);
		$_SESSION['strjson'] = json_encode($strjson) ;

}

// Limpiar el formulario
if ($_POST['data'] == 'limpiarliquidador') {
	unset($_SESSION['strjson']);
	echo true;
}

// Buscar un empleado
if ($_POST['data'] == 'buscarempleado') {

	$empl = $misc->consultaEmpleado($_POST['oidempleado'])->fetch(PDO::FETCH_ASSOC);
	unset($_SESSION['strjson']);

	$_SESSION['strjson'] = json_encode($empl);

	
	echo json_encode($empl);
}

/////////////////// Fin Liquidador nomina ///////////////////////////////////


/////////////////// Inicio parametros nomina ///////////////////////////////////


if ($_POST['data'] == 'parametrosnomina') {
	$para = $misc->consultaParametros()->fetchAll(PDO::FETCH_ASSOC);

	foreach ($para as $key => $value) {
		foreach ($para[$key] as $k => $v) {
			if ($v == $_POST['llave']) {
				$para[$key]['para_datos'] = json_decode($para[$key]['para_datos'],true);
				$para[$key]['para_datos'][$_POST['subllave']] = $_POST['valor'];
				$misc->actualizaParametros($para[$key]['para_datos'],$_POST['llave']);
			}
		}		
	}
	echo $misc->numRows;

}

/////////////////// Fin parametros nomina ///////////////////////////////////


if ( isset( $_POST['data'] ) ) {
	if ( $_POST['data'] == 'guardarorden') {
		try {

			$arrConceptos = json_decode($_POST['globalArrOrdPro'],true);
			$return = '';
			foreach ($arrConceptos as $value) {
				
				$getCompuesto = $misc->consultaCompuestos($value['oid'])->fetch(PDO::FETCH_ASSOC);
				$getComponentes = json_decode(base64_decode($getCompuesto["com_componentes"]),true);

				$ancho = floatval($value['ancho']); $alto = floatval($value['alto']); $cantidad = floatval($value['cantidad']);
				

				foreach ($getComponentes as $val) {
					$getMp = $misc->consultaMateriaPrima($val['oid'])->fetch(PDO::FETCH_ASSOC);
					$factor = floatval($val['factor']);

					$marco_puerta = ($val['componente'] == 9 ? ( ($alto*2)+$ancho <= 6 ? 6 : ceil(($alto*2)+$ancho)  ): null);
					$retangulo = ($val['componente'] == 10 ? ( (($alto-0.2)+($ancho-0.04))*2 <=6 ? 6 : ceil(($alto+$ancho)*2) ) : null );
					$cuadrado = ($val['componente'] == 11) ? cuadrado($ancho,$alto,$val['type'],$factor) : null ;
					$angulo = ($val['componente'] == 13) ? $factor : null ;
					$tablilla = ($val['componente'] == 12) ? 0.0 : null; 
					
					echo $cuadrado;
					
				}



				//print_r($getComponentes);
				
			}

		} catch (Exception $e) {
			echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		}		


		//echo $misc->guardarOrden($_POST['prov_identificacion'],$_POST['prov_nombre_responsable'],$_POST['globalArrOrdPro']);
	}

	if ($_POST['data'] == 'consultarproveedor') {
		echo $misc->consultarTercero($_POST['prov_identificacion']);
	}

	if ($_POST['data'] == 'guardarcompuesto') {
		echo $misc->guardarCompuesto($_POST,$_FILES['com_imagen']);
	}

	if ($_POST['data'] == 'consultarcodigo') {
		echo $misc->consularCodigo($_POST['com_codigo']);
	}

	if ($_POST['data'] == 'updatenuevoconcepto') {
		echo $misc->updateNuevoConcepto($_POST);
	}

	if ($_POST['data'] == 'consultarcodigoconcepto') {
		$get = $misc->consultarCodConcepto($_POST['codigo']);
		if ($get->rowCount() > 0) {
			echo '{"mensaje":"Se encontró una coincidencia, el Código ya exite!","bool":false}';
		}else{
			echo '{"mensaje":"No se encontró una coincidencia","bool":true}';
		}
	}

	if ($_POST['data'] == 'calcularitem') {

		$json = json_decode($_POST['arritem'], false);
		//echo $misc->consularCodigo($_POST['com_codigo']);
	}

	if ($_POST['data'] == 'guardarempleado') {

		//$json = json_encode($_POST, true);
		
		echo $misc->guardarEmpleado($_POST);
	}

	if ($_POST['data'] == 'guardarnuevoconcepto') {
		
		echo $misc->guardarnuevoconcepto($_POST);
	}

	if ($_POST['data'] == 'calcularcostos') {

		$oidPuertaPpal = 2;
		$data = json_decode($_POST['globalArrCompo'],true);
		foreach ($data as $val) {
			$cod = explode("-", $val['codigo']);
			if ($val['categoria'] == $oidPuertaPpal && $cod[0] != "") {
				$file = '../data/build/puerta_'.trim(strtolower($cod[0])).'.php';
				if (file_exists($file)) {
					require_once $file;
					$getCompuesto = $misc->consultaCompuestos($val['oid'])->fetch(PDO::FETCH_ASSOC);
					$componente = $misc->listarComponentes()->fetchAll(PDO::FETCH_ASSOC);				
					$compuesto = json_decode(base64_decode($getCompuesto["com_componentes"]),true);
					echo puertaPrincipal($val,$compuesto,$componente);
				}else{
					echo "No existe el fichero";
				}
				
			}
		}
		
	}
}


function cuadrado($ancho,$alto,$type,$factor)
{
	if ($type == 'a') {
		return ceil((($ancho-0.2)*2)+2);
	}elseif ($type == 'b') {
		return ceil((($ancho-0.2)*2)+2)-($ancho-0.2);
	}elseif ($type == 'c') {
		return ($ancho-0.2)+1;
	}elseif ($type == 'd') {
		return (($ancho-0.2)*2)+1 ;
	}elseif ($type == 'e') {
		return (($ancho-0.2)*2)+1.5 ;
	}elseif ($type == 'f') {
		return (($ancho-0.2)*2)+2 ;
	}elseif ($type == 'g') {
		return (($ancho-0.2)*2)+2.2 ;
	}elseif ($type == 'h') {
		return (($ancho-0.2)*2) ;
	}elseif ($type == 'i') {
		return ($ancho-0.2) ;
	}elseif ($type == 'j') {
		return null ;
	}elseif ($type == 'k') {
		return ($alto-0.18)*2 ;
	}elseif ($type == 'l') {
		return (($ancho-0.2)*2)+2.5 ;
	}elseif ($type == 'm') {
		return null ;
	}elseif ($type == 'n') {
		return null ;
	}else{
		return $factor;
	}
	
}

?>