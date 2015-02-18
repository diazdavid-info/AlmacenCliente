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
	
	startEvent();
}

function startEvent(){
	$('#sendCompany').click(sendCompany);
}

function sendCompany(e){
	console.log(e);
}

function printCompanies(response){
	var json = JSON.parse(response);//selectCompay
	$.each(json, function(k,v){
		$('#selectCompay').append('<option value='+v.mId+'>'+v.mName+'</option>');
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
