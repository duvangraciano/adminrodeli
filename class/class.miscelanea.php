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

	function guardarCompuesto($arrPost,$files)
	{
		$file = $this->subirArchivo($files);
		$imagefile = ($file != null ? "'".$file."'" : 'NULL');
		$codigo = json_decode($this->consularCodigo($arrPost['com_codigo']),true);
		
		if ($codigo['rowcount'] == 0) {
			$query = "INSERT INTO `tbl_compuestos` (com_codigo,com_descripcion,com_componentes,com_imagen,com_anchominimo,com_altominimo,com_categoria,com_esmedible,com_observaciones) ";
			$query .= " VALUES ('".strtolower($arrPost['com_codigo'])."','".strtoupper($arrPost['com_descripcion'])."','".base64_encode($arrPost['globalArrCompo'])."',".$imagefile.",'".$arrPost['com_anchominimo']."','".$arrPost['com_altominimo']."','".$arrPost['com_categoria']."','".$arrPost['com_esmedible']."','".$arrPost['com_color']."')";

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
			if($result->rowCount()>0 && $rs['usu_pass'] == $pass){
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