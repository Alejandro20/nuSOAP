<?php
	require_once 'config/nusoap.php';

	$soap = new soap_server;
	$soap->configureWSDL('AddService', 'http://localhost/ProjectosM7/SOAP/calculadora/');
	$soap->wsdl->schemaTargetNamespace = 'http://localhost/ProjectosM7/SOAP/calculadora/';
	$soap->register('Add', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/ProjectosM7/SOAP/calculadora/')
	;
	$soap->register('Rest', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/ProjectosM7/SOAP/calculadora/');
	$soap->register('Mult', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/ProjectosM7/SOAP/calculadora/');
	$soap->register('Div', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/ProjectosM7/SOAP/calculadora/');
	$soap->service(isset($HTTP_RAW_POST_DATA) ?$HTTP_RAW_POST_DATA : '');

function Add($a, $b){
	return $a + $b;
}

function Rest($a, $b){
	return $a - $b;
}
function Mult($a, $b){
	return $a * $b;
}
function Div($a, $b){
	return $a / $b;
}
?>

