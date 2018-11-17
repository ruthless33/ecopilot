var marca = $('#smarca');
var modelo = $('#smodelo');
var motor = $('#smotor');
var capacity = $('#scapacity');

function getAllBrands() {
	$.ajax({
        type: "GET",
        dataType: 'json',
        url: "/getAllBrands",
        contentType: "application/json; charset=utf-8",
        success: function (data) {
        	marca.children().remove();
		    marca.append('<option value="" selected disabled>Selecciona una marca</option>');

        	for (var i = 0; i < data.length; i++) {
        		var opt = document.createElement('option');
			    opt.value = data[i]['marca'];
			    opt.innerHTML = data[i]['marca'];
			    marca.append(opt);
        	}
        },
        error: function () {
        	console.log('error');
        },
    });
}

function getModels() {
	var selected_brand = $('select[id=smarca]').val();

	$.ajax({
        type: "GET",
        dataType: 'json',
        url: "/getModels/"+selected_brand,
        contentType: "application/json; charset=utf-8",
        success: function (data) {
        	modelo.children().remove();
        	modelo.append('<option value="" selected disabled>Selecciona un modelo</option>');

        	for (var i = 0; i < data.length; i++) {
        		var opt = document.createElement('option');
			    opt.value = data[i]['generacion'];
			    opt.innerHTML = data[i]['generacion'];
			    modelo.append(opt);
        	}
        },
        error: function () {
        	console.log('error');
        },
    });
}

function getEngines() {
	var selected_model = $('select[id=smodelo]').val();

	$.ajax({
        type: "GET",
        dataType: 'json',
        url: "/getEngines/"+selected_model,
        contentType: "application/json; charset=utf-8",
        success: function (data) {
        	motor.children().remove();
        	motor.append('<option value="" selected disabled>Selecciona una motor</option>');

        	for (var i = 0; i < data.length; i++) {
        		var opt = document.createElement('option');
			    opt.value = data[i]['mod_motor'];
			    opt.innerHTML = data[i]['mod_motor'];
			    motor.append(opt);
        	}
        },
        error: function () {
        	console.log('error');
        },
    });
}

function getPeopleCapacity() {
	var selected_brand = $('select[id=smarca]').val();
	var selected_model = $('select[id=smodelo]').val();
	var selected_engine = $('select[id=smotor]').val();

	$.ajax({
        type: "GET",
        dataType: 'json',
        url: "/getPeopleCapacity/"+selected_brand+"/"+selected_model+"/"+selected_engine,
        contentType: "application/json; charset=utf-8",
        success: function (data) {
        	capacity.children().remove();
        	capacity.append('<option value="" selected disabled>Selecciona el numero de personas</option>');

        	for (var i = 0; i < parseInt(data[0]['plazas']); i++) {
        		var opt = document.createElement('option');
			    opt.value = i+1;
			    opt.innerHTML = i+1;
			    capacity.append(opt);
        	}
        },
        error: function () {
        	console.log('error');
        },
    });
}

window.addEventListener("load",function(){
	getAllBrands();
},false);