/**
 * 
 */

window.onload = function(){
	$('#myTab a').click(function (e) {
		e.preventDefault()
		$(this).tab('show')
	});
}

//$.ajax({
//	url: 'http://localhost:8080/Almacen/services/putServicesImple',
//	type: '',
//	data: '',
//	dataType: ''
//});

