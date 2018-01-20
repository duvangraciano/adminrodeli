<?php 
/*
Marco puerta 3 x 1 c/pestaña Gris Plata
Rectangular de (76,2 x 38,1 mm) Gris Plata
Cuadrado 1. 1/2 Gris Plata
Tablilla esterilla angosta Gris Plata
Pisa vidrio 3/8 x 3/8 economico Gris Plata
Cuadrado 1 x 1 Gris Plata
Angulo p/chapeta 1.1/4 x 1/8 Crudo
Adaptador 3831 Gris Plata
Pisa vidrio 3831 Gris Plata
Divisor 3831 Gris Plata
Sillar /cabezal 3831 Gris Plata
Toallero platina Gris Plata
*/
function puertaPrincipal($post,$comp,$compte)
{
	$componente = array();
	foreach ($compte as $value) {
		$componente[$value['oid']] = $value['cop_alias'];
	}

	$ancho=$post['ancho'];
	$alto=$post['alto'];
	$metroslineal=null;
	$costoml=null;
	
	$pp = (object)[];
	$pp->adaptador = 0.0;	
	$pp->marco = floatval( ( ($alto*2)+$ancho <= 6 ) ? 6 : ceil( ($alto*2)+$ancho ) );
	$pp->retangular = ( (($alto-0.2)+($ancho-0.04))*2 <= 6 )? 6 : ceil( ($ancho+$alto)*2 );
	$pp->cuadrado = ceil((($ancho-0.2)*2)+2);
	$pp->otrocuadrado = 3.5;


	foreach ($comp as $v) {
		if ($componente[$v['componente']] == 'tablilla') {
			$pp->tablilla = ($v['comppal'] == 1)? ceil( ((($ancho*100)-23.5)/9.5)*(($alto-0.24)/2)+((((($ancho*100)-33)/3)/9.5)*2) ) : ceil( ((($ancho*100)-23.5)/7.5)*(($alto-0.24)/2)+((((($ancho*100)-33)/3)/7.5)*2) ) ;
		}elseif ($componente[$v['componente']] == 'adaptador') {
			$pp->adaptador = floatval( ($v['comppal'] == 1)? (($ancho-0.2)*5.5)+((($alto-0.2)*2)+4) : 0.0 );
		}elseif ($componente[$v['componente']] == 'pivote') {
			$pp->pivote = 1;
		}elseif ($componente[$v['componente']] == 'escudo') {		
			$pp->escudo = 1;
		}
	}

	
	
	$pp->angulo = 0.7;
	$pp->pisavidrio = floatval( ($pp->adaptador > 0.0)? $pp->adaptador : (($ancho-0.2)*5.5)+((($alto-0.2)*2)+4) );
	$pp->divisor = (false)? null : 0.0;
	$pp->sillar = (false)? null : 0.0;
	$pp->toallero = (false)? null : 0.0;
	$pp->tornilloA = 50;
	$pp->tornilloB = 0;
	$pp->tornilloC = 90;
	$pp->remacheA = 15;
	$pp->remacheB = 0;
	$pp->u = 2.5;

	$pp->bisagra = (isset($pp->pivote))? 0.0 : ($alto > 2.15)? 4 : 3 ;
	$pp->chapa = 1;
	
	$pp->pasador = 0;
	$pp->tensor = 0;
	$pp->lente = 1;
	$pp->vidrio = 0.20;
	$pp->tapon = 6;
	return json_encode($pp);
}





?>