/**
 * 
 */

window.onload = function(){
	$('#myTab a').click(function (e) {
		e.preventDefault()
		$(this).tab('show')
	});
	init_app();
}

function init_app(){
	getAllCompanies();
	getAllDrivers()
	getAllVehicles()
	
	
	startEvent();
}

function startEvent(){
	$('#sendCompany').click(sendCompany);
	$('#refreshCompany').click(getAllCompanies);
	$('#sendVehicle').click(sendVehicle);
	$('#sendAddres').click(sendAddres);
	$('#sendDriver').click(sendDriver);
}

function sendCompany(e){
	console.log(e);
	requestServices({typeRequest: 'sendCompany', nameCompany: $('#companyName').val()}, getAllCompanies);
	$('#companyName').val("");
}

function sendVehicle(e){
	console.log(e);
	requestServices({typeRequest: 'sendVehicle', numberPlate: $('#vehicleNumberPlate').val()}, getAllVehicles);
	$('#vehicleNumberPlate').val("");
}

function sendAddres(e){
	console.log(e);
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

function printCompanies(response){
	console.log(response);
	var json = JSON.parse(response);
	$('#selectCompay').empty();
	$.each(json, function(k,v){
		$('#selectCompay').append('<option value='+v.mId+'>'+v.mName+'</option>');
	});
}

function printDrivers(response){
	console.log(response);
	var json = JSON.parse(response);
	$('#selectDriver').empty();
	$.each(json, function(k,v){
		$('#selectDriver').append('<option value='+v.mId+'>'+v.mName+'</option>');
	});
}

function printVehicles(response){
	var json = JSON.parse(response);
	$('#vehicleSelect').empty();
	$.each(json, function(k,v){
		$('#vehicleSelect').append('<option value='+v.mId+'>'+v.mNumberPlate+'</option>');
	});
}

function printAddres(response){
	console.log(response);
	var json = JSON.parse(response);
	console.log(json);
	$('#driverAddress input').val("")
	$('#AddresId').val(json.mId);
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

function requestServices(params, callBack){
	$.ajax({
		url: 'services.php',
		type: 'GET',
		cache: false,
		data: params,
		success: callBack,
		error: callBackError
	})
}

function callBackError(){
	console.log("Error de llamada");
}
