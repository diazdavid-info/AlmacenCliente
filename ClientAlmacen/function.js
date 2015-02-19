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
	requestServices({typeRequest: 'getAllDrivers'}, printDrivers);
	requestServices({typeRequest: 'getAllVehicles'}, printVehicles);
	
	startEvent();
}

function startEvent(){
	$('#sendCompany').click(sendCompany);
	$('#refreshCompany').click(getAllCompanies);
	$('#sendVehicle').click(sendVehicle);
}

function sendCompany(e){
	console.log(e);
	requestServices({typeRequest: 'sendCompany', nameCompany: $('#companyName').val()}, getAllCompanies);
	$('#companyName').val("");
}

function sendVehicle(e){
	requestServices({typeRequest: 'sendVehicle', numberPlate: $('#vehicleNumberPlate').val()}, null);
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

function getAllCompanies(){
	requestServices({typeRequest: 'getAllCompanies'}, printCompanies);
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
