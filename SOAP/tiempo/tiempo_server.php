<?php
	
	header("Content-type: text/xml"); 
	
	require_once ('config/nusoap.php');
	
	$wsdl = 'http://www.webservicex.net/globalweather.asmx?WSDL';
	
	$Localidad = $_POST["Localidad"];
	$Pais = $_POST["Pais"];
	$cliente = new nusoap_client($wsdl, 'WSDL');
	$params = array('CityName' => $Localidad, 'CountryName' => $Pais);
	$result = $cliente->call("GetWeather", $params);
	$result2 = end($result);
	$result2 = mb_convert_encoding($result2, "UTF-16", "UTF-8");
	
	$error = $cliente->getError();

	if (!$cliente->fault){

		if(!$error){
		
			$xml=simplexml_load_string($result2) or die("Error: Cannot create object");
			echo $xml->asXML();
		}
	}

?>
