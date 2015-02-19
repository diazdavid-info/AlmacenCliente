<?php
$service_url = "http://localhost:8080/Almacen/webServices/rest/";
$method_name = "GET";

switch ($_GET["typeRequest"]){
	case "getAllCompanies":
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, array('Accept: application/json'));
		curl_setopt($ch, CURLOPT_URL, $service_url . "getAllCompanies");
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		$api_response = curl_exec($ch);
		$api_response_info = curl_getinfo($ch);
		curl_close($ch);
		
		$api_response_header = trim(substr($api_response, 0, $api_response_info['header_size']));
		$api_response_body = substr($api_response, $api_response_info['header_size']);
		
		// Response HTTP Status Code
		//echo $api_response_info['http_code'];
		
		// Response Header
		//echo $api_response_header;
		
		// Response Body
		echo $api_response_body;
		break;
	case "sendCompany":
		$api_request_parameters = array('nameCompany' => 'Todo perfecto');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($ch, CURLOPT_HEADER, array('Accept: application/json'));
		curl_setopt($ch, CURLOPT_URL, $service_url . "saveCompany?nameCompany=" . $_GET['nameCompany']);
		
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($api_request_parameters));
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		$api_response = curl_exec($ch);
		$api_response_info = curl_getinfo($ch);
		//var_dump($ch);
		curl_close($ch);
		
		$api_response_header = trim(substr($api_response, 0, $api_response_info['header_size']));
		$api_response_body = substr($api_response, $api_response_info['header_size']);
		
		// Response HTTP Status Code
		//echo $api_response_info['http_code'];
		
		// Response Header
		//echo $api_response_header;
		
		// Response Body
		echo $api_response_body;
		break;
	case "getAllDrivers":
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, array('Accept: application/json'));
		curl_setopt($ch, CURLOPT_URL, $service_url . "getAllDrivers");
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		$api_response = curl_exec($ch);
		$api_response_info = curl_getinfo($ch);
		curl_close($ch);
		$api_response_header = trim(substr($api_response, 0, $api_response_info['header_size']));
		$api_response_body = substr($api_response, $api_response_info['header_size']);
		echo $api_response_body;
		break;
	case "getAllVehicles":
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, array('Accept: application/json'));
		curl_setopt($ch, CURLOPT_URL, $service_url . "getAllVehicles");
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		$api_response = curl_exec($ch);
		$api_response_info = curl_getinfo($ch);
		curl_close($ch);
		$api_response_header = trim(substr($api_response, 0, $api_response_info['header_size']));
		$api_response_body = substr($api_response, $api_response_info['header_size']);
		echo $api_response_body;
		break;
	case "sendVehicle":
		$api_request_parameters = array('nameCompany' => 'Todo perfecto');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($ch, CURLOPT_HEADER, array('Accept: application/json'));
		curl_setopt($ch, CURLOPT_URL, $service_url . "saveVehicle?numberPlate=" . $_GET['numberPlate']);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($api_request_parameters));
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		$api_response = curl_exec($ch);
		$api_response_info = curl_getinfo($ch);
		curl_close($ch);
		$api_response_header = trim(substr($api_response, 0, $api_response_info['header_size']));
		$api_response_body = substr($api_response, $api_response_info['header_size']);
		echo $api_response_body;
		break;
}
