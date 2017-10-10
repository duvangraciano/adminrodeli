<?php  
$json = '[{"oid":"1","descripcion":"Persona Natural"},{"oid":"2","descripcion":"Juridica"}]';

$ancho=1.00;
$alto=2.10;
$metroslineal=null;
$costoml=null;

$pp = (object)[];

$pp->marco = floatval( ( ($alto*2)+$ancho <= 6 ) ? 6 : ceil( ($alto*2)+$ancho ) );
$pp->retangular = ( (($alto-0.2)+($ancho-0.04))*2 <= 6 )? 6 : ceil( ($ancho+$alto)*2 );
$pp->cuadrado = ceil((($ancho-0.2)*2)+2);
$pp->otrocuadrado = 3.5;
$pp->tablilla = (true)? ceil( ((($ancho*100)-23.5)/9.5)*(($alto-0.24)/2)+((((($ancho*100)-33)/3)/9.5)*2) ) : ceil( ((($ancho*100)-23.5)/7.5)*(($alto-0.24)/2)+((((($ancho*100)-33)/3)/7.5)*2) ) ;
$pp->angulo = 0.7;
$pp->adaptador = floatval( (true)? (($ancho-0.2)*5.5)+((($alto-0.2)*2)+4) : 0.0 );
$pp->pisavidrio = floatval( ($pp->adaptador > 0.0)? $pp->adaptador : (($ancho-0.2)*5.5)+((($alto-0.2)*2)+4) );
$pp->divisor = (false)? null : 0.0;
$pp->sillar = (false)? null : 0.0;
$pp->toallero = (false)? null : 0.0;
$pp->tornilloA = null;
$pp->tornilloB = null;
$pp->tornilloC = null;
$pp->remacheA = null;
$pp->remacheB = null;
$pp->u = null;

$pp->bisagra = null;
$pp->chapa = null;
$pp->escudo = null;
$pp->pasador = null;
$pp->tensor = null;
$pp->lente = null;
$pp->vidrio = null;
$pp->tapon = null;


echo print_r($pp);

?>