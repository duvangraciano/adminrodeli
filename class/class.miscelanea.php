<?php  
/**
* 
*/
class Miscelanea
{	
	private $conn;
	public $numRows;
	
	function __construct($db)
	{
		$this->conn = $db;
	}

	function getTipomaterial($key,$value,$return)
	{
		$query = "SELECT * FROM `tbl_tipomaterial` WHERE `".$key."`='".$value."' ";
		$result = $this->conn->prepare( $query );
		$result->execute();
		$rs = $result->fetch(PDO::FETCH_ASSOC);
		return $rs[$return];
	}

	function listarOrdenesProduccion() 
	{
		$query = "SELECT * FROM `tbl_ordenes`";
		$result = $this->conn->prepare( $query );
		$result->execute();
		return $result;
	}


	function listarConceptos() 
	{
		$query = "SELECT * FROM `tbl_conceptos`";
		$result = $this->conn->prepare( $query );
		$result->execute();
		return $result;
	}

	function listartipoid()
	{
		$query = "SELECT * FROM `tbl_tipoidentificacion`";
		$result = $this->conn->prepare( $query );
		$result->execute();
		return $result;
	}

	function listarcontratos()
	{
		$query = "SELECT * FROM `tbl_tipocontrato`";
		$result = $this->conn->prepare( $query );
		$result->execute();
		return $result;
	}

	function listartipomedida()
	{
		$query = "SELECT * FROM `tbl_tipomedidas`";
		$result = $this->conn->prepare( $query );
		$result->execute();
		return $result;
	}

	function listarcargos()
	{
		$query = "SELECT * FROM `tbl_cargos`";
		$result = $this->conn->prepare( $query );
		$result->execute();
		return $result;
	}

	function listarterceros()
	{
		$query = "SELECT * FROM `tbl_proveedores`";
		$result = $this->conn->prepare( $query );
		$result->execute();
		return $result;
	}

	function listarCategorias() 
	{
		$query = "SELECT * FROM `tbl_categorias`";
		$result = $this->conn->prepare( $query );
		$result->execute();
		return $result;
	}

	function listarComponentes() 
	{
		$query = "SELECT * FROM `tbl_componentes`";
		$result = $this->conn->prepare( $query );
		$result->execute();
		return $result;
	}


	function listarEmpleados()
	{
		$query = "SELECT * FROM `tbl_empleados`";
		$result = $this->conn->prepare( $query );
		$result->execute();
		return $result;
	}

	function listarTipoMaterial()
	{
		$query = "SELECT * FROM `tbl_tipomaterial`";
		$result = $this->conn->prepare( $query );
		$result->execute();
		return $result;
	}

	function listarMateriaPrima()
	{
		$query = "SELECT * FROM `tbl_materiaprima`";
		$result = $this->conn->prepare( $query );
		$result->execute();
		return $result;
	}

	function listarCompuestos()
	{
		$query = "SELECT * FROM `tbl_compuestos`";
		$result = $this->conn->prepare( $query );
		$result->execute();
		return $result;
	}

	function consultaCompuestos($oid)
	{
		$query = "SELECT * FROM `tbl_compuestos` WHERE `oid`=".$oid;
		$result = $this->conn->prepare( $query );
		$result->execute();
		return $result;
	}

	function consultaComponente($oid)
	{
		$query = "SELECT * FROM `tbl_componentes` WHERE `oid`=".$oid;
		$result = $this->conn->prepare( $query );
		$result->execute();
		return $result;
	}

	function consultaGeneral($oid,$tabla)
	{
		$query = "SELECT * FROM `".$tabla."` WHERE `oid`=".$oid;
		$result = $this->conn->prepare( $query );
		$result->execute();
		$rs = $result->fetch(PDO::FETCH_ASSOC);
		return $rs;
	}

	function consultaDesplegables($key)
	{
		$query = "SELECT * FROM `tbl_desplegables` WHERE `des_key`='".$key."' ";
		$result = $this->conn->prepare( $query );
		$result->execute();
		return $result;
	}

	function consultaConceptos($oid)
	{
		$query = "SELECT * FROM `tbl_conceptos` WHERE `oid`=".$oid;
		$result = $this->conn->prepare( $query );
		$result->execute();
		return $result;
	}

	function consultarCodConcepto($value)
	{
		$query = "SELECT * FROM `tbl_materiaprima` WHERE `mate_referencia`='".strtoupper($value)."' ";
		$result = $this->conn->prepare( $query );
		$result->execute();
		return $result;
	}

	function consultaMateriaPrima($oid)
	{
		$query = "SELECT * FROM `tbl_materiaprima` WHERE `oid`=".$oid;
		$result = $this->conn->prepare( $query );
		$result->execute();
		return $result;
	}

	function consultaCategoria($oid)
	{
		$query = "SELECT * FROM `tbl_categorias` WHERE `oid`=".$oid;
		$result = $this->conn->prepare( $query );
		$result->execute();
		return $result;
	}
	
	function consultaExistencias($post){
		$query = "SELECT * FROM `tbl_materiaprima` WHERE `oid`= '".$post["oid"]."' ";
		$result = $this->conn->prepare( $query );

		if (! $result->execute() ) {
			$err = $result->errorInfo();
			return array('bool'=>false,'mensaje'=>'Se produjo un error: '.$err[2],'query'=>$query);
		}else{
			return array('bool'=>true,'mensaje'=>'Se completó la operación!','data'=>$result->fetch(PDO::FETCH_ASSOC),'rowcount'=>$result->rowCount());
		}
	}

	function consularCodigo($cod)
	{
		$query = "SELECT * FROM `tbl_compuestos` WHERE `com_codigo`= '".strtolower($cod)."' ";
		$result = $this->conn->prepare( $query );

		if (! $result->execute() ) {
			$err = $result->errorInfo();
			return '{"mensaje":"Se produjo un error: '.$err[2].'","bool":false}';
		}else{
			return '{"mensaje":"Se completó la operación","bool":true,"rowcount":'.$result->rowCount().'}';
		}
	}

	function consultaEmpleado($oid)
	{
		$query = "SELECT e.*, c.`carg_descripcion`, g.`grup_descripcion`, tc.`cont_descripcion`
							FROM `tbl_empleados` AS e
							LEFT JOIN `tbl_cargos` AS c ON e.`empl_cargo_oid` = c.`oid`
							LEFT JOIN `tbl_grupo` AS g ON e.`empl_grupo_oid` = g.`oid`
							LEFT JOIN `tbl_tipocontrato` AS tc ON e.`empl_contrato_oid` = tc.`oid`
							WHERE e.`oid`=".$oid;
		$result = $this->conn->prepare( $query );
		$result->execute();
		return $result;
	}

	function consultaEmpleadoId($id)
	{
		$query = "SELECT e.*, c.`carg_descripcion`, g.`grup_descripcion`, tc.`cont_descripcion`
							FROM `tbl_empleados` AS e
							LEFT JOIN `tbl_cargos` AS c ON e.`empl_cargo_oid` = c.`oid`
							LEFT JOIN `tbl_grupo` AS g ON e.`empl_grupo_oid` = g.`oid`
							LEFT JOIN `tbl_tipocontrato` AS tc ON e.`empl_contrato_oid` = tc.`oid`
							WHERE e.`empl_identificacion`='".$id."'; ";
		$result = $this->conn->prepare( $query );
		$result->execute();
		return $result;
	}


	function consultaParametros()
	{
		$query = "SELECT * FROM `tbl_parametros`";
		$result = $this->conn->prepare( $query );
		$result->execute();
		return $result;
	}


	function consultarTercero($value)
	{
		# code... 
		$query = "SELECT * FROM `tbl_proveedores` WHERE `prov_identificacion` = '".rtrim($value," ")."'; ";
		$result = $this->conn->prepare( $query );

		if (! $result->execute() ) {
			//$err = $result->
			return '{"mensaje":"Se produjo un error: $err[2]","bool":false}';
		}else{
			return '{"mensaje":"Se completó la operación","bool":true,"data":'.json_encode($result->fetch(PDO::FETCH_ASSOC),false).'}';
		}
	}


	function actualizaParametros($datos,$submodulo)
	{
		$query = "UPDATE `tbl_parametros` SET `para_datos` = '".json_encode($datos)."' WHERE `para_submodulo` ='".$submodulo."' ";
		$result = $this->conn->prepare( $query );
		$result->execute();
		$this->numRows = $result->rowCount();
		return $result->rowCount();
	}

	function updateNuevoConcepto($post)
	{
		$_post = array_slice($post, 0, -2);
		$query = "UPDATE `tbl_materiaprima` SET ";
		foreach ($_post as $key => $value) {
			$query .= " `".$key."` = '".strtoupper($value)."',";
		}
		$query = rtrim($query,",")." WHERE `oid`=".$post['oid']."; ";
		$result = $this->conn->prepare( $query );

		if (! $result->execute() ) {
			$err = $result->errorInfo();
			return '{"mensaje":"Se produjo un error: '.$err[2].'","bool":false}';
		}else{
			return '{"mensaje":"Se completó la operación","bool":true}';
		}
	}
	
	function guardarnuevotercero($post)
	{
		$_post = $post;

		$query = "INSERT INTO `tbl_proveedores` ";
		$query .= " (`".implode("`, `", array_keys($_post))."`) VALUES (";

		foreach ($_post as $key => $value) {
			$query .= "'".htmlspecialchars($value)."',";
		}

		$query = rtrim($query,",").")";
		$result = $this->conn->prepare( $query );

		if (! $result->execute() ) {
			$err = $result->errorInfo();
			return array('bool'=>false,'mensaje'=>'Se produjo un error: '.$err[2],'query'=>$query);
		}else{
			return array('bool'=>true,'mensaje'=>'Se completó la operación!','data'=>$result->rowCount(),'query'=>$query);
		}	
	}
	
	function actualizartercero($post)
	{
		$_post = array_slice($post, 0, -1);
		$query = "UPDATE `tbl_proveedores` SET ";
		foreach ($_post as $key => $value) {
			$query .= " `".$key."` = '".htmlspecialchars($value)."',";
		}
		$query = rtrim($query,",")." WHERE `oid`=".$post['oid']."; ";
		$result = $this->conn->prepare( $query );

		if (! $result->execute() ) {
			$err = $result->errorInfo();
			return array('bool'=>false,'mensaje'=>'Se produjo un error: '.$err[2],'query'=>$query);
		}else{
			return array('bool'=>true,'mensaje'=>'Se completó la operación!','data'=>$result->rowCount(),'query'=>$query);
		}
	}
	
	function get_productos_venta($post)
	{
		
		$cfg = $_SESSION['cfg'];
		$inv = unserialize($cfg['data']['conf_inventario']);
		$cfg_costo = $inv['tipoprecio'];
		$query = "SELECT *, `".$cfg_costo."` AS costo FROM `tbl_materiaprima` ";
		
		$result = $this->conn->prepare( $query );
		$result->execute();
		
		return $result;
	}
	


	function guardarOrden($id,$resp,$arrItems)
	{
		$identificacion = htmlspecialchars($id);
		$responsable = htmlspecialchars($resp);
		$data = base64_encode($arrItems);

		$query = "INSERT INTO `tbl_ordenes` (ord_responsable,ord_prov_identificacion,ord_data_items) VALUES ('".$responsable."','".$identificacion."','".$data."')";

		$result = $this->conn->prepare( $query );

		if (! $result->execute() ) {
			$err = $result->errorInfo();
			return '{"mensaje":"Se produjo un error: '.$err[2].'","bool":false}';
		}else{
			return '{"mensaje":"Se completó la operación","bool":true}';
		}

	}
	

	function actualizaRol($post)
	{
		$oid = $post['oid'];
		$roles = serialize(array_slice($post, 0, -2));
		
		$query = "UPDATE `tbl_roles` SET `rol_modulos` = '".$roles."' WHERE `oid` ='".$oid."' ";

		$result = $this->conn->prepare( $query );

		if (! $result->execute() ) {
			$err = $result->errorInfo();
			return '{"mensaje":"Se produjo un error: '.$err[2].'","bool":false}';
		}else{
			return '{"mensaje":"Se completó la operación","bool":true}';
		}
	}
	
	function guardarRol($post)
	{
		$nombre_rol = htmlspecialchars($post['nombre_rol']);
		$descripcion_rol = htmlspecialchars($post['descripcion_rol']);
		$modulos_rol = serialize(array_slice($post, 2));
		$slug_rol = preg_replace('/\s+/', '_', strtolower(trim($post['nombre_rol'])));

		$query = "INSERT INTO `tbl_roles` (rol_nombre,rol_descripcion,rol_slug,rol_modulos) VALUES ('".$nombre_rol."','".$descripcion_rol."','".$slug_rol."','".$modulos_rol."')";

		$result = $this->conn->prepare( $query );

		if (! $result->execute() ) {
			$err = $result->errorInfo();
			return '{"mensaje":"Se produjo un error: '.$err[2].'","bool":false}';
		}else{
			return '{"mensaje":"Se completó la operación","bool":true}';
		}

	}
	
	function setSession($u_oid)
	{

		$query = "INSERT INTO `tbl_sesiones` (ses_usuario_oid) VALUES ('".$u_oid."')";

		$result = $this->conn->prepare( $query );

		if (! $result->execute() ) {
			$err = $result->errorInfo();
			return '{"mensaje":"Se produjo un error: '.$err[2].'","bool":false}';
		}else{
			return '{"mensaje":"Se completó la operación","bool":true}';
		}

	}
	
	function guardar_entrada_almacen($post)
	{
	
		$items = json_decode($post['items'],true);
		$count = 0;
		$cant_ext = array();
		foreach ($items as $val) {
			$rs = $this->consultaExistencias($val);
			
			if ($rs["bool"] && $rs["rowcount"] > 0) {
				if (isset($rs["data"]["mate_existencias"])) {
					$cant_ = floatval( $rs["data"]["mate_existencias"] ) + floatval( $val['cantidad'] );
					$costo_promedio = ($rs["data"]["mate_costocompra"] == 0 ? floatval( $val['costounitario'] ) : ( floatval( $rs["data"]["mate_costounidad"] ) + floatval( $val['costounitario'] ) ) /2);
					$costo_ = floatval( $val['costounitario'] ) * $rs["data"]["mate_unidadmedida"];
					$costo_ultimo = floatval( $val['costounitario'] );
					$costo_maximo = ( $costo_ultimo > $rs["data"]["mate_costounidad"] ? $costo_ultimo : $rs["data"]["mate_costounidad"] );
					array_push($cant_ext, array('oid' => $val['oid'],'cantidad' => $cant_, 'costo' => $costo_, 'costoultimo' => $costo_ultimo, 'costomaximo' => $costo_maximo, 'costounidad' => $costo_promedio ) );
					
					$count++;
					if ($count >= count($items)) {
						$str_q = '';
						foreach ($cant_ext as $k) {
							$str_q .= "UPDATE `tbl_materiaprima` SET `mate_existencias`='".$k['cantidad']."' , `mate_costocompra`='".$k['costo']."' , `mate_costoultimo`='".$k['costoultimo']."' , `mate_costomaximo`='".$k['costomaximo']."' , `mate_costounidad`='".$k['costounidad']."' WHERE `oid`='".$k['oid']."'; ";
						}
						
						$_post = $post;
						$str_q .= "INSERT INTO `tbl_entradaalmacen` ";
						$str_q .= "(enal_consecutivo, enal_date_documento, 	enal_id_tercero, enal_tipo_documento, enal_num_documento, enal_tipo_movimiento, enal_data_items, enal_observaciones, enal_iva, enal_subtotal, enal_descuentos, enal_total, enal_estado, 	enal_usuario_id ) ";
						$str_q .= "VALUES('".$post['enal_consecutivo']."', '".date("Y-m-d 00:00:00", strtotime($post['enal_date_documento']) )."','".$post['enal_id_tercero']."','".$post['enal_tipo_documento']."','".$post['enal_num_documento']."','".$post['enal_tipo_movimiento']."','".serialize($items)."','".$post['enal_observaciones']."','".$post['enal_iva']."','".$post['enal_subtotal']."','".$post['enal_descuentos']."','".$post['enal_total']."','1','".$_SESSION['login']['oid']."'); SELECT LAST_INSERT_ID() AS lastId ";
						
						$conn = $this->conn;
						$result = $conn->prepare( $str_q );
						
						if (! $result->execute() ) {
							$err = $result->errorInfo();
							return array('bool'=>false,'mensaje'=>'Se produjo un error: '.$err[2],'query'=>$str_q);
						}else{
							$getID = $conn->lastInsertId();
							return array('bool'=>true,'mensaje'=>'Se completó la operación!','data'=>$getID,'query'=>$str_q);
						}
					}
				}else{
					return array('bool'=>false,'mensaje'=>'Se produjo un error: No se puede procesar la operación porque hubo un cambio en el stock del producto: '.$val['desc'].', stock actual: '.$rs["data"]["mate_existencias"]);
					break;
				}
			}else{
				return array('bool'=>false,'mensaje'=>'Se produjo un error: '.$rs['mensaje']);
				break;
			}
			
			
		}
	}
	
	function guardar_venta_contado($post)
	{
	
		$items = json_decode($post['items'],true);
		$saldos = json_decode($post['saldos'],true);
		$pago = json_decode($post['pago'],true);
		$count = 0;
		$cant_ext = array();
		foreach ($items as $val) {
			$rs = $this->consultaExistencias($val);
			
			if ($rs["bool"] && $rs["rowcount"] > 0) {
				if ($rs["data"]["mate_existencias"] >= $val["cant"] && $val["cant"] <= $rs["data"]["mate_existencias"]) {
					$cant_ = floatval( $rs["data"]["mate_existencias"] ) - floatval( $val['cant'] );
					array_push($cant_ext, array('oid' => $val['oid'],'value' => $cant_ ) );
					
					$count++;
					if ($count >= count($items)) {
						$str_q = '';
						foreach ($cant_ext as $k) {
							$str_q .= "UPDATE `tbl_materiaprima` SET `mate_existencias`='".$k['value']."' WHERE `oid`='".$k['oid']."'; ";
						}
						
						$_post = $post;
						$str_q .= "INSERT INTO `tbl_ventascontado` ";
						$str_q .= "(vco_consecutivo, 	vco_tipodocumento, vco_tipomovimiento, 	vco_data_items, vco_subtotal, vco_total_iva, vco_total_descuento, vco_total_total, vco_valor_cheque, vco_valor_electronica, vco_valor_efectivo, vco_valor_devolucion, vco_estado, vco_vendedor_oid ) ";
						$str_q .= "VALUES('','FACTURA','VENTAS_DE_CONTADO','".serialize($items)."','".$saldos['subtotal']."','".$saldos['iva']."','".$saldos['descuento']."','".$saldos['total']."','".$pago['cheques']."','".$pago['electronica']."','".$pago['efectivo']."','".$pago['devolucion']."','CONFIRMADO','".$_SESSION['login']['oid']."') ;";
						
						$result = $this->conn->prepare( $str_q );
						if (! $result->execute() ) {
							$err = $result->errorInfo();
							return array('bool'=>false,'mensaje'=>'Se produjo un error: '.$err[2],'query'=>$query);
						}else{
							$lastId = $this->conn->lastInsertId();
							return array('bool'=>true,'mensaje'=>'Se completó la operación!','data'=>$result->rowCount(),'query'=>$lastId);
						}
					}
				}else{
					return array('bool'=>false,'mensaje'=>'Se produjo un error: No se puede procesar la operación porque hubo un cambio en el stock del producto: '.$val['desc'].', stock actual: '.$rs["data"]["mate_existencias"]);
					break;
				}
			}else{
				return array('bool'=>false,'mensaje'=>'Se produjo un error: '.$rs['mensaje']);
				break;
			}
			
			
		}
	}
	
	function guardar_venta_credito($post)
	{
	
		$items = json_decode($post['items'],true);
		$saldos = json_decode($post['saldos'],true);
		$count = 0;
		$cant_ext = array();
		foreach ($items as $val) {
			$rs = $this->consultaExistencias($val);
			
			if ($rs["bool"] && $rs["rowcount"] > 0) {
				if ($rs["data"]["mate_existencias"] >= $val["cant"] && $val["cant"] <= $rs["data"]["mate_existencias"]) {
					$cant_ = floatval( $rs["data"]["mate_existencias"] ) - floatval( $val['cant'] );
					array_push($cant_ext, array('oid' => $val['oid'],'value' => $cant_ ) );
					
					$count++;
					if ($count >= count($items)) {
						$str_q = '';
						foreach ($cant_ext as $k) {
							$str_q .= "UPDATE `tbl_materiaprima` SET `mate_existencias`='".$k['value']."' WHERE `oid`='".$k['oid']."'; ";
						}
						
						$_post = $post;
						$str_q .= "INSERT INTO `tbl_cuentasxcobrar` ";
						$str_q .= "(cxc_consecutivo,cxc_tipodocumento,cxc_tercero_cliente_oid,cxc_diasvencimiento,cxc_fechavencimiento,cxc_data_items,cxc_subtotal,cxc_total_iva,cxc_total_descuento,	cxc_total_total,cxc_estado,cxc_vendedor_oid) ";
						$str_q .= "VALUES('','FACTURA','".$post['prov_identificacion']."',".$post['dv'].",'".date("Y-m-d h:i:s", strtotime(date("d-m-Y")."+ ".$post['dv']." days"))."','".serialize($items)."','".$saldos['subtotal']."','".$saldos['iva']."','".$saldos['descuento']."','".$saldos['total']."','CONFIRMADO','".$_SESSION['login']['oid']."') ;";
						
						$result = $this->conn->prepare( $str_q );
						if (! $result->execute() ) {
							$err = $result->errorInfo();
							return array('bool'=>false,'mensaje'=>'Se produjo un error: '.$err[2],'query'=>$query);
						}else{
							return array('bool'=>true,'mensaje'=>'Se completó la operación!','data'=>$result->rowCount(),'query'=>$str_q);
						}
					}
				}else{
					return array('bool'=>false,'mensaje'=>'Se produjo un error: No se puede procesar la operación porque hubo un cambio en el stock del producto: '.$val['desc'].', stock actual: '.$rs["data"]["mate_existencias"]);
					break;
				}
			}else{
				return array('bool'=>false,'mensaje'=>'Se produjo un error: '.$rs['mensaje']);
				break;
			}
			
			
		}
	}

	function guardarCompuesto($arrPost,$files)
	{
		$file = $this->subirArchivo($files);
		$imagefile = ($file != null ? "'".$file."'" : 'NULL');
		$codigo = json_decode($this->consularCodigo($arrPost['com_codigo']),true);
		$componentes = base64_encode(json_encode($arrPost['componentes']));
		
		if ($codigo['rowcount'] == 0) {
			$query = "INSERT INTO `tbl_compuestos` (com_codigo,com_descripcion,com_componentes,com_produccion,com_imagen,com_anchominimo,com_altominimo,com_categoria,com_esmedible,com_observaciones) ";
			$query .= " VALUES ('".strtolower($arrPost['com_codigo'])."','".strtoupper($arrPost['com_descripcion'])."','".$componentes."','".base64_encode($arrPost['globalArrCompo'])."',".$imagefile.",'".$arrPost['com_anchominimo']."','".$arrPost['com_altominimo']."','".$arrPost['com_categoria']."','".$arrPost['com_esmedible']."',NULL)";

			$result = $this->conn->prepare( $query );

			if (! $result->execute() ) {
				$err = $result->errorInfo();
				return '{"mensaje":"Se produjo un error: '.$err[2].'","bool":false}';
			}else{
				return '{"mensaje":"Se completó la operación","bool":true}';
			}

		}else{
			return '{"mensaje":"No se completó la operación","bool":false}';
		}
	}

	function guardarnuevoconcepto($post)
	{
		$_post = array_slice($post, 0, -1);

		$query = "INSERT INTO `tbl_materiaprima` ";
		$query .= " (`".implode("`, `", array_keys($_post))."`) VALUES (";

		foreach ($_post as $key => $value) {

			$query .= "'".strtoupper($value)."',";
		}

		$query = rtrim($query,",").")";
		$result = $this->conn->prepare( $query );

		if (! $result->execute() ) {
			$err = $result->errorInfo();
			return '{"mensaje":"Se produjo un error: '.$err[2].'","bool":false}';
		}else{
			return '{"mensaje":"Se completó la operación","bool":true}';
		}	
	}
	
	function guardarnuevousuario($post)
	{
		$_post = $post;

		$query = "INSERT INTO `tbl_usuarios` ";
		$query .= " (`".implode("`, `", array_keys($_post))."`) VALUES (";

		foreach ($_post as $key => $value) {
			if ($key == 'usu_pass') {
				$query .= "'".password_hash($value, PASSWORD_BCRYPT, ["cost" => 8])."',";
			}else{
				$query .= "'".htmlspecialchars($value)."',";
			}
			
		}

		$query = rtrim($query,",").")";
		$result = $this->conn->prepare( $query );

		if (! $result->execute() ) {
			$err = $result->errorInfo();
			return array('bool'=>false,'mensaje'=>'Se produjo un error: '.$err[2],'query'=>$query);
		}else{
			return array('bool'=>true,'mensaje'=>'Se completó la operación!','data'=>$result->rowCount(),'query'=>$query);
		}	
	}
	
	function actualizarusuario($post)
	{
		$_post = array_slice($post, 0, -1);
		$query = "UPDATE `tbl_usuarios` SET `usu_estado`='".(isset($_post['usu_estado'])?0:1)."',";
		foreach ($_post as $key => $value) {
			$query .= " `".$key."` = '".htmlspecialchars($value)."',";
		}
		$query = rtrim($query,",")." WHERE `oid`=".$post['oid']."; ";
		$result = $this->conn->prepare( $query );

		if (! $result->execute() ) {
			$err = $result->errorInfo();
			return array('bool'=>false,'mensaje'=>'Se produjo un error: '.$err[2],'query'=>$query);
		}else{
			return array('bool'=>true,'mensaje'=>'Se completó la operación!','data'=>$result->rowCount(),'query'=>$query);
		}
	}
	
	function cambiarestadousuario($post)
	{
		$_post = $post;
		$query = "UPDATE `tbl_usuarios` SET `usu_estado`='".($_post['value']==1?0:1)."',";

		$query = rtrim($query,",")." WHERE `oid`=".$post['oid']."; ";
		$result = $this->conn->prepare( $query );

		if (! $result->execute() ) {
			$err = $result->errorInfo();
			return array('bool'=>false,'mensaje'=>'Se produjo un error: '.$err[2],'query'=>$query);
		}else{
			return array('bool'=>true,'mensaje'=>'Se completó la operación!','data'=>$result->rowCount(),'query'=>$query);
		}
	}
	
	function reestablecercontrasena($post)
	{
		$_post = $post;
		$query = "UPDATE `tbl_usuarios` SET `usu_pass`='".password_hash('123456', PASSWORD_BCRYPT, ["cost" => 8])."',";

		$query = rtrim($query,",")." WHERE `oid`=".$post['oid']."; ";
		$result = $this->conn->prepare( $query );

		if (! $result->execute() ) {
			$err = $result->errorInfo();
			return array('bool'=>false,'mensaje'=>'Se produjo un error: '.$err[2],'query'=>$query);
		}else{
			return array('bool'=>true,'mensaje'=>'Se completó la operación!','data'=>$result->rowCount(),'query'=>$query);
		}
	}

	function guardarEmpleado($post)
	{
		$_post = $post;
		$_arr = array();
		foreach ($_post as $k => $v) {
			if ($k == 'telfijo') {
				$_arr['empl_telefonos'][$k] = $v;
			}elseif ($k == 'telcelular') {
				$_arr['empl_telefonos'][$k] = $v;
			}elseif ($k == 'empl_fechanacimiento' || $k == 'empl_fechavinculacion') {
				$_arr[$k] = date_format(date_create($v),'Y-m-d');
			}elseif($v == end($_post)){

			}else{
				$_arr[$k] = htmlspecialchars(strtoupper($v));
			}
			
		}
		
		$query = "INSERT INTO `tbl_empleados` ";
		$query .= " (`".implode("`, `", array_keys($_arr))."`) VALUES (";

		foreach ($_arr as $key => $value) {

			if ($key == 'empl_telefonos') {
				$query .= "'".base64_encode(json_encode($value))."',";
			}else{
				$query .= "'".$value."',";
			}
		}

		$query = rtrim($query,",").")";
		$result = $this->conn->prepare( $query );

		if (! $result->execute() ) {
			$err = $result->errorInfo();
			return '{"mensaje":"Se produjo un error: '.$err[2].'","bool":false}';
		}else{
			return '{"mensaje":"Se completó la operación","bool":true}';
		}
	}


	function subirArchivo($file)
	{
		if ($file != null) {				
			
			$folders = '/images/';
			$dirRootWin = 'E:\wamp\www\inicio\images\/';
			$fileName = basename($file['name']);
			$arrFileName = explode(".", $fileName);
			$ext = array("jpg","jpeg","png","gif");
			$type = array("image/jpeg","image/png","image/gif");
		
			if ( in_array(end($arrFileName), $ext) && in_array($file['type'], $type) ) {
				if ($file["error"] == 'UPLOAD_ERR_OK') {
					$nombre_tmp = $file["tmp_name"];
					//$dirRoot = dirname(__FILE__,1);
					//$dirUploads = $dirRoot.$folders;

					//$archivo = $dirUploads.$fileName;  //dir Unix
					$archivo = $dirRootWin.$fileName; // Dir Win

					if (move_uploaded_file($nombre_tmp, $archivo)) {

						return $fileName;
						exit;
					}else{
						return NULL;
						exit;
					}

				}else{
					return NULL;
					exit;
				}
			}else{
				return NULL;
				exit;
			}
		}else{
			return NULL;
		}

	}
	
	function get_one($table=null,$var=null, $key=null, $value=null,$order=null){
		
		$where = (is_null($key) && is_null($value)?'':"WHERE `".$key."` = '".$value."' ");
		$query = "SELECT ".(is_null($var)? '*':$var)." FROM `".$table."` ".$where.(is_null($order)?'':'ORDER BY `'.$order.'` ASC')." ; ";
		$result = $this->conn->prepare( $query );

		if (! $result->execute() ) {
			$err = $result->errorInfo();
			return array('bool'=>false,'mensaje'=>'Se produjo un error: '.$err[2],'query'=>$query);
		}else{
			return array('bool'=>true,'mensaje'=>'Se completó la operación!','data'=>$result->fetch(PDO::FETCH_ASSOC),'query'=>$query);
		}
		
	}
	
	function get_all($table=null,$var=null, $key=null, $value=null,$order=null){
		
		$where = (is_null($key) && is_null($value)?'':"WHERE `".$key."` = '".$value."' ");
		$query = "SELECT ".(is_null($var)? '*':$var)." FROM `".$table."` ".$where.(is_null($order)?'':'ORDER BY `'.$order.'` ASC')." ; ";
		$result = $this->conn->prepare( $query );

		if (! $result->execute() ) {
			$err = $result->errorInfo();
			return array('bool'=>false,'mensaje'=>'Se produjo un error: '.$err[2],'query'=>$query);
		}else{
			return array('bool'=>true,'mensaje'=>'Se completó la operación!','data'=>$result->fetchAll(PDO::FETCH_ASSOC),'query'=>$query);
		}
		
	}
	
	function login($user,$pass){
		
		$query = "SELECT * FROM `tbl_usuarios` WHERE `usu_id`= '".$user."' ";
		$result = $this->conn->prepare( $query );

		if (! $result->execute() ) {
			$err = $result->errorInfo();
			return array('bool'=>false,'mensaje'=>'Se produjo un error: '.$err[2]);
		}else{
			$rs = $result->fetch(PDO::FETCH_ASSOC);
			if($result->rowCount()>0 && password_verify($pass, $rs['usu_pass']) ){
				//Definir sessiones de inicio.
				session_start();
				session_status(PHP_SESSION_ACTIVE);
				$_SESSION['login'] = $rs;
				return array('bool'=>true,'mensaje'=>'Autenticación satisfactoria!');	
			}else{
				return array('bool'=>false,'mensaje'=>'<b>Error de Autenticación!</b></br> Puede que el usuario y la contraseña no sean correctos.');
			}
		}
		
	}
	
	function logout(){
		
		session_unset();
		session_destroy();
		session_start();
		session_regenerate_id(true);
		header('Location: ../index.php');
	}

}

?>