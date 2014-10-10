<?php
require_once('../../../config.php');
require_once($CFG->dirroot . '/mod/rcontent/WebServices/wsSeguimiento.lib.php');
require_once($CFG->dirroot . '/local/rcommon/wslib.php');

require_xtecadmin();

$ws = optional_param('ws', false, PARAM_BOOL);
$User = optional_param('User', false, PARAM_TEXT);
$Password = optional_param('Password', false, PARAM_TEXT);

$params = new StdClass();
$params->idUsuario = optional_param('idUsuario', false, PARAM_TEXT);
$params->idContenidoLMS = optional_param('idContenidoLMS', false, PARAM_INT);
$params->idCentro = optional_param('idCentro', false, PARAM_TEXT);
$params->idUnidad = optional_param('idUnidad', false, PARAM_TEXT);
$params->UnidadTitulo = optional_param('UnidadTitulo', false, PARAM_TEXT);
$params->UnidadOrden = optional_param('UnidadOrden', false, PARAM_TEXT);
$params->idActividad = optional_param('idActividad', false, PARAM_TEXT);
$params->ActividadTitulo = optional_param('ActividadTitulo', false, PARAM_TEXT);
$params->ActividadOrden = optional_param('ActividadOrden', false, PARAM_TEXT);
$params->ForzarGuardar = optional_param('ForzarGuardar', 0, PARAM_TEXT);
$params->SumaPesos = optional_param('Descripcion', 100, PARAM_INT);

$params->Resultado = new StdClass();
$params->Resultado->FechaHoraInicio = optional_param('rFechaHoraInicio', false, PARAM_TEXT);
$params->Resultado->Duracion = optional_param('rDuracion', false, PARAM_TEXT);
$params->Resultado->MaxDuracion = optional_param('rMaxDuracion', false, PARAM_TEXT);
$params->Resultado->MinCalificacion = optional_param('rMinCalificacion', false, PARAM_TEXT);
$params->Resultado->Calificacion = optional_param('rCalificacion', false, PARAM_TEXT);
$params->Resultado->MaxCalificacion = optional_param('rMaxCalificacion', false, PARAM_TEXT);
$params->Resultado->Intentos = optional_param('rIntentos', false, PARAM_TEXT);
$params->Resultado->MaxIntentos = optional_param('rMaxIntentos', false, PARAM_TEXT);
$params->Resultado->Estado = optional_param('rEstado', false, PARAM_TEXT);
$params->Resultado->Observaciones = optional_param('rObservaciones', false, PARAM_TEXT);
$params->Resultado->URLVerResultados = optional_param('rURLVerResultados', false, PARAM_TEXT);

$params->Detalles = new StdClass();
$params->Detalles->IdDetalle = optional_param('dIdDetalle', false, PARAM_TEXT);
$params->Detalles->IdTipoDetalle = optional_param('dIdTipoDetalle', false, PARAM_TEXT);
$params->Detalles->Descripcion = optional_param('dDescripcion', false, PARAM_TEXT);
$params->Detalles->FechaHoraInicio = optional_param('dFechaHoraInicio', false, PARAM_TEXT);
$params->Detalles->Duracion = optional_param('dDuracion', false, PARAM_TEXT);
$params->Detalles->MaxDuracion = optional_param('dMaxDuracion', false, PARAM_TEXT);
$params->Detalles->MinCalificacion = optional_param('dMinCalificacion', false, PARAM_TEXT);
$params->Detalles->Calificacion = optional_param('dCalificacion', false, PARAM_TEXT);
$params->Detalles->MaxCalificacion = optional_param('dMaxCalificacion', false, PARAM_TEXT);
$params->Detalles->Intentos = optional_param('dIntentos', false, PARAM_TEXT);
$params->Detalles->MaxIntentos = optional_param('dMaxIntentos', false, PARAM_TEXT);
$params->Detalles->Peso = optional_param('dPeso', false, PARAM_TEXT);
$params->Detalles->URLVerResultados = optional_param('dURLVerResultados', false, PARAM_TEXT);
$params->Detalles->Resultado = optional_param('dResultado', false, PARAM_TEXT);
$params->Detalles->Codigo = optional_param('dCodigo', false, PARAM_TEXT);
$params->Detalles->Descripcion = optional_param('dDescripcion', false, PARAM_TEXT);

?>
<form method="post">
Passar per ws<select name="ws">
	<option value="0" <?php if(!$ws) echo 'selected'; ?>>No, crida directa</option>
	<option value="1"<?php if($ws) echo 'selected'; ?>>Si, crida WS</option>
</select><br>
<h2>Auth</h2>
User<input name="User" value="<?php echo $User ?>"/><br>
Password<input name="Password" value="<?php echo $Password ?>"/><br>
<h2>General</h2>
idUsuario<input name="idUsuario" value="<?php echo $params->idUsuario ?>"/><br>
idContenidoLMS<input name="idContenidoLMS" value="<?php echo $params->idContenidoLMS ?>"/><br>
idCentro<input name="idCentro" value="<?php echo $params->idCentro ?>"/><br>
idUnidad<input name="idUnidad" value="<?php echo $params->idUnidad ?>"/>
Titulo<input name="UnidadTitulo" value="<?php echo $params->UnidadTitulo ?>"/>
Orden<input name="UnidadOrden" value="<?php echo $params->UnidadOrden ?>"/><br>
idActividad<input name="idActividad" value="<?php echo $params->idActividad ?>"/>
Titulo<input name="ActividadTitulo" value="<?php echo $params->ActividadTitulo ?>"/>
Orden<input name="ActividadOrden" value="<?php echo $params->ActividadOrden ?>"/><br>
ForzarGuardar<select name="ForzarGuardar">
	<option value="0" <?php if($params->ForzarGuardar == '0') echo 'selected'; ?>>0</option>
	<option value="1"<?php if($params->ForzarGuardar == '1') echo 'selected'; ?>>1</option>
</select><br>
SumaPesos<input name="SumaPesos" value="<?php echo $params->SumaPesos ?>"/><br>
<h2>Resultado</h2>
FechaHoraInicio<input name="rFechaHoraInicio" value="<?php echo $params->Resultado->FechaHoraInicio ?>"/><br>
Duracion<input name="rDuracion" value="<?php echo $params->Resultado->Duracion ?>"/><br>
MaxDuracion<input name="rMaxDuracion" value="<?php echo $params->Resultado->MaxDuracion ?>"/><br>
MinCalificacion<input name="rMinCalificacion" value="<?php echo $params->Resultado->MinCalificacion ?>"/><br>
Calificacion<input name="rCalificacion" value="<?php echo $params->Resultado->Calificacion ?>"/><br>
MaxCalificacion<input name="rMaxCalificacion" value="<?php echo $params->Resultado->MaxCalificacion ?>"/><br>
Intentos<input name="rIntentos" value="<?php echo $params->Resultado->Intentos ?>"/><br>
MaxIntentos<input name="rMaxIntentos" value="<?php echo $params->Resultado->MaxIntentos ?>"/><br>
Estado<input name="rEstado" value="<?php echo $params->Resultado->Estado ?>"/><br>
Observaciones<input name="rObservaciones" value="<?php echo $params->Resultado->Observaciones ?>"/><br>
URLVerResultados<input name="rURLVerResultados" value="<?php echo $params->Resultado->URLVerResultados ?>"/><br>

<h2>Detalles</h2>
IdDetalle<input name="dIdDetalle" value="<?php echo $params->Detalles->IdDetalle ?>"/><br>
IdTipoDetalle<input name="dIdTipoDetalle" value="<?php echo $params->Detalles->IdTipoDetalle ?>"/><br>
Descripcion<input name="dDescripcion" value="<?php echo $params->Detalles->Descripcion ?>"/><br>
FechaHoraInicio<input name="dFechaHoraInicio" value="<?php echo $params->Detalles->FechaHoraInicio ?>"/><br>
Duracion<input name="dDuracion" value="<?php echo $params->Detalles->Duracion ?>"/><br>
MaxDuracion<input name="dMaxDuracion" value="<?php echo $params->Detalles->MaxDuracion ?>"/><br>
MinCalificacion<input name="dMinCalificacion" value="<?php echo $params->Detalles->MinCalificacion ?>"/><br>
Calificacion<input name="dCalificacion" value="<?php echo $params->Detalles->Calificacion ?>"/><br>
MaxCalificacion<input name="dMaxCalificacion" value="<?php echo $params->Detalles->MaxCalificacion ?>"/><br>
Intentos<input name="dIntentos" value="<?php echo $params->Detalles->Intentos ?>"/><br>
MaxIntentos<input name="dMaxIntentos" value="<?php echo $params->Detalles->MaxIntentos ?>"/><br>
Peso<input name="dPeso" value="<?php echo $params->Detalles->Peso ?>"/><br>
URLVerResultados<input name="dURLVerResultados" value="<?php echo $params->Detalles->URLVerResultados ?>"/><br>
Resultado<input name="dResultado" value="<?php echo $params->Detalles->Resultado ?>"/><br>
Codigo<input name="dCodigo" value="<?php echo $params->Detalles->Codigo ?>"/><br>
Descripcion<input name="dDescripcion" value="<?php echo $params->Detalles->Descripcion ?>"/><br>
<input type="submit">
</form>
<?php
if($params->idUsuario && $params->idContenidoLMS && $params->idCentro){
	$params_arr = (array) $params->Resultado;
	foreach($params_arr as $key => $param){
		if($param === false || $param === ""){
			unset($params->Resultado->$key);
		}
	}

	$params_arr = (array) $params->Detalles;
	foreach($params_arr as $key => $param){
		if($param === false || $param === ""){
			unset($params->Detalles->$key);
		}
	}

	$params_arr = (array) $params;
	foreach($params_arr as $key => $param){
		if($param === false || $param === ""){
			unset($params->$key);
		}
	}


	try{
		print_object($params);
		if($ws){
			$wsdl = $CFG->wwwroot.'/mod/rcontent/WebServices/wsSeguimiento.php';
			ini_set('soap.wsdl_cache_enabled', '0');
			$options = array('connection_timeout' => 120);
		    $options['trace'] = 1;
			$client = @new soapclient($wsdl.'?wsdl', $options);
			$auth = array('User' => $User, 'Password' => $Password);
		    $namespace = rcommon_get_wsdl_namespace($wsdl.'?wsdl');
		    $header = new SoapHeader($namespace, "WSEAuthenticateHeader", $auth);
		    $client->__setSoapHeaders(array($header));

			$return = $client->ResultadoDetalleExtendido($params);
		} else {
			$return = get_ResultadoDetalleExtendido($params);
		}
		print_object($return);
	} catch (Exception $e){
		print_object($e);
	}
}