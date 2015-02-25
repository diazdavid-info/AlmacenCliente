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
	case "sendAddres":
		//$api_request_parameters = array('nameCompany' => 'Todo perfecto');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
		curl_setopt($ch, CURLOPT_URL, $service_url . "saveAddress?block=" . $_GET['block'] . 
		"&door=" . $_GET['door'] . "&floor=" . $_GET['floor'] . "&locality=" . $_GET['locality'] . 
		"&nameVia=" . $_GET['nameVia'] . "&number=" . $_GET['number'] . "&province=" . $_GET['province'] . 
		"&stairs=" . $_GET['stairs'] . "&typeVia=" . $_GET['typeVia']);
		//curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($api_request_parameters));
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		$api_response = curl_exec($ch);
		$api_response_info = curl_getinfo($ch);
		curl_close($ch);
		$api_response_header = trim(substr($api_response, 0, $api_response_info['header_size']));
		$api_response_body = substr($api_response, $api_response_info['header_size']);
		echo $api_response_body;
		break;
	case "sendDriver":
		$api_request_parameters = array('nameCompany' => 'Todo perfecto');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($ch, CURLOPT_HEADER, array('Accept: application/json'));
		curl_setopt($ch, CURLOPT_URL, $service_url . "saveDriver?nameDriver=" . $_GET['nameDriver'] . "&surnameDriver=" . $_GET['surnameDriver'] . 
					"&telephone=" . $_GET['telephone'] . "&idAddress=" . $_GET['idAddress']);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($api_request_parameters));
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		$api_response = curl_exec($ch);
		$api_response_info = curl_getinfo($ch);
		curl_close($ch);
		$api_response_header = trim(substr($api_response, 0, $api_response_info['header_size']));
		$api_response_body = substr($api_response, $api_response_info['header_size']);
		echo $api_response_body;
		break;
	case "sendWorker":
		$api_request_parameters = array('nameCompany' => 'Todo perfecto');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($ch, CURLOPT_HEADER, array('Accept: application/json'));
		curl_setopt($ch, CURLOPT_URL, $service_url . "saveWorker?nameDriver=" . $_GET['nameDriver'] . "&surnameDriver=" . $_GET['surnameDriver'] .
		"&telephone=" . $_GET['telephone'] . "&idAddress=" . $_GET['idAddress']);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($api_request_parameters));
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		$api_response = curl_exec($ch);
		$api_response_info = curl_getinfo($ch);
		curl_close($ch);
		$api_response_header = trim(substr($api_response, 0, $api_response_info['header_size']));
		$api_response_body = substr($api_response, $api_response_info['header_size']);
		echo $api_response_body;
		break;
	case "sendProduct":
		$parameter = "asinProduct=" . urlencode($_GET['asinProduct']) . "&eanProduct=" . urlencode($_GET['eanProduct']) . 
					"&descriptionProduct=" . urlencode($_GET['descriptionProduct']) . "&modelProduct=" . urlencode($_GET['modelProduct']) . "&priceProduct=" . urlencode($_GET['priceProduct']) . 
					"&weightProduct=" . urlencode($_GET['weightProduct']) . "&nameManufactureProduct=" . urlencode($_GET['nameManufactureProduct']) . "&widthProduct=" . urlencode($_GET['widthProduct']) . 
					"&highProduct=" . urlencode($_GET['highProduct']) . "&longProduct=" . urlencode($_GET['longProduct']);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_URL, $service_url . "saveProduct?" . $parameter);
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		$api_response = curl_exec($ch);
		$api_response_info = curl_getinfo($ch);
		curl_close($ch);
		$api_response_header = trim(substr($api_response, 0, $api_response_info['header_size']));
		$api_response_body = substr($api_response, $api_response_info['header_size']);
		echo $api_response_body;
		//
		break;
	case "getAllShelves":
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_URL, $service_url . "getAllShelves");
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		$api_response = curl_exec($ch);
		$api_response_info = curl_getinfo($ch);
		curl_close($ch);
		$api_response_header = trim(substr($api_response, 0, $api_response_info['header_size']));
		$api_response_body = substr($api_response, $api_response_info['header_size']);
		echo $api_response_body;
		break;
	case "sendUnload":
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_URL, $service_url . "saveUnload?company=" . $_GET['company'] . "&driver=" . $_GET['driver'] . "&vehicle=" . $_GET['vehicle'] . 
					"&date=" . $_GET['date'] . "&time=" . $_GET['time'] . "&worker=" . $_GET['worker']);
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		$api_response = curl_exec($ch);
		$api_response_info = curl_getinfo($ch);
		curl_close($ch);
		$api_response_header = trim(substr($api_response, 0, $api_response_info['header_size']));
		$api_response_body = substr($api_response, $api_response_info['header_size']);
		echo $api_response_body;
		break;
	case "sendProductUnload":
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_URL, $service_url . "saveUnloadProduct?idUnload=" . $_GET['idUnload'] . "&idProduct=" . $_GET['idProduct']);
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		$api_response = curl_exec($ch);
		$api_response_info = curl_getinfo($ch);
		curl_close($ch);
		$api_response_header = trim(substr($api_response, 0, $api_response_info['header_size']));
		$api_response_body = substr($api_response, $api_response_info['header_size']);
		echo $api_response_body;
		break;
	case "getAllWorkers":
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_URL, $service_url . "getAllWorkers");
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		$api_response = curl_exec($ch);
		$api_response_info = curl_getinfo($ch);
		curl_close($ch);
		$api_response_header = trim(substr($api_response, 0, $api_response_info['header_size']));
		$api_response_body = substr($api_response, $api_response_info['header_size']);
		echo $api_response_body;
		break;
	case "sendClient":
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_URL, $service_url . "saveClient?name=" . $_GET['name'] . "&surname=" . $_GET['surname'] .
		"&telephone=" . $_GET['telephone'] . "&address=" . $_GET['address']);
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		$api_response = curl_exec($ch);
		$api_response_info = curl_getinfo($ch);
		curl_close($ch);
		$api_response_header = trim(substr($api_response, 0, $api_response_info['header_size']));
		$api_response_body = substr($api_response, $api_response_info['header_size']);
		echo $api_response_body;
		break;
	case "sendOrder":
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_URL, $service_url . "saveOrder?date=" . $_GET['date'] . "&person=" . $_GET['person'] .
		"&price=" . $_GET['price']);
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		$api_response = curl_exec($ch);
		$api_response_info = curl_getinfo($ch);
		curl_close($ch);
		$api_response_header = trim(substr($api_response, 0, $api_response_info['header_size']));
		$api_response_body = substr($api_response, $api_response_info['header_size']);
		echo $api_response_body;
		break;
	case "sendLoad":
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_URL, $service_url . "saveLoad?company=" . $_GET['company'] . "&driver=" . $_GET['driver'] .
		"&vehicle=" . $_GET['vehicle'] . "&date=" . $_GET['date'] . "&time=" . $_GET['time'] . "&worker=" . $_GET['worker']);
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		$api_response = curl_exec($ch);
		$api_response_info = curl_getinfo($ch);
		curl_close($ch);
		$api_response_header = trim(substr($api_response, 0, $api_response_info['header_size']));
		$api_response_body = substr($api_response, $api_response_info['header_size']);
		echo $api_response_body;
		break;
	case "sendLoadOrders":
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_URL, $service_url . "saveLoadOrders?load=" . $_GET['load'] . "&order=" . $_GET['order']);
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		$api_response = curl_exec($ch);
		$api_response_info = curl_getinfo($ch);
		curl_close($ch);
		$api_response_header = trim(substr($api_response, 0, $api_response_info['header_size']));
		$api_response_body = substr($api_response, $api_response_info['header_size']);
		echo $api_response_body;
		break;
	case "sendOrderProduct":
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_URL, $service_url . "saveProductOrder?asin=" . $_GET['asin'] . "&order=" . $_GET['order']);
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		$api_response = curl_exec($ch);
		$api_response_info = curl_getinfo($ch);
		curl_close($ch);
		$api_response_header = trim(substr($api_response, 0, $api_response_info['header_size']));
		$api_response_body = substr($api_response, $api_response_info['header_size']);
		echo $api_response_body;
		break;
}