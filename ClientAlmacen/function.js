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
	requestServices({typeRequest: 'getAllCompanies'}, printCompanies);
	requestServices({typeRequest: 'getAllDrivers'}, printDrivers);
	requestServices({typeRequest: 'getAllVehicles'}, printVehicles);
	
	startEvent();
}

function startEvent(){
	$('#sendCompany').click(sendCompany);
	$('#refreshCompany').click(requestServices({typeRequest: 'getAllCompanies'}, printCompanies));
}

function sendCompany(e){
	console.log(e);
	requestServices({typeRequest: 'sendCompany', nameCompany: $('#companyName').val()}, null);
}

function printCompanies(response){
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

function requestServices(params, callBack){
	$.ajax({
		url: 'services.php',
		type: 'GET',
		data: params,
		success: callBack,
		error: callBackError
	})
}

function callBackError(){
	console.log("Error de llamada");
}
