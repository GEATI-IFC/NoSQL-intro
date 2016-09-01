var urlApiRest = "http://127.0.0.1/MongoDB/servidor/mongodb";

function get(path, callback){
	var xhr = new XMLHttpRequest();
	xhr.open("GET", urlApiRest + path, true);
	xhr.onreadystatechange = function () {
		if (xhr.readyState != 4 || xhr.status != 200){
	  		return;
		} 
	  	var responseJson = JSON.parse( xhr.responseText );
	  	callback(responseJson);
	};
	xhr.send();
}

function post(path, parametros, callback){
	var dados = [];

	if(parametros.constructor == HTMLFormElement){
		var i=0;
		var inputs = form.querySelectorAll("input");
		
		for (; i<inputs.length; i++) {
			var input = inputs[i];
			dados.push(input.name + "=" + input.value);
		}
	} else {
		for (chave in parametros) {
			valor = parametros[chave];
			dados.push(chave + "=" + valor);
		}
	}

	dados = dados.join("&");

	var xhr = new XMLHttpRequest();
	xhr.open("POST", urlApiRest + path, true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.onreadystatechange = function () {
		if (xhr.readyState != 4 || xhr.status != 200){
	  		return;
		} 
	  	var responseJson = JSON.parse( xhr.responseText );
	  	callback(responseJson);
	};
	xhr.send(dados);
}