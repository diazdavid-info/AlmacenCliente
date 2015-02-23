/**
 * 
 */
var stringXml;
var jsonXml;
var objXml;
var idUnload;
window.onload = function(){
	$('#myTab a').click(function (e) {
		e.preventDefault()
		$(this).tab('show')
	});
	init_app();
}

function init_app(){
	getAllCompanies();
	getAllDrivers();
	getAllVehicles();
	getAllShelves();
	getAllWorkers();
	
	startEvent();
}

function startEvent(){
	$('#sendCompany').click(sendCompany);
	$('#refreshCompany').click(getAllCompanies);
	$('#sendVehicle').click(sendVehicle);
	$('#sendAddres').click(sendAddres);
	$('#sendDriver').click(sendDriver);
	$('#productFile').change(readXml);
	$('#fileProduct').click(readProductXml);
	$('#sendForm').click(sendForm);
	$('#sendUser').click(sendAddressUser);
	$('#sendProduct').click(dataProduct);
}

function sendCompany(e){
	requestServices({typeRequest: 'sendCompany', nameCompany: $('#companyName').val()}, getAllCompanies);
	$('#companyName').val("");
}

function sendVehicle(e){
	requestServices({typeRequest: 'sendVehicle', numberPlate: $('#vehicleNumberPlate').val()}, getAllVehicles);
	$('#vehicleNumberPlate').val("");
}

function sendAddres(e){
	requestServices({
		typeRequest: 'sendAddres',
		block: $('#driverBlock').val(),
		door: $('#driverDoor').val(),
		floor: $('#driverFloor').val(),
		locality: $('#driverLocality').val(),
		nameVia: $('#driverNameVia').val(),
		number: $('#driverNumber').val(),
		province: $('#driverProvince').val(),
		stairs: $('#driverStairs').val(),
		typeVia: $('#driverTypeVia').val()}, printAddres);
}

function sendDriver(e){
	requestServices({
		typeRequest: 'sendDriver',
		nameDriver: $('#driverName').val(),
		surnameDriver: $('#driverSurname').val(),
		telephone: $('#driverPhone').val(),
		idAddress: $('#AddresId').val()}, getAllDrivers);
	$('#driverData input').val("")
}

function sendForm(e){
	sendUnload();
}

function sendAddressUser(e){
	if($('#selectTypeUser').val() != 0){
		requestServices({
			typeRequest: 'sendAddres',
			block: $('#blockTypeUser').val(),
			door: $('#doorTypeUser').val(),
			floor: $('#floorTypeUser').val(),
			locality: $('#localityTypeUser').val(),
			nameVia: $('#nameViaTypeUser').val(),
			number: $('#numberTypeUser').val(),
			province: $('#provinceTypeUser').val(),
			stairs: $('#stairsTypeUser').val(),
			typeVia: $('#typeViaTypeUser').val()}, printAddresUser);
	}
}

function sendUser(){
	var callBack;
	var send;
	console.log("SENDUSER "+$('#selectTypeUser').val());
	if($('#selectTypeUser').val() == 2){
		console.log('conductor');
		callBack = getAllDrivers;
		send = 'sendDriver';
	}else if($('#selectTypeUser').val() == 1){
		callBack = null;
		send = 'sendWorker';
	}
	requestServices({
		typeRequest: send,
		nameDriver: $('#nameTypeUser').val(),
		surnameDriver: $('#surNameTypeUser').val(),
		telephone: $('#telephoneTypeUser').val(),
		idAddress: $('#AddresId').val()}, callBack);
	$('#addUser input').val("");
	
}

function sendProduct(asinProduct, eanProduct, descriptionProduct, modelProduct, priceProduct, weightProduct, nameManufactureProduct, widthProduct, highProduct, longProduct){
	requestServices({
		typeRequest: 'sendProduct',
		asinProduct: asinProduct,
		eanProduct: eanProduct,
		descriptionProduct: descriptionProduct,
		modelProduct: modelProduct,
		priceProduct: priceProduct,
		weightProduct: weightProduct,
		nameManufactureProduct: nameManufactureProduct,
		widthProduct: widthProduct,
		highProduct: highProduct,
		longProduct: longProduct}, getAllShelves);
	$('#addProduct input').val("");
}

function sendProduct2(asinProduct, eanProduct, descriptionProduct, modelProduct, priceProduct, weightProduct, nameManufactureProduct, widthProduct, highProduct, longProduct){
	requestServices({
		typeRequest: 'sendProduct',
		asinProduct: asinProduct,
		eanProduct: eanProduct,
		descriptionProduct: descriptionProduct,
		modelProduct: modelProduct,
		priceProduct: priceProduct,
		weightProduct: weightProduct,
		nameManufactureProduct: nameManufactureProduct,
		widthProduct: widthProduct,
		highProduct: highProduct,
		longProduct: longProduct}, sendProductUnload);
	$('#addProduct input').val("");
}

function sendProductUnload(response){
	response = JSON.parse(response);
	requestServices({
		typeRequest: 'sendProductUnload',
		idProduct: response.mId,
		idUnload: idUnload}, null);
	getAllShelves();
}

function sendUnload(){
	var date = new Date();
	requestServices({
		typeRequest: 'sendUnload',
		company: $('#selectCompay').val(),
		driver: $('#selectDriver').val(),
		vehicle: $('#vehicleSelect').val(),
		date: date.getDate()+"/"+(date.getMonth()+1)+"/"+date.getFullYear(),
		time: date.getHours()+":"+date.getMinutes(),
		worker: $('#workerSelect').val() }, saveIdUnload);
}

function readXml(e){
	objXml = e;
	var reader = new FileReader();
	reader.onload = (function(theFile){
		stringXml = theFile.target.result;
		jsonXml = xmlToJson($.parseXML(stringXml));
	});
	reader.readAsText(e.target.files[0]);
}

function printCompanies(response){
	if(response != "[]"){
		var json = JSON.parse(response);
		$('#selectCompay').empty();
		$('#selectCompanyLoad').empty();
		$.each(json, function(k,v){
			$('#selectCompay').append('<option value='+v.mId+'>'+v.mName+'</option>');
			$('#selectCompanyLoad').append('<option value='+v.mId+'>'+v.mName+'</option>');
		});
	}
	
}

function printDrivers(response){
	if(response != "[]"){
		var json = JSON.parse(response);
		$('#selectDriver').empty();
		$('#selectDriverLoad').empty();
		$.each(json, function(k,v){
			$('#selectDriver').append('<option value='+v.mId+'>'+v.mName+'</option>');
			$('#selectDriverLoad').append('<option value='+v.mId+'>'+v.mName+'</option>');
		});
	}
}

function printVehicles(response){
	if(response != "[]"){
		var json = JSON.parse(response);
		$('#vehicleSelect').empty();
		$('#vehicleSelectLoad').empty();
		$.each(json, function(k,v){
			$('#vehicleSelect').append('<option value='+v.mId+'>'+v.mNumberPlate+'</option>');
			$('#vehicleSelectLoad').append('<option value='+v.mId+'>'+v.mNumberPlate+'</option>');
		});
	}
}

function printAddres(response){
	var json = JSON.parse(response);
	$('#driverAddress input').val("")
	$('#AddresId').val(json.mId);
}

function printAddresUser(response){
	var json = JSON.parse(response);
	$('#AddresId').val(json.mId);
	sendUser();
}

function printShelves(response){
	$('#table-shelves').empty();
	$('#table-shelves').append('<tr><th>ID estantería</th><th>ID situación</th><th>ID producto</th></tr>');
	var result = "";
	if(response != "[]"){
		var json = JSON.parse(response);
		$.each(json, function(k,v){
			result += '<tr>';
			$.each(v, function(ke,va){
				result += '<td>'+va+'</td>';
			});
			result += '</tr>';
		});
		$('#table-shelves').append(result);
	}
}

function printWorkers(response){
	if(response != "[]"){
		var json = JSON.parse(response);
		$('#workerSelect').empty();
		$('#workerSelectLoad').empty();
		$.each(json, function(k,v){
			$('#workerSelect').append('<option value='+v.mId+'>'+v.mName+'</option>');
			$('#workerSelectLoad').append('<option value='+v.mId+'>'+v.mName+'</option>');
		});
	}
}

function getAllCompanies(){
	requestServices({typeRequest: 'getAllCompanies'}, printCompanies);
}

function getAllDrivers(){
	requestServices({typeRequest: 'getAllDrivers'}, printDrivers);
}

function getAllVehicles(){
	requestServices({typeRequest: 'getAllVehicles'}, printVehicles);
}


function getAllShelves(){
	requestServices({typeRequest: 'getAllShelves'}, printShelves);
}

function getAllWorkers(){
	requestServices({typeRequest: 'getAllWorkers'}, printWorkers);
}


function requestServices(params, callBack){
	$.ajax({
		url: 'services.php',
		type: 'GET',
		cache: false,
		async: true,
		data: params,
		success: callBack,
		error: callBackError
	})
}

function callBackError(a,b,c){//
	console.log("Error de llamada: ");
	console.log(a);
	console.log(b);
	console.log(c);
}

function dataProduct(e){
	sendProduct($('#asinProduct').val(), $('#eanProduct').val(), $('#descriptionProduct').val(), $('#modelProduct').val(), 
			$('#priceProduct').val(), $('#weightProduct').val(), $('#nameManufactureProduct').val(), $('#widthProduct').val(), 
			$('#highProduct').val(), $('#longProduct').val());
}

function xmlToJson(xml){
	var pepe = xml.getElementsByTagName('products');
	jsonXml = xml2json(xml,"");
}

function readProductXml(){
	var file = document.getElementById('productFile');
	var reader = new FileReader();
	reader.onload = (function(theFile){
		var stringXml = theFile.target.result;
		var xml = $.parseXML(stringXml);
		var ja = xml2json(xml,'');
		$.each(JSON.parse(ja), function(k,v){
			$.each(v, function(k1,v1){
				$.each(v1, function(k2,v2){
					sendProduct2(v2.asin, v2.asin, v2.description, v2.model, v2.price, v2.weight, v2.manufacturer.name, v2.measures.measure[0].value, v2.measures.measure[1].value, v2.measures.measure[2].value);
				});
			});
			
		});
	});
	reader.readAsText(file.files[0]);
}

function saveIdUnload(response){
	idUnload = response;
	readProductXml();
}
